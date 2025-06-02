<?php

namespace App\Livewire\Internship;

use Livewire\Component;
use App\Models\Internship;
class EditInternshipModal extends Component
{
    public $internship;
    public $showModal = false;

    public $student_id, $industry_id, $teacher_id, $start, $end;
    public $students = [];
    public $industries = [];
    public $teachers = [];
    protected $listeners = ['openEditInternshipModal'];

    protected $rules = [
        'student_id' => 'required|exists:students,id',
        'industry_id' => 'required|exists:industries,id',
        'teacher_id' => 'required|exists:teachers,id',
        'start' => 'required|date',
        'end' => 'required|date|after_or_equal:start',
    ];

    public function openEditinternshipModal($id)
    {
        $this->internship = Internship::find($id);
        $this->fillForm($this->internship);
        $this->showModal = true;
    }

    public function fillForm($internship)
    {
        $this->student_id = $internship->student_id;
        $this->industry_id = $internship->industry_id;
        $this->teacher_id = $internship->teacher_id;
        $this->start = $internship->start;
        $this->end = $internship->end;
    }

    public function update()
    {
        $this->validate();

        $this->internship->update([
            'student_id' => $this->student_id,
            'industry_id' => $this->industry_id,
            'teacher_id' => $this->teacher_id,
            'start' => $this->start,
            'end' => $this->end,
        ]);

        $this->resetForm();
        $this->showModal = false;
        $this->dispatch('internshipUpdated');
    }

    public function resetForm()
    {
        $this->reset(['student_id', 'industry_id', 'teacher_id', 'start', 'end']);
    }

    public function render()
    {
        $this->students = \App\Models\Student::with('user')->get();
        $this->teachers = \App\Models\Teacher::with('user')->get();
        $this->industries = \App\Models\Industry::get();
        return view('livewire.internship.edit-internship-modal');
    }
}
