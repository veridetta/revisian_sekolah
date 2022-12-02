<!DOCTYPE html>
<html lang="en">

@include('admin_utama.components.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        @include('admin_utama.components.navbar')

        @include('admin_utama.components.sidebar')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Pengumuman</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Pengumuman</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        <div class="alert alert-danger" id="success-alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ session('error') }}</strong>
                        </div>
                    </div>
                @endif
                <div class="container-fluid">

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_pengumuman">
                        Tambah Data Pengumuman
                    </button>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Pengumuman</th>
                                                <th>Isi Pengumuman</th>
                                                <th>Nama Penulis</th>
                                                <th>Tanggal Pengumuman</th>
                                                <th>Foto Pengumuman</th>
                                                <th>Edit Pengumuman</th>
                                                <th>Hapus Pengumuman</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($count = 1)
                                            @foreach ($pengumumans as $pengumuman)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $pengumuman->judul_pengumuman }}</td>
                                                    <td>{{ $pengumuman->isi_pengumuman }}</td>
                                                    <td> {{ $pengumuman->nama_penulis }}</td>
                                                    <td>{{ $pengumuman->tanggal_pengumuman }}</td>
                                                    <td>
                                                        <center> <a
                                                                href="{{ asset('/storage/pengumuman') }}/{{ $pengumuman->foto_pengumuman }}"
                                                                target="_blank"><img
                                                                    src="{{ asset('/storage/pengumuman') }}/{{ $pengumuman->foto_pengumuman }}"
                                                                    style="width: 25%"> </a>
                                                    </td>
                                                    <td>
                                                        <div class="table-responsive">
                                                            <div class="table table-striped table-hover ">
                                                                <a href="" class="btn btn-primary" data-toggle="modal"
                                                                    data-target="#edit_pengumuman{{ $pengumuman->id_pengumuman }}">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-responsive">
                                                            <div class="table table-striped table-hover ">
                                                                <a href="" class="btn btn-danger" data-toggle="modal"
                                                                    data-target="#hapus_pengumuman{{ $pengumuman->id_pengumuman }}">
                                                                    <i class="fas fa-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Hapus Data pengumuman -->
                                                <div class="modal fade"
                                                    id="hapus_pengumuman{{ $pengumuman->id_pengumuman }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Hapus
                                                                    Data
                                                                    Pengumuman
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/admin_utama/data_pengumuman_delete"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <div class="row">
                                                                        @csrf
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="id_pengumuman"
                                                                                value="{{ $pengumuman->id_pengumuman }}" />
                                                                            <p>Apakah kamu yakin ingin menghapus data
                                                                                ini?</i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-danger ripple"
                                                                            data-dismiss="modal">Tidak</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Edit pengumuman -->
                                                <div class="modal fade"
                                                    id="edit_pengumuman{{ $pengumuman->id_pengumuman }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                    Pengumuman</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/admin_utama/data_pengumuman_edit"
                                                                    enctype="multipart/form-data" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="judul_pengumuman">Judul
                                                                            Pengumuman</label>
                                                                        <input type="text" class="form-control"
                                                                            id="judul_pengumuman"
                                                                            name="judul_pengumuman"
                                                                            aria-describedby="judul_pengumuman"
                                                                            value="{{ $pengumuman->judul_pengumuman }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="isi_pengumuman">Isi
                                                                            Pengumuman</label>
                                                                        <textarea id="isi_pengumuman" name="isi_pengumuman" rows="4" class="form-control" required>{{ $pengumuman->isi_pengumuman }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_penulis">Nama Penulis</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama_penulis" name="nama_penulis"
                                                                            aria-describedby="nama_penulis"
                                                                            value="{{ $pengumuman->nama_penulis }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tanggal_pengumuman">Tanggal
                                                                            Pengumuman</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal_pengumuman"
                                                                            name="tanggal_pengumuman"
                                                                            aria-describedby="tanggal_pengumuman"
                                                                            value="{{ $pengumuman->tanggal_pengumuman }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="foto_pengumuman">Foto
                                                                            Pengumuman</label>
                                                                        <input type="file" class="form-control"
                                                                            id="foto_pengumuman" name="foto_pengumuman">
                                                                    </div>
                                                                    <input type="text" name="foto_pengumuman_old"
                                                                        id="foto_pengumuman_old"
                                                                        value="{{ $pengumuman->foto_pengumuman }}"
                                                                        hidden>
                                                                    <input type="text"
                                                                        value="{{ $pengumuman->id_pengumuman }}"
                                                                        name="id_pengumuman" hidden>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- Modal -->
                    <div class="modal fade" id="tambah_pengumuman" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin_utama/data_pengumuman_tambah" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="judul_pengumuman">Judul Pengumuman</label>
                                            <input type="text" class="form-control" id="judul_pengumuman"
                                                name="judul_pengumuman" aria-describedby="judul_pengumuman" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="isi_pengumuman">Isi Pengumuman</label>
                                            <textarea id="isi_pengumuman" name="isi_pengumuman" rows="4" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_penulis">Nama Penulis</label>
                                            <input type="text" class="form-control" id="nama_penulis"
                                                name="nama_penulis" aria-describedby="nama_penulis" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_pengumuman">Tanggal Pengumuman</label>
                                            <input type="date" class="form-control" id="tanggal_pengumuman"
                                                name="tanggal_pengumuman" aria-describedby="tanggal_pengumuman"
                                                required>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="foto_pengumuman">Foto Pengumuman</label>
                                            <input type="file" class="form-control" id="foto_pengumuman"
                                                name="foto_pengumuman" aria-describedby="foto_pengumuman" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('admin_utama.components.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin_utama.components.js')

</body>

</html>
