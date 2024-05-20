export const slider = {
    init() {
        this.container = document.querySelector('.reviews__slider__container');
        this.bullets = document.querySelectorAll('.bullet');
        this.bullets[0].classList.add('active');
        this.addEventListeners();
    },
    addEventListeners() {
        this.bullets.forEach(bullet => {
            bullet.addEventListener('click', () => {
                this.handleBulletClick(bullet);
            });
        });
    },
    handleBulletClick(bullet) {
        const index = bullet.getAttribute('data-index');
        const newScrollPosition = this.container.scrollWidth * index / this.bullets.length;
        this.container.scrollLeft = newScrollPosition;
        this.updateActiveBullet(index);
    },
    updateActiveBullet(index) {
        this.bullets.forEach((bullet, i) => {
            if (i == index) {
                bullet.classList.add('active');
            } else {
                bullet.classList.remove('active');
            }
        });
    }
}