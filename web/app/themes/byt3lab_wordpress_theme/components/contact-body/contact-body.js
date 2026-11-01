/**
 * BYT3LAB Contact Component - Interactive Form Handler
 */
(function() {
    function initContactForm() {
        const contactForm = document.getElementById('byt3lab-contact-form');
        if (!contactForm) return;
        if (contactForm.dataset.byt3labBound === 'true') return;
        contactForm.dataset.byt3labBound = 'true';

        const formAlert = document.getElementById('byt3lab-contact-alert');
        const formAlertDesc = document.getElementById('byt3lab-contact-alert-desc');
        const formWaWrap = document.getElementById('byt3lab-contact-wa-wrap');
        const formWaBtn = document.getElementById('byt3lab-contact-wa-btn');
        const formError = document.getElementById('byt3lab-contact-error');
        const formErrorMsg = document.getElementById('byt3lab-contact-error-msg');

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnHtml = submitBtn ? submitBtn.innerHTML : '';

            // Compute exact AJAX URL matching current window origin (fixes port 8000 vs 80 mismatches)
            let rawAjaxUrl = contactForm.getAttribute('data-ajax-url') || '';
            let ajaxUrl = '/wp-admin/admin-ajax.php';
            try {
                if (rawAjaxUrl) {
                    const parsed = new URL(rawAjaxUrl, window.location.origin);
                    ajaxUrl = window.location.origin + parsed.pathname + parsed.search;
                } else {
                    ajaxUrl = window.location.origin + '/wp-admin/admin-ajax.php';
                }
            } catch (err) {
                ajaxUrl = window.location.origin + '/wp-admin/admin-ajax.php';
            }

            // Hide prior alerts
            if (formAlert) formAlert.classList.add('d-none');
            if (formError) formError.classList.add('d-none');

            // UI loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span>Transmission en cours...</span>';
            }

            const formData = new FormData(contactForm);

            fetch(ajaxUrl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status);
                }
                return response.json();
            })
            .then(function(res) {
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;
                }

                if (res && res.success) {
                    if (formAlert) {
                        if (formAlertDesc && res.data && res.data.message) {
                            formAlertDesc.textContent = res.data.message;
                        }
                        if (res.data && res.data.whatsapp_url && formWaWrap && formWaBtn) {
                            formWaBtn.setAttribute('href', res.data.whatsapp_url);
                            formWaWrap.classList.remove('d-none');
                        }
                        formAlert.classList.remove('d-none');
                        formAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                    contactForm.reset();
                } else {
                    if (formError) {
                        const errText = (res && res.data && res.data.message) ? res.data.message : 'Une erreur est survenue lors de l\'envoi. Veuillez vérifier vos informations.';
                        if (formErrorMsg) formErrorMsg.textContent = errText;
                        formError.classList.remove('d-none');
                        formError.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                }
            })
            .catch(function(err) {
                console.warn('AJAX fetch encountered error, fallback to direct form submission:', err);
                // In case of any AJAX network failure, submit via native POST to ensure the message is delivered
                contactForm.submit();
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initContactForm);
    } else {
        initContactForm();
    }
})();


