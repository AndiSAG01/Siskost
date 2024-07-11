<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs active="Transaction / Laporan Tahunan" />
    </x-slot:breadcrumbs>
    <div class="w-2/3 py-10" style="margin-left: 200px">
        <div class="relative right-0">
            <ul class="relative flex flex-wrap p-1 list-none rounded-xl bg-blue-gray-50/60" data-tabs="tabs"
                role="list">
                <li class="z-30 flex-auto text-center">
                    <a href="{{ route('pageslaporanbulanan') }}"
                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit {{ request()->routeIs('pageslaporanbulanan') ? 'active' : '' }}"
                        data-tab-target="" role="tab" aria-selected="{{ request()->routeIs('pageslaporanbulanan') ? 'true' : 'false' }}">
                       <i class="fas fa-house-user" style="color: black"></i>
                        <span class="ml-1 text-black">Laporan Kost Bulanan</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a href="{{ route('pageslaporantahunan') }}"
                        class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg cursor-pointer text-slate-700 bg-inherit {{ request()->routeIs('pageslaporantahunan') ? 'active' : '' }}"
                        data-tab-target="" role="tab" aria-selected="{{ request()->routeIs('pageslaporantahunan') ? 'true' : 'false' }}">
                        <i class="fas fa-house-user"></i>
                        <span class="ml-1">Laporan Kost Tahunan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="container py-4">
        <a href="{{ route('print.tahunan') }}" class="btn btn-secondary rounded mb-4">Print</a>
        <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Name
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Telphone
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Jenis Kelamin
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Harga Sewa Kost
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Tanggal mulai
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                tanggal selesai sewa
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Tertulis
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Biaya sewa
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Bukti Pembayaran
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Status
                            </p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sewa as $item)
                        <tr>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $item->name }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $item->phone }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $item->gender }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    Rp.{{ number_format($item->kost->price_years, 2) }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $item->star_date }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $item->end_date }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    {{ $item->TotalJumlahSewa }} Tahun
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    Rp.{{ number_format($item->nominal, 2) }}
                                </p>
                            </td>
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    @if ($item->image)
                                        <img src="{{ Storage::url($item->image) }}" class="rounded w-40" alt="">
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
                            <td class="p-4 border-b border-blue-gray-50">
                                <p
                                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    @if ($item->status == 'Menunggu Konfirmasi')
                                        <button
                                            class="mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            {{ $item->status }}
                                        </button>
                                    @elseif ($item->status == 'Selesai')
                                        <button
                                            class="mt-2 select-none rounded-lg bg-yellow-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Sewa Selesai
                                        </button>
                                    @elseif ($monthRemaining <= 1 && $monthRemaining >= 0)
                                        <button
                                            class="mt-2 select-none rounded-lg bg-danger py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Waktu Masa Sewa Akan Habis
                                        </button>
                                    @elseif ($item->status == 'Konfirmasi')
                                        <button
                                            class="mt-2 select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Sedang Di Sewa
                                        </button>
                                    @else
                                        <button
                                            class="mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            BELUM DI SEWA
                                        </button>
                                    @endif
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layouts>
