export const color = {
    init() {
        document.querySelectorAll('.color__container__item').forEach(item => {
            const clipboard = new ClipboardJS(item, {target: () => item.querySelector('p')});
            clipboard.on('success', this.handleCopySuccess.bind(this, item));
            item.addEventListener('click', this.handleItemClick.bind(this, item));
        });
    },
    handleCopySuccess(item, event) {
        const parentItem = event.trigger.closest('.color__container__item');
        parentItem.classList.add('copied');
        setTimeout(() => parentItem.classList.remove('copied'), 700);
    },

    handleItemClick(item) {
        const parentItem = item.closest('.color__container__item');
        parentItem.classList.add('copied');
        setTimeout(() => parentItem.classList.remove('copied'), 700);
    }
};
