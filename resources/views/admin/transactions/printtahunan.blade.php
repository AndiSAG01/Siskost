<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Sewa Kost Tahunan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            .print\:block {
                display: block !important;
            }
            .print\:hidden {
                display: none !important;
            }
            .table-auto th, .table-auto td {
                page-break-inside: avoid;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="container py-2">
        <h2 class="uppercase text-center font-semibold">Laporan Sewa Kost Tahunan</h2>
    </div>
    <div class="container-fluid mt-5">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Name</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Telphone</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Jenis Kelamin</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Harga Sewa Kost</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Tanggal mulai</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Tanggal selesai sewa</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Tertulis</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Biaya sewa</th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sewa as $item)
                    <tr>
                        <td class="p-4 border-b border-blue-gray-50">{{ $item->name }}</td>
                        <td class="p-4 border-b border-blue-gray-50">{{ $item->phone }}</td>
                        <td class="p-4 border-b border-blue-gray-50">{{ $item->gender }}</td>
                        <td class="p-4 border-b border-blue-gray-50">Rp.{{ number_format($item->kost->price_years, 2) }}</td>
                        <td class="p-4 border-b border-blue-gray-50">{{ $item->star_date }}</td>
                        <td class="p-4 border-b border-blue-gray-50">{{ $item->end_date }}</td>
                        <td class="p-4 border-b border-blue-gray-50">{{ $item->TotalJumlahSewa }} Tahun</td>
                        <td class="p-4 border-b border-blue-gray-50">Rp.{{ number_format($item->nominal, 2) }}</td>
                        <td class="p-4 border-b border-blue-gray-50">
                            @if ($item->image)
                                <img src="{{ Storage::url($item->image) }}" class="rounded w-40 print:w-auto" alt="">
                            @else
                                <button class="mt-2 select-none rounded-lg bg-red-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none print:hidden">
                                    Belum bayar
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
