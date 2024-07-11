@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container py-20">
            <div class="w-2/3 py-10" style="margin-left: 200px">
                <div class="relative right-0">
                    <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60" data-tabs="tabs"
                        role="list">
                        <li class="z-30 flex-auto text-center">
                            <a href="{{ route('transaksi') }}"
                                class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit {{ request()->routeIs('transaksi') ? 'active-tabs' : '' }}"
                                data-tab-target="" role="tab"
                                aria-selected="{{ request()->routeIs('transaksi') ? 'true' : 'false' }}">
                                <i class="fas fa-house-user"></i>
                                <span class="ml-1">Bulanan</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a href="{{ route('transaksi_tahunan') }}"
                                class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit {{ request()->routeIs('transaksi_tahunan') ? 'active-tabs' : '' }}"
                                data-tab-target="" role="tab"
                                aria-selected="{{ request()->routeIs('transaksi_tahunan') ? 'true' : 'false' }}">
                                <i class="fas fa-house-user"></i>
                                <span class="ml-1">Tahunan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="container">
            <h1
                class="text-center block font-sans text-5xl antialiased font-semibold leading-tight tracking-normal text-transparent bg-gradient-to-tr from-blue-600 to-blue-400 bg-clip-text">
                TRANSAKSI PEMBAYARAN
            </h1>
            <div
                class="relative flex flex-col w-full h-full overflow-scroll text-white bg-green-100 shadow-md bg-clip-border rounded-xl">
                <table class="w-full text-left table-auto min-w-max">
                    <thead>
                        <tr class="uppercase">
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    No
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Name
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Telphone
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Jenis Kelamin
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Harga Sewa Kost
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Tanggal Mulai Sewa
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Tanggal Selesai Sewa
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Tertulis
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Biaya Sewa
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Bukti Pembayaran
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Status
                                </p>
                            </th>
                            <th class="p-4 border-b border-blue-gray-100 bg-blue-700 text-center">
                                <p class="block font-sans text-sm antialiased font-bold leading-none text-white opacity-70">
                                    Action
                                </p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sewa as $no => $item)
                            <tr class="even:bg-blue-gray-50/50 uppercase">
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ ++$no }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $item->name }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $item->phone }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $item->gender }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        Rp.{{ number_format($item->kost->price_years, 2) }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $item->star_date }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $item->end_date }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        {{ $item->TotalJumlahSewa }} Tahun
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        Rp.{{ number_format($item->nominal, 2) }}
                                    </p>
                                </td>
                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        @if ($item->image)
                                            <img src="{{ Storage::url($item->image) }}" class="rounded w-40"
                                                alt="">
                                        @else
                                            <button
                                                class="mt-2 select-none rounded-lg bg-red-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                Belum bayar
                                            </button>
                                        @endif
                                    </p>
                                </td>
                                @php
                                    $endDate = Carbon\Carbon::parse($item->end_date);
                                    $currentDate = Carbon\Carbon::now();
                                    $monthRemaining = $endDate->diffInMonths($currentDate, false);
                                @endphp

                                <td class="p-4">
                                    @if ($item->status == 'Selesai')
                                        <button
                                            class="mt-2 select-none rounded-lg bg-warning py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Sewa Selesai
                                        </button>
                                    @elseif ($item->status == 'Konfirmasi')
                                        <button
                                            class="mt-2 select-none rounded-lg bg-success py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Sedang Di Sewa
                                        </button>
                                    @elseif ($monthRemaining <= 1 && $monthRemaining >= 0)
                                        <button
                                            class="mt-2 select-none rounded-lg bg-danger py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Waktu Masa Sewa Anda Akan Habis
                                        </button>
                                    @else
                                        <button
                                            class="mt-2 select-none rounded-lg bg-warning py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Belum Di Sewa
                                        </button>
                                    @endif
                                </td>

                                <td class="p-4">
                                    <p
                                        class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                        @if ($item->status == 'Selesai')
                                            <button
                                                class="mt-2 select-none rounded-lg bg-warning py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                Selesai
                                            </button>
                                        @elseif ($item->status == 'Menunggu Konfirmasi')
                                            <button
                                                class="mt-2 select-none rounded-lg bg-info py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                Menunggu Konfrimasi
                                            </button>
                                        @elseif ($monthRemaining <= 1 && $monthRemaining >= 0)
                                            <a href="{{ route('edit.pertahun', $item->id) }}">
                                                <button
                                                    class="mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                    Lanjutkan Sewa
                                                </button>
                                            </a>
                                            <form action="{{ route('endTransactionTahunan', $item->id) }}" method="POST">
                                                @csrf
                                                @method('put')
                                                <button
                                                    class="mt-2 select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                    Selesai
                                                </button>
                                            </form>
                                        @elseif ($item->status == 'Konfirmasi')
                                            <button
                                                class="mt-2 select-none rounded-lg bg-success py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                Telah Di Konfrimasi
                                            </button>
                                        @else
                                            <a href="{{ route('pages.payment', $item->id) }}">
                                                <button
                                                    class="mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                                    Pembayaran
                                                </button>
                                            </a>
                                            <button type="button"
                                                class="mt-2 select-none rounded-lg bg-red-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                                Batal
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Apakah Anda
                                                                Ingin
                                                                Menghapusnya</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('deleteTransaction', $item->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('delete')
                                                                <div class="d-flex justify-content-end">
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger me-2 bg-danger text-white"
                                                                        data-bs-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success bg-success">Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </p>
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>

            </div>
        </div>
    </div>



    <!-- from node_modules -->
    <script src="node_modules/@material-tailwind/html@latest/scripts/dialog.js"></script>

    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
@endsection
