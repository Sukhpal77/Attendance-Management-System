<x-guest-layout>
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                id="background-div"
                class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20">

                <div class="max-w-md mx-auto">
                    <header>
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('Email Verification') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </p>
                    </header>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-6 space-y-6">
                        <!-- Resend Verification Email -->
                        <div>
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <x-primary-button>
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </form>
                        </div>

                        <!-- Log Out -->
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-full flex justify-center">
                </div>

            </div>
        </div>
    </div>

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
        </script>
    @endpush
</x-guest-layout>
