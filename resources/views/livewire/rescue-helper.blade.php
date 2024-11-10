<?php

declare(strict_types=1);

use function Livewire\Volt\{state};

// https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80

state([
    'avatarUrl' => auth()->user()->avatarUrl(),
    'user' =>  auth()->user(),
]);
?>

<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Rescue helper') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 sm:space-y-4 lg:px-8">
      <ul role="list" class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="{{ $avatarUrl }}" alt="">
          <h3 class="mt-6 text-lg/8 font-semibold tracking-tight text-gray-900">
            {{ $user->name }}
          </h3>
          <p class="text-base/7 text-gray-600">
            {{ $user->job_title }}
          </p>
          <ul role="list" class="mt-6 flex gap-x-6">
            <li>
              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">X</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path d="M11.4678 8.77491L17.2961 2H15.915L10.8543 7.88256L6.81232 2H2.15039L8.26263 10.8955L2.15039 18H3.53159L8.87581 11.7878L13.1444 18H17.8063L11.4675 8.77491H11.4678ZM9.57608 10.9738L8.95678 10.0881L4.02925 3.03974H6.15068L10.1273 8.72795L10.7466 9.61374L15.9156 17.0075H13.7942L9.57608 10.9742V10.9738Z" />
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">LinkedIn</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                </svg>
              </a>
            </li>
          </ul>
        </li>

        <!-- More people... -->
      </ul>
    </div>
  </div>
</div>
