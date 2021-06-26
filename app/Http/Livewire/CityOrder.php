<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;

class CityOrder extends Component
{
    public $line;
    public $cities = [];
    public $updateMode = false;
    public $order = [];
    public $city_id = [];
    public $i = 0;
    public $inputs = [];


    public function add($i)
    {
        $validatedDate = $this->validate([
            'city_id.' . $i + 1 => `required|string`,
            'order.' . $i + 1 => `required|integer|min:1`,
        ]);
        $i = $i + 1;
        $this->i = $i;

        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        $cities = $this->line->cities;
        $this->i = count($cities);
        $this->city_id = [0=>''];
        $this->order = [0=>''];
        $cities_id = $cities->pluck('id')->toArray();
        $cities_order = $cities->pluck('pivot.order')->toArray();
        $this->inputs = range(1, $this->i);
        foreach ($cities_id as $key => $id) {
            $this->city_id[$key + 1] = $id;
        }
        foreach ($cities_order as $key => $order) {
            $this->order[$key + 1] = $order;
        }
        $this->cities = City::all();
        return view('livewire.city-order');
    }

    public function mount()
    {


    }

    public function store()
    {
        $counter = $this->i + 1;
        $validatedDate = $this->validate([
            'city_id.' . $counter => "required_with:order.$counter|string",
            'order.' . $counter => "required_with:city_id.$counter|string",
        ],
            [
                'city_id.0.required' => 'city field is required',
                'order.0.required' => 'city order field is required',
                'city_id.*.required' => 'name field is required',
                'order.*.required' => 'email field is required',
            ]
        );

        $inputs = [];
        foreach ($this->city_id as $key => $value) {
            if ($this->city_id[$key] != '' and $this->order[$key] != '') {
                $inputs[$this->city_id[$key]] = ['order' => $this->order[$key]];
            }
        }
        $this->line->cities()->sync($inputs);
        //TODO : fix this function clear the data when submit

        $this->resetInputFields();


        /* $this->alert('success', 'City Line', [
             'confirmButtonText' => 'Ok',
             'cancelButtonText' => 'Cancel',
             'showCancelButton' => true,
             'showConfirmButton' => false,
         ]);*/
//        session()->flash('message', 'Users Created Successfully.');
    }

    private function resetInputFields()
    {
        $this->city_id = '';
        $this->order = '';
    }
}
