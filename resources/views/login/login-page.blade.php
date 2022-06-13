<x-layout>
    <section class="px-6 py-8">
        <main class="border max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <form action="/login" method="post" class="mt-6">
                @if (Session::has('isntVerified'))
                <p class="text-red-500 text-xs pb-2">{{Session::get('isntVerified')}}</p>
                @endif
                @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                        value="{{ old('email') }}" required autocomplete="off">
                    @error('email')
                        <p class="text-red-500 text-xs pt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">

                        password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        required autocomplete="off">
                    @error('password')
                        <p class="text-red-500 text-xs pt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    <label for="remember" class="ml-1 uppercase font-bold text-xs text-gray-700">
                        Remember me
                    </label>
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white rounded-2xl py-2 px-6 hover:bg-blue-600">
                        Submit
                    </button>
                </div>
            </form>
            <p>
                Want to create an account? <a class="text-blue-500 hover:text-blue-600" href="/register">Register</a>
            </p>
        </main>
    </section>
</x-layout>
