<!DOCTYPE html>
<html lang="en">

@include('siswa.components.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        @include('siswa.components.navbar')

        @include('siswa.components.sidebar')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
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

                    @foreach ($pengumumans as $pengumuman)
                        <div class="card text-center">
                            <div class="card-header">
                                PENGUMUMAN
                            </div>
                            <div class="card-body">
                                <center>
                                    <img src="{{ asset('storage/pengumuman') }}/{{ $pengumuman->foto_pengumuman }}"
                                        style="width: 25%">

                                    {{-- <img src="{{ asset('/storage/pengumuman/RKP94jPS7QlUxikk1XafZKmSlsXjxyPFSGO0BHAa.jpg') }}"
                                        alt="" width="500px"> --}}
                                </center>
                                <br>
                                <h3>{{ $pengumuman->judul_pengumuman }}</h3>
                                <p class="card-text">{{ $pengumuman->isi_pengumuman }}.
                                </p>
                                <p class="text-right">Penulis : {{ $pengumuman->nama_penulis }}</p>
                            </div>
                            <div class="card-footer text-muted">
                                Tanggal : {{ $pengumuman->tanggal_pengumuman }}
                            </div>
                        </div>
                    @endforeach
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        @include('siswa.components.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('siswa.components.js')

</body>

</html>
