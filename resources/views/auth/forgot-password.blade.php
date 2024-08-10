<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" id="password-reset-form">
        @csrf
        <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    id="background-div"
                    class="absolute inset-0 bg-gradient-to-r from-green-600 to-green-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">
                    <div class="max-w-md mx-auto">
                        <div class="mb-10 p-6 bg-white shadow-md rounded-lg">
                            <h1 class="text-2xl font-semibold text-green-600 mb-4">Forgot your password?</h1>
                            <p class="text-base text-green-700">
                                No problem. Just let us know your email address, and we will email you a password reset
                                link that will allow you to choose a new one.
                            </p>
                        </div>

                        <div class="divide-y divide-gray-200">
                            <div class="relative my-5">
                                <input autocomplete="off" id="email" name="email" type="text"
                                    class="peer placeholder-transparent h-10 w-full border-0 border-b-2 border-green-300 text-green-600 focus:border-green-500 focus:ring-0 focus:outline-none"
                                    placeholder="Email address" required autofocus />
                                <label for="email"
                                    class="absolute left-0 -top-3.5 text-green-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-green-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-green-600 peer-focus:text-sm">Email
                                    Address</label>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="relative">
                                <button type="submit"
                                    class="bg-green-500 text-white rounded-md px-4 py-2 text-sm hover:bg-green-600">Email Password Reset Link</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-full flex justify-center">
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
