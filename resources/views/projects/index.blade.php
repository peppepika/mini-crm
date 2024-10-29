<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>


<div class="p-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <button class="underline">
                    <a href="{{ route('projects.create') }}">Add new Project</a>
                </button>
                <table class="min-w-full divide-y divide-gray-200 border mt-4">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">TITLE</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">ASSIGNED TO</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">STATUS</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">DEADLINE</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500">CLIENT</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                        </th>
                    </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @foreach($projects as $project)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $project->title }}
                            </td>
                            <td class="truncate px-6 py-4  whitespace-nowrap text-sm leading-4 ">
                                {{ $project->user->first_name }} {{ $project->user->last_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $project->status }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $project->deadline }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                {{ $project->client->company_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm leading-4">
                                <a href="{{ route('projects.edit', $project) }}">
                                    Edit
                                </a>
                                @can(\App\Enums\PermissionEnum::DELETE_PROJECT)
                                /
                                <form method="POST"
                                      class="inline-table"
                                      action="{{ route('projects.destroy', $project) }}"
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
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
