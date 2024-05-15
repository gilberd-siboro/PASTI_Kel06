@extends('utils.nav')

@section('admin')
<body>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Sektor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Sektor</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit</h5>

                        <!-- General Form Elements -->
                        <form action="{{ route('sektor.update', $data['id']) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Kode Sektor</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $data['kode_sektor'] }}" name="kode_sektor">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nama sektor</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $data['nama_sektor'] }}" name="nama_sektor">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $data['alamat_sektor'] }}" name="alamat">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nama Kepala sektor</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ $data['nama_kepala_sektor'] }}" name="nama_kepala_sektor">
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit </button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
</body>
@endsection
</html>