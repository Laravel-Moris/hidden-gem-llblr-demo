<?php

declare(strict_types=1);

use App\Models\User;
use function Livewire\Volt\{layout, state, mount};

state([
    'activeUsers',
    'inActiveUsers',
    'percentageOfActiveUsers',
]);

mount(function () {
    $this->activeUsers = User::where('active', true)->count();
    $this->inActiveUsers = User::where('active', false)->count();
    $this->percentageOfActiveUsers = number_format(($this->activeUsers / User::count()) * 100);
});
?>

<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dynamic where clauses') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div>
        <h3 class="text-base font-semibold text-gray-900">
          {{ __('Users stats') }}
        </h3>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
          <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">
              {{ __('Number of active users') }}
            </dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
              {{ $activeUsers }}
            </dd>
          </div>
          <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">
              {{ __('Number of inactive users') }}
            </dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
              {{ $inActiveUsers }}
            </dd>
          </div>
          <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">
              {{ __('Percentage of active users') }}
            </dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
              {{ $percentageOfActiveUsers }}%
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</div>
