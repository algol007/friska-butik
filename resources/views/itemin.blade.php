@extends('layouts.dashboard', ['title' => 'Barang Masuk'])

@section('header')
    <header class="flex justify-between items-center py-4 px-6 bg-white">
        <div class="flex items-center">
            <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </button>

            <form action="/kategori/search" method="GET" class="relative mx-4 lg:mx-0">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </span>

                <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:outline-none" name="search" id="search" type="text"
                    placeholder="Search Kategori">
            </form>
        </div>

        <div class="flex items-center">    
            <div x-data="{ dropdownOpen: false }" class="relative">
                <button @click="dropdownOpen = ! dropdownOpen"
                    class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                    <img class="h-full w-full object-cover"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        alt="Your avatar">
                </button>

                <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                    style="display: none;"></div>

                <div x-show="dropdownOpen"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                    style="display: none;">
                    <div
                        class="cursor-pointer block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Barang Masuk</h3>

    @if (count($errors) > 0)
        <div class="text-red-500">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-8 flex flex-wrap justify-end items-center">
        <!-- <div class="flex items-center mb-4 md:mb-0">
            <div>Show</div>
            <select name="show" id="show" value="10" class="mx-2 border py-2 px-4 rounded">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            <div>Entries</div>
        </div> -->
        <div x-data="{ show: false }">
            <div class="flex justify-center">
                <button @click={show=true} type="button" class="bg-secondary py-2 px-4 rounded text-white flex items-center">
                    <div class="w-5 h-5 font-bold mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M12 4v16m8-8H4" />
                        </svg>            
                    </div>
                    Tambah Barang Masuk
                </button>
            </div>
            <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                    <form method="POST" action="/barang-masuk" class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                    @csrf
                        <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                        <div class="px-6 py-3 text-xl border-b font-bold text-gray-600">Tambah Barang Masuk</div>
                        <div class="p-6 flex-grow">
                            <div class="flex flex-col mb-4">
                                <label class="font-semibold text-gray-600 text-sm" for="tanggal_masuk">Tanggal</label>
                                <input class="rounded text-gray-600 text-sm border p-2" type="date" id="tanggal_masuk" name="tanggal_masuk" />
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="font-semibold text-gray-600 text-sm" for="id_kode_barang">Kode Barang</label>
                                <select name="id_kode_barang" id="id_kode_barang" class="rounded text-gray-600 text-sm border p-2">
                                    <option disabled selected>Pilih Kode Barang</option>
                                    @foreach ($kodebarang_list as $kodebarang)
                                    <option value="{{ $kodebarang->id }}">{{ $kodebarang->kode_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="font-semibold text-gray-600 text-sm" for="jumlah">Jumlah</label>
                                <input class="rounded text-gray-600 text-sm border p-2" type="number" id="jumlah" name="jumlah" />
                            </div>
                        </div>
                        <div class="px-6 py-3 border-t">
                            <div class="flex justify-end">
                                <button type="button" class="text-sm text-red-500 px-4 py-2" @click={show=false}>Batal</button>
                                <button type="submit" class="bg-secondary text-sm text-white rounded px-4 py-2" @click={show=false} onclick="addItemIn()">Simpan</button>
                            </div>
                        </div>
                    </form>
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
                                Tanggal</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Kode Barang</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Nama Barang</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Harga</th>
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($barangmasuk_list as $barangmasuk)
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $no++ ?? '' }}</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ substr($barangmasuk->tanggal_masuk, 0, 10) }}</td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $barangmasuk->kodebarang->kode_barang }}</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $barangmasuk->kodebarang->nama_barang }}</td>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                Rp {{ $barangmasuk->kodebarang->harga }} /pcs</td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $barangmasuk->jumlah }}</td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium flex justify-end">
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
                                                <form method="POST" action="/barang-masuk/{{ $barangmasuk->id }}" class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                @method('patch')
                                                @csrf
                                                    <input type="hidden" name="id" id="id" value="{{ $barangmasuk->id }}">
                                                    <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                                    <div class="text-left px-6 py-3 text-xl border-b font-bold text-gray-600">Edit Barang Masuk</div>
                                                    <div class="p-6 flex-grow">
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="tanggal_masuk">Tanggal</label>
                                                            <input class="rounded text-gray-600 text-sm border p-2" type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{$barangmasuk->tanggal_masuk}}" />
                                                        </div>
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="id_kode_barang">Kode Barang</label>
                                                            <select name="id_kode_barang" id="id_kode_barang" class="rounded text-gray-600 text-sm border p-2">
                                                                <option selected value="{{ $barangmasuk->kodebarang->id }}">{{ $barangmasuk->kodebarang->kode_barang }}</option>
                                                                @foreach ($kodebarang_list as $kodebarang)
                                                                    @if ($kodebarang->id != $barangmasuk->id_kodebarang)
                                                                        <option value="{{ $kodebarang->id }}">{{ $kodebarang->kode_barang }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="flex flex-col mb-4">
                                                            <label class="text-left font-semibold text-gray-600 text-sm" for="jumlah">Jumlah</label>
                                                            <input class="rounded text-gray-600 text-sm border p-2" type="number" id="jumlah" name="jumlah" value="{{$barangmasuk->jumlah}}" />
                                                        </div>
                                                    </div>
                                                    <div class="px-6 py-3 border-t">
                                                        <div class="flex justify-end">
                                                            <button type="button" class="text-sm text-red-500 px-4 py-2" @click={show=false}>Batal</button>
                                                            <button type="submit" class="bg-secondary text-sm text-white rounded px-4 py-2" @click={show=false} onclick="addItemIn()">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                        </div>
                                    </div>    
                                </div>
                                <form action="/barang-masuk/{{ $barangmasuk->id }}" method="POST" onclick="return confirm('Yakin ingin menghapus Barang Masuk ?')">
                                    @method('delete')
                                    @csrf              
                                    <button type="submit" class="h-6 w-6 bg-red-500 p-0.5 rounded text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4">
        {{ $barangmasuk_list->links() }}
    </div>


<script type="text/javascript">
    function addItemIn() {
        Swal.fire({
            icon: 'success',
            title: 'Barang masuk berhasil ditambahkan',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function editItemIn() {
        Swal.fire({
            icon: 'success',
            title: 'Barang masuk berhasil diupdate',
            showConfirmButton: false,
            timer: 1500
        })
    }

    function deleteItemIn() {
        Swal.fire({
            title: 'Hapus Barang masuk?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Barang masuk berhasil dihapus',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }
</script>

@endsection