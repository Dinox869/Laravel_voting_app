<x-app-layout>
    <div>
        <a href="#" class="font-semibold hover:underline flex items-center">
            <svg class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">All the ideas</span>
        </a>
    </div>
    <div class="idea-container bg-white rounded-xl mt-4 flex">
        <div class="flex flex-col md:flex-row flex-1 py-6 px-4">
            <div class="flex-none mx-2 md:mx-0">
                <a href="#" >
                    <img src="{{$idea->user->getAvatar()}}" alt="avatar" class="h-14 w-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="font-semibold text-xl ">
                    <a href="#" class="hover:underline">{{$idea->title}}</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    {{$idea->description}}
                </div>
                <div class="flex justify-between md:items-center flex-col  md:flex-row mt-6">
                    <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                        <div class="font-bold hidden md:block text-gray-900">{{$idea->user->name}}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{$idea->created_at->diffForHumans()}}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-400">3 Comments</div>
                    </div>
                    <div x-data="{isOpen: false}" class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="{{$idea->status->classes}} rounded-full text-xxs font-bold uppercase leading-none bg-gray-200 text-center w-28 h-7 px-4 py-2">{{$idea->status->name}}</div>
                        <button @click="isOpen = !isOpen" class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                            <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                            </svg>
                            <ul x-show="isOpen" @clik.away="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" x-cloak @keydown.escape.window="isOpen = false" class="w-44 absolute text-left z-10 md:ml-9 top-8 md:top-6 right-0 md:left-0 font-semibold bg-white shadow-dialog rounded-xl py-3">
                                <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Mark as Spam</a></li>
                                <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Delete Post</a></li>
                            </ul>
                        </button>
                    </div>
                    <div class="mt-4 md:mt-0 md:hidden flex items-center">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none">12</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        <button class="w-20 -mx-5  bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                            Vote
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="button-container flex items-center justify-between mt-6">
       <div class="md:ml-6 flex flex-col md:flex-row items-center space-x-4">
        <div x-data="{ isOpen : false}" class="relative">
            <button @click="isOpen = !isOpen" type="button" class="flex text-white justify-start items-center w-32 h-11 text-sm bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                <span class="ml-1">Reply</span>
            </button>
            <div  x-show.transition.origin.top.right.duration.500ms="isOpen" @click.away="isOpen = false" @keydown.escape.window="isOpen = false" class=" absolute z-10 md:w-104 w-64 text-left font-semibold rounded-xl mt-2 shadow-dialog bg-white">
                <form action="/#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <textarea placeholder="Go ahead don't be shy. Share your thoughts..." name="post_comment" id="post_comment" cols="30" rows="4" class="py-2 border-none text-sm w-full rounded-xl placeholder-gray-900 bg-gray-100"></textarea>
                    </div>
                    <div class="flex md:space-x-3 flex-col md:flex-row items-center">
                        <button type="button" class="flex text-white justify-start items-center w-full md:w-1/2 h-11 text-sm bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                        Post Comment
                        </button>

                        <button type="button" class="flex justify-start items-center w-full md:w-32 mt-2 md:mt-0 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                            <svg class=" w-4 h-4 transform -rotate-45 flex-none text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-1">Attach</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
           <div x-data="{isOpen : false}" class="relative">
               <button  @click="isOpen = !isOpen" type="button" class="flex mt-2 md:mt-0 justify-start items-center w-36 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                   <span>Set Status</span>
                   <svg  class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                   </svg>
               </button>
               <div x-cloak x-show.transition.origin.top.right.duration.500ms="isOpen" @click.away="isOpen = false" class="absolute z-20 w-64 md:w-76 text-left font-semibold rounded-xl mt-2 shadow-dialog bg-white">
                   <form action="/#" method="POST" class="space-y-4 px-4 py-6">
                       <div class="space-y-2">
                           <div>
                               <label class="inline-flex items-center">
                                   <input type="radio" checked="" class="border-none bg-gray-100 text-green" name="radio-direct" value="1">
                                   <span class="ml-2">Implemented</span>
                               </label>
                           </div>
                           <div>
                               <label class="inline-flex items-center">
                                   <input type="radio" checked="" class="border-none bg-gray-100 text-red" name="radio-direct" value="1">
                                   <span class="ml-2">Closed</span>
                               </label>
                           </div>
                           <div>
                               <label class="inline-flex items-center">
                                   <input type="radio" checked="" class="border-none bg-gray-100 text-purple" name="radio-direct" value="1">
                                   <span class="ml-2">Considering</span>
                               </label>
                           </div>
                           <div>
                               <label class="inline-flex items-center">
                                   <input type="radio" checked="" name="radio-direct" class="border-none bg-gray-100 text-yellow" value="1">
                                   <span class="ml-2">In Progress</span>
                               </label>
                           </div>
                           <div>
                               <label class="inline-flex items-center">
                                   <input type="radio" checked="" class="border-none bg-gray-100 text-gray-900" name="radio-direct" value="1">
                                   <span class="ml-2">Open</span>
                               </label>
                           </div>
                       </div>
                       <div>
                           <textarea name="update_comments" id="update_comments" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
                       </div>
                       <div class="flex items-center justify-between space-x-3">
                           <button type="button" class="flex justify-start items-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                               <svg class=" w-4 h-4 transform -rotate-45 flex-none text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                               </svg>
                               <span class="ml-1">Attach</span>
                           </button>

                           <button type="submit" class="flex text-white justify-start items-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                               <span class="ml-1">Update</span>
                           </button>
                       </div>
                       <div>
                           <label class="inline-flex font-normal items-center">
                               <input type="checkbox" name="notify_voters" class="rounded bg-gray-200 " checked="">
                               <span class="ml-2">Notify all Voters</span>
                           </label>
                       </div>
                   </form>
               </div>
           </div>
       </div>

        <div class="hidden md:flex items-center space-x-3">
            <div class="font-semibold bg-white text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="leading-none text-xs text-gray-400">Vote</div>
            </div>

            <button type="button" class=" justify-start items-center w-32 uppercase h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                <span >VOTE</span>
            </button>
        </div>
    </div>
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
