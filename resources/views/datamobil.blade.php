<!DOCTYPE html>
<html lang="en">
@include('layouts.css')

<body class="g-sidenav-show  bg-gray-200">
    @include('layout.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
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
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Create
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Mobil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('datamobil')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input type="text" name="nama_mobil" class="form-control"
                                                placeholder="Masukan Nama Mobil" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Plat Nomor</label>
                                            <input type="text" name="plat_nomor" class="form-control"
                                                placeholder="Masukan Plat Nomor" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" name="warna" class="form-control"
                                                placeholder="Masukan Warna Mobil" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input type="number" name="tahun" class="form-control"
                                                placeholder="Masukan Tahun Mobil" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Harga Sewa</label>
                                            <input type="number" name="harga_sewa" class="form-control"
                                                placeholder="Masukan Harga" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label">Keterangan</label>
                                                <textarea name="keterangan" rows="5" class="form-control"
                                                    placeholder="Masukan keterangan"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Modal-->

            <!--Membuat table data mobil!-->
            <div class="table-responsive m-4">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nama Mobil</th>
                            <th>Plat Nomor</th>
                            <th>Harga Sewa</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        ?>
                        @if (count($mobil) > 0)
                        @foreach ($mobil as $car)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>@mdo</td>
                            <td>{{$car->nama_mobil}}</td>
                            <td>{{$car->plat_nomor}}</td>
                            <td>{{$car->harga_sewa}}</td>
                            <td>{{$car->keterangan}}</td>
                            <td class="text-center">
                                <a type="submit" class="btn btn-danger btn-small deleteSiswa"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @include('layouts.js')
</body>

</html>
