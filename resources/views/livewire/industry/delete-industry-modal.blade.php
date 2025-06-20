<div>
    @if ($showModal)
        <div id="crud-modal" tabindex="-1" aria-hidden="true" @class([
            'fixed inset-0 z-50 overflow-y-auto overflow-x-hidden justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full',
            'hidden' => !$showModal,
            'flex' => $showModal
        ])>
            <div class="fixed inset-0 z-50 flex items-center justify-center">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 w-full max-w-md p-4">
                    <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">

                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                                delete this Industry?</h3>
                            <button type="button" wire:click="delete"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button type="button" wire:click="$set('showModal', false)"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>