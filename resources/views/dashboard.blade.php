@extends('app')
@section('content')

<center>
    <div class="col-lg-5 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                </div>

                <?php

                // Koneksi ke database
                $host = "localhost";
                $user = "root";
                $password = "";
                $database = "bukutamu";

                $koneksi = mysqli_connect($host, $user, $password, $database);

                // Cek koneksi
                if (!$koneksi) {
                    die("Koneksi database gagal: " . mysqli_connect_error());
                }

                // Query total jumlah data
                $queryTotal = "SELECT COUNT(*) AS total_data FROM users";
                $resultTotal = mysqli_fetch_assoc(mysqli_query($koneksi, $queryTotal));
                $jumlahTotal = $resultTotal['total_data'];

                // Pembagian data ke kategori (simulasi manual)
                // Simulasi jumlah data hari ini, kemarin, dan bulan ini
                if ($jumlahTotal > 0) {
                    $jumlahHariIni = $jumlahTotal;
                    $jumlahKemarin = 0;
                    $jumlahMingguIni = $jumlahHariIni;
                    $jumlahBulanIni = $jumlahHariIni;
                } else {
                    $jumlahHariIni = 0;
                    $jumlahKemarin = 0;
                    $jumlahMingguIni = 0;
                    $jumlahBulanIni = 0;
                }

                ?>

                <table class="table table-bordered">
                    <tr>
                        <td>Hari ini</td>
                        <td>: <?= $jumlahHariIni ?></td>
                    </tr>
                    <tr>
                        <td>Kemarin</td>
                        <td>: <?= $jumlahKemarin ?></td>
                    </tr>
                    <tr>
                        <td>Minggu ini</td>
                        <td>: <?= $jumlahMingguIni ?></td>
                    </tr>
                    <tr>
                        <td>Bulan ini</td>
                        <td>: <?= $jumlahBulanIni ?></td>
                    </tr>
                    <tr>
                        <td>Keseluruhan</td>
                        <td>: <?= $jumlahTotal ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</center>



@endsection