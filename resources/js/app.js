import "./bootstrap";

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

let notificationCount = 0;
Echo.channel("comments").listen("CommentCreated", (event) => {
    Livewire.dispatch("comment-created");
    const user = event.user;
    const post = event.post;

    function addNotification(user, post) {
        const dropdown = document.getElementById("notificationDropdown");

        const li = document.createElement("li");
        li.classList.add("dropdown-item");

        li.innerHTML = `
            <div class="d-flex flex-column gap-2">
                <div class="d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <span>قام ${user.fname} ${user.lname} بالتعليق على مقالك</span>
                        <span class="material-icons-outlined fs-6">message</span>
                    </div>

                    <a href="/article/${post.slug}">عرض المقال</a>
                </div>

                <div class="d-flex justify-content-end gap-3">
                    <button class="">مقروء</button>
                    <button class="">حذف</button>
                </div>
            </div>
        `;

        dropdown
            .querySelector(".dropdown-divider")
            .insertAdjacentElement("afterend", li);
        notificationCount++;
        const notificationBadge = document.querySelector(".count__notify");
        notificationBadge.textContent = notificationCount;
    }

    addNotification(user, post);
});
