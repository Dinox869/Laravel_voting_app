<?php

namespace App\Models;

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
}
