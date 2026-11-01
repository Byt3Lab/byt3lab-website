/**
 * BYT3LAB Solutions Component - Interactive Solutions Category Filter
 */
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.solution-filter-btn');
    const solutionItems = document.querySelectorAll('.solution-item-col');

    if (!filterButtons.length || !solutionItems.length) {
        return;
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedFilter = (this.getAttribute('data-filter') || 'all').toLowerCase().trim();

            solutionItems.forEach(item => {
                const itemCat = (item.getAttribute('data-category') || '').toLowerCase().trim();
                
                const isMatch = selectedFilter === 'all' || 
                                itemCat === selectedFilter || 
                                itemCat.includes(selectedFilter) || 
                                selectedFilter.includes(itemCat);

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
