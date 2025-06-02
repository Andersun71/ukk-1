<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Industry;
class IndustryTable extends Component
{
    public $industries;

    public function render()
    {
        $this->loadIndustry();
        return view('livewire.industry.industry-table', [
            'industries' => $this->industries,
        ]);
    }

    public function openCreateModal()
    {
        $this->emit('openCreateIndustryModal');
    }

    public function loadIndustry()
    {
        $this->industries = Industry::all();
    }

    public function openEditModal($id)
    {
        $this->emit('openEditIndustryModal', $id);
    }
}
