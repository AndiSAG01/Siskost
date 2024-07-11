

<button
class="flex select-none items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="mdi mdi-library-plus"></i>
Add Kost
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content bg-dark" style="width: 600px">
            <div class="modal-header">
                <div class="card alert bg-white text-black" role="alert">
                    <div class="card-body">
                        <h5 class="fw-bold">
                            <i class="fas fa-exclamation-triangle"></i> PERINGATAN!!!
                        </h5>
                        <small class="text-wrap">
                            Pastikan Anda telah menentukan Produk. Produk mempengaruhi jenis dari informasi Produk anda.
                        </small>
                    </div>
                </div>                
                </button>
            </div>
            <div class="modal-body ">
                <x-form :action="route('admin.kost.store')" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-white">
                        <div class="col-6 col-sm-6">
                            <div class="mb-4">
                                <x-form.input-label :required="true">Nama Ruangan/No Ruangan</x-form.input-label>
                                <x-form.input type="text" name="room" />
                                <x-form.input-error name="room" />
                            </div>
                        </div>
                        <div class="col-6 col-sm-6">
                            <div class="mb-4">
                                <x-form.input-label :required="true">Status</x-form.input-label>
                                <select name="status" id="status" class="form-control">
                                    <option value="Ada">Ada</option>
                                    <option value="Tidak ada">Tidak Ada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row text-white">
                        <div class="col-6 col-sm-6">
                            <div class="mb-4">
                                <x-form.input-label :required="true">Harga Perbulan</x-form.input-label>
                                <x-form.input type="number" name="price_month" />
                                <x-form.input-error name="price_month" />
                            </div>
                        </div>
                        <div class="col-6 col-sm-6">
                            <div class="mb-4">
                                <x-form.input-label :required="true">Harga Pertahun</x-form.input-label>
                                <x-form.input type="number" name="price_years" />
                                <x-form.input-error name="price_years"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-white" style="border-color: black">
                        <x-form.input-label :required="true">Foto Kost</x-form.input-label>
                         <input type="file" name="image" class="form-control" style="border-color: black">
                     </div>

                    <div class="form-group text-white mb-4">
                        <x-form.input-label :required="true">Deskripsi/Fasilitas</x-form.input-label>
                        <x-form.textarea id="editor" type="text" name="description"/>
                        <x-form.input-error name="description" />
                    </div>
                    <button type="submit" class="btn btn-secondary bg-secondary mb-4 text-white">Submit</button>
                </x-form>
            </div>
        </div>
    </div>
</div>

