<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs active="Laporan Costumer" />
    </x-slot:breadcrumbs>
    <div class="container-fluid">
    </div>
    <div class="relative flex flex-col w-full h-full text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white rounded-none bg-clip-border">
            <div class="flex items-center justify-between gap-8 mb-8">
                <div>
                    <h5
                        class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                        Laporan Costumer list
                    </h5>
                    <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                        Informasi Laporan Costumer
                    </p>
                </div>
            </div>
        </div>
        <div class="p-0 px-0 overflow-scroll">
            <a href="{{ route('admin.costumer.print') }}" class="btn btn-secondary rounded-lg" style="margin-left:2%">Print</a>
            <table class="w-full mt-4 text-left table-auto min-w-max" id="example">
                <thead>
                    <tr>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Member
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                No Telphone
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                        <th class="p-4 transition-colors cursor-pointer border-y border-blue-gray-100 bg-blue-gray-50/50 hover:bg-blue-gray-50">
                            <p class="flex items-center justify-between gap-2 font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Gender
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9"></path>
                                </svg>
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($costumers as $cs)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $cs->imageUrl }}" alt="John Michael"
                                        class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                    <div class="flex flex-col">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $cs->name }}
                                        </p>
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                                            {{ $cs->email }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <div class="flex flex-col">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $cs->phone }}
                                    </p>
                                </div>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $cs->gender }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                Page {{ $costumers->currentPage() }} of {{ $costumers->lastPage() }}
            </p>
            <div class="flex gap-2">
                @if ($costumers->onFirstPage())
                    <button
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button" disabled>
                        Previous
                    </button>
                @else
                    <a href="{{ $costumers->previousPageUrl() }}"
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Previous
                    </a>
                @endif
        
                @if ($costumers->hasMorePages())
                    <a href="{{ $costumers->nextPageUrl() }}"
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Next
                    </a>
                @else
                    <button
                        class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                        type="button" disabled>
                        Next
                    </button>
                @endif
            </div>
        </div>
    </div>

</x-admin-layouts>
