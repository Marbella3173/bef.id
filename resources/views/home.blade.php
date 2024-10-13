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

<!-- Second Section with Image Carousel -->
<section id="info-section" class="second-section py-5" style="background-color: #FFDD94;">
    <div class="container">
        <!-- Image Carousel -->
        <div id="carouselExample" class="carousel slide mb-4" data-ride="carousel">
            <div class="carousel-inner">
                <!-- First Carousel Item (3 images per item) -->
                <div class="carousel-item active">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/assets/carousel 1.jpg" class="d-block w-100 carousel-img" alt="First Image">
                        </div>
                        <div class="col-md-4">
                            <img src="/assets/carousel 2.png" class="d-block w-100 carousel-img" alt="Second Image">
                        </div>
                        <div class="col-md-4">
                            <img src="/assets/carousel 3.png" class="d-block w-100 carousel-img" alt="Third Image">
                        </div>
                    </div>
                </div>
                <!-- Second Carousel Item (3 images per item) -->
                <div class="carousel-item">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/assets/carousel 4.png" class="d-block w-100 carousel-img" alt="Fourth Image">
                        </div>
                        <div class="col-md-4">
                            <img src="/assets/carousel 5.jpg" class="d-block w-100 carousel-img" alt="Fifth Image">
                        </div>
                        <div class="col-md-4">
                            <img src="/assets/carousel 6.png" class="d-block w-100 carousel-img" alt="Sixth Image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Static Text Below the Carousel -->
        <div class="row text-center">
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

<!-- Self Active Learning Section -->
<section id="self-active-learning" class="self-active-learning" style="background-color: #FFFFFF;">
    <div class="container-fluid d-flex align-items-center" style="min-height: 100vh; margin: 0; padding-left: 0; padding-top: 0;">
        <div class="row no-gutters w-100">
            <!-- Left Side Image -->
            <div class="col-md-4 d-flex align-items-center justify-content-center" style="padding-right: 20px;">
                <img src="/assets/learning.png" alt="Background Image" class="img-fluid" style="opacity: 0.5; width: 100%; height: 100vh; object-fit: cover;">
            </div>
            <!-- Right Side Content -->
            <div class="col-md-8 d-flex flex-column justify-content-center">
                <h3 class="text-center font-weight-bold">Self Active Learning</h3>
                <div class="row text-center">
                    <div class="col-md-3">
                        <img src="/assets/learning 1.jpg" alt="Lembar Kerja" class="img-fluid d-block w-100 carousel-img">
                        <p>BEF.ID akan menyediakan lembar kerja untuk waktu tertentu dan membuat janji dengan orang tua agar soal dapat diserahkan melalui jasa pengiriman</p>
                    </div>
                    <div class="col-md-3">
                        <img src="/assets/learning 2.png" alt="Lembar Kerja Mandiri" class="img-fluid d-block w-100 carousel-img">
                        <p>Lembar kerja akan dilakukan secara mandiri oleh siswa di rumah masing-masing sehingga orang tua dapat memantau secara langsung</p>
                    </div>
                    <div class="col-md-3">
                        <img src="/assets/learning 3.jpg" alt="Tenggat Waktu" class="img-fluid d-block w-100 carousel-img">
                        <p>Setiap lembar kerja memiliki tenggat waktunya masing-masing yang harus dikumpulkan lewat website BEF.ID supaya guru dapat memeriksa serta mengoreksi pekerjaan siswa</p>
                    </div>
                    <div class="col-md-3">
                        <img src="/assets/learning 4.jpg" alt="Pembelajaran Online" class="img-fluid d-block w-100 carousel-img">
                        <p>Siswa akan melakukan pembelajaran online seminggu sekali untuk melakukan pembahasan materi yang bersangkutan dengan lembar kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Self Active Learning Price -->
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
            <a href="/form-daftar" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </div>
</section>
@endsection
