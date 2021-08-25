<?php

namespace App\Http\Livewire;

use App\Models\Comments;
use App\Models\Idea;
use Livewire\Component;

class CommentIdea extends Component
{
    public $idea;

    protected $listeners=['postedComment'];

    public function postedComment()
    {
        return $this->idea->refresh();
    }

    public function mount(Idea $idea)
    {
        $this->idea = $idea;
    }

    public function render()
    {
        return view('livewire.comment-idea',[
           'comments'=> Comments::where('idea_id',$this->idea->id)->latest('created_at')->simplepaginate(9)
        ]);
    }
}
