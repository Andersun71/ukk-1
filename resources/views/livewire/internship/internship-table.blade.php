<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="mb-4">
        <button wire:click="openCreateModal" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add Internship
        </button>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Student
                </th>
                <th scope="col" class="px-6 py-3">
                    Industry
                </th>
                <th scope="col" class="px-6 py-3">
                    Teacher
                </th>
                <th scope="col" class="px-6 py-3">
                    Start
                </th>
                <th scope="col" class="px-6 py-3">
                    End
                </th>
                <th scope="col" class="px-6 py-3">
                    Duration
                </th>
                <!-- <th scope="col" class="px-6 py-3">
                    Actions
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th> -->
            </tr>
        </thead>
        <tbody>
            @if (count($internships))
                @foreach ($internships as $internship)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $internship->student->user->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{ $internship->industry->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $internship->teacher->user->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $internship->start }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $internship->end }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $internship->Duration }} days
                        </td>
                        <!-- <td class="px-6 py-4 text-right">
                            <button wire:click="openEditModal({{ $internship->id }})"
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    Edit
                                </button>
                                <button wire:click="openDeleteModal({{ $internship->id }})"
                                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                                    Delete
                                </button>
                        </td> -->
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>