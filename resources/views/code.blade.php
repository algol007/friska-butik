@extends('layouts.dashboard')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Kode Barang</h3>
    
    <div class="w-full">    
        <div class="mt-8 flex flex-wrap justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                <div>Show</div>
                <select name="show" id="show" value="10" class="mx-2 border py-2 px-4 rounded">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
                <div>Entries</div>
            </div>
            <div x-data="{ show: false }">
                <div class="flex justify-center">
                    <button @click={show=true} type="button" class="bg-secondary py-2 px-4 rounded text-white flex items-center">
                        <div class="w-5 h-5 font-bold mr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4v16m8-8H4" />
                            </svg>            
                        </div>
                        Tambah Kode Barang
                    </button>
                </div>
                <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                    <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                        <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                            <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                            <div class="px-6 py-3 text-xl border-b font-bold text-gray-600">Tambah Kode Barang</div>
                            <div class="p-6 flex-grow">
                                <div class="flex flex-col mb-4">
                                    <label class="font-semibold text-gray-600 text-sm" for="code">Kode Barang</label>
                                    <input class="rounded text-gray-600 text-sm border p-2" type="text" id="code" name="code" />
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="font-semibold text-gray-600 text-sm" for="name">Nama Barang</label>
                                    <input class="rounded text-gray-600 text-sm border p-2" type="text" id="name" name="name" />
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="font-semibold text-gray-600 text-sm" for="code">Kategori</label>
                                    <select name="code" id="code" class="rounded text-gray-600 text-sm border p-2">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="BJU">BJU</option>
                                    </select>
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="font-semibold text-gray-600 text-sm" for="price">Harga</label>
                                    <input class="rounded text-gray-600 text-sm border p-2" type="text" id="price" name="price" />
                                </div>
                                <div class="flex flex-col mb-4">
                                    <label class="font-semibold text-gray-600 text-sm" for="image">Gambar</label>
                                    <input class="rounded text-gray-600 text-sm border p-2" type="file" id="image" name="image" />
                                </div>
                            </div>
                            <div class="px-6 py-3 border-t">
                                <div class="flex justify-end">
                                    <button type="button" class="text-sm text-red-500 px-4 py-2" @click={show=false}>Batal</button>
                                    <button type="button" class="bg-secondary text-sm text-white rounded px-4 py-2" @click={show=false} onclick="addCode()">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                </div>
            </div>    
        </div>

        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Kode Barang</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Barang</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori</th>
                                <th
                                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Harga</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($kodebarang_list as $kodebarang)
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $no++ ?? '' }}</td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $kodebarang->kode_barang }}</td>
                                    
                                    <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $kodebarang->nama_barang }}</td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    {{ $kodebarang->id_kategori }}</td>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    Rp {{ $kodebarang->harga }}</td>
                                <td
                                    class="flex justify-end px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <div>
                                        <div x-data="{ show: false }">
                                            <div class="flex justify-center">
                                                <div class="h-6 w-6 mr-2 bg-blue-500 p-0.5 rounded text-white" @click={show=true}>
                                                    <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                                                <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                    <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                                    <div class="text-left px-6 py-3 text-xl border-b font-bold text-gray-600">Edit Kode Barang</div>
                                                    <div class="p-6 flex-grow">
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="code">Kode Barang</label>
                                                            <input class="rounded text-gray-600 text-sm border p-2" type="text" id="code" name="code" />
                                                        </div>
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="name">Nama Barang</label>
                                                            <input class="rounded text-gray-600 text-sm border p-2" type="text" id="name" name="name" />
                                                        </div>
                                                        <div class="flex flex-col mb-4">
                                                            <label class="font-semibold text-gray-600 text-sm" for="code">Kategori</label>
                                                            <select name="code" id="code" class="rounded text-gray-600 text-sm border p-2">
                                                                <option disabled selected>Pilih Kategori</option>
                                                                <option value="BJU">BJU</option>
                                                            </select>
                                                        </div>
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="price">Harga</label>
                                                            <input class="rounded text-gray-600 text-sm border p-2" type="text" id="price" name="price" />
                                                        </div>
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="image">Gambar</label>
                                                            <input class="rounded text-gray-600 text-sm border p-2" type="file" id="image" name="image" />
                                                        </div>
                                                    </div>
                                                    <div class="px-6 py-3 border-t">
                                                        <div class="flex justify-end">
                                                            <button type="button" class="text-sm text-red-500 px-4 py-2" @click={show=false}>Batal</button>
                                                            <button type="button" class="bg-secondary text-sm text-white rounded px-4 py-2" @click={show=false} onclick="editCode()">Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                        </div>
                                        </div>    

                                    </div>
                                    <div class="h-6 w-6 bg-red-500 p-0.5 rounded text-white" onclick="deleteCode()">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4">
            {{ $kodebarang_list->links() }}
        </div>
    </div>

<script type="text/javascript">
    function addCode() {
        Swal.fire({
            icon: 'success',
            title: 'Kode Barang berhasil ditambahkan',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function editCode() {
        Swal.fire({
            icon: 'success',
            title: 'Kode Barang berhasil diupdate',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function deleteCode() {
        Swal.fire({
            title: 'Hapus Kode Barang?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Kode Barang berhasil dihapus',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }
</script>

@endsection