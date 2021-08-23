<div>
    <nav class="text-xs hidden md:flex items-center text--gray-400 justify-between">
        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
            <li><a wire:click.prevent="setStatus('All')" class="@if($status ==='All') text-gray-900 border-blue @endif text-gray-400 hover:border-blue  border-b-4 pb-3">ALL Ideas ({{$statusCount['all_statuses']}})</a></li>
            <li><a wire:click.prevent="setStatus('Considering')" class="@if($status ==='Considering') text-gray-900 border-blue @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Considering ({{$statusCount['Considering']}})</a></li>
            <li><a wire:click.prevent="setStatus('In progress')" class="@if($status ==='In progress') text-gray-900 border-blue @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">In Progress({{$statusCount['InProgress']}})</a></li>
        </ul>
        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
            <li><a wire:click.prevent="setStatus('Implemented')" class="@if($status ==='Implemented') text-gray-900 border-blue @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Implemented({{$statusCount['Implemented']}})</a></li>
            <li><a wire:click.prevent="setStatus('Closed')" class="@if($status ==='Closed') text-gray-900 border-blue @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue">Closed({{$statusCount['Closed']}})</a></li>
        </ul>
    </nav>
</div>
