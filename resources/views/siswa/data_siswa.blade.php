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
                            <h1 class="m-0">Data Pembagian Kelas</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Pembagian Kelas</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
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
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pembagian Kelas</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Asal Sekolah</th>
                                                <th>Status Terdaftar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($count = 1)
                                            @foreach ($user_siswas as $user_siswa)
                                                <tr>
                                                    <td>{{ $user_siswa->nidn }}</td>
                                                    <td>{{ $user_siswa->nama_lengkap }}</td>
                                                    <td><?php
                                                  if($user_siswa->kelas == NULL ){?>
                                                        <i class="fas fa-times"></i>
                                                        <?php } else{?>
                                                        {{ $user_siswa->kelas }}
                                                        <?php }
                                                  ?>
                                                    </td>
                                                    <td>{{ $user_siswa->sekolah_asal }}</td>
                                                    <td>
                                                        <?php
                                                  if($user_siswa->id_status_terdaftar == 2 ){?>
                                                        <i class="fas fa-check"></i>
                                                        <?php } else{?>
                                                        <i class="fas fa-times"></i>
                                                        <?php }
                                                  ?>
                                                    </td>
                                                </tr>
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
