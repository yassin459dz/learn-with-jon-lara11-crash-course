<x-layout>
    <h1 class="title">Register</h1>
    <div class="mx-auto max-w-screen-sm card" >
        <form action="{{ route('register')}}" method="POST" >
            @csrf
            {{-- Name --}}
            <div class="mb-4" >
                <h3 for="username">User Name</h3>
                <input type="text" name="username" value="{{ old ('username')}}" class="input @error('username')  !ring-red-500 @enderror " >
                @error('username')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            {{-- Email --}}
            <div class="mb-4" >
                <h3 for="email">Email</h3>
                <input type="text" name="email" value="{{ old ('email')}}" class="input @error('password') !ring-red-500 @enderror" >
                @error('email')
                <p class="error">{{$message}}</p>
            @enderror
            </div>
            {{-- Password --}}
            <div class="mb-4" >
                <h3 for="password">Password</h3>
                <input type="password" name="password" class="input @error('password') !ring-red-500 @enderror" >
                @error('password')
                <p class="error">{{$message}}</p>
            @enderror
            </div>
            {{-- Confirm Password --}}
            <div class="mb-8" >
                <h3 for="password_confirmation">Confirm Password</h3>
                <input type="password" name="password_confirmation" class="input @error('password') !ring-red-500 @enderror " >
            </div>
            {{-- Confirm Password --}}
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</button>
        </form>
    </div>
</x-layout>



