<x-app-layout>
    <div>
        <a href="{{ url()->previous() }}" class="font-semibold hover:underline flex items-center">
            <svg class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All the ideas</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount"/>

    <livewire:edit-idea :idea="$idea"/>

    <div class="comments-container mt-1 pt-6 relative space-y-6 md:ml-22 my-8">
        <div class="comment-container relative bg-white rounded-xl mt-4 flex">
            <div class="flex flex-1 flex-col md:flex-row py-6 px-4">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full md:mx-4">
{{--                    <h4 class="font-semibold text-xl ">--}}
{{--                        <a href="#" class="hover:underline"> A random text goes here</a>--}}
{{--                    </h4>--}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 Accepted
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49644 [200]: GET /css/app.css
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49645 [200]: GET /js/app.js
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 [200]: GET /images/logo.svg
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 Closing
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49645 Closing
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49644 Closing
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{isOpen: false}" class="flex items-center space-x-2">
                            <button @click="isOpen = !isOpen" class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                                <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul x-show="isOpen" @clik.away="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" x-cloak @keydown.escape.window="isOpen = false" class="w-44 z-10 absolute text-left md:ml-9 top-8 md:top-6 right-0 md:left-0font-semibold bg-white shadow-dialog rounded-xl py-3">
                                    <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Mark as Spam</a></li>
                                    <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="is-admin comment-container border border-transparent hover:border-blue transition duration-150 ease-in relative bg-white rounded-xl mt-4 flex">
            <div class="flex flex-1 py-6 px-4">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                    <div class="uppercase text-xxs font-bold mt-1 text-blue text-center">
                        Admin
                    </div>
                </div>
                <div class="w-full mx-4">
                                        <h4 class="font-semibold text-xl ">
                                            <a href="#" class="hover:underline"> Status changed to under consideration</a>
                                        </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 Accepted
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49644 [200]: GET /css/app.css
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49645 [200]: GET /js/app.js
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 [200]: GET /images/logo.svg
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 Closing
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49645 Closing
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49644 Closing
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                            <div class="font-bold text-blue">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{isOpen: false}" class="flex items-center space-x-2">
                            <button @click="isOpen = !isOpen" class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                                <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul x-show="isOpen" @clik.away="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" x-cloak @keydown.escape.window="isOpen = false" class="w-44 z-20 absolute text-left ml-9 font-semibold bg-white shadow-dialog rounded-xl py-3">
                                    <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Mark as Spam</a></li>
                                    <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="comment-container relative bg-white rounded-xl mt-4 flex">
            <div class="flex flex-1 py-6 px-4">
                <div class="flex-none">
                    <a href="#" >
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 Accepted
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49644 [200]: GET /css/app.css
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49645 [200]: GET /js/app.js
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 [200]: GET /images/logo.svg
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49646 Closing
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49645 Closing
                        [Thu Aug 19 10:08:27 2021] 127.0.0.1:49644 Closing
                    </div>
                    <div class="flex justify-between items-center mt-6">
                        <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div x-data="{isOpen: false}" class="flex items-center space-x-2">
                            <button @click="isOpen = !isOpen" class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                                <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul x-show="isOpen" @clik.away="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" x-cloak @keydown.escape.window="isOpen = false" class="w-44 z-10 absolute text-left ml-9 font-semibold bg-white shadow-dialog rounded-xl py-3">
                                    <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Mark as Spam</a></li>
                                    <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Delete Post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
