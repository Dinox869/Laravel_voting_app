<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class EditIdea extends Component
{

    public $idea;

    public $title;

    public $description;

    public $category;

    public function mount(Idea $idea){
        $this->idea = $idea;

        $this->title = $idea->title;

        $this->category= $idea->category->id;

        $this->description = $idea->description;
    }

    public function updateIdea()
    {
        $this->idea->update([
            'title' => $this->title,
            'category_id' => $this->category,
            'description' => $this->description
        ]);

        $this->emit('ideaWasUpdated');
    }

    public function render()
    {
        return view('livewire.edit-idea',[
            'categories' => Category::all()
        ]);
    }
}
