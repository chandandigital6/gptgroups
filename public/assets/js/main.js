const menuBtn = document.querySelector("#menuBtn");
const mobileMenu = document.querySelector("#mobileMenu");
if (menuBtn) {
    menuBtn.addEventListener("click", () =>
        mobileMenu.classList.toggle("open"),
    );
}
document
    .querySelectorAll("[data-year]")
    .forEach((e) => (e.textContent = new Date().getFullYear()));




    document.addEventListener("DOMContentLoaded", function () {
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener("click", function () {
            mobileMenu.classList.toggle("active");
        });
    }
});