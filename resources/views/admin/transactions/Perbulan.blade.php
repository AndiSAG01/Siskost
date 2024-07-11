<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs active="Transaction / Perbulan" />
    </x-slot:breadcrumbs>
    <div class="container">
       <x-tabs></x-tabs>
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
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Action
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
                                    Rp.{{ number_format($item->kost->price_month, 2) }}
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
                                    {{ $item->TotalJumlahSewa }} Bulan
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
                                $daysRemaining = $endDate->diffInDays($currentDate, false);
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
                                    @elseif ($daysRemaining <= 4 && $daysRemaining >= 0)
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
                            <td class="p-4 border-b border-blue-gray-50">
                                @if ($item->status == 'Menunggu Konfirmasi')
                                    <form action="{{ route('konfirmasi.bulanan', $item->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <button
                                            class="mt-2 select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Konfirmasi
                                        </button>
                                    </form>
                                @elseif ($item->status == 'Konfirmasi')
                                    <button
                                        class="mt-2 select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                        Konfirmasi Selesai
                                    </button>
                                @elseif ($item->status == 'Selesai')
                                    <button
                                        class="mt-2 select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                        Selesai
                                    </button>
                                @else
                                    <button
                                        class="mt-2 select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                        Menunggu Proses Di Bayar
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-admin-layouts>
