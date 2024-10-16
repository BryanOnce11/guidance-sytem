<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    @vite('resources/css/app.css') <!-- Ensure Vite is managing your CSS -->
    <style>
        /* Custom styles to create the circular left-side design */
        .curved-bg {
            clip-path: ellipse(90% 100% at 10% 50%);
            background-color: #D87A0D;
            /* Matches the orange background */
            height: 100vh;
            /* Ensures full height */
        }
    </style>
</head>

<body class="bg-gray-100">
    @include('sweetalert::alert')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-center">
            <div class="w-full max-w-md">
                <div class="bg-white rounded-lg shadow-md">
                    <div class="bg-gray-100 text-center text-lg font-semibold py-4 rounded-t-lg">
                        {{ __('Verify Your Email Address') }}
                    </div>

                    <div class="p-6">
                        @if (session('resent'))
                            <div class="bg-green-100 text-green-800 p-4 mb-4 rounded-lg border border-green-200"
                                role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                        <p>{{ __('If you did not receive the email') }},
                        <form class="inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="text-blue-600 hover:text-blue-800 font-medium underline focus:outline-none">
                                {{ __('click here to request another') }}
                            </button>.
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
