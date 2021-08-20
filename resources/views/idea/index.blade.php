<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" class="w-full rounded-xl px-4 py-2 border-none" id="category">
                <option>Category</option>
            </select>
        </div>

        <div class="w-full md:w-1/3">
            <select name="category" class="w-full rounded-xl px-4 py-2 border-none" id="category">
                <option>Filter</option>
            </select>
        </div>

        <div class="w-full md:w-2/3 relative">
            <input type="search" placeholder="Find an idea" class="placeholder-gray-900 rounded-xl border-none bg-white px-4 pl-8 py-2">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="text-gray-900 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

    </div>

    <div class="ideas-container my-6 space-y-6">
        @foreach($ideas as $idea)
        <div
            x-data
                {{-- This works but its blade      --}}
{{--            @click=" location.href='{{ route('idea.show',$idea) }}'"--}}
                {{-- Works but ignores other link tags--}}
{{--            @click="$event.target.closest('.idea-container').querySelector('.idea-link').click()"--}}

                    @click="

                    const clicked = $event.target

                    const target = clicked.tagName.toLowerCase()

                    const ignore = [ 'button', 'svg', 'path', 'a']

                    if(!ignore.includes(target)){

                    clicked.closest('.idea-container').querySelector('.idea-link').click()

                    }"

            class="idea-container hover:shadow-card cursor-pointer transition duration-150 ease-in bg-white rounded-xl flex">
            <div class=" hidden md:block  py-8 px-5 border-r border-gray-100">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-5 00">Votes</div>
                </div>
                <div class="mt-8">
                    <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex flex-1 flex-col md:flex-row py-6 px-2">
                <div class="flex-none mx-2 md:mx-4">
                    <a href="#" >
                        <img src="{{$idea->user->getAvatar()}}" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
                    <h4 class="font-semibold text-xl mt-2 md:mt-0">
                        <a href="{{route('idea.show',$idea)}}" class="idea-link hover:underline">{{$idea->title}}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                       {{$idea->description}}
                    </div>
                    <div class="flex justify-between flex-col md:flex-row md:items-center mt-6">
                        <div class="flex items-center font-semibold text-gray-400 space-x-2 text-xs">
                            <div>{{$idea->created_at->diffForHumans()}}</div>
                            <div>&bull;</div>
                            <div>{{ $idea->category->name }}</div>
                            <div>&bull;</div>
                            <div class="text-gray-400">3 Comments</div>
                        </div>
                        <div x-data="{ isOpen: false }"
                             class="flex items-center mt-2 md:mt-0 space-x-2">
                            <div class="{{$idea->status->classes}} rounded-full text-xxs font-bold uppercase leading-none bg-gray-200 text-center w-28 h-7 px-4 py-2">{{$idea->status->name}}</div>
                            <button @click="isOpen = !isOpen"
                                    class="bg-gray-100 relative px-3 border hover:bg-gray-200 rounded-full transition duration-150 ease-in">
                                <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul x-cloak @keydown.escape.window="isOpen = false" x-show.transition.origin.top.left.duration.500ms="isOpen" @click.away="isOpen = false" class="w-44 absolute text-left md:ml-9 top-8 md:top-6 right-0 md:left-0 font-semibold bg-white shadow-dialog rounded-xl py-3">
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
        @endforeach
    </div>
    <div class="my-8 ">
        {{$ideas->links()}}
    </div>
</x-app-layout>
