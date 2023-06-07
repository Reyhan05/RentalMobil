@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1>Rental Mobil</h1>
    <div class="row row-cols-1 row-cols-md-4 g-4">
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Sewa
                    </button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $mbl->nama_mobil }}</h5>
                    <p class="card-text">{{ $mbl->merk->nama_merk }}</p>
                    <small class="text-muted">Rp.{{ $mbl->harga_sewa }},00</small>
                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Sewa
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
