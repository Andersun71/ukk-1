<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student as studentt;

class Student extends Component
{
    public function render()
    {
        return view('livewire.student.student');
    }

    public function openRegisterModal()
    {
        $this->dispatch('openRegisterStudentModal');
    }
}
