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
                        <form action="{{ route('datamobil.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Merek</label>
                                            <select name="id_merk" class="form-select"
                                                aria-label="Default select example">
                                                <option selected disabled>Pilih merk</option>
                                                @foreach($merks as $merk)
                                                <option value="{{ $merk->id}}">{{ $merk->nama_merk}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Mobil</label>
                                            <input type="text" name="nama_mobil" class="form-control"
                                                placeholder="Masukan Nama Mobil" />
                                            @error('nama_mobil')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Plat Nomor</label>
                                            <input type="text" name="plat_nomor" class="form-control"
                                                placeholder="Masukan Plat Nomor" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Harga Sewa</label>
                                            <input type="number" name="harga_sewa" class="form-control"
                                                placeholder="Masukan Harga" />
                                        </div>
                                    </div>
                                    <div class="col-md mt-2">
                                        <div class="form-group">
                                            <label class="form-label">Photo</label>
                                            <br />
                                            <img id="previewImg" src="{{ asset('img/avatar.jpg')}}" class="image" />
                                            <div class="input-group">
                                                <input type="file" name="photo" onchanges="previewFile(this)"
                                                    class="form-control uploads" id="inputGroupFile04"
                                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Keterangan</label>
                                            <textarea name="keterangan" rows="5" class="form-control"
                                                placeholder="Masukan keterangan"></textarea>
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

            <!--Membuat table data mobil!-->
            <div class="table-responsive m-4">
                <table class="styled-table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nama Merek</th>
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
                            <td>
                            <img class="image" src="{{ $car->photo == null? asset('img/avatar.png')  : asset('uploads/' . $car->photo) }}" alt="">    
                            </td>
                            <td>{{ $car->merk->nama_merk }}</td>
                            <td>{{$car->nama_mobil}}</td>
                            <td>{{$car->plat_nomor}}</td>
                            <td>{{$car->harga_sewa}}</td>
                            <td>{{$car->keterangan}}</td>
                            <td class="text-center">
                                <form action="{{ route('datamobil.destroy', ['id' => $car->id]) }}" method="POST" id="form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-small deleteMobil" onclick="deleteConfirmation('form-delete')"><i class="bx bx-trash"></i></button>
                                </form>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalEdit_{{ $car->id }}"
                                    class="btn btn-info btn-small"><i class="bx bxs-pen"></i></button>
                            </td>
                        </tr>
                        <!-- Modal edit-->
                        <div class="modal fade" id="modalEdit_{{ $car->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="{{ route('mobil.update',  $car->id) }}" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="{{ $car->id }}">
                                        <div class="modal-body">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Nama Merek</label>
                                                        <select name="id_merk" value="{{ $car->id_merk }}"
                                                            class="form-select" aria-label="Default select example">
                                                            <option selected disabled>Pilih merk</option>
                                                            @foreach($merks as $merk)
                                                            <option value="{{ $merk->id }}"
                                                                {{ ( $merk->id == $car->id_merk ) ? 'selected' : '' }}>
                                                                {{ $merk->nama_merk }}
                                                             </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama Mobil</label>
                                                        <input type="text" name="nama_mobil"
                                                            value="{{ $car->nama_mobil }}" class="form-control"
                                                            placeholder="Masukan Nama Mobil" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Plat Nomor</label>
                                                        <input type="text" name="plat_nomor"
                                                            value="{{ $car->plat_nomor }}" class="form-control"
                                                            placeholder="Masukan Plat Nomor" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Harga Sewa</label>
                                                        <input type="number" name="harga_sewa"
                                                            value="{{ $car->harga_sewa }}" class="form-control"
                                                            placeholder="Masukan Harga" />
                                                    </div>
                                                </div>
                                                <div class="col-md mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Photo</label>
                                                        <br />
                                                        <img id="previewImg" src="{{ asset('img/avatar.jpg')}}"
                                                            class="image" />
                                                        <div class="input-group">
                                                            <input type="file" name="photo-edit"
                                                                onchanges="previewFile(this)"
                                                                class="form-control uploads" id="inputGroupFile04"
                                                                aria-describedby="inputGroupFileAddon04"
                                                                aria-label="Upload">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Keterangan</label>
                                                        <textarea name="keterangan" rows="5" class="form-control"
                                                            placeholder="Masukan keterangan">{{ $car->keterangan }}</textarea>
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
                        <!--End Modal edit-->
            </div>
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
