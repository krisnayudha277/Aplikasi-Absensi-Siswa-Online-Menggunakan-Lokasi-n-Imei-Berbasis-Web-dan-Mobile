@extends('layouts.app')

@section('content')
 <section id="hero" class="d-flex align-items-center">

    <div class="container">
              <center>
      <div class="row" style="position: center">
             <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
         <div class="login-form">
    <form action="/absensi/{{$obat2->id}}/update" method="POST">
        <h2 class="text-center">Info Mata Kuliah</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="ID Mata Kuliah" required="required" value="{{ $obat2->id_mata_kuliah }}">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Mata Kuliah" required="required" value="{{ $obat2->mata_kuliah }}">
        </div>
              <div class="form-group">
            <input type="password" class="form-control" placeholder="Dosen" required="required" value="{{ $obat2->dosen }}">
        </div>
              <div class="form-group">
            <input type="password" class="form-control" placeholder="Hari" required="required" value="{{ $obat2->hari }}">
        </div>
              <div class="form-group">
            <input type="password" class="form-control" placeholder="Jam" required="required" value="{{ $obat2->jam }}">
        </div>
           <!--      <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox">I agree to the terms and services and privacy police</label><br>
      <a href="#" class="pull-right">Forgot Password?</a> -->
      <!--   </div>  -->  <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background: #F85F6A">Continue</button>
        </div>     
    </form>
<!--     <p class="text-center"><a href="#">Create an Account</a></p> -->
</div>
          </div>
        </div>
        </center>
      </div>

  </section><!-- End Hero -->


  <main id="main">

    <!-- ======= Clients Section ======= -->
    <!-- ======= Services Section ======= -->

    <!-- ======= F.A.Q Section ======= -->
  

    <!-- ======= Contact Section ======= -->

  </main><!-- End #main --><br>
@endsection('content')