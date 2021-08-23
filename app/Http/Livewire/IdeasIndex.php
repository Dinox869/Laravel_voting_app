<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\Vote;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
    use WithPagination;

    public $status = 'All';

    public $category;

    public $filter;

    protected $listeners=['queryStringUpdateStatus'];

    protected $queryString = ['status','category','filter'];

    public function updatingCategory()
    {
        $this->resetPage();
    }


    public function queryStringUpdateStatus($newStatus)
    {
        $this->resetPage();

        $this->status = $newStatus;
    }

    public function updatingFilter()
    {
        if($this->filter === 'Your Ideas'){
            if(!auth()->check())
            {
                return redirect()->route('login');
            }
        }
    }

    public function render()
    {

        $statusIndex = Status::all()->pluck('id','name');
        $categories = Category::all();

        return view('livewire.ideas-index',[
            'ideas'=>Idea::with('user','category','status')
                ->when( $this->status && $this->status !==  'All', function ($query) use ($statusIndex){
                    return $query->where('status_id',$statusIndex->get($this->status));
                })
                ->when( $this->category && $this->category !== 'categories', function ($query) use ($categories){
                    return $query->where('category_id',$categories->pluck('id','name')->get($this->category));
                })
                ->when( $this->filter && $this->filter === 'Top Votes', function ($query){
                    return $query->orderByDesc('votes_Count');
                })
                ->when( $this->filter && $this->filter === 'Your Ideas', function ($query){
                    return $query->where('user_id',auth()->id());
                })
                ->addSelect(['voted_by_user'=> Vote::select('id')->where('user_id',auth()->id())->where('idea_id','ideas.id')])
                ->withCount('votes')
                ->latest('created_at')
                ->simplePaginate(Idea::paginate_count),
            'categories'=> $categories
        ]);
    }
}
