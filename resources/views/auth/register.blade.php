<x-layout>
    <div class="bg-white rounded-lg shadow-md w-full md:max-w-xl mx-auto mt-12 p-8 py12">
        <h2 class="text-4xl text-center font-bold mb-4">
            Register
        </h2>
        <form action="{{route('register.store')}}" method="POST">
            @csrf
            <x-inputs.text id="name" name="name" placeholder="Full Name" />
            <x-inputs.text id="email" name="email" type="email" placeholder="E-mail" />
            <x-inputs.text id="password" name="password" type="password" placeholder="Password" />
            <x-inputs.text id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password" />

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded focus:outline-none">Register</button>
            <p class="mt-4 text-gray-400">
                Already have an account?
                <a class="text-blue-900 hover:underline" href="{{route('login')}}">Login here</a>
            </p>
        </form>
    </div>
</x-layout>