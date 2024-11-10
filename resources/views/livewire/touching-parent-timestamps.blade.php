<?php

use App\Models\Skill;
use function Livewire\Volt\{state, mount};

state([
    'user',
    'bio' => auth()->user()->bio,
    'editBio' => false
]);

$saveBio = function () {
    $this->user->update([
        'bio' => $this->bio
    ]);

    $this->editBio = false;
};

$saveSkill = function (Skill $skill, string $name) {
    $skill->update([
        'name' => $name
    ]);

    $this->user->refresh();
};

mount(function () {
    $this->user = auth()->user();
});
?>

<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Touching parent timestamps') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-4 lg:px-8">
      <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-6 sm:px-6">
          <h3 class="text-base/7 font-semibold text-gray-900">
            {{ __('User information and skills') }}
          </h3>
          <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">
            {{ __('Personal details and skills') }}
          </p>
        </div>
        <div class="border-t border-gray-100">
          <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-900">
                {{ __('Full name') }}
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $user->name }}
              </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-900">
                {{ __('Email address') }}
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $user->email }}
              </dd>
            </div>
            <div x-data="{edit: $wire.entangle('editBio') }" class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-900">
                {{ __('Bio') }}
              </dt>
              <dd x-show="!edit" class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $user->bio }}
                <br/><br/>
                <a
                  href="#"
                  x-on:click.prevent="edit = true"
                  class="font-medium text-indigo-600 hover:text-indigo-500"
                >
                  {{ __('Edit') }}
                </a>
              </dd>
              <dd x-cloak x-show="edit" class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                <textarea
                  wire:model="bio"
                  class="mt-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                ></textarea>
                <div>
                  <button
                    wire:click.prevent="saveBio"
                    class="mt-1 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                  >
                    {{ __('Save') }}
                  </button>
                  <button
                    x-on:click.prevent="edit = false"
                    class="mt-1 inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                  >
                    {{ __('Cancel') }}
                  </button>
                </div>
              </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-900">
                {{ __('Last updated at') }}
              </dt>
              <dd class="mt-1 text-sm/6 text-gray-700 sm:col-span-2 sm:mt-0">
                {{ $this->user->updated_at->format('l jS \\of F Y h:i:s A') }}
              </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm/6 font-medium text-gray-900">
                {{ __('Skills') }}
              </dt>
              <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                  @foreach($user->skills as $skill)
                    <li x-data="{edit: false, skill: '{{ $skill->name }}' }"
                        class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                      <div x-show="!edit" class="flex w-0 flex-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="size-6">
                          <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/>
                        </svg>
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <span class="truncate font-medium">
                            {{ $skill->name }}
                          </span>
                        </div>
                      </div>
                      <div x-cloak x-show="edit" class="flex w-0 flex-1 items-center">
                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                          <div class="flex items-center">
                            <label for="{{ 'skill_'.$skill->id }}" class="sr-only">{{ __('Skill') }}</label>
                            <input
                              type="text"
                              name="{{ 'skill_'.$skill->id }}"
                              id="{{ 'skill_'.$skill->id }}"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                              x-model="skill"
                            >
                            <button
                              type="button"
                              class="ml-2 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                              x-on:click.prevent="$wire.saveSkill({{ $skill->id }}, skill);edit = false"
                            >
                              {{ __('Save') }}
                            </button>
                            <button
                              type="button"
                              x-on:click.prevent="edit = false"
                              class="ml-2 inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                            >
                              {{ __('Cancel') }}
                            </button>
                          </div>
                        </div>
                      </div>
                      <div x-show="!edit" class="ml-4 flex-shrink-0">
                        <a href="#" x-on:click.prevent="edit = true"
                           class="font-medium text-indigo-600 hover:text-indigo-500">
                          {{ __('Edit') }}
                        </a>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </div>
</div>
