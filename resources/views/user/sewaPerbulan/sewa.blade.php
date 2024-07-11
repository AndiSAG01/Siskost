@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container py-32">
            <h1
                class="text-center block font-sans text-5xl antialiased font-semibold leading-tight tracking-normal text-transparent bg-gradient-to-tr from-blue-600 to-blue-400 bg-clip-text">
                FORM SEWA KOST BULANAN
            </h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sewaPerbulanStore') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                    <figure class="relative w-full h-96">
                                        <img class="object-cover object-center w-full h-full rounded-xl" src="{{ $kost->image_url }}" alt="nature image" />
                                        <figcaption class="absolute bottom-8 left-2/4 flex w-[calc(100%-4rem)] -translate-x-2/4 justify-between rounded-xl border border-white bg-white/75 py-4 px-6 shadow-lg shadow-black/5 saturate-200 backdrop-blur-sm">
                                            <div>
                                                <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                                    {{ $kost->room }}
                                                </h5>
                                                <p class="block mt-2 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                                                    Rp.{{ number_format($kost->price_month, 2) }}/Bulan
                                                </p>
                                            </div>
                                            <span class="block text-xl antialiased leading-snug tracking-normal text-blue-gray-900">
                                                {!! $kost->description !!}
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <input type="text" name="kost_id" value="{{ $kost->id }}" hidden>
                            <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <x-form.input-label class="uppercase font-semibold text-black">Nama <span class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="text" class="form-control" name="name" value='{{ $user->name }}' />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Telpon <span class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="text" class="form-control" name="phone" required value="{{ $user->phone }}" />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Jenis Kelamin <span class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="text" class="form-control" name="gender" required value="{{ $user->gender }}" />
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Tanggal Mulai Sewa <span class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="date" class="form-control" name="star_date" id="start_date" required />
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Tanggal Akhir Sewa <span class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="date" class="form-control" name="end_date" id="end_date" required />
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <a href="" style="margin-left:80%">
                                        <button
                                            class="mt-2 select-none rounded-lg bg-yellow-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-black shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Sewa
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container mt-7">
                <div class="row">
                    <div class="col-6" style="margin-left: 50%">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text mb-2">
                                    <h3 class="uppercase font-semibold">Jumlah Sewa : <span id="rent_duration">/Bulan</span></h3>
                                </div>
                                <hr>
                                <div class="card-text mt-2">
                                    <h3 class="uppercase font-semibold">Total Biaya Sewa : <span id="total_rent_cost"></span></h3>
                                </div>
                                <div class="form-group">
                                    <a href="#" style="margin-left:80%">
                                        <button type="button" onclick="calculateRent()"
                                            class="mt-2 rounded-lg bg-blue-700 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-black focus:opacity-5 focus:shadow-none active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Rincian
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function calculateRent() {
            const startDate = new Date(document.getElementById('start_date').value);
            const endDate = new Date(document.getElementById('end_date').value);
            const monthlyRent = {{ $kost->price_month }}; // Assume this value is available from the backend
    
            if (startDate && endDate && !isNaN(monthlyRent)) {
                const diffInMonths = (endDate.getFullYear() - startDate.getFullYear()) * 12 + (endDate.getMonth() - startDate.getMonth());
                const totalRentCost = diffInMonths * monthlyRent;
    
                document.getElementById('rent_duration').innerText = `${diffInMonths} Bulan`;
                document.getElementById('total_rent_cost').innerText = `Rp ${totalRentCost.toLocaleString('id-ID')}`;
            } else {
                alert('Please fill all the fields correctly.');
            }
        }
    </script>
    
@endsection

