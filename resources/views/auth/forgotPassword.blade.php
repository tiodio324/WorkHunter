<x-layout>
    <h2 class="text-4xl text-center font-bold mb-4">
        Password Recovery
    </h2>
    <form action="{{route('password.email')}}" method="POST">
        @csrf
        <x-inputs.text id="email" name="email" type="email" placeholder="E-mail" />
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Send</button>
    </form>
</x-layout>