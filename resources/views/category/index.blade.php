<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>
    <script src="https://unpkg.com/feather-icons"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        @php
                            $startCount = ($categories->currentPage() - 1) * $categories->perPage() + 1;
                        @endphp
                    <h3>List Kategori</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Deskripsi Kategori</th>
                                <th scope="col">Lain-lain</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Problem, kalau yang mau diedit di page 2, di category/edit yang kebuka page 1 --}}
                            @foreach ($categories as $category)
                                @if (isset($categoryedit) && $category->id == $categoryedit->id)
                                <form action="{{ route('updatecategory', $category->slug) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <th scope="row">{{ $startCount++ }}</th>
                                        <td>
                                            {{-- <label class="form-label">Nama Kategori</label> --}}
                                            <input name="category" type="text" class="form-control" placeholder="Masukkan nama kategori" value="{{ $category->category }}">
                                        </td>
                                        <td>
                                            {{-- <label class="form-label">Deskripsi Kategori</label> --}}
                                            <input name="description" type="text" class="form-control" placeholder="Masukkan deskripsi kategori" value="{{ $category->description }}">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </td>
                                    </tr>
                                </form>
                                @else
                                    <tr>
                                        <th scope="row">{{ $startCount++ }}</th>
                                        <td>{{ $category->category }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <div style="display: flex; gap: 10px; align-items: center;">
                                                <a class="link-dark" href="{{ route('editcategory', $category->slug) }}"><i data-feather="edit"></i></a>
                                                <form action="{{ route('deletecategory', $category->slug) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-link link-dark p-0 m-0 align-baseline"><i data-feather="trash-2"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                    <br>
                    <form action="{{ route('storecategory') }}" method="POST">
                        <h3>Kategori Baru</h3>
                        @csrf
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="form-label">Nama Kategori</label>
                                        <input name="category" type="string" class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama kategori">
                                    </td>
                                    <td>
                                        <label class="form-label">Deskripsi Kategori</label>
                                        <input name="description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan deskripsi kategori">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                    {{-- <a class="btn btn-primary" href="{{ route('createcategory') }}">New Category</a> --}}
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        feather.replace();
    </script>
</x-app-layout>
