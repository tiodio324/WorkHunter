<x-layout>
    <h2 class="text-4xl text-center font-bold mb-4">
        Password Reset
    </h2>
    <form action="{{route('password.update')}}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{$token}}" />
        <x-inputs.text id="email" name="email" type="email" placeholder="E-mail" />
        <x-inputs.text id="password" name="password" type="password" placeholder="Password" />
        <x-inputs.text id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" />

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Send</button>
    </form>
</x-layout>