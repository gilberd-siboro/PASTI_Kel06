@extends('utils.nav')
@section('admin')

<body>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="pagetitle">
                    <h1>Cabang</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Cabang</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cabang</h5>

                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode Cabang</th>
                                                <th scope="col">Nama Cabang</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Nama Kepala Cabang</th>
                                                <th scope="col">Kode Regional</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $cabang['kode_cabang'] }}</td>
                                                <td>{{ $cabang['nama_cabang'] }}</td>
                                                <td>{{ $cabang['alamat'] }}</td>
                                                <td>{{ $cabang['nama_kepala_cabang'] }}</td>
                                                <td>{{ $cabang['kode_regional'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sektor Terkait</h5>

                                    @if ($sektorServerDown)
                                        <p>Server sektor sedang down</p>
                                    @else
                                        <!-- Table with stripped rows -->
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kode Sektor</th>
                                                    <th scope="col">Nama Sektor</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nama Kepala Sektor</th>
                                                    <th scope="col">Kode Cabang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sektor as $sektors)
                                                <tr>
                                                    <td>{{ $sektors['kode_sektor'] }}</td>
                                                    <td>{{ $sektors['nama_sektor'] }}</td>
                                                    <td>{{ $sektors['alamat_sektor'] }}</td>
                                                    <td>{{ $sektors['nama_kepala_sektor'] }}</td>
                                                    <td>{{ $sektors['kode_cabang'] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
</body>
@endsection

</html>
