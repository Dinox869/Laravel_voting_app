<?php

namespace App\Models;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory,Sluggable;

    const paginate_count = 10;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function getColor()
    {
        $allStatuses = [
            'Open' => "bg-gray-200",
            'Closed'=> "bg-red text-white",
            'Implemented'=> "bg-purple text-white",
            'Considering'=> "bg-yellow text-white",
            'In Progress'=> "bg-green text-white"

        ];
         return $allStatuses[$this->status->name];
    }

    public function voteRemoved(User $user)
    {
        $votedIdea = Vote::where('user_id',$user->id)
            ->where('idea_id',$this->id)
            ->first();
         if($votedIdea)
         {
            $votedIdea->delete();
         }
         else
         {
             throw  new VoteNotFoundException();
         }

    }

    public function votes(){
        return $this->belongsToMany(User::class,'votes');
    }

    public function comment()
    {
        return $this->hasMany(Comments::class);
    }

    public function  isVotedbyUser(?User $user)
    {
        if(!$user)
        {
            return false;
        }
        return Vote::where('user_id',$user->id)
            ->where('idea_id',$this->id)
            ->exists();
    }

    public  function  vote(User $user)
    {
        if($this->isVotedbyUser($user)){
            throw new DuplicateVoteException();
        }
         Vote::create([
            'user_id'=> $user->id,
            'idea_id'=> $this->id,
        ]);
    }


}
