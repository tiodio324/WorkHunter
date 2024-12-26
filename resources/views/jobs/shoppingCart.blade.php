<x-layout>
    <h2 class="text-3xl text-center mb-4 font-bold border border-gray-300 p-3">Shopping Cart</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
        @forelse ($shoppingCarts as $shoppingCart)
            <x-job-card :job="$shoppingCart" />
        @empty
            <p class="text-gray-500 text-center col-span-full text-xl mt-4">Cart is empty</p>
        @endforelse
    </div>

    {{$shoppingCarts->links()}}
</x-layout>