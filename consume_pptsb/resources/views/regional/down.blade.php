@extends('utils.nav')

@section('admin')
<body>
<main id="main" class="main">
    <div class="container">
        <div class="row">
            <div class="pagetitle">
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

            <div class="col-md-12 d-flex justify-content-center align-items-center" style="height: 50vh;">
                <h1>Server regional sedang down</h1>
                <!-- Anda dapat menambahkan pesan lain atau informasi tambahan di sini -->
            </div>
        </div>
    </div>
</main>
</body>
@endsection

</html>
