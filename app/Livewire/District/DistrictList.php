<?php

namespace App\Livewire\District;

use Livewire\Component;
use App\Models\District;


class DistrictList extends Component
{
    public $districts = 'Hi there';

    public function mount()
    {
        $this->districts = District::all();
        // dd($this->districts);
    }

    public function render()
    {
        return view('livewire.district.district-list');
    }
}
