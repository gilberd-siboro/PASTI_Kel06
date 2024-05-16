@extends('utils.nav')
@section('admin')

<body>
    <main id="main" class="main">
        <div class="container">
            <div class="row">
                <div class="pagetitle">
                    <h1>Regional</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">Regional</li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Regional</h5>

                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode Regional</th>
                                                <th scope="col">Nama Regional</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Nama Kepala Regional</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $regional['kode_regional'] }}</td>
                                                <td>{{ $regional['nama_regional'] }}</td>
                                                <td>{{ $regional['alamat'] }}</td>
                                                <td>{{ $regional['nama_kepala_regional'] }}</td>
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
                                    <h5 class="card-title">Cabang Terkait</h5>

                                    @if ($cabangServerDown)
                                        <p>Server cabang sedang down</p>
                                    @else
                                        <!-- Table with stripped rows -->
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kode cabang</th>
                                                    <th scope="col">Nama cabang</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Nama Kepala cabang</th>
                                                    <th scope="col">Kode Regional</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cabang as $cabangs)
                                                <tr>
                                                    <td>{{ $cabangs['kode_cabang'] }}</td>
                                                    <td>{{ $cabangs['nama_cabang'] }}</td>
                                                    <td>{{ $cabangs['alamat'] }}</td>
                                                    <td>{{ $cabangs['nama_kepala_cabang'] }}</td>
                                                    <td>{{ $cabangs['kode_regional'] }}</td>
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
