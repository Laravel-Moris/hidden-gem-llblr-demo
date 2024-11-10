<?php

declare(strict_types=1);

use App\Mail\UserConfirmation;
use App\Mail\AdminNotification;
use Illuminate\Support\Facades\Mail;

use function Livewire\Volt\{state};

state([
    'firstName',
    'lastName',
    'email',
    'message',
    'showSuccessMessage' => false
]);

$send = function () {
    $this->validate([
        'firstName' => ['required', 'min:3', 'max:255'],
        'lastName' => ['required', 'min:3', 'max:255'],
        'email' => ['required', 'email'],
        'message' => ['required', 'min:3', 'max:1000']
    ]);

    sleep(2);

    Mail::to($this->email)->send(new UserConfirmation(name: $this->firstName.' '.$this->lastName));

    Mail::to(config('mail.from.address'))->send(new AdminNotification(
        name: $this->firstName.' '.$this->lastName,
        email: $this->email,
        message: $this->message
    ));

    $this->reset([
        'firstName',
        'lastName',
        'email',
        'message'
    ]);

    $this->showSuccessMessage = true;
}
?>

<div>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Deferred functions') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto bg-white rounded-md shadow">
        <form
          wire:submit.prevent="send()"
          class="px-6 py-6"
        >
          @csrf
          <div
            x-data="{ open: $wire.entangle('showSuccessMessage') }"
            x-cloak
            x-show="open"
            class="mb-2 rounded-md bg-green-50 p-4"
          >
            <div class="flex">
              <div class="shrink-0">
                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                  {{ __('Message sent') }}
                </p>
              </div>

              <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                  <button
                    x-on:click.prevent="open = false"
                    type="button"
                    class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50"
                  >
                    <span class="sr-only">
                      {{ __('Dismiss') }}
                    </span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                      <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div>
              <label for="first-name" class="block text-sm/6 font-semibold text-gray-900">
                {{ __('First name') }}
              </label>
              <div class="mt-2.5">
                <input
                  type="text"
                  name="first-name"
                  id="first-name"
                  autocomplete="given-name"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                  wire:model="firstName"
                  required
                >
              </div>
            </div>
            <div>
              <label for="last-name" class="block text-sm/6 font-semibold text-gray-900">
                {{ __('Last name') }}
              </label>
              <div class="mt-2.5">
                <input
                  type="text"
                  name="last-name"
                  id="last-name"
                  autocomplete="family-name"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                  wire:model="lastName"
                  required
                >
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="email" class="block text-sm/6 font-semibold text-gray-900">
                {{ __('Email') }}
              </label>
              <div class="mt-2.5">
                <input
                  type="email"
                  name="email"
                  id="email"
                  autocomplete="email"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                  wire:model="email"
                  required
                >
              </div>
            </div>
            <div class="sm:col-span-2">
              <label for="message" class="block text-sm/6 font-semibold text-gray-900">
                {{ __('Message') }}
              </label>
              <div class="mt-2.5">
                <textarea
                  name="message"
                  id="message"
                  rows="4"
                  class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"
                  wire:model="message"
                  required
                ></textarea>
              </div>
            </div>
          </div>
          <div class="mt-8 flex justify-end">
            <button
              type="submit"
              class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
              {{ __('Send message') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
