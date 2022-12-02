<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML 2 PDF</title>
    <style type="text/css">
    .center {
        text-align: center;
    }

    .col-8 {
        text-align: center;
    }

    * {
        box-sizing: border-box;
    }


    .column-pinggir {
        text-align: center;
        float: left;
        width: 70px;
        padding: 10px;


    }

    .column-tengah {
        text-align: center;
        float: left;
        width: 500px;
        padding: 10px;


    }


    .row:after {
        content: "";
        display: table;
        clear: both;
    }
    </style>
</head>

<body>

    <div class="row">
        <div class="column-pinggir">
            <img src="{{ public_path('public/assets/img/logo_sekolah.png') }}" alt="" width="100px">
        </div>
        <div class="column-tengah">
            <h1 class="m-0 text-center">Tagihan Siswa Baru SMA Negeri 1 Tigapanah</h1>
            <h4 class="m-0 text-center">Alamat: JL. Tigapanah No. 121,Mulawari, Tigapanah, Kabupaten
                Karo
                Sumatera
                Utara, 22171</h4>

        </div>
        <div class="column-pinggir">
            <img src="{{ public_path('public/assets/img/adiwiyata.png') }}" alt="" width="150px">
        </div>

    </div>

    @foreach($data as $data_kwitansi)
    <p>Nama : {{ $data_kwitansi->nama_lengkap }}</p>
    <p>---------------------------------------------------------</p>
    <p>Baju Olahraga Ukuran {{ $data_kwitansi->ukuran_baju_olahraga }} = {{ $data_kwitansi->harga_baju_olahraga }}
    </p>
    <p>Baju Batik Ukuran {{ $data_kwitansi->ukuran_baju_batik }} = {{ $data_kwitansi->harga_baju_batik }}</p>
    <p>Uang Osis 3 Bulan X Rp. 15.000 = 45000</p>
    <p>Atribut, Topi, Dasi= 50000</p>
    <p>---------------------------------------------------------</p>
    <p>Total : {{ $data_kwitansi->harga_baju_olahraga + $data_kwitansi->harga_baju_batik +45000+50000}}</p>
  
    @endforeach

</body>

</html>