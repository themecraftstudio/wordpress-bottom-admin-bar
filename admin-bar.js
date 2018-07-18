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

    document.addEventListener('keydown', (/* KeyboardEvent */ e) => {
        if (e.key !== 'b' && e.key !== 'B')
            return;

        if ((e.ctrlKey || e.metaKey) && e.shiftKey) {
            // ctrl/meta + alt + b: toggle position
            window.wpAdminBar.togglePosition();
        } else if (e.ctrlKey || e.metaKey) {
            // ctrl/meta + b: toggle visibility
            window.wpAdminBar.toggleVisibility();
        }
    })
})();
