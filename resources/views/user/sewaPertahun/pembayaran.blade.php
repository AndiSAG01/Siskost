@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="container py-32">
            <div class="row">
                <div class="col-4 col-sm-4">
                    <div class="relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="p-6">
                            <div class="mb-4 flex items-center justify-between">
                                <h5
                                    class="block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased uppercase">
                                    Informasi Rekening
                                </h5>
                            </div>
                            <div class="divide-y divide-gray-200">
                                <div class="flex items-center justify-between pb-3 pt-3 last:pb-0">
                                    <div class="flex items-center gap-x-3">
                                        <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-1.jpg"
                                            alt="Tania Andrew"
                                            class="relative inline-block h-9 w-9 rounded-full object-cover object-center" />
                                        <div>
                                            <h6
                                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                                Tania Andrew
                                            </h6>
                                            <p
                                                class="block font-sans text-sm font-light leading-normal text-gray-700 antialiased">
                                                tania@gmail.com
                                            </p>
                                        </div>
                                    </div>
                                    <h6
                                        class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                        $400
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8 col-sm-8">
                    <div class="card">
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                    <img id="image-preview" class="object-cover object-center w-full rounded-lg shadow-xl h-96 shadow-blue-gray-900/50"
                                         src="" alt="nature image" />
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="relative flex w-full max-w-[24rem] flex-col rounded-xl my-3 bg-white bg-clip-border text-gray-700 shadow-md">
                                    <div class="p-6">
                                        <div class="block overflow-visible">
                                            <nav>
                                                <ul role="tablist"
                                                    class="relative z-0 flex flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60">
                                                    <li role="tab"
                                                        class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                                                        data-value="card">
                                                        <div class="z-20 text-inherit uppercase font-semibold">Form Pembayaran</div>
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
                                                    <form class="flex flex-col gap-4 mt-12" action="{{ route('storePayment', $sewa->id) }}" enctype="multipart/form-data" method="POST">
                                                        @csrf
                                                        <div class="my-0">
                                                            <p class="block mb-2 font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                                                Bukti Pembayaran
                                                            </p>
                                                            <div class="relative h-10 w-full min-w-[200px]">
                                                                <input type="file" name="image" id="file-input" class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent !border-t-blue-gray-200 bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:!border-t-gray-900 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" />
                                                                <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all before:content-none after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all after:content-none peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500"></label>
                                                            </div>
                                                        </div>
                                                        <button
                                                            class="select-none rounded-lg bg-gray-900 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                                            type="submit">
                                                            Pay Now
                                                        </button>
                                                        <p
                                                            class="flex items-center justify-center gap-2 mt-2 font-sans text-sm antialiased font-medium leading-normal text-gray-700 opacity-60">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                fill="currentColor" aria-hidden="true"
                                                                class="-mt-0.5 h-4 w-4">
                                                                <path fill-rule="evenodd"
                                                                    d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            Payments are secure and encrypted
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
