@extends('layouts.dashboard')

@section('content')
<h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
    
    <div class="mt-4">
        <div class="flex flex-wrap -mx-6">
            <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                <a href="/barang-masuk" class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-indigo-600 bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $jumlah_barangmasuk }}</h4>
                        <div class="text-gray-500">Barang Masuk</div>
                    </div>
                </a>
            </div>

            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                <a href="/barang-keluar" class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-red-600 bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $jumlah_barangkeluar }}</h4>
                        <div class="text-gray-500">Barang Keluar</div>
                    </div>
                </a>
            </div>

            <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                <a href="/stok-barang" class="flex items-center px-5 py-6 shadow-sm rounded-md bg-white">
                    <div class="p-3 rounded-full bg-pink-600 bg-opacity-75">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                    </svg>
                    </div>
                    <div class="mx-5">
                        <h4 class="text-2xl font-semibold text-gray-700">{{ $jumlah_barangmasuk - $jumlah_barangkeluar}}</h4>
                        <div class="text-gray-500">Jumlah Stok</div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection