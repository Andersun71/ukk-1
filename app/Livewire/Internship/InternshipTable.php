<?php

namespace App\Livewire\Internship;

use Livewire\Component;
use App\Models\Internship;

class InternshipTable extends Component
{
    public $internships;

    protected $listeners = ['internshipCreated' => 'loadInternships', 'internshipUpdated' => 'loadinternship', 'internshipDeleted' => 'loadInternship'];

    public function render()
    {
        $this->loadIndustry();
        return view('livewire.internship.internship-table', [
            'internships' => $this->internships,
        ]);
    }

    public function openCreateModal()
    {
        $this->dispatch('openCreateInternshipModal');
    }

    public function loadIndustry()
    {
        $this->internships = Internship::all();
    }

    public function openEditModal($id)
    {
        $this->dispatch('openEditInternshipModal', id: $id);
    }
    public function openDeleteModal($id)
    {
        $this->dispatch('openDeleteInternshipModal', id: $id);
    }

}
