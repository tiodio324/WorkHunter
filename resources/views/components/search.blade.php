@props(['reset' => true])

<form method="GET" action="{{route('jobs.search')}}" class="block mx-5 space-y-2 md:mx-auto md:space-x-2">
    <input
        type="text"
        name="keywords"
        placeholder="Keywords"
        value="{{request('keywords')}}"
        class="w-full md:w-72 px-4 py-3 focus:outline-none"
    />
    <input
        type="text"
        name="location"
        placeholder="Location"
        value="{{request('location')}}"
        class="w-full md:w-72 px-4 py-3 focus:outline-none"
    />
    <button type="submit" class="w-full md:w-auto bg-blue-700 hover:bg-blue-600 text-white px-4 py-3 focus:outline-none">
        <i class="fa fa-search mr-1"></i> Search
    </button>
    @if ($reset)
        <a href="{{route('jobs.index')}}" class="bg-red-700 hover:bg-red-600 text-white px-4 py-3 rounded inline-block">
            Reset
        </a>
    @endif
</form>