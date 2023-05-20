@extends('layouts.main')

@section('container')
    <div class="p-4">
        <h1 class="text-3xl font-bold">Managemen Collection</h1>
    </div>
    <div class="w-full h-[90%] rounded-2xl bg-white drop-shadow-xl flex flex-col">
        <div class="flex justify-between p-4">
            <h1 id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="w-max text-lg text-black focus:ring-4 focus:outline-none  font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center "
                type="button">Managemen Collection <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg></h1>
            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Modal toggle -->
        <button data-modal-target="small-modal" data-modal-toggle="small-modal"
            class="block w-full md:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Small modal
        </button>
    </div>
    <div id="small-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-[25px] shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex flex-col gap-2 p-5 border-b dark:border-gray-600">
                    <div class="flex justify-between">
                        <h2 class="text-xl font-bold">Menambahkah Collection</h2>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-[25px] text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="small-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <p class="text-sm">Menambahkah collection untuk menu pemesanan.</p>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6 overflow-y-auto max-h-[250px]">
                    <form action="/insertdata " method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="name" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">Collection
                            name
                            <input class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md"
                                type="text" placeholder="" name="name" />
                        </label>
                        <label for="price" class="text-[#3AB86D] flex flex-col gap-4 font-bold text-sm">
                            Harga
                            <input class="w-full px-4 py-2 mb-4 font-normal text-black border border-gray-300 rounded-md"
                                type="number" placeholder="" name="price" />
                        </label>
                        <label class="text-[#3AB86D] flex flex-col gap-4 mb-2 text-sm font-bold dark:text-white" for="image">Image
                            <input
                                class="w-full mb-5 text-xs file:bg-[#3AB86D] text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-[#3AB86D] dark:border-[#3AB86D] dark:placeholder-[#3AB86D]"
                                name="image" type="file">
                        </label>
                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="small-modal" type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                        accept</button>
                    <button data-modal-hide="small-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div id="alert-1"
            class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="flex items-center">
                <div id="alert-1"
                    class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">

                    <span class="sr-only">Info</span>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span class="font-medium text-green-500">Data berhasil ditambahkan.</span>
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        </div>
    @endif
@endsection
