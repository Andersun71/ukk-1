<?php

namespace App\Livewire\Internship;

use Livewire\Component;
use App\Models\Internship;

class CreateInternshipModal extends Component
{
    public $showModal = false;

    public $student_id, $industry_id, $teacher_id, $start, $end;

    public $students = [];
    public $industries = [];
    public $teachers = [];
    protected $listeners = ['openCreateInternshipModal' => 'open'];

    protected $rules = [
        'student_id' => 'required|unique:internships,student_id',
        'industry_id' => 'required|exists:industries,id',
        'teacher_id' => 'required|exists:teachers,id',
        'start' => 'required|date',
        'end' => 'required|date|after_or_equal:start',
    ];
    protected $messages = [
        'student_id.unique' => 'Student ini sudah terdaftar untuk internship.',
    ];
    public function render()
    {
        $this->students = \App\Models\Student::with('user')->get();
        $this->teachers = \App\Models\Teacher::with('user')->get();
        $this->industries = \App\Models\Industry::get();
        return view('livewire.internship.create-internship-modal');
    }
    public function open()
    {
        $this->resetForm();
        $this->showModal = true;
        session()->forget('success');
    }

    public function resetForm()
    {
        $this->reset(['student_id', 'industry_id', 'teacher_id', 'start', 'end']);
    }

    public function store()
    {
        $this->validate();

        Internship::create([
            'student_id' => $this->student_id,
            'industry_id' => $this->industry_id,
            'teacher_id' => $this->teacher_id,
            'start' => $this->start,
            'end' => $this->end,
        ]);

        session()->flash('success', 'Internship successfully created.');
        $this->resetForm();
        $this->showModal = false;
        $this->dispatch('internshipCreated');
    }
}
