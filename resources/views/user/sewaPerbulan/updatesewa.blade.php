@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container py-32">
            <h1
                class="text-center block font-sans text-5xl antialiased font-semibold leading-tight tracking-normal text-transparent bg-gradient-to-tr from-blue-600 to-blue-400 bg-clip-text">
                FORM PERPANJANG SEWA KOST BULANAN
            </h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sewaUpdate', $sewa->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div
                                    class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                    <figure class="relative w-full h-96">
                                        <img class="object-cover object-center w-full h-full rounded-xl"
                                            src="{{ $sewa->kost->image_url }}" alt="nature image" />
                                        <figcaption
                                            class="absolute bottom-8 left-2/4 flex w-[calc(100%-4rem)] -translate-x-2/4 justify-between rounded-xl border border-white bg-white/75 py-4 px-6 shadow-lg shadow-black/5 saturate-200 backdrop-blur-sm">
                                            <div>
                                                <h5
                                                    class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
                                                    {{ $sewa->kost->room }}
                                                </h5>
                                                <p
                                                    class="block mt-2 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
                                                    Rp.{{ number_format($sewa->kost->price_month, 2) }}/Bulan
                                                </p>
                                            </div>
                                            <span
                                                class="block text-xl antialiased leading-snug tracking-normal text-blue-gray-900">
                                                {!! $sewa->kost->description !!}
                                            </span>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <input type="text" name="kost_id" value="{{ $sewa->kost->id }}" hidden>
                            <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                            <div class="col-6 col-sm-6">
                                <div class="form-group">
                                    <x-form.input-label class="uppercase font-semibold text-black">Nama <span
                                            class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="text" class="form-control" name="name"
                                        value='{{ $user->name }}' />
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Telpon <span
                                            class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="text" class="form-control" name="phone" required
                                        value="{{ $user->phone }}" />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Jenis Kelamin <span
                                            class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="text" class="form-control" name="gender" required
                                        value="{{ $user->gender }}" />
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Tanggal Mulai Sewa <span
                                            class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="date" class="form-control" name="star_date" id="start_date"
                                        required />
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-2">
                                    <x-form.input-label class="uppercase font-semibold text-black">Tanggal Akhir Sewa <span
                                            class="text-danger">*</span></x-form.input-label>
                                    <x-form.input type="date" class="form-control" name="end_date" id="end_date"
                                        required />
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6 col-sm-6">
                                <div
                                    class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                    <img id="image-preview"
                                        class="object-cover object-center w-full rounded-lg shadow-xl h-96 shadow-blue-gray-900/50"
                                        src="" alt="nature image" />
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div
                                    class="relative flex w-full max-w-[24rem] flex-col rounded-xl my-3 bg-white bg-clip-border text-gray-700 shadow-md">
                                    <div class="p-6">
                                        <div class="block overflow-visible">
                                            <nav>
                                                <ul role="tablist"
                                                    class="relative z-0 flex flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60">
                                                    <li role="tab"
                                                        class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                                        data-value="card">
                                                        <div class="z-20 text-inherit uppercase font-semibold">Form
                                                            Pembayaran</div>
                                                        <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"
                                                            data-projection-id="4"></div>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <div
                                                class="relative block w-full overflow-hidden !overflow-x-hidden !overflow-y-visible bg-transparent">
                                                <div role="tabpanel"
                                                    class="w-full p-0 font-sans text-base antialiased font-light leading-relaxed text-gray-700 h-max"
                                                    data-value="card">
                                                    <div class="my-0">
                                                        <p
                                                            class="block mb-2 font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                                            Bukti Pembayaran
                                                        </p>
                                                        <div class="relative h-10 w-full min-w-[200px]">
                                                            <input type="file" name="image" id="file-input"
                                                                class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent !border-t-blue-gray-200 bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:!border-t-gray-900 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                                            <label
                                                                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all before:content-none after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all after:content-none peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500"></label>
                                                        </div>
                                                    </div>
                                                    <button
                                                        class="mt-4 select-none rounded-lg bg-gray-900 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                        type="submit">
                                                        Pay Now
                                                    </button>
                                                    <p
                                                        class=" flex items-center justify-center gap-2 mt-5 font-sans text-sm antialiased font-medium leading-normal text-gray-700 opacity-60">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" aria-hidden="true"
                                                            class="-mt-0.5 h-4 w-4">
                                                            <path fill-rule="evenodd"
                                                                d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        Payments are secure and encrypted
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    <h3 class="uppercase font-semibold">Jumlah Sewa : <span
                                            id="rent_duration">/Bulan</span></h3>
                                </div>
                                <hr>
                                <div class="card-text mt-2">
                                    <h3 class="uppercase font-semibold">Total Biaya Sewa : <span
                                            id="total_rent_cost"></span></h3>
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
            const monthlyRent = {{ $sewa->kost->price_month }}; // Assume this value is available from the backend

            if (startDate && endDate && !isNaN(monthlyRent)) {
                const diffInMonths = (endDate.getFullYear() - startDate.getFullYear()) * 12 + (endDate.getMonth() -
                    startDate.getMonth());
                const totalRentCost = diffInMonths * monthlyRent;

                document.getElementById('rent_duration').innerText = `${diffInMonths} Bulan`;
                document.getElementById('total_rent_cost').innerText = `Rp ${totalRentCost.toLocaleString('id-ID')}`;
            } else {
                alert('Please fill all the fields correctly.');
            }
        }
    </script>
    <script>
        document.getElementById('file-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
