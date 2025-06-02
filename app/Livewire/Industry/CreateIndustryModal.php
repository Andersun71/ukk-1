<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industry;

class CreateIndustryModal extends Component
{
    public $showModal = false;

    public $name, $business_field, $address, $contact, $email, $website;
    protected $listeners = ['openCreateIndustryModal' => 'open'];

    protected $rules = [
        'name' => 'required|string',
        'business_field' => 'required|string',
        'address' => 'required|string',
        'contact' => 'required|string',
        'email' => 'required|string',
        'website' => 'nullable|string',
    ];
    public function render()
    {
        return view('livewire.industry.create-industry-modal');
    }
    public function open()
    {
        $this->resetForm();
        $this->showModal = true;
        session()->forget('success');
    }

    public function resetForm()
    {
        $this->reset(['name', 'business_field', 'address', 'contact', 'email', 'website']);
    }

    public function store()
    {
        $this->validate();

        Industry::create([
            'name' => $this->name,
            'business_field' => $this->business_field,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email,
            'website' => $this->website,
        ]);

        session()->flash('success', 'Industry successfully created.');
        $this->resetForm();
        $this->showModal = false;
        $this->dispatch('industryCreated');
    }
}
