{{-- @include('layout.header') --}}
@extends('welcome.welcome')
{{-- head start --}}
@section('content')
    <div class="container">
        <div class="page-header">
            <div>
                <!-- Title -->
                <h1 class="text-3xl font-bold text-white">
                    Category Product
                </h1>

                <p class="text-blue-100 mt-2 text-sm">
                    Category Product Perusahaan
                </p>
            </div>

            <!-- Buttons -->
            <div class="action-group">
                <button command="show-modal" commandfor="dialog" class="btn-add">
                    Add Category Product
                </button>
            </div>
        </div>
        {{-- head end --}}

        {{-- body start --}}
        <div class="employee-card">

            @if (session('success'))
                <div class="mb-6 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mx-auto max-w-7xl">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">

                    @forelse($category as $item)
                        <div
                            class="group relative overflow-hidden rounded-2xl bg-white shadow-md hover:shadow-xl transition duration-300">

                            {{-- IMAGE --}}
                            <div class="overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1200"
                                    alt="{{ $item->name }}"
                                    class="h-56 w-full object-cover group-hover:scale-105 transition duration-500">
                            </div>

                            {{-- CONTENT --}}
                            <div class="p-5">

                                <h3 class="text-lg font-bold text-gray-900">
                                    {{ $item->name }}
                                </h3>

                                <p class="mt-2 text-sm text-gray-500">
                                    Product Category
                                </p>

                                <div class="mt-5 flex items-center justify-between">

                                    <span
                                        class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                        Category
                                    </span>

                                    @can('delete category_product')
                                        <form action="{{ route('category_product.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg bg-red-500 px-4 py-2 text-sm font-semibold text-white hover:bg-red-600 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    @endcan

                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="col-span-full">
                            <div class="rounded-2xl border-2 border-dashed border-gray-300 bg-white p-12 text-center">
                                <p class="text-gray-500">
                                    No category product available.
                                </p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="py-12">
        {{-- ADD CATEGORY PRODUCT APPROVAL MODAL --}}
        <el-dialog>
            <dialog id="dialog" aria-labelledby="dialog-title"
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">

                {{-- BACKDROP --}}
                <el-dialog-backdrop class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity duration-300">
                </el-dialog-backdrop>

                {{-- MODAL WRAPPER --}}
                <div tabindex="0" class="flex min-h-full items-center justify-center p-4 focus:outline-none">

                    {{-- MODAL PANEL --}}
                    <el-dialog-panel
                        class="relative w-full max-w-2xl overflow-hidden rounded-3xl bg-white shadow-2xl transition-all">

                        {{-- HEADER --}}
                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 id="dialog-title" class="text-2xl font-bold text-white">
                                        Add Category Product
                                    </h3>

                                    <p class="mt-1 text-sm text-blue-100">
                                        Tambahkan category_product approval baru
                                    </p>

                                </div>

                                {{-- CLOSE --}}
                                <button type="button" command="close" commandfor="dialog"
                                    class="rounded-xl bg-white/20 p-2 text-white hover:bg-white/30 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- FORM --}}
                        <form id="add-category-form" action="{{ route('category_product.store') }}" method="POST">
                            @csrf
                            <div class="px-8 py-6 space-y-6">

                                {{-- GRID --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                    {{-- Category Name Product --}}
                                    <div class="md:col-span-2">
                                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                            Category Name
                                        </label>

                                        <input type="text" name="name" id="category_product_id"
                                            value="{{ old('name') }}" placeholder="Masukkan Nama Kategori"
                                            class="w-full rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 text-gray-800 shadow-sm
                   focus:border-blue-500 focus:ring-blue-500 focus:outline-none transition">

                                        @error('name')
                                            <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                {{-- FOOTER --}}
                                <div class="flex items-center justify-end gap-3 border-t bg-gray-50 px-8 py-5">

                                    {{-- CANCEL --}}
                                    <button type="button" command="close" commandfor="dialog"
                                        class="rounded-xl bg-white px-5 py-2.5 text-sm font-medium text-gray-700 border border-gray-300 hover:bg-gray-100 transition">
                                        Cancel
                                    </button>

                                    {{-- SUBMIT --}}
                                    <button type="submit"
                                        class="rounded-xl bg-blue-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:bg-blue-700 transition">
                                        Save
                                    </button>
                                </div>
                        </form>

                    </el-dialog-panel>

                </div>

            </dialog>

        </el-dialog>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // MODAL
            const dialog = document.getElementById('dialog');

            // OPEN MODAL
            $('[command="show-modal"]').on('click', function() {
                dialog.showModal();
            });

            // CLOSE MODAL
            $('[command="close"]').on('click', function() {
                dialog.close();
            });

            // FORM SUBMIT
            $('#add-category-form').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: {{ route('category_product.store') }},
                    method: "POST",
                    data: $(this).serialize(),

                    success: function(response) {

                        alert('✅ Category product berhasil disimpan');

                        console.log(response);

                        // RESET FORM
                        $('#add-category-form')[0].reset();

                        // CLOSE MODAL
                        dialog.close();

                        // OPTIONAL RELOAD
                        location.reload();

                        /*
                        kalau tidak mau reload,
                        append row ke table pakai JS
                        */
                    },

                    error: function(xhr) {

                        console.log(xhr);

                        // VALIDATION ERROR
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorMessage = '';
                            $.each(errors, function(key, value) {
                                errorMessage += '• ' + value[0] + '\n';
                            });
                            alert(errorMessage);

                        } else {
                            alert('❌ Terjadi kesalahan server');
                        }
                    }
                });
            });

        });
    </script>
@endpush


{{-- @include('layout.footer') --}}
