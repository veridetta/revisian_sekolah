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
              <h1 class="m-0">Filter Data Siswa</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Filter Data Siswa</li>
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  Form Filter Data Siswa Berdasarkan Kelas
                </div>
                <div class="card-body">
                  <form action="/admin/filter-report" method="get">
                    @csrf
                    <div class="mb-3">
                      <div class="row d-flex align-items-center">
                        <div class="col-sm-6">
                          <label for="kelas" class="form-label">Kelas</label>
                          <select class="form-control" name="kelas" id="kelas" required>
                            <option value="" selected disabled>Pilih kelas</option>
                            <option value="X IPA 1">X IPA 1</option>
                            <option value="X IPA 2">X IPA 2</option>
                            <option value="X IPA 3">X IPA 3</option>
                            <option value="X IPA 4">X IPA 4</option>
                            <option value="X IPA 5">X IPA 5</option>
                            <option value="X IPS 1">X IPS 1</option>
                            <option value="X IPS 2">X IPS 2</option>
                            <option value="X IPS 3">X IPS 3</option>
                            <option value="X IPS 4">X IPS 4</option>
                            <option value="X IPS 5">X IPS 5</option>
                          </select>
                        </div>
                        <div class="col-6 col-sm-3">
                          <button type="submit" class="btn btn-primary w-100 mt-4"><i class="fas fa-check-circle"></i>
                            Proses</button>

                        </div>
                        <div class="col-6 col-sm-3">
                          @isset($filter_siswa)
                            <a href="/admin/halaman-report" class="btn btn-danger w-100 mt-4">Reset Filter</a>
                          @endisset
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @isset($filter_siswa)
            <div class="row">
              <div class="col-12">

                <div class="card">
                  <div class="card-header">
                    <div class="d-flex flex-wrap align-items-center">
                      <h3 class="card-title">Hasil Filter Data Siswa</h3>
                      <a href="/admin/filter-report/export?kelas={{ $kelas }}"
                        class="btn btn-outline-success ml-auto"><i class="fas fa-print"></i> Export ke PDF</a>
                    </div>

                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Siswa</th>
                          <th>NISN</th>
                          <th>Agama</th>
                          <th>Jenis Kelamin</th>
                          <th>Asal Sekolah</th>
                          <th>Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($filter_siswa as $row)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><?= ucwords($row->nama_lengkap) ?? '' ?></td>
                            <td><?= $row->nidn ?? '' ?></td>
                            <td><?= $row->agama ?? '' ?></td>
                            <td><?= $row->jenis_kelamin ?? '' ?></td>
                            <td><?= Str::upper($row->sekolah_asal) ?? '' ?></td>
                            <td><?= $row->kelas ?? '' ?></td>
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
          @endisset
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
