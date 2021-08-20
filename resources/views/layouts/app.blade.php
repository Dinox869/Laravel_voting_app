<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>LcVoting</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
       <header class="flex items-center flex-col md:flex-row px-8 py-4 justify-between">
           <a href="#">
               <img src="./images/logo.svg" width="150" height="150" >
           </a>
           <div class="flex items-center mt-2 md:mt-0">
               <div class="px-6 py-4">
                   @auth
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf

                           <a :href="{{route('logout')}}"
                                                  onclick="event.preventDefault();
                                        this.closest('form').submit();">
                               {{ __('Log Out') }}
                           </a>
                       </form>
                   @else
                       <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                       @if (Route::has('register'))
                           <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                       @endif
                   @endauth
               </div>
               <a href="#">
                   <img class="w-10 h-10 rounded-full" src="https://www.gravatar.com/avatar/0000000000000000000000000?d=mp" alt="avatar">
               </a>
           </div>

       </header>
    <main class="mx-auto container flex max-w-custom flex-col md:flex-row" >
        <div class="w-70 mx-auto md:mx-0  md:mr-5">
            <div class="border-2 md:sticky md:top-8 bg-white border-blue rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an idea</h3>
                    <p class="text-xs mt-4">
                        @auth
                            Let us know what you'd like and we'll take a look
                        @else
                            Please Login to create an idea
                        @endauth
                    </p>

                    @auth
                       <livewire:create-idea/>
                    @else
                        <div class="my-6 text-center">
                            <a href="{{route('login')}}" class="inline-block text-white justify-start w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                Login
                            </a>
                            <a href="{{route('register')}}" class=" inline-block mt-4 justify-start items-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                Sign Up
                            </a>
                        </div>
                    @endauth


                </div>
            </div>
        </div>
        <div class="w-full md:w-175 px-2 md:px-0">
            <nav class="text-xs hidden md:flex items-center justify-between">
                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                    <li><a class="border-b-4 pb-3 border-blue">ALL Ideas (86)</a></li>
                    <li><a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering (6)</a></li>
                    <li><a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">InProgress(1)</a></li>
                </ul>
                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                    <li><a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented(0)</a></li>
                    <li><a class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed(7)</a></li>
                </ul>
            </nav>
            <div class="mt-8">
                {{ $slot }}
            </div>
        </div>
    </main>
       <livewire:scripts />
    </body>
</html>
