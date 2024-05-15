@extends('utils.nav')


@section('admin')
@include('sweetalert::alert')
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
                    <div>
                        <a href="{{ route('cabang.add') }}">
                            <button type="button" class="btn btn-warning rounded-pill">Tambah</button>
                        </a>
                    </div>
                </div><!-- End Page Title -->
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Cabang</h5

                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kode Cabang</th>
                                                <th scope="col">Nama Cabang</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Nama Kepala Cabang</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $cabang)
                                            <tr>
                                                <td>{{ $cabang['kode_cabang'] }}</td>
                                                <td>{{ $cabang['nama_cabang']}}</td>
                                                <td>{{ $cabang['alamat'] }}</td>
                                                <td>{{ $cabang['nama_kepala_cabang'] }}</td>
                                                <td>
                                                    <a href="{{ route('cabang.edit', $cabang['ID']) }}"><button type="button" class="btn btn-info rounded-pill">Edit</button></a>
                                                    <form action="{{ route('cabang.destroy', $cabang['ID']) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('Anda yakin ingin menghapus cabang ini?')">Delete</button>
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