@extends('layouts.app')

@section('content')
 <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
 
             <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
         <div class="login-form">
    <form action="/absensi/jadwalmatkul/{{ Auth::user()->id}}/update" method="POST">
                     {{csrf_field()}}
        <h2 class="text-center">Data Diri</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Nim" required="required" value="{{ Auth::user()->nim }}">
        </div>
              <div class="form-group">
            <input type="text" class="form-control" placeholder="Jurusan" required="required" value="{{ Auth::user()->jurusan }}">
        </div>
              <div class="form-group">
            <input type="text" class="form-control" placeholder="Fakultas" required="required" value="{{ Auth::user()->fakultas }}">
        </div>
               
    </form>
           <a href="/absensi/jadwalmatkul" class="btn btn-primary btn-block" style="background: #F85F6A">Continue</a>
<!--     <p class="text-center"><a href="#">Create an Account</a></p> -->
</div>
          </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200"><br><br><br><br><br>
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <!-- ======= Services Section ======= -->

    <!-- ======= F.A.Q Section ======= -->
  

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main --><br>
@endsection
