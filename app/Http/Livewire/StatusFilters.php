<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use phpDocumentor\Reflection\Utils;

class StatusFilters extends Component
{

    public $status;

    public $category;

    public $statusCount;

    protected $queryString = ['status','category'];

    public function setStatus($newStatus)
    {
        $this->status = $newStatus;

        $this->emit('queryStringUpdateStatus',$this->status);

        //prevent livewire rebuild on homepage
        if($this->getPreviousRouteName()==='idea.show')
        {
            return redirect()->route('idea.index',[
                'status'=> $this->status
            ]);
        }
    }

    private function getPreviousRouteName()
    {
        return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName;
    }



    public function mount()
    {

        $this->statusCount = Status::getCount();

        $this->status = request()->status ?? 'All';


        if(Route::currentRouteName()==='idea.show')
        {
            $this->status = null;
            $this->queryString = [];
        }
    }

    public function render()
    {
        return view('livewire.status-filters');
    }
}
