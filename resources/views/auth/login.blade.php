<x-layout>
    <h1 class="title">Welcome Back</h1>
    <div class="mx-auto max-w-screen-sm card" >
        <form action="{{ route('login')}}" method="POST" >
            @csrf
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
            {{-- Remember Me --}}
            <div class="mb-4">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            @error('failed')
            <p class="error">{{$message}}</p>
        @enderror

            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button>
        </form>
    </div>
</x-layout>



