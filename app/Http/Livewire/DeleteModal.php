<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Livewire\Component;

class DeleteModal extends Component
{
    public $idea;

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function ideaDelete()
    {

        Vote::where('idea_id',$this->idea->id)->delete();

        Idea::destroy($this->idea->id);

        return redirect()->route('idea.index');

    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
