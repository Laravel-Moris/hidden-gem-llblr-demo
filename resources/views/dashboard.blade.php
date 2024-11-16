<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <ul class="list-disc pl-6 space-y-1">
            <li>
              <a href="{{ route('dynamic-where-clauses') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Dynamic where clauses') }}
              </a>
            </li>
            <li>
              <a href="{{ route('touching-parent-timestamps') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Touching Parent Timestamps') }}
              </a>
            </li>
            <li>
              <a href="{{ route('retry-helper') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Retry helper') }}
              </a>
            </li>
            <li>
              <a href="{{ route('rescue-helper') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Rescue helper') }}
              </a>
            </li>
            <li>
              <a href="{{ route('pipeline') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Pipeline') }}
              </a>
            </li>
            <li>
              <a href="{{ route('contextual-attributes') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Contextual attributes') }}
              </a>
            </li>
            <li>
              <a href="{{ route('deferred-functions') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                {{ __('Deferred Functions (beta)') }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
