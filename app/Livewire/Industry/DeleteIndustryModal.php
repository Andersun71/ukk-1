<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industry;

class DeleteIndustryModal extends Component
{
    public $showModal = false;
    public $industry;

    protected $listeners = ['openDeleteIndustryModal'];
    public function render(
    ) {
        return view('livewire.industry.delete-industry-modal');
    }

    public function openDeleteIndustryModal($id)
    {
        $this->industry = Industry::find($id);
        $this->showModal = true;


    }

    public function delete()
    {
        $this->industry->delete();
        $this->dispatch('industryDeleted');
        $this->reset('industry');
        $this->showModal = false;

    }
}
