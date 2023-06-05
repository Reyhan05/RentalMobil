@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1>Rental Mobil</h1>
<<<<<<< HEAD
      
  </div>
@endsection
=======
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($mobil as $mbl)
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $mbl->nama_mobil }}</h5>
                    <p class="card-text">{{ $mbl->merk->nama_merk }}</p>
                    <small class="text-muted">Rp.{{ $mbl->harga_sewa }},00</small>
                </div>
              
                <div class="card-footer">
                    <a href="" class="btn btn-dark btn-primary btn-sm" id="button-toggle">
                      Sewa
                      <i class="bx  bxs-chevrons-right" id="icon"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
>>>>>>> b39a5fb07ccc61ae40662ca338ca3a21a095b174
