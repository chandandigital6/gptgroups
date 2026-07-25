
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuOpenIcon = document.getElementById('menuOpenIcon');
        const menuCloseIcon = document.getElementById('menuCloseIcon');
        const siteHeader = document.getElementById('siteHeader');

        /**
         * Open or close the main mobile menu.
         */
        function setMobileMenu(open) {
            if (!menuBtn || !mobileMenu) {
                return;
            }

            mobileMenu.classList.toggle('hidden', !open);
            menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
            menuBtn.setAttribute(
                'aria-label',
                open ? 'Close navigation menu' : 'Open navigation menu'
            );

            if (menuOpenIcon) {
                menuOpenIcon.classList.toggle('hidden', open);
            }

            if (menuCloseIcon) {
                menuCloseIcon.classList.toggle('hidden', !open);
            }

            document.body.classList.toggle('overflow-hidden', open);
        }

        /**
         * Toggle main mobile menu.
         */
        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', function () {
                const currentlyOpen =
                    menuBtn.getAttribute('aria-expanded') === 'true';

                setMobileMenu(!currentlyOpen);
            });
        }

        /**
         * Mobile accordion dropdowns.
         * Only one dropdown stays open at a time.
         */
        document
            .querySelectorAll('.mobileDropdownBtn')
            .forEach(function (button) {
                button.addEventListener('click', function () {
                    const wrapper = button.closest(
                        '.mobileDropdownWrapper'
                    );

                    if (!wrapper) {
                        return;
                    }

                    const dropdown = wrapper.querySelector(
                        '.mobileDropdownMenu'
                    );

                    const icon = button.querySelector(
                        '.mobileDropdownIcon'
                    );

                    if (!dropdown) {
                        return;
                    }

                    const isOpen =
                        button.getAttribute('aria-expanded') === 'true';

                    /*
                     * Close other dropdowns first.
                     */
                    document
                        .querySelectorAll('.mobileDropdownWrapper')
                        .forEach(function (otherWrapper) {
                            if (otherWrapper === wrapper) {
                                return;
                            }

                            const otherButton = otherWrapper.querySelector(
                                '.mobileDropdownBtn'
                            );

                            const otherDropdown = otherWrapper.querySelector(
                                '.mobileDropdownMenu'
                            );

                            const otherIcon = otherWrapper.querySelector(
                                '.mobileDropdownIcon'
                            );

                            if (otherButton) {
                                otherButton.setAttribute(
                                    'aria-expanded',
                                    'false'
                                );
                            }

                            if (otherDropdown) {
                                otherDropdown.classList.add('hidden');
                            }

                            if (otherIcon) {
                                otherIcon.classList.remove('rotate-180');
                            }
                        });

                    /*
                     * Toggle selected dropdown.
                     */
                    button.setAttribute(
                        'aria-expanded',
                        isOpen ? 'false' : 'true'
                    );

                    dropdown.classList.toggle('hidden', isOpen);

                    if (icon) {
                        icon.classList.toggle('rotate-180', !isOpen);
                    }
                });
            });

        /**
         * Close mobile menu when a menu link is clicked.
         */
        if (mobileMenu) {
            mobileMenu
                .querySelectorAll('a')
                .forEach(function (link) {
                    link.addEventListener('click', function () {
                        setMobileMenu(false);
                    });
                });
        }

        /**
         * Close mobile menu when clicking outside the header.
         */
        document.addEventListener('click', function (event) {
            if (!siteHeader || !menuBtn) {
                return;
            }

            const menuIsOpen =
                menuBtn.getAttribute('aria-expanded') === 'true';

            if (
                menuIsOpen &&
                !siteHeader.contains(event.target)
            ) {
                setMobileMenu(false);
            }
        });

        /**
         * Close using Escape key.
         */
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                setMobileMenu(false);
            }
        });

        /**
         * Reset mobile menu after switching to desktop size.
         */
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1280) {
                setMobileMenu(false);
            }
        });
    });
