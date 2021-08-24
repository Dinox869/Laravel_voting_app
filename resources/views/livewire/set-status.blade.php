<div x-data="{isOpen : false}" x-init="window.livewire.on('statusWasUpdated',()=>{ isOpen = false })" class="relative">
    <button  @click="isOpen = !isOpen" type="button" class="flex mt-2 md:mt-0 justify-start items-center w-36 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
        <span>Set Status</span>
        <svg  class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div x-cloak x-show.transition.origin.top.right.duration.500ms="isOpen" @click.away="isOpen = false" class="absolute z-20 w-64 md:w-76 text-left font-semibold rounded-xl mt-2 shadow-dialog bg-white">
        <form wire:submit.prevent="setStatus" action="/#" method="POST" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="border-none bg-gray-100 text-green" name="radio-direct" value="4">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="border-none bg-gray-100 text-red" name="radio-direct" value="3">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="border-none bg-gray-100 text-purple" name="radio-direct" value="5">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" name="radio-direct" class="border-none bg-gray-100 text-yellow" value="2">
                        <span class="ml-2">In Progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked="" class="border-none bg-gray-100 text-gray-900" name="radio-direct" value="1">
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

                <button type="submit" class="flex text-white justify-center items-center w-1/2 h-11 text-xs bg-blue font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in disabled:opacity-50 px-6 py-3">
                    Update
                </button>
            </div>
            <div>
                <label class="inline-flex font-normal items-center">
                    <input wire:model="notifyAllVoters" type="checkbox" name="notify_voters" class="rounded bg-gray-200 ">
                    <span class="ml-2">Notify all Voters</span>
                </label>
            </div>
        </form>
    </div>
</div>
