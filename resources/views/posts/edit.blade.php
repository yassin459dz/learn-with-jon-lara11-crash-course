<x-layout>

    <a href="{{ route('dashboard')}}" class="block mb-2 text-sm text-blue-500">&larr; Back To The Dashboard</a>
    <div class=" bg-white p-5">
        <h1 class="title">Update Your Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        {{-- The Current Image --}}
        @if ($post->image)
        <div class=" h-52 p-center w-2/4 ml-60 mb-60 bg-white  shadow-md">

            <img src="{{ asset('storage/' . $post->image)}}" alt="">
        </div>
        @endif

    {{-- Post Title --}}
    <div class="mb-4">
        <label for="title">Post Title</label>
        <input type="text" name="title" value="{{ $post->title }}"
            class="input @error('title') ring-red-500 @enderror">

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Post Body --}}
    <div class="mb-4">
        <label for="body">Post Content</label>

        <textarea name="body" rows="4" class="input @error('body') ring-red-500 @enderror">{{  $post->body  }}</textarea>

        @error('body')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Post Image --}}
    <div >
        <label for="image">Post Image</label>
        <input type="file" name="image" id="image">

        @error('image')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>

    {{-- Submit Button --}}
    <div class="flex justify-center">
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Update</button>
    </div></form>
</div>
</x-layout>
