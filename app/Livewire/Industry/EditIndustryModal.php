<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industry;

class EditIndustryModal extends Component
{

    public $industry;
    public $showModal = false;

    public $name, $business_field, $address, $contact, $email, $website;

    protected $listeners = ['openEditIndustryModal'];

    protected $rules = [
        'name' => 'required|string',
        'business_field' => 'required|string',
        'address' => 'required|string',
        'contact' => 'required|string',
        'email' => 'required|string',
        'website' => 'nullable|string',
    ];

    public function openEditIndustryModal($id)
    {
        $this->industry = Industry::find($id);
        $this->fillForm($this->industry);
        $this->showModal = true;
        logger('Edit modal triggered with ID: ' . $id);
    }

    public function fillForm($industry)
    {
        $this->name = $industry->name;
        $this->business_field = $industry->business_field;
        $this->address = $industry->address;
        $this->contact = $industry->contact;
        $this->email = $industry->email;
        $this->website = $industry->website;
    }

    public function update()
    {
        $this->validate();

        $this->industry->update([
            'name' => $this->name,
            'business_field' => $this->business_field,
            'address' => $this->address,
            'contact' => $this->contact,
            'email' => $this->email,
            'website' => $this->website,
        ]);

        $this->resetForm();
        $this->showModal = false;
        $this->dispatch('industryUpdated');
    }

    public function resetForm()
    {
        $this->reset(['name', 'business_field', 'address', 'contact', 'email', 'website']);
    }

    public function render()
    {
        logger('EditIndustryModal render triggered');
        return view('livewire.industry.edit-industry-modal');
    }
}
