/**
 * BYT3LAB Realisations Component - Interactive Category Filter
 */
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.project-filter-btn');
    const projectItems = document.querySelectorAll('.project-item-col');

    if (!filterButtons.length || !projectItems.length) {
        return;
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedFilter = (this.getAttribute('data-filter') || 'all').toLowerCase().trim();

            projectItems.forEach(item => {
                const itemCategory = (item.getAttribute('data-category') || '').toLowerCase().trim();
                
                const isMatch = selectedFilter === 'all' || 
                                itemCategory === selectedFilter || 
                                itemCategory.includes(selectedFilter) || 
                                selectedFilter.includes(itemCategory);

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
