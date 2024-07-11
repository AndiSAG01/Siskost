@extends('layouts.app')

@section('content')
    <div class="section" style="background-image: url()">
        <div class="container py-32">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1
                        class="block font-sans text-5xl antialiased font-semibold leading-tight tracking-normal text-green-500">
                        LIST KOST
                    </h1>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="row">
                                @foreach ($kost as $ks)
                                    <div class="col-sm-4 py-4 ">
                                        <div class="card h-100 bg-green-100 " style="width: 350px">
                                            <div class="card-body uppercase">
                                                <div class="image-fluid mb-4">
                                                    <div
                                                        class="grid min-h-[100px] w-full place-items-center overflow-x-scroll rounded-lg lg:overflow-visible">
                                                        <img class=" w-full rounded-lg h-full " src="{{ $ks->imageUrl }}"
                                                            alt="nature image" />
                                                    </div>
                                                    @if ($ks->status == 'Ada')
                                                        <div
                                                            style="position: absolute; top: 0; right: 0; background-color: {{ $ks->status ? 'green' : '' }}; padding: 5px;">
                                                            <span style="color: white;">{{ $ks->status }}</span>
                                                        </div>
                                                    @else
                                                        <div
                                                            style="position: absolute; top: 0; right: 0; background-color: {{ $ks->status ? 'red' : '' }}; padding: 5px;">
                                                            <span style="color: white;">{{ $ks->status }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="property-content uppercase font-semibold text-black">
                                                    <div class="price mb-2"><span>Rp.
                                                            {{ number_format($ks->price_month, 2) }} /
                                                            PerBulan</span></div>
                                                    <div class="price mb-2"><span>Rp.
                                                            {{ number_format($ks->price_years, 2) }} /
                                                            Pertahun</span></div>
                                                    <div>
                                                        <span class="d-block mb-2">Jl.perumnas seturan no.35</span>
                                                        <span class="city d-block mb-3">Sleman , Yogyakarta</span>
                                                        <div class="header">
                                                            {{ $ks->room }}
                                                        </div>
                                                        <div class="text-center mb-4">
                                                            {!! $ks->description !!}
                                                        </div>

                                                        @if ($ks->status == 'Ada')
                                                            <a href="{{ route('detail', $ks->id) }}">
                                                                <button
                                                                    class="select-none rounded-lg bg-blue-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                    type="button">
                                                                    Detail
                                                                </button>
                                                            </a>
                                                            <div class="mt-1">
                                                                <a href="{{ route('sewa', $ks->id) }}">
                                                                    <button
                                                                        class=" mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                        type="button">
                                                                        Sewa Bulanan
                                                                    </button>
                                                                </a>
                                                                <a href="{{ route('sewa_tahunan', $ks->id) }}">
                                                                    <button
                                                                        class="mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                        type="button">
                                                                        Sewa Tahunan
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <a href="#buttons-with-link">
                                                                <button
                                                                    class="select-none rounded-lg bg-red-600 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                                    type="button">
                                                                    Maap Tidak Bisa Di Akses
                                                                </button>

                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
