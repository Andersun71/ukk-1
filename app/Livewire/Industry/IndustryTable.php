<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industry;
class IndustryTable extends Component
{
    public $industries;

    protected $listeners = ['industryCreated' => 'loadIndustries', 'industryUpdated' => 'loadIndustry', 'industryDeleted' => 'loadIndustry'];

    public function render()
    {
        $this->loadIndustry();
        return view('livewire.industry.industry-table', [
            'industries' => $this->industries,
        ]);
    }

    public function openCreateModal()
    {
        $this->dispatch('openCreateIndustryModal');
    }

    public function loadIndustry()
    {
        $this->industries = Industry::all();
    }

    public function openEditModal($id)
    {
        $this->dispatch('openEditIndustryModal', id: $id);
    }

    public function openDeleteModal($id)
    {
        $this->dispatch('openDeleteIndustryModal', id: $id);
    }
}
