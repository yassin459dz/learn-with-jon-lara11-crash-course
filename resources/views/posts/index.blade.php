<x-layout>

    <img src="{{ asset('storage/posts_images/')}}" alt="">
    <h1 class="title" >Latest Posts</h1>
    @foreach ($posts as $post)
    <x-postCard :post=" $post "/>
    @endforeach
    <div>
        {{ $posts->links() }}
    </div>

</x-layout>
