<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Comments;
use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{

    public $idea;

    public $comments;

    public $votesCount;

    public $hasVoted;

    public $body;

    protected $listeners=['statusWasUpdated','ideaWasUpdated',];

    public function statusWasUpdated()
    {
        $this->idea->refresh();
    }

    public function ideaWasUpdated()
    {
        $this->idea->refresh();
    }

    public function mount(Idea $idea,$votesCount)
    {
      $this->idea = $idea;

      $this->$votesCount = $votesCount;

      $this->hasVoted = $idea->isVotedbyUser(auth()->user());
    }

    protected  $rules  = [
        'body'=> 'required|min:4',
    ];

    public function postComment()
    {
        if(auth()->check())
        {

            $this->validate();

            Comments::create([
                'user_id'=> auth()->id(),
                'idea_id'=> $this->idea->id,
                'body'=> $this->body
            ]);

            $this->emit('postedComment');

        }
        else{
            return redirect()->route('login');
        }
    }


    public function vote()
    {
        if(!auth()->check())
        {
            return redirect(route('login'));
        }
        elseif($this->hasVoted){
            try
            {} catch (VoteNotFoundException $e){
                //do nothing
            }
            $this->idea->voteRemoved(auth()->user());
            $this->votesCount--;
            $this->hasVoted = false;

        }else{

            try{}catch (DuplicateVoteException $e){
                //do nothing
            }
            $this->idea->vote(auth()->user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
        return '';
    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
