<x-admin-layouts>
    <x-slot:breadcrumbs>
        <x-breadcrumbs :links="[
            [
                'url' => route('admin.kost.index'),
                'name' => 'Kost',
            ],
        ]" active="Edit Kost" />
    </x-slot:breadcrumbs>

    <div class="container-fluid">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="card text-center mx-auto" style="width: 50%">
                        <span class="text-danger" style="background-color: yellow">Peringatan!!!!</span>
                        <h4 class="card-title py-2">PENGUBAHAN DATA KOST</h4>
                        <p class="card-description">
                            Ubah Data Dengan <b class="text-success">BENAR</b> agar Tidak terjadi <b
                                class="text-danger">KESALAHAN</b> informasi terhadapap costumer
                        </p>
                    </div>
                    <div class="row py-4">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header mb-4">
                                    <h5 class="text-danger py-4 text-center"> <b>Data Lama</b></h5>
                                </div>
                                <form class="form-sample mx-4" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Nama Ruangan / Nomor Ruangan</label>
                                        <input type="text" name="room" style="width: 60%" class="form-control "
                                            value="{{ $kost->room }}" readonly>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Deksirpsi / Fasilitas</label>
                                        <textarea name="description" id="editor" class="form-control" style="width: 60%; height:100px;" readonly>{!! $kost->description !!}</textarea>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Harga Perbulan</label>
                                        <input type="number" name="price_month" style="width: 60%" class="form-control "
                                            value = "{{ number_format($kost->price_month, 0, ',', '.') }}" readonly>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Harga Pertahun</label>
                                        <input type="number" name="price_years" style="width: 60%" class="form-control "
                                            value="{{ number_format($kost->price_years, 0, ',', '.') }}" readonly>
    
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="status" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Status</label>
                                        <input type="text" class="form-control" style="width: 60%"
                                            value="{{ $kost->status }}" readonly>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for=""style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" >Foto Lama</label>
                                        <img src="{{ $kost->image_url }}" width="200px" alt="img" class="mx-auto d-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header mb-4">
                                    <h5 class="text-success py-4 text-center"> <b>Input Data Baru</b></h5>
                                </div>
                                <form action="{{ route('admin.kost.update', $kost->id) }}" class="form-sample mx-4" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Nama Ruangan / Nomor Ruangan</label>
                                        <input type="text" name="room" style="width: 60%" class="form-control ">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Deksirpsi / Fasilitas</label>
                                        <textarea name="description" id="body" class="form-control" style="width: 60%; height:100px;"></textarea>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Harga Perbulan</label>
                                        <input type="number" name="price_month" style="width: 60%" class="form-control ">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="exampleInputName1" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Harga Pertahun</label>
                                        <input type="number" name="price_years" style="width: 60%" class="form-control ">
        
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="status" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Status</label>
                                        <select name="status" id="status" class="form-control" style="width: 60%">
                                            <option value="Ada">Ada</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                    <div class="row py-3 mb-4">
                                        <div class="form-group">
                                            <label for="" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif" >Foto Baru</label>
                                            <input type="file" name="image" alt="img">
                                            <p class="text-danger"> Tidak Di wajibkan Untuk Mengisi Jika Tidak ada Pembaruan Foto </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-success mb-4 bg-success">Simpan</button>
                                        </div>
                                        <div class="col-4">
                                            <a href="{{ route('admin.kost.index') }}" type="submit" class="btn btn-warning bg-warning">Back</a>
                                        </div>
                                    </div>
                                    <!-- Or change a checkbox color using text color utilities: -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-admin-layouts>
