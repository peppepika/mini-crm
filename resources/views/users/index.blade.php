<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>


<div class="p-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <button class="underline">
                    <a href="{{ route('users.create') }}">Add User</a>
                </button>
                <table class="min-w-full divide-y divide-gray-200 border mt-4">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">FIRST NAME</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">LAST NAME</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">EMAIL</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @foreach($users as $user)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $user->first_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $user->last_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                <a href="{{ route('users.edit', $user) }}">
                                    Edit
                                </a>
                                /
                                <form method="POST"
                                      class="inline-table"
                                      action="{{ route('users.destroy', $user) }}"
                                      onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                    <button  type="submit" class="text-red-600 underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
