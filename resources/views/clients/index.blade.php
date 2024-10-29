<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>


<div class="p-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <button class="underline">
                    <a href="{{ route('clients.create') }}">Add Client</a>
                </button>
                <table class="min-w-full divide-y divide-gray-200 border mt-4">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">COMPANY</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">VAT</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">ADDRESS</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @foreach($clients as $client)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $client->company_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $client->company_vat }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $client->company_address }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                <a href="{{ route('clients.edit', $client) }}">
                                    Edit
                                </a>
                                @can(\App\Enums\PermissionEnum::DELETE_CLIENT)
                                /
                                <form method="POST"
                                      class="inline-table"
                                      action="{{ route('clients.destroy', $client) }}"
                                      onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                    <button  type="submit" class="text-red-600 underline">
                                        Delete
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
