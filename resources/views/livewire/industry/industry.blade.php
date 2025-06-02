<x-layouts.app.sidebar>
    <h1 class="text-2x1 font-semibold mb-4">Industry</h1>
    <livewire:industry.industry-table />
    <livewire:industry.create-industry-modal />
    <livewire:industry.edit-industry-modal />
    <livewire:industry.delete-industry-modal />

    @if (session()->has('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 rounded p-3">
            {{ session('success') }}
        </div>
    @endif
</x-layouts.app.sidebar>