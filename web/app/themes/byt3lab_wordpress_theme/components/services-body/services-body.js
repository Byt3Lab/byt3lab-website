/**
 * BYT3LAB Services Component - Interactive Department / Branch Filter
 */
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.service-filter-btn');
    const serviceItems = document.querySelectorAll('.service-item-col');

    if (!filterButtons.length || !serviceItems.length) {
        return;
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedFilter = (this.getAttribute('data-filter') || 'all').toLowerCase().trim();

            serviceItems.forEach(item => {
                const itemBranch = (item.getAttribute('data-branch') || '').toLowerCase().trim();
                
                const isMatch = selectedFilter === 'all' || 
                                itemBranch === selectedFilter || 
                                itemBranch.includes(selectedFilter) || 
                                selectedFilter.includes(itemBranch);

                if (isMatch) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 30);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.96)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 220);
                }
            });
        });
    });
});
