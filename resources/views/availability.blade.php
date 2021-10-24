@extends('layouts.dashboard', ['title' => 'Stok Barang'])

@section('header')
    <header class="flex justify-between items-center py-4 px-6 bg-white">
        <div class="flex items-center">
            <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </button>

            <form action="/stok-barang/search" method="GET" class="relative mx-4 lg:mx-0">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </span>

                <input class="form-input w-32 sm:w-64 rounded-md pl-10 pr-4 focus:outline-none" name="search" id="search" type="text"
                    placeholder="Cari Stok Barang">
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
    <h3 class="text-gray-700 text-3xl font-medium">Stok Barang</h3>
    
    <div class="mt-8 flex justify-end items-center">
        <!-- <div class="flex items-center">
            <div>Show</div>
            <select name="show" id="show" value="10" class="mx-2 border py-2 px-4 rounded">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
            </select>
            <div>Entries</div>
        </div> -->
        <a href="/stok-barang/cetak_pdf" target="_blank" class="bg-secondary py-2 px-4 rounded text-white flex items-center">
            <div class="w-5 h-5 font-bold mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>            
            </div>
            Export PDF
        </a>
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
                            <th
                                class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Jumlah Stok</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @php $i=1 @endphp
                        @foreach ($kodebarang_list as $kodebarang)
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $i++ }}
                            </td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $kodebarang->kode_barang }}</td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $kodebarang->nama_barang }}</td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                {{ $kodebarang->kategori->nama_kategori }}</td>

                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                Rp {{ $kodebarang->harga }}</td>
                                
                            <td
                                class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                @php $totalmasuk=0; $totalkeluar=0; @endphp
                                @foreach ($barangmasuk as $bm)
                                    @if($kodebarang->kode_barang == $bm->kodebarang->kode_barang)
                                        <div class="hidden">{{ $totalmasuk += $bm->jumlah }}</div>
                                    @endif
                                @endforeach
                                @foreach ($barangkeluar as $bk)
                                    @if($kodebarang->kode_barang == $bk->kodebarang->kode_barang)
                                        <div class="hidden">{{ $totalkeluar += $bk->jumlah }}</div>
                                    @endif
                                @endforeach
                                <div>{{ $totalmasuk - $totalkeluar }}</div>
                            </td>

                            <td
                                class="flex border-b justify-end px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                <div x-data="{ show: false }">
                                    <div class="flex justify-center">
                                        <div class="h-6 w-6 cursor-pointer" @click={show=true}>
                                            <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>                           
                                        </div>
                                    </div>
                                    <div x-show="show" tabindex="0" class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed">
                                            <div  @click.away="show = false" class="z-50 relative p-3 mx-auto my-0 max-w-full" style="width: 600px;">
                                            <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                            
                                            <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                            <div class="text-left px-6 py-3 text-xl border-b font-bold text-gray-600">{{$kodebarang->nama_barang ?? 'Tidak Ada Gambar'}} - Rp {{$kodebarang->harga ?? '0'}}</div>
                                            <div class="px-6 py-3 border-t">
                                                <div class="flex flex-col justify-end">
                                                    @if ($kodebarang->foto)
                                                        <img src="/img/{{$kodebarang->foto}}" alt="stok-barang{{$kodebarang->id}}">
                                                    @else
                                                        <div class="h-40 flex justify-center items-center">Tidak Ada Gambar</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        </div>
                                            <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                        </div>
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
@endsection