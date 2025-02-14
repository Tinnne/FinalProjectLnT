<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Item Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ $item->name }}</h1>
                    <br>
                    <h6>Rp.{{ number_format($item->price, 2, ',', '.') }}</h6>
                    <h6>Category:{{ $item->category }}</h6>
                    <h6>Amount:{{ $item->amount }}</h6>
                    <div style="display: flex; gap: 10px;">
                        <a href="/item/{{ $item->slug }}/edit"><button type="button" class="btn btn-primary">Edit</button></a>
                        <form action="{{ route('deleteitem', $item->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
