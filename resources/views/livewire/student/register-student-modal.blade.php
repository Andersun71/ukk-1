<div>
    @if ($showModal)
        <div id="crud-modal" wire:ignore.self tabindex="-1" aria-hidden="true" @class([
            'fixed inset-0 z-50 overflow-y-auto overflow-x-hidden justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full',
            'hidden' => !$showModal,
            'flex' => $showModal
        ])>

            <div class="fixed inset-0 z-50 flex items-center justify-center">

                <div class="absolute inset-0 bg-black opacity-50"></div>

                <!-- Modal content -->
                <div class="relative z-10 w-full max-w-md p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Register as Student
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            @if ($errors->any())
                                <div class="mb-4 text-sm text-red-600 dark:text-red-400">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>• {{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form wire:submit.prevent="store" enctype="multipart/form-data" class="space-y-4">
                                <div>
                                    <label for="photo"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        photo</label>
                                    <input type="file" name="photo" id="photo" accept="image/*" wire:model="photo"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required />
                                </div>
                                <div>
                                    <label for="nis"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS
                                    </label>
                                    <input type="text" name="nis" id="nis" wire:model="nis"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="your NIS" required />
                                </div>
                                <div>
                                    <label for="gender "
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender
                                    </label>
                                    <select id="gender" name="gender" wire:model="gender"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="">Select Gender</option>
                                        <option value="male">male</option>
                                        <option value="female">female</option>
                                    </select>
                                </div>
                                <div class="col-span-2 ">
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <input type="text" name="address" id="address" wire:model="address"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Your Address" required="">
                                </div>
                                <div class="col-span-2 ">
                                    <label for="contact"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                                    <input type="text" name="contact" id="contact" wire:model="contact"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Your Contact" required="">
                                </div>

                                <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register
                                    as Student</button>
                                @if (session()->has('success'))
                                    <div class="mt-4 p-3 text-green-700 bg-green-100 rounded">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>