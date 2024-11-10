<?php

declare(strict_types=1);

use function Livewire\Volt\{state, computed};

state([
    'fruits' => ['  apple  ', 'banana', ' ', null, 'Cherry  ']
]);

$processedFruits = computed(function () {
    return $this->fruits;
});
?>

<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Pipeline') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-4 lg:px-8">
      <div>
        <h2 class="text-sm font-medium text-gray-500">
          {{ __('List of fruits') }}
        </h2>
        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:grid-cols-2 sm:gap-6 lg:grid-cols-4">
          @foreach($this->processedFruits as $fruit)
            <li class="col-span-1 flex rounded-md shadow-sm">
              <div class="flex flex-1 items-center justify-between truncate rounded-md border border-gray-200 bg-white">
                <div class="flex-1 truncate px-4 py-2 text-sm">
                  <a href="#" class="font-medium text-gray-900 hover:text-gray-600">
                    {{ $fruit }}
                  </a>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
