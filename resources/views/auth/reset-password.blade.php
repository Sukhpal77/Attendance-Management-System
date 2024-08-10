<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" id="reset-password-form">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
            <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                <div
                    id="background-div"
                    class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
                </div>
                <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

                    <div class="max-w-md mx-auto">
                        <header>
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('Reset Password') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Please enter your email address and new password to reset your password.') }}
                            </p>
                        </header>

                        <div class="mt-6 space-y-6">
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Reset Password') }}
                                </x-primary-button>
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
                15% {
                    transform: rotate(1deg);
                }
                35% {
                    transform: rotate(2deg);
                }
                35% {
                    transform: rotate(3deg);
                }    
                55% {
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

            document.getElementById('reset-password-form').addEventListener('submit', function(event) {
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
