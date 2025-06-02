<div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Business Field
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Website
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($industries))
                    @foreach ($industries as $industry)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$industry->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{ $industry->business_field }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $industry->address }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $industry->contact }}
                            </td>
                            <td class="px-6 py4">
                                {{ $industry->email }}
                            </td>
                            <td class="px-6 py4">
                                {{ $industry->website }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>