<!DOCTYPE html>
<html lang="en">

@include('admin.components.header')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">



        @include('admin.components.navbar')

        @include('admin.components.sidebar')



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Data Akun Siswa</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Akun Siswa</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Akun Siswa</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>NISN</th>
                                                <th>Nomor Pendaftaran</th>
                                                <th>Nama</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Email</th>
                                                <th>Status Terdaftar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($count = 1)
                                            @foreach ($user_pendaftars as $user_pendaftar)
                                                <tr>
                                                    <td>{{ $user_pendaftar->nidn }}</td>
                                                    <td>{{ $user_pendaftar->nomor_pendaftaran }}
                                                    </td>
                                                    <td>{{ $user_pendaftar->nama_lengkap }}</td>
                                                    <td>{{ $user_pendaftar->tanggal_lahir }}</td>
                                                    <td>{{ $user_pendaftar->email }}</td>
                                                    <td>

                                                        <?php
                                                  if($user_pendaftar->id_status_terdaftar == 2 ){?>
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

        @include('admin.components.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('admin.components.js')

</body>

</html>
