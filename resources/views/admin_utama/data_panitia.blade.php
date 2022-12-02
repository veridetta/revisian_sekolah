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
                            <h1 class="m-0">Data Tata Usaha</h1>
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
                                    <h3 class="card-title">Data Tata Usaha</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>No Telp</th>
                                                <th>Status Verifikasi</th>
                                                <th>Verifikasi Tata Usaha</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($count = 1)
                                            @foreach($user_panitias as $user_panitia)
                                            <tr>
                                                <td>{{$user_panitia->username}}</td>
                                                <td>{{$user_panitia->email}}</td>
                                                <td>{{$user_panitia->no_telp}}</td>
                                                <td> <?php
                                                  if($user_panitia->is_active == 0 ){?>
                                                    <i class="fas fa-times"></i>
                                                    <?php } else{?>
                                                    <i class="fas fa-check"></i>
                                                    <?php }
                                                  ?></td>
                                                
                                                <td>
                                                    <div class="table-responsive">
                                                        <div class="table table-striped table-hover ">
                                                            <a href="" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#edit_status{{$user_panitia->id}}">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                         
                                            <!-- Modal -->
                                            <div class="modal fade" id="edit_status{{$user_panitia->id}}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Verifikasi Tata Usaha
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="atur_verifikasi_admin" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Pilih Status
                                                                        Data</label>
                                                                    <select class="form-control"
                                                                        name="id_status_verifikasi">
                                                                        <option value="0">Belum Diverifikasi</option>
                                                                        <option value="1">Telah Diverifikasi</option>
                                                                    </select>
                                                                </div>
                                                                <input type="text" value="{{$user_panitia->id}}" name="id"
                                                                    hidden>
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