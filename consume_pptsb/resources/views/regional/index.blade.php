@extends('utils.nav')


@section('admin')
@include('sweetalert::alert')
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
                    <div>
                        <a href="{{ route('regional.add') }}">
                            <button type="button" class="btn btn-warning rounded-pill">Tambah</button>
                        </a>
                    </div>
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
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $regional)
                                            <tr>
                                                <td>{{ $regional['kode_regional'] }}</td>
                                                <td>{{ $regional['nama_regional']}}</td>
                                                <td>{{ $regional['alamat'] }}</td>
                                                <td>{{ $regional['nama_kepala_regional'] }}</td>
                                                <td>
                                                    <a href="{{ route('regional.edit', $regional['ID']) }}"><button type="button" class="btn btn-info rounded-pill">Edit</button></a>
                                                    <form action="{{ route('regional.destroy', $regional['ID']) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger rounded-pill" data-confirm-delete="true">Delete</button>
                                                    </form>
                                                    <a href="{{ route('regional.detail', $regional['ID']) }}"><button type="button" class="btn btn-success rounded-pill">Detail</button></a>
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