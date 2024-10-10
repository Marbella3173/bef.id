@extends('navbar')

@section('title', 'Home')

@section('content')
<!-- First Section -->
<section id="welcome-section" class="first-section" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/background-home.png'); background-size: cover; background-position: center; height: 100vh; position: relative;">
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="text-center text-white" style="background-color: rgba(56, 182, 255, 0.5); padding: 20px;">
            <h1 class="display-4 font-weight-bold">Selamat Datang di BEF.ID</h1>
            <p class="lead">Better Education For Indonesia Digital Learning</p>
        </div>
    </div>
</section>

<!-- Second Section -->
<section id="info-section" class="second-section py-5" style="background-color: #FFDD94;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3 class="font-weight-bold">TENTANG KAMI</h3>
                <p>BEF.ID merupakan kursus yang memiliki visi misi mencerdaskan dan membantu para murid mencapai mimpinya serta meraih cita-cita masuk ke perguruan tinggi yang mereka inginkan.</p>
            </div>
            <div class="col-md-4">
                <h3 class="font-weight-bold">VISI</h3>
                <p>Menjadi perusahaan edukasi besar yang dimana bisa membantu siswa untuk meningkatkan kemampuannya baik secara akademik ataupun karakter mereka sebagai manusia yang berkualitas serta mampu merealisasikan cita-cita mereka dan mengembangkan peluang yang mereka miliki.</p>
            </div>
            <div class="col-md-4">
                <h3 class="font-weight-bold">PROGRAM KAMI</h3>
                <p>Offline / Online Class<br>Private Class<br>Self Active Learning</p>
            </div>
        </div>
    </div>
</section>

<!-- Self Active Learning Section - From Image 1 -->
<section id="self-active-learning" class="self-active-learning py-5" style="background-color: #FFFFFF;">
    <div class="container">
        <h3 class="text-center font-weight-bold">Self Active Learning</h3>
        <div class="row text-center">
            <div class="col-md-3">
                <img src="/path/to/first-image.png" alt="Lembar Kerja" class="img-fluid">
                <p>BEF.ID akan menyediakan lembar kerja untuk waktu tertentu dan membuat janji dengan orang tua agar soal dapat diserahkan melalui jasa pengiriman</p>
            </div>
            <div class="col-md-3">
                <img src="/path/to/second-image.png" alt="Lembar Kerja Mandiri" class="img-fluid">
                <p>Lembar kerja akan dilakukan secara mandiri oleh siswa di rumah masing-masing sehingga orang tua dapat memantau secara langsung</p>
            </div>
            <div class="col-md-3">
                <img src="/path/to/third-image.png" alt="Tenggat Waktu" class="img-fluid">
                <p>Setiap lembar kerja memiliki tenggat waktunya masing-masing yang harus dikumpulkan lewat website BEF.ID supaya guru dapat memeriksa serta mengoreksi pekerjaan siswa</p>
            </div>
            <div class="col-md-3">
                <img src="/path/to/fourth-image.png" alt="Pembelajaran Online" class="img-fluid">
                <p>Siswa akan melakukan pembelajaran online seminggu sekali untuk melakukan pembahasan materi yang bersangkutan dengan lembar kerja</p>
            </div>
        </div>
    </div>
</section>

<!-- Self Active Learning Section - From Image 2 -->
<section id="self-active-learning-promo" class="self-active-learning-promo py-5" style="background-color: #FFDD94;">
    <div class="container text-center">
        <h3 class="font-weight-bold">Self Active Learning</h3>
        <p class="lead">Pembelajaran terbaik bagi setiap murid</p>
        <div class="price-box" style="border: 2px solid #FF0000; padding: 20px; background-color: #FFF3E0; display: inline-block;">
            <p><del>Rp 395.000 / Month</del></p>
            <h2 class="font-weight-bold text-danger">Rp 350.000 / 1 Month</h2>
            <p>Best Price</p>
            <ul class="list-unstyled">
                <li>Lembar Kerja</li>
                <li>Jasa Pengiriman</li>
                <li>Website</li>
                <li>Pembelajaran Online</li>
            </ul>
            <a href="/register" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </div>
</section>
@endsection
