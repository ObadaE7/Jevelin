function initSwiper() {
    const swiperEl = document.querySelector("swiper-container");
    Object.assign(swiperEl, {
        slidesPerView: 4,
        spaceBetween: 30,
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 5,
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 25,
            },
        },
        injectStyles: [
            `
            .swiper-button-next,
            .swiper-button-prev {
              width: 26px;
              height: 26px;
              padding: 10px;
              border-radius: 50%;
              color: var(--bs-white);
              background:-webkit-backdrop-filter: blur(5px);
              backdrop-filter: blur(5px);
              background: rgba(0, 0, 0, 0.4) !important;
            }
        `,
        ],
    });
    swiperEl.initialize();
}

function togglePassword() {
    document.addEventListener("DOMContentLoaded", () => {
        const icons = document.querySelectorAll(".input-password-icon");
        icons.forEach((icon) => {
            icon.addEventListener("click", () => {
                const passwordInput = icon
                    .closest(".input-password")
                    .querySelector(
                        'input[type="password"], input[type="text"]'
                    );

                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    icon.textContent = "visibility_off";
                } else {
                    passwordInput.type = "password";
                    icon.textContent = "visibility";
                }
            });
        });
    });
}

function toggleSidebar() {
    const dashboardMain = document.querySelector(".dashboard__main");
    const isCollapsed = dashboardMain.classList.toggle("collapsed");
    localStorage.setItem("sidebarCollapsed", isCollapsed);
}

document.addEventListener("DOMContentLoaded", function () {
    const isCollapsed = localStorage.getItem("sidebarCollapsed") === "true";
    const dashboardMain = document.querySelector(".dashboard__main");
    if (isCollapsed) {
        dashboardMain.classList.add("collapsed");
    }
});

function toolTip() {
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
}
