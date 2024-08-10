<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf

        <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    id="background-div"
                    class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

                    <div class="max-w-md mx-auto">
                        <div>
                            <h1 class="text-2xl font-semibold">Login</h1>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-green-600 sm:text-lg sm:leading-7 ">

                                <div class="relative my-5">
                                    <input autocomplete="off" id="email" name="email" type="text"
                                        class="peer placeholder-transparent h-10 w-full border-0 border-b-2 border-green-300 text-green-600 focus:border-green-500 focus:ring-0 focus:outline-none"
                                        placeholder="Email address" required autofocus />
                                    <label for="email" 
                                        class="absolute left-0 -top-3.5 text-green-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-green-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-green-600 peer-focus:text-sm">Email
                                        Address</label>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="relative my-5">
                                    <input autocomplete="off" id="password" name="password" type="password"
                                        class="peer placeholder-transparent h-10 w-full border-0 border-b-2 border-green-300 text-green-600 focus:border-green-500 focus:ring-0 focus:outline-none"
                                        placeholder="Password" required />
                                    <label for="password" 
                                        class="absolute left-0 -top-3.5 text-green-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-green-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-green-600 peer-focus:text-sm">Password</label>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-green-300 text-green-600 shadow-sm focus:ring-0"
                                            name="remember">
                                        <span
                                            class="ms-2 text-sm text-green-600 dark:text-green-400">Remember me</span>
                                    </label>
                                </div>

                                <div class="flex items-center justify-end gap-5">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-green-400  hover:text-green-500  rounded-md focus:outline-none  "
                                            href="{{ route('password.request') }}">
                                            Forgot your password?
                                        </a>
                                    @endif

                                    <div class="relative">
                                        <button type="submit"
                                            class="bg-green-500 text-white rounded-md px-4 py-1 text-sm hover:bg-green-600">Log in</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full flex justify-center">
                    </div>

                </div>
            </div>
        </div>
    </form>

    @push('css')
        <style>
            @keyframes bg-load {
                0% {
                    opacity: 0;
                    transform: scale(0.5);
                }
                25% {
                    opacity: 1;
                    transform: scale(0.6);
                }
                45% {
                    opacity: 1;
                    transform: scale(0.7);
                }
                65% {
                    opacity: 1;
                    transform: scale(0.8);
                }
                80% {
                    opacity: 1;
                    transform: scale(0.9);
                }
                100% {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            @keyframes bg-rotate {
                0% {
                    transform: rotate(0deg);
                }
                15% 
                {
                    transform: rotate(1deg);
                }
                35% 
                {
                    transform: rotate(2deg);
                }
                35% 
                {
                    transform: rotate(3deg);
                }    
                55% 
                {
                    transform: rotate(4deg);
                }
                65% {
                    transform: rotate(5deg);
                }
                85% {
                    transform: rotate(6deg);
                }
                100% {
                    transform: rotate(7deg);
                }
            }

            .animate-bg-load {
                animation: bg-load 0.9s ease-out forwards;
            }

            .animate-bg-rotate {
                animation: bg-rotate 0.9s ease-out forwards;
            }
        </style>
    @endpush

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('background-div').classList.add('animate-bg-load');
                document.getElementById('background-div').classList.add('animate-bg-rotate');
            });

            document.getElementById('login-form').addEventListener('submit', function(event) {
                event.preventDefault(); 
                document.getElementById('background-div').classList.add('animate-bg-rotate');
                document.getElementById('background-div').classList.add('animate-bg-load');
                
                
                setTimeout(() => {
                    event.target.submit();
                }, 200); 
            });
        </script>
    @endpush
</x-guest-layout>
