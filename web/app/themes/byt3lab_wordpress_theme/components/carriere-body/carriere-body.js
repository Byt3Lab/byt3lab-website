/**
 * BYT3LAB Careers Component - Interactive Filter
 */
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.job-filter-btn');
    const jobItems = document.querySelectorAll('.job-item-col');

    if (!filterButtons.length || !jobItems.length) {
        return;
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedDept = this.getAttribute('data-filter');

            jobItems.forEach(item => {
                const itemDept = item.getAttribute('data-dept');
                if (selectedDept === 'all' || itemDept === selectedDept || itemDept.toLowerCase().includes(selectedDept.toLowerCase())) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.96)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 200);
                }
            });
        });
    });
});
