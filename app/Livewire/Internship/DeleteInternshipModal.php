<?php

namespace App\Livewire\Internship;

use Livewire\Component;
use App\Models\Internship;

class DeleteInternshipModal extends Component
{
    public $showModal = false;
    public $internship;

    protected $listeners = ['openDeleteInternshipModal'];
    public function render(
    ) {
        return view('livewire.internship.delete-internship-modal');
    }

    public function openDeleteInternshipModal($id)
    {
        $this->internship = Internship::find($id);
        $this->showModal = true;


    }

    public function delete()
    {
        $this->internship->delete();
        $this->dispatch('internshipDeleted');
        $this->reset('internship');
        $this->showModal = false;

    }
}
