
@extends('utils.nav')
@section('admin')

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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tambah Regional</h5>
                                <!-- General Form Elements -->
                                <form role="form" action="{{ route('regional.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Kode regional</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="kode_regional" required>
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Nama regional</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_regional" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">Nama Kepala regional</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_kepala_regional" required>
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

        </div>
    </div>
</main>

</body>
@endsection
</html>