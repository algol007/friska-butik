@extends('layouts.dashboard')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">User Management</h3>
    
    <div class="w-full lg:w-1/2 md:w-2/3">

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
                                    Username</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    1</td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    Admin1</td>

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
                                                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                        <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                                        <div class="text-left px-6 py-3 text-xl border-b font-bold text-gray-600">Edit User</div>
                                                        <div class="p-6 flex-grow">
                                                            <div class="flex flex-col mb-4">
                                                                <label class="text-left font-semibold text-gray-600 text-sm" for="username">Username</label>
                                                                <input class="rounded text-gray-600 text-sm border p-2" type="text" id="username" name="username" />
                                                            </div>
                                                        </div>
                                                        <div class="px-6 py-3 border-t">
                                                            <div class="flex justify-end">
                                                                <button type="button" class="text-sm text-red-500 px-4 py-2" @click={show=false}>Batal</button>
                                                                <button type="button" class="bg-secondary text-sm text-white rounded px-4 py-2" @click={show=false} onclick="editUser()">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                            </div>
                                        </div>    
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    2</td>

                                <td
                                    class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                                    Admin2</td>

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
                                                    <div class="bg-white rounded shadow-lg border flex flex-col overflow-hidden">
                                                        <button @click={show=false} class="fill-current h-6 w-6 absolute right-0 top-0 m-6 font-3xl font-bold">&times;</button>
                                                        <div class="text-left px-6 py-3 text-xl border-b font-bold text-gray-600">Edit User</div>
                                                        <div class="p-6 flex-grow">
                                                            <div class="flex flex-col mb-4">
                                                                <label class="text-left font-semibold text-gray-600 text-sm" for="username">Username</label>
                                                                <input class="rounded text-gray-600 text-sm border p-2" type="text" id="username" name="username" />
                                                            </div>
                                                        </div>
                                                        <div class="px-6 py-3 border-t">
                                                            <div class="flex justify-end">
                                                                <button type="button" class="text-sm text-red-500 px-4 py-2" @click={show=false}>Batal</button>
                                                                <button type="button" class="bg-secondary text-sm text-white rounded px-4 py-2" @click={show=false} onclick="editUser()">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="z-40 overflow-auto left-0 top-0 bottom-0 right-0 w-full h-full fixed bg-black opacity-50"></div>
                                            </div>
                                        </div>    
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function editUser() {
            Swal.fire({
                icon: 'success',
                title: 'User berhasil diupdate',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>

@endsection