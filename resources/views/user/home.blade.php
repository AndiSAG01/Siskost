@extends('layouts.app')

@section('content')
    <div class="hero">
        <div class="hero-slide">
            <div class="img overlay" style="background-image: url('/user/images/hero_bg_3.jpg')"></div>
            <div class="img overlay" style="background-image: url('/user/images/hero_bg_2.jpg')"></div>
            <div class="img overlay" style="background-image: url('/user/images/hero_bg_1.jpg')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center" style="background-color: rgba(0, 0, 0, 0.199)">
                    <h1 class="heading py-2" data-aos="fade-up">
                        Selamat Datang Di Sistem Informasi Kost
                    </h1>
                    <h2 class="heading" data-aos="fade-up"><u>Kost Muslim sanjaya</u></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">
                        List Kost
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p>
                        <a href="{{ route('list') }}" class="btn btn-primary text-white py-3 px-4">View all
                            Kost</a>
                    </p>
                </div>
            </div>
            <div class="row">

                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">
                            @foreach ($kost as $ks)
                                <div class="property-item shadow-xl shadow-transparent-black">
                                    <div class="card text-center">
                                        <div class="image-fluid">
                                            <div
                                                class="grid min-h-[240px] w-full place-items-center overflow-x-scroll rounded-lg lg:overflow-visible">
                                                <img class=" image-full w-full rounded-lg shadow-xl h-full shadow-blue-gray-900/50"
                                                    src="{{ $ks->imageUrl }}" alt="nature image" />
                                            </div>
                                            @if ($ks->status == 'Ada')
                                                <div
                                                    style="position: absolute; top: 0; right: 0; background-color: {{ $ks->status ? 'green' : '' }}; padding: 5px;">
                                                    <span style="color: white;">{{ $ks->status }}</span>
                                                </div>
                                            @elseif($ks->status == 'Tidak ada')
                                                <div
                                                    style="position: absolute; top: 0; right: 0; background-color: {{ $ks->status ? 'red' : '' }}; padding: 5px;">
                                                    <span style="color: white;">{{ $ks->status }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="property-content">
                                        <div class="price mb-2"><span>Rp. {{ number_format($ks->price_month, 2) }} /
                                                PerBulan</span></div>
                                        <div class="price mb-2"><span>Rp. {{ number_format($ks->price_years, 2) }} /
                                                Pertahun</span></div>
                                        <div>
                                            <span class="d-block mb-2 text-black-50">Jl.perumnas seturan no.35</span>
                                            <span class="city d-block mb-3">Sleman , Yogyakarta</span>
                                            <div class="header">
                                                {{ $ks->room }}
                                            </div>
                                            <div class="specs d-flex mb-4">
                                                {!! $ks->description !!}
                                            </div>
                                            <div class="mt-2 text-center">
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
                                                        <a href="{{ route('sewa', $ks->id) }}">
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
                            @endforeach
                            <!-- .item -->
                        </div>
                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <section class="features-1">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="box-feature">
                            <i class="fas fa-wifi fa-lg"></i>
                            <h3 class="mb-3">Free Wifi</h3>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                        <div class="box-feature">
                            <i class="fas fa-bed fa-lg"></i>
                            <h3 class="mb-3">Free Springbed</h3>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                        <div class="box-feature">
                            <i class="fas fa-bolt fa-lg"></i>
                            <h3 class="mb-3">Free Listrik</h3>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                        <div class="box-feature">
                            <i class="fas fa-hand-holding-water fa-lg"></i>
                            <h3 class="mb-3">Free Air</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
