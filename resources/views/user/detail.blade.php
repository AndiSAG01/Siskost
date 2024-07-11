@extends('layouts.app')

@section('content')

<div class="section">
    <div class="container py-32">
        <div class="card uppercase">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{ $kost->image_url }}" alt="Image" class="img-fluid" style="width: 100%; height: auto;" data-fancybox>
                    </div>
                    <div class="col-sm-8">
                        <div class="card-body">
                            <p class="card-text mb-4"><strong>Nama Ruangan:</strong> {{ $kost->room }}</p>
                            <p class="card-text mb-4"><strong>Harga Perbulan:</strong> Rp.{{number_format($kost->price_month,2)  }}</p>
                            <p class="card-text mb-4"><strong>Harga Pertahun:</strong> Rp.{{number_format($kost->price_years,2)  }}</p>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p class="card-text mb-0"><strong>Fasilitas:</strong></p>
                                    <p class="card-text">{!! $kost->description !!}</p>
                                </div>
                            </div>
                            <p class="card-text mb-4"><strong>Status :</strong> <button class="btn btn-success">{{ $kost->status }}</button> </p>
                        </div>
                    </div>
                </div>
                   <x-button class="btn-primary">
                       <a href="{{ route('list') }}">SEWA</a>
                </x-button>
            </div>
        </div>    
</div>

@endsection