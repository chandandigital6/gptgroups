// const menuBtn = document.querySelector("#menuBtn");
// const mobileMenu = document.querySelector("#mobileMenu");
// if (menuBtn) {
//     menuBtn.addEventListener("click", () =>
//         mobileMenu.classList.toggle("open"),
//     );
// }
// document
//     .querySelectorAll("[data-year]")
//     .forEach((e) => (e.textContent = new Date().getFullYear()));




//     document.addEventListener("DOMContentLoaded", function () {
//     const menuBtn = document.getElementById("menuBtn");
//     const mobileMenu = document.getElementById("mobileMenu");

//     if (menuBtn && mobileMenu) {
//         menuBtn.addEventListener("click", function () {
//             mobileMenu.classList.toggle("active");
//         });
//     }
// });




(function () {
    function initializeMobileMenu() {
        const menuBtn = document.getElementById('menuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');

        if (!menuBtn || !mobileMenu) {
            console.error('Mobile menu elements not found.', {
                menuBtn: menuBtn,
                mobileMenu: mobileMenu
            });

            return;
        }

        menuBtn.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            const menuIsHidden = mobileMenu.classList.contains('hidden');

            if (menuIsHidden) {
                mobileMenu.classList.remove('hidden');
                menuBtn.setAttribute('aria-expanded', 'true');

                if (menuIcon) {
                    menuIcon.textContent = '✕';
                }
            } else {
                mobileMenu.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');

                if (menuIcon) {
                    menuIcon.textContent = '☰';
                }
            }
        });

        document
            .querySelectorAll('.mobileDropdownBtn')
            .forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    const wrapper = button.closest('div');
                    const dropdown = wrapper
                        ? wrapper.querySelector('.mobileDropdownMenu')
                        : null;

                    const icon = button.querySelector(
                        '.mobileDropdownIcon'
                    );

                    if (!dropdown) {
                        return;
                    }

                    const dropdownIsHidden =
                        dropdown.classList.contains('hidden');

                    dropdown.classList.toggle('hidden');

                    if (icon) {
                        icon.textContent = dropdownIsHidden ? '−' : '+';
                    }
                });
            });

        /*
         * Menu ke bahar click karne par menu close hoga.
         */
        document.addEventListener('click', function (event) {
            if (
                !mobileMenu.classList.contains('hidden') &&
                !mobileMenu.contains(event.target) &&
                !menuBtn.contains(event.target)
            ) {
                mobileMenu.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');

                if (menuIcon) {
                    menuIcon.textContent = '☰';
                }
            }
        });

        /*
         * Mobile menu ke normal link par click karne par menu close.
         */
        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');

                if (menuIcon) {
                    menuIcon.textContent = '☰';
                }
            });
        });

        /*
         * Desktop size par pahunchne par mobile menu reset.
         */
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1280) {
                mobileMenu.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');

                if (menuIcon) {
                    menuIcon.textContent = '☰';
                }
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener(
            'DOMContentLoaded',
            initializeMobileMenu
        );
    } else {
        initializeMobileMenu();
    }
})();