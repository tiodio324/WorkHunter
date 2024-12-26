@props([
    'url' => '/',
    'active' => false,
    'mobile' => null
])

@if($mobile)
    <a {{$attributes}} href="{{$url}}" class="block px-4 py-2 hover:bg-blue-700 {{$active ? 'text-yellow-500 font-bold' : ''}}">
        {{$slot}}
    </a>
@else
    <a {{$attributes}} href="{{$url}}" class="text-white hover:underline py-2 {{$active ? 'text-yellow-500 font-bold' : ''}}">
        {{$slot}}
    </a>
@endif