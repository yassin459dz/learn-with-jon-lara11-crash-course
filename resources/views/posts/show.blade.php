<x-layout>
<div class="card p-4 m-6 bg-white rounded shadow-md">
    <h2 class="font-bold text-3xl mb-2">{{ $post->title }}</h2>
    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans()}} By</span>
        <a href="{{ route('posts.user' , $post->user)}}" class="text-blue-500 font-medium" >{{$post->user->username}}</a>
    </div>
    <div>
        @if ($post->image)
        <img src="{{ asset('storage/' . $post->image)}}" alt="">
        @else
        <img src="{{ asset('storage/posts_images/866-200x300.jpg')}}" alt="">
        @endif
    </div>
    <div class="text-sx pt-3" >
        <p> {{ ( $post->body)}} </p>
    </div>
</div>
</x-layout>
