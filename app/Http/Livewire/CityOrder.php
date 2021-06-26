<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CityOrder extends Component
{
    public $line;
    public $cities = [];
    public $order = [];
    public $city_id = [];
    public $i = 0;
    public $inputs = [];


    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;

        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i-1]);
    }

    public function render()
    {

        $this->cities = City::all();
        return view('livewire.city-order');
    }

    public function mount()
    {
        $cities = $this->line->cities;
        $this->i = count($cities);

        $cities_id = $cities->pluck('id')->toArray();
        $cities_order = $cities->pluck('pivot.order')->toArray();
        $this->inputs = range(1, $this->i);
        foreach ($cities_id as $key => $id) {
            $this->city_id[$key + 1] = $id;
        }
        foreach ($cities_order as $key => $order) {
            $this->order[$key + 1] = $order;
        }
    }

    public function store()
    {
        $counter = $this->i + 1;


        $inputs = [];
        foreach ($this->inputs as $key => $value) {
            if ($this->city_id[$value] != '' and $this->order[$value] != '') {
                $inputs[$this->city_id[$value]] = ['order' => $this->order[$value]];
            }
        }
        $this->line->cities()->sync($inputs);
        //TODO : fix this function clear the data when submit

        $this->resetInputFields();

        $this->alert('success', 'City Line updated successfully !', [
            'position' =>  'center',
            'timer' =>  3000,
            'toast' =>  false,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
//        session()->flash('message', 'Users Created Successfully.');
    }

    private function resetInputFields()
    {
        $this->city_id[$this->i+1] = 1;
        $this->order[$this->i+1] = '';
    }
}
