<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>


<div class="p-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-600 overflow-hidden shadow-sm sm:rounded-lg">
            <form method="POST" action="{{ route('projects.update', $project) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $project->title)" required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $project->description)" required autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Deadline -->
                <div class="mt-4">
                    <x-input-label for="deadline" :value="__('Deadline')" />
                    <x-text-input id="deadline" class="block mt-1 w-full" type="date" name="deadline" :value="old('deadline', $project->deadline)" required autocomplete="deadline" />
                    <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
                </div>

                <!-- Assigned User -->
                <div class="mt-4">
                    <x-input-label for="user_id" :value="__('Assigned User')" />
                    <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" id="user_id" name="user_id">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" @selected(old('user_id', $project->user_id) == $user->id)>{{ $user->first_name . ' ' . $user->last_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                </div>

                <!-- Assigned Client -->
                <div class="mt-4">
                    <x-input-label for="client_id" :value="__('Client')" />
                    <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" id="client_id" name="client_id">
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" @selected(old('client_id', $project->client_id) == $client->id)>{{ $client->company_name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                </div>

                <!-- Status -->
                <x-input-label for="status" :value="__('Status')" />
                <select class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" id="status" name="status">
                    @foreach(\App\Enums\ProjectStatus::cases() as $status)
                        <option value="{{ $status->value }}"
                            @selected(old('status', $project->status) == $status->value)>{{ $status->value }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />

                <div class="flex items-center justify-left mt-4">

                    <x-primary-button class="ms-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
