@props(['type', 'message'])

@if (session()->has($type))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 1800)"
        x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="p-4 mb-4 text-sm text-white rounded {{$type == 'success' ? 'bg-green-500' : 'bg-red-500'}}"
    >
        {{$message}}
    </div>
@endif