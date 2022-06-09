<x-layout>
    <section class="px-7 py-8 max-w-md mx-auto">
        <h1 class="font-semibold uppercase text-sm">
            Edit your profile {{ $user->name }}!
        </h1>
        <div class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modal">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
                    <div
                        class="relative bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Deactivate
                                        account</h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your
                                            account? All of your data will be permanently removed. This action cannot be
                                            undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <form action="/profile/delete/{{ $user->username }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Deactivate</button>
                            </form>
                            <button id="close" type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-7">
            <form action="/profile/update/{{ $user->username }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="name" value="{{ $user->name }}" />
                <x-form.input name="username" value="{{ $user->username }}" />
                <x-form.input type="email" name="email" value="{{ $user->email }}" />
                <div class="flex">
                    <x-form.input type="file" name="picture" />
                    @if ($user->picture)
                        <img src="{{ asset('storage/' . $user->picture) }}" alt="Profile picture" width="70"
                            height="70" class="ml-2">
                    @endif
                </div>
                <a href="/user/passwordreset" class="text-xs uppercase text-blue-500">
                    Forgot your password?
                </a>
                <div class="flex justify-between mt-4">
                    <x-form.button>Save</x-form.button>
            </form>
            <button id="open" class="flex bg-red-500 py-2 rounded-full px-6 text-white hover:bg-red-600" type="button">
                Delete
            </button>
        </div>
        </div>
    </section>
</x-layout>

<script type="text/javascript" src="{{ asset('js/popup.js') }}"></script>
