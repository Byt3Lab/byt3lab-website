/**
 * BYT3LAB Equipe Component - Interactive Department Filter
 */
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.team-filter-btn');
    const teamItems = document.querySelectorAll('.team-item-col');

    if (!filterButtons.length || !teamItems.length) {
        return;
    }

    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            filterButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const selectedFilter = (this.getAttribute('data-filter') || 'all').toLowerCase().trim();

            teamItems.forEach(item => {
                const itemDept = (item.getAttribute('data-dept') || '').toLowerCase().trim();
                
                const isMatch = selectedFilter === 'all' || 
                                itemDept === selectedFilter || 
                                itemDept.includes(selectedFilter) || 
                                selectedFilter.includes(itemDept);

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
