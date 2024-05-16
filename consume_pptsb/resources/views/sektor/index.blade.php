
@extends('utils.nav')


@section('admin')
<body>
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="pagetitle">
                <h1>Sektor</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Sektor</li>
                    </ol>
                </nav>
                <div>
                    <a href="{{ route('sektor.add') }}">
                        <button type="button" class="btn btn-warning rounded-pill">Tambah</button>
                    </a>
                </div>
            </div><!-- End Page Title -->
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sektor</h5>
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kode Sektor</th>
                                            <th scope="col">Nama Sektor</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Nama Kepala Sektor</th>
                                            <th scope="col">Kode Cabang</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $sektor)
                                        <tr>
                                            <td>{{ $sektor['kode_sektor'] }}</td>
                                            <td>{{ $sektor['nama_sektor']}}</td>
                                            <td>{{ $sektor['alamat_sektor'] }}</td>
                                            <td>{{ $sektor['nama_kepala_sektor'] }}</td>
                                            <td>{{ $sektor['kode_cabang'] }}</td>
                                            <td>
                                                <a href="{{ route('sektor.edit', $sektor['id']) }}"><button type="button" class="btn btn-info rounded-pill">Edit</button></a>
                                                <form action="{{ route('sektor.destroy', $sektor['id']) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('Anda yakin ingin menghapus Regional ini?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            <!-- End Table with stripped rows -->
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
