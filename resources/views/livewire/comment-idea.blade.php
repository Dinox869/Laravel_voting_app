<div class="comments-container mt-1 pt-6 relative space-y-6 md:ml-22 my-8">
    @forelse($comments as $comment)
        @if($comment->user_id === $idea->user_id)
            <div class="is-admin comment-container border border-transparent hover:border-blue transition duration-150 ease-in relative bg-white rounded-xl mt-4 flex">
                <div class="flex flex-1 py-6 px-4">
                    <div class="flex-none">
                        <a href="#" >
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v={{$comment->id}}" alt="avatar" class="h-14 w-14 rounded-xl">
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
                            {{$comment->body}}
                        </div>
                        <div class="flex justify-between items-center mt-6">
                            <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                                <div class="font-bold text-blue">{{$comment->user->name}}</div>
                                <div>&bull;</div>
                                <div>{{$comment->created_at->diffForHumans()}}</div>
                            </div>
                            <div x-data="{isOpen: false}" class="flex items-center space-x-2">
                                <button @click="isOpen = !isOpen" class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul x-show="isOpen" @clik.away="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" x-cloak @keydown.escape.window="isOpen = false" class="w-44 z-20 absolute text-left ml-9 font-semibold bg-white shadow-dialog rounded-xl py-3">
                                        <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Mark as Spam</a></li>
                                        @if(auth()->id() === $idea->user_id && auth()->check())
                                        <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Delete Post</a></li>
                                        @endif
                                    </ul>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="comment-container relative bg-white rounded-xl mt-4 flex">
                <div class="flex flex-1 flex-col md:flex-row py-6 px-4">
                    <div class="flex-none">
                        <a href="#" >
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v={{$comment->id}}" alt="avatar" class="h-14 w-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full md:mx-4">
                        {{--                    <h4 class="font-semibold text-xl ">--}}
                        {{--                        <a href="#" class="hover:underline"> A random text goes here</a>--}}
                        {{--                    </h4>--}}
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{$comment->body}}
                        </div>
                        <div class="flex justify-between items-center mt-6">
                            <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                                <div class="font-bold text-gray-900">{{$comment->user->name}}</div>
                                <div>&bull;</div>
                                <div>{{$comment->created_at->diffForHumans()}}</div>
                            </div>
                            <div x-data="{isOpen: false}" class="flex items-center space-x-2">

                                <button @click="isOpen = !isOpen" class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                    </svg>
                                    <ul x-show="isOpen" @clik.away="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" x-cloak @keydown.escape.window="isOpen = false" class="w-44 z-10 absolute text-left md:ml-9 top-8 md:top-6 right-0 md:left-0font-semibold bg-white shadow-dialog rounded-xl py-3">
                                        <li><a href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Mark as Spam</a></li>
                                        @if(auth()->check() && auth()->user()->id === $idea->user_id)
                                            <li><a wire:click="deleteComment" href="#" class="px-5 py-3 transition duration-150 ease-in hover:bg-gray-100 block">Delete Post</a></li>
                                        @endif
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
            @empty
                <p class="text-xxs text-gray-400 font-bold hover:text-black transition ">No comments found ...</p>
    @endforelse
</div>
