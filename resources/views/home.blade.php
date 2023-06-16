@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">

    <h1 class="text-center mb-4">Mobil Yang Tersedia</h1>
    <p class="lead text-center mb-4">Sewa mobil dengan mudah dan cepat</p>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($mobil as $mbl)
        <div class="col">
            <div class="card h-100">
                <img src="{{ $mbl->photo == null ? asset('img/avatar.jpg') : asset('uploads/' . $mbl->photo) }}"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title">{{ $mbl->nama_mobil }}</h3>
                    <h5 class="card-title">{{ $mbl->keterangan }}</h5>
                    <p class="card-text">{{ $mbl->plat_nomor }}</p>
                    <p class="card-text">{{ $mbl->merk->nama_merk }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">Rp.{{ $mbl->harga_sewa }},00</h6>
                </div>

                <div class="card-footer">
                    <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Penyewa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('home.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Dari Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Sampai Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Photo KTP</label>
                                    <img id="previewImg" src="" class="image" />
                                    <div class="input-group">
                                        <input type="file" name="photos" onchanges="previewFile(this)" class="form-control uploads" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Photo Jaminan</label>
                                    <img id="previewImg" src="" class="image" />
                                    <div class="input-group">
                                        <input type="file" name="photos" onchanges="previewFile(this)" class="form-control uploads" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <textarea name="keterangan" rows="5" class="form-control"
                                        placeholder="Masukan Alamat Lengkap"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Modal-->
</div>
@endsection
