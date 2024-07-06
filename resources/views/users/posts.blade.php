<x-layout>
    <h1 class="title" >{{$user->username}}'s Posts &#9830; {{$posts->total() }} </h1>
    @foreach ($posts as $post)
    <x-postCard :post=" $post "/>
    @endforeach
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
