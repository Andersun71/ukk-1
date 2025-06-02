<?php

namespace App\Livewire\Student;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class RegisterStudentModal extends Component
{

    use WithFileUploads;
    public $student;
    public $showModal = true;
    public $user_id, $photo, $nis, $gender, $address, $contact;
    protected $listeners = ['openRegisterStudentModal' => 'open'];


    public function open()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    protected $rules = [
        'user_id' => 'required|unique:students,user_id',
        'photo' => 'required|image|max:1024',
        'nis' => 'required|string',
        'gender' => 'required|in:male,female',
        'address' => 'required|string',
        'contact' => 'required|string',
    ];
    protected $messages = [
        'user_id.unique' => 'this user has been registered as student.',
    ];
    public function render()
    {
        return view('livewire.student.register-student-modal');
    }

    public function fillForm($student)
    {
        $this->user_id = $student->user_id;
    }

    public function resetForm()
    {
        $this->reset(['photo', 'nis', 'gender', 'address', 'contact']);
    }
    public function store()
    {
        $this->user_id = Auth::id();

        $this->validate();

        $photoPath = $this->photo->store('students', 'public');

        Student::create([
            'user_id' => $this->user_id,
            'photo' => $photoPath,
            'nis' => $this->nis,
            'gender' => $this->gender,
            'address' => $this->address,
            'contact' => $this->contact,
        ]);

        session()->flash('success', 'Student successfully Registered.');
        $this->resetForm();
        $this->showModal = false;
        $this->dispatch('studentCreated');
        $this->redirect(route('dashboard'));
    }
}
