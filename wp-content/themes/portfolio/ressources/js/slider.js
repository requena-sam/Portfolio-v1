export const slider = {
    init() {
        this.container = document.querySelector('.reviews__slider__container');
        this.bullets = document.querySelectorAll('.bullet');
        this.reviews = document.querySelectorAll('.reviews__slider__container__article');
        this.bullets[0].classList.add('active');
        this.addEventListeners();
        this.addScrollListener();
    },
    addEventListeners() {
        this.bullets.forEach(bullet => {
            bullet.addEventListener('click', () => {
                this.handleBulletClick(bullet);
            });
        });
    },
    addScrollListener() {
    this.container.addEventListener('scroll', () => {
        const scrollPosition = this.container.scrollLeft;
        const firstReviewWidth = this.reviews[0].offsetWidth;
        if (scrollPosition > firstReviewWidth && this.bullets[1]) {
            this.updateActiveBullet(1);
        } else if (scrollPosition < firstReviewWidth) {
            this.updateActiveBullet(0);
        }
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