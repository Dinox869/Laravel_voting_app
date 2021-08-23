<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Idea;
use \App\Models\User;
use Livewire\Component;

class IdeaIndex extends Component
{

    public $idea;

    public $votesCount;

    public $hasVoted;

    public function mount(Idea $idea,$votesCount)
    {
        $this->idea = $idea;

        $this->votesCount = $votesCount;

        $this->hasVoted = $idea->voted_by_user;
    }

    public function vote()
    {
        if(!auth()->check())
        {
            return redirect(route('login'));
        }
       elseif($this->hasVoted){
            try
            {

            } catch (VoteNotFoundException $e){
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
        return view('livewire.idea-index');
    }
}
