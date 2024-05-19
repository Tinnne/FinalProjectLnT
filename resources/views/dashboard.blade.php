<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script src="https://unpkg.com/feather-icons"></script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3>List Barang</h3>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Pengaturan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->category }}</td>
                                <td>Rp.{{ number_format($item->price, 2, ',', '.') }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>
                                    <div style="display: flex; gap: 10px; align-items: center;">
                                        <a class="link-dark" href="/item/{{ $item->slug }}"><i data-feather="search"></i></a>
                                        <a class="link-dark" href="{{ route('editcategory', ['slug' => $category->slug, 'page' => $categories->currentPage()]) }}"><i data-feather="edit"></i></a>
                                        <form action="{{ route('deleteitem', $item->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link link-dark p-0 m-0 align-baseline"><i data-feather="trash-2"></i></button>
                                        </form>
                                        {{-- <a class="link-dark" href="/item/{{ $item->slug }}/delete"><i data-feather="trash-2"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $items->links() }}

                    <a class="btn btn-primary" href="{{ route('createitem') }}">Tambahkan</a>
                </div>
            </div>
        </div>
    </div>
    <script>
      feather.replace();
    </script>
</x-app-layout>
