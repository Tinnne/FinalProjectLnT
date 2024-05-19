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
                    <form action="{{ route('storeitem') }}" method="POST">
                        <h3>Tambahkan Item Baru</h3>
                        @csrf
                        <div class="mb-3">
                          <label class="form-label">Nama Produk</label>
                          <input name="name" type="string" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama produk">
                        </div>
                        {{-- <div class="mb-3">
                          <label class="form-label">Gambar Produk</label>
                          <input name="image" type="file" class="form-control" id="exampleInputEmail1" placeholder="Masukkan gambar produk">
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori Produk</label>
                          <select class="form-control" name="category">
                            <option selected>Pilih kategori</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Harga Produk</label>
                          <input name="price" type="int" class="form-control" id="exampleInputEmail1" placeholder="Masukkan harga produk">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Jumlah Produk</label>
                          <input name="amount" type="string" class="form-control" id="exampleInputEmail1" placeholder="Masukkan jumlah produk">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
