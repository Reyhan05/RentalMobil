<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body class="g-sidenav-show  bg-gray-200">
    @include('layout.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg" style="max-width: 80vw; margin-left: 20vw">
        <h1 class="text-center">Rental Mobil</h1>
        <div class="container-fluid py-4">
            <div class="col-md-12">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <div class="col-md-12">
                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Merk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('datamerk.store')}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Merk</label>
                                                <input type="text" name="nama_merk" class="form-control"
                                                    placeholder="Masukan Nama Merk" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="table-responsive m-4">
                <table class="styled-table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Merek</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        ?>
                        @if (count($merks) > 0)
                        @foreach ($merks as $merk)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$merk->nama_merk}}</td>
                            <td class="text-center">
                                <form action="{{ route('datamerk.destroy', ['id' => $merk->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small deleteSiswa"><i class="bx bx-trash"></i></button>
                                </form>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalEdit_{{ $merk->id }}" class="btn btn-info btn-small"><i class="bx bxs-pen"></i></button>
                            </td>
                        </tr>

                        <div class="modal fade" id="modalEdit_{{ $merk->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('merk.update', $merk->id) }}">
                                    <input type="hidden" name="id" value="{{ $merk->id }}">
                                        <div class="modal-body">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Merk</label>
                                                        <input type="text" name="nama_merk"
                                                            value="{{ $merk->nama_merk }}" class="form-control"
                                                            placeholder="Masukan Nama Merk" />
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
            </div>
            @endforeach
            @endif
        </div>
    </main>
    </div>
    @include('layouts.js')
</body>

</html>
