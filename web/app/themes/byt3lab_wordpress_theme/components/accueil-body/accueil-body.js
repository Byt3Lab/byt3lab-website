document.addEventListener('DOMContentLoaded', function () {
    // Interactive tab toggling for cockpit showcase if needed
    var cockpitTabs = document.querySelectorAll('[data-cockpit-tab]');
    cockpitTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            cockpitTabs.forEach(function (t) { t.classList.remove('active'); });
            this.classList.add('active');
            var target = this.getAttribute('data-cockpit-tab');
            document.querySelectorAll('.cockpit-panel').forEach(function (panel) {
                panel.style.display = (panel.id === target) ? 'block' : 'none';
            });
        });
    });
});


