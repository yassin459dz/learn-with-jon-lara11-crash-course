<x-layout>
                        {{-- Show The User Name --}}
    {{-- <h1 class="title">Welcome {{ auth()->user()->username }}</h1> --}}


    <h1 class="title">Create a new post</h1>
        {{-- Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-700" />
        @endif

{{-- Create Post Form --}}
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    {{-- Post Title --}}
    <div class="mb-4">
        <label for="title">Post Title</label>
        <input type="text" name="title" value="{{ old('title') }}"
            class="input @error('title') ring-red-500 @enderror">

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Post Body --}}
    <div class="mb-4">
        <label for="body">Post Content</label>

        <textarea name="body" rows="4" class="input @error('body') ring-red-500 @enderror">{{ old('body') }}</textarea>

        @error('body')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Post Image --}}
    <div>
        <label for="image">Post Image</label>
        <input type="file" name="image" id="image">

        @error('image')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>
    {{-- Submit Button --}}
    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mt-3 mb-2">Create</button>
</form>
        {{-- User Posts --}}
    <h1 class="title">Your Lastest Posts</h1>

    @foreach ($posts as $post)
        <x-postCard :post=" $post">
             {{-- Update Posts --}}

             <a href="{{ route('posts.edit', $post) }}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2">Update</a>
             {{-- Delete Posts --}}
        <form action="{{ route('posts.destroy' , $post)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2" >Delete</button>
        </form>
        </x-postCard>
    @endforeach

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
