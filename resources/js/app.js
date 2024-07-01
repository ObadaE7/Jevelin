import "./bootstrap";

// import Alpine from 'alpinejs';
// window.Alpine = Alpine;
// Alpine.start();

Echo.channel("comments").listen("CommentCreated", (event) => {
    Livewire.dispatch("comment-created");
});

Echo.channel("reactions").listen("ArticleReactionEvent", (event) => {
    Livewire.dispatch("reaction-created");
});
