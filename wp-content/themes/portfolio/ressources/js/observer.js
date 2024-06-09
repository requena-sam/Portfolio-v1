export const observers = {
    showUpElements: document.querySelectorAll('[data-animation="showUp"]'),

    init() {
        this.showUpElements.forEach((element) => {
            element.classList.add('opacity-none');
        });

        this.observersIntersection = new IntersectionObserver(this.showUpAdd.bind(this), {threshold: 0.1});
        this.observeAction();
    },

    showUpAdd(entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('showUp');
                entry.target.classList.remove('opacity-none');
            }
        });
    },

    observeAction() {
        this.showUpElements.forEach((element) => {
            this.observersIntersection.observe(element);
        });
    },
};
