window.wpAdminBar = window.wpAdminBar || {
    get bar() {
        return document.getElementById('wpadminbar');
    },

    toggleVisibility() {
        this.bar.classList.toggle('hidden');
    },

    togglePosition() {
        this.bar.classList.toggle('bottom');
    },

    show() {
        this.bar.classList.remove('hidden');
    },

    hide() {
        this.bar.classList.add('hidden')
    },
};

(() => {
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#wp-admin-bar-visibility > div')
            .addEventListener('click', window.wpAdminBar.toggleVisibility);

        document.querySelector('#wp-admin-bar-position > div')
            .addEventListener('click', window.wpAdminBar.togglePosition);
        });
})();
