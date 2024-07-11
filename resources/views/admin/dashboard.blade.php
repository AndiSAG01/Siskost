<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs active="" />
    </x-slot:breadcrumbs>
    <div class="py-4">
        <div class="card text-center rounded-lg mb-4" style="width: 40%; margin-left:30%;">
            <div class="card-body">
                <h2 class=" font-serif">Sewa Kost Pebulan</h2>
            </div>
        </div>
        @if ($sewa->isEmpty())
        <div class="text-center">
            <span class=" font-serif text-danger">Belum Ada Sewa Kost Pertahun</span>
        </div>
        @else
        @foreach ($sewa as $sw)
        <div
            class="relative mb-4 flex max-w-[24rem] flex-col overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
            <div
                class="relative m-0 overflow-hidden text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                <img src="{{ $sw->kost->imageUrl }}" alt="ui/ux review check" />
            </div>

            <div class="p-6">
                <h4
                    class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                    {{ $sw->kost->room }}
                </h4>
            </div>
            <div class="flex items-center justify-between p-6">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="flex items-center -space-x-3">
                            <img alt="natali craig" src="{{ $sw->user->imageUrl }}"
                                class="relative inline-block h-9 w-9 !rounded-full  border-2 border-white object-cover object-center hover:z-10" />
                            <p class="font-serif " style="margin-left:1%">
                                {{ $sw->name }}
                            </p>
                            @php
                                $endDate = Carbon\Carbon::parse($sw->end_date);
                                $currentDate = Carbon\Carbon::now();
                                $daysRemaining = $endDate->diffInDays($currentDate, false);
                            @endphp
                        </div>
                        <p>
                            @if ($daysRemaining <= 4 && $daysRemaining >= 0)
                                <button
                                    class="mt-2 select-none rounded-lg bg-danger py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                    Waktu Masa Sewa Akan Habis
                                </button>
                            @else
                                <button
                                    class="mt-2 select-none rounded-lg bg-success py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                    Sedang Di Sewa
                                </button>
                            @endif
                        </p>

                    </div>
                    <div class="col-lg-6">
                        <p class="block font-sans font-normal leading-relaxed text-inherit">
                            <span>Tanggal Mulai Sewa</span> {{ $sw->star_date }}
                        </p>
                        <p class="block font-sans font-normal leading-relaxed text-inherit">
                            <span>Tanggal Akhir Sewa</span> {{ $sw->end_date }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        @endif
        <div class="card text-center rounded-lg mb-4" style="width: 40%; margin-left:30%;">
            <div class="card-body">
                <h2 class="font-serif">Sewa Kost Pertahun</h2>
            </div>
        </div>
        
        @if($sewatahunan->isEmpty())
        <div class="text-center">
            <span class="font-serif text-danger">Belum Ada Sewa Kost Pertahun</span>
        </div>
        @else
            @foreach ($sewatahunan as $sw)
                <div class="relative flex max-w-[24rem] flex-col overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                    <div class="relative m-0 overflow-hidden text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                        <img src="{{ $sw->kost->imageUrl }}" alt="ui/ux review check" />
                    </div>
        
                    <div class="p-6">
                        <h4 class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                            {{ $sw->kost->room }}
                        </h4>
                    </div>
                    <div class="flex items-center justify-between p-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="flex items-center -space-x-3">
                                    <img alt="natali craig" src="{{ $sw->user->imageUrl }}"
                                        class="relative inline-block h-9 w-9 !rounded-full border-2 border-white object-cover object-center hover:z-10" />
                                    <p class="font-serif" style="margin-left:1%">
                                        {{ $sw->name }}
                                    </p>
                                    @php
                                    $endDate = Carbon\Carbon::parse($item->end_date);
                                    $currentDate = Carbon\Carbon::now();
                                    $monthRemaining = $endDate->diffInMonths($currentDate, false);
                                @endphp
                                </div>
                                <p>
                                    @if ($monthRemaining <= 1 && $monthRemaining >= 0)
                                        <button
                                            class="mt-2 select-none rounded-lg bg-danger py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Waktu Masa Sewa Akan Habis
                                        </button>
                                    @else
                                        <button
                                            class="mt-2 select-none rounded-lg bg-success py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Sedang Di Sewa
                                        </button>
                                    @endif
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p class="block font-sans font-normal leading-relaxed text-inherit">
                                    <span>Tanggal Mulai Sewa</span> {{ $sw->star_date }}
                                </p>
                                <p class="block font-sans font-normal leading-relaxed text-inherit">
                                    <span>Tanggal Akhir Sewa</span> {{ $sw->end_date }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        
    </div>
</x-admin-layouts>
