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
                        <form action="#" method="POST" class="space-y-4 px-1 py-6">
                            <div>
                                <input placeholder="Your idea" class="w-full bg-gray-100 border-none text-sm rounded-xl placeholder-gray-900 px-4 py-2" type="text">
                            </div>
                            <div>
                                <select name="category_add" class="w-full rounded-xl px-4 py-2 bg-gray-100 text-sm border-none" id="category_add">
                                    <option>Category</option>
                                </select>
                            </div>
                            <div>
                                <textarea cols="30" rows="4" name="idea" id="idea" class="w-full bg-gray-100 rounded-xl border-none  px-4 py-2 text-sm" placeholder="Describe your idea"></textarea>
                            </div>
                            <div class="flex items-center justify-between space-x-3">
                                <button type="button" class="flex justify-start items-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                    <svg class=" w-4 h-4 transform -rotate-45 flex-none text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                    </svg>
                                    <span class="ml-1">Attach</span>
                                </button>

                                <button type="submit" class="flex text-white justify-start items-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                    <span class="ml-1">Submit</span>
                                </button>
                            </div>

                        </form>
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
