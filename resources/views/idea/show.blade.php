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

    <livewire:delete-modal :idea="$idea"/>

    <livewire:comment-idea :idea="$idea"/>

</x-app-layout>
