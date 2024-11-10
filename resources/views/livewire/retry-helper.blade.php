<?php

declare(strict_types=1);

use App\Actions\NoteContentChecker;
use function Livewire\Volt\{state, mount};

state([
    'notes',
    'content'
]);

$save = function () {
    $content = app(NoteContentChecker::class)->execute($this->content);

    auth()->user()->notes()->create([
        'content' => $this->content
    ]);

    $this->notes = auth()->user()->notes;

    $this->content = '';
};

mount(function () {
    $this->notes = auth()->user()->notes;
});
?>

<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Retry helper') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-4 lg:px-8">
      <h3 class="text-base font-semibold text-gray-900">
        {{ __('My notes') }}
      </h3>
      @foreach($this->notes as $note)
        <div class="overflow-hidden rounded-lg bg-white shadow">
          <div class="px-4 py-5 sm:p-6">
            {{ $note->content }}
          </div>
        </div>
      @endforeach

      <form wire:submit.prevent="save()">
        <label for="note" class="block text-sm/6 font-medium text-gray-900">
          {{ __('Add a note') }}
        </label>
        <div class="mt-2">
          <textarea wire:model="content" rows="4" name="note" id="note"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
        </div>
        <div class="flex-shrink-0 mt-2">
          <button type="submit"
                  class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            {{ __('Add') }}
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
