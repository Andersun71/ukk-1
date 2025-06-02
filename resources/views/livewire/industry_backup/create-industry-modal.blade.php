<!-- <div>
    <div>
        @if ($showModal)
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded p-6 w-full max-w-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-4">Tambah Industri</h2>

                    <form wire:submit.prevent="store">
                        <div class="mb-2">
                            <label>Nama Industri</label>
                            <input type="text" wire:model="name" class="w-full border p-2 rounded">
                            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Bidang Usaha</label>
                            <input type="text" wire:model="business_field" class="w-full border p-2 rounded">
                            @error('business_field') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Alamat</label>
                            <input type="text" wire:model="address" class="w-full border p-2 rounded">
                            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Kontak</label>
                            <input type="text" wire:model="contact" class="w-full border p-2 rounded">
                            @error('contact') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Email</label>
                            <input type="email" wire:model="email" class="w-full border p-2 rounded">
                            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-2">
                            <label>Website</label>
                            <input type="url" wire:model="website" class="w-full border p-2 rounded">
                            @error('website') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex justify-end mt-4">
                            <button type="button" wire:click="$set('showModal', false)"
                                class="mr-2 px-4 py-2 bg-gray-300 rounded">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div> -->