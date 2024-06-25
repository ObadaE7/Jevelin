<div>
    @forelse ($articles as $article)
        {{ $article->title }} <br>
    @empty
        لا يوجد اي مقال بعد
    @endforelse

    {{ $articles->links() }}
</div>
