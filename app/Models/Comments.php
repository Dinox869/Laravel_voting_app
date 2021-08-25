<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function idea()
    {
       return $this->belongsTo(Idea::class);
    }

    public function deleteComment()
    {
        if(auth()->check() && auth()->user()->id === $this->idea->user_id)
        {
            Comments::where('idea_id',$this->idea->idea_id)->where('user_id',$this->idea->user_id)->delete();

            return redirect()->route('idea.index');
        }
    }
}
