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





document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', function () {
            const isOpen = !mobileMenu.classList.contains('hidden');

            mobileMenu.classList.toggle('hidden');

            menuBtn.setAttribute('aria-expanded', isOpen ? 'false' : 'true');

            if (menuIcon) {
                menuIcon.textContent = isOpen ? '☰' : '✕';
            }
        });
    }

    document.querySelectorAll('.mobileDropdownBtn').forEach(function (button) {
        button.addEventListener('click', function () {
            const wrapper = button.parentElement;
            const dropdown = wrapper.querySelector('.mobileDropdownMenu');
            const icon = button.querySelector('.mobileDropdownIcon');

            if (!dropdown) {
                return;
            }

            const isOpen = !dropdown.classList.contains('hidden');

            dropdown.classList.toggle('hidden');

            if (icon) {
                icon.textContent = isOpen ? '+' : '−';
            }
        });
    });
});