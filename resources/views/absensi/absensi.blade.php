 @section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop
 @extends('layouts.app')

@section('content')
 <section id="hero" class="d-flex align-items-center">

    <div class="container">
                <div class="row" style="position: center">
             <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
         <div class="login-form">
    <form action="/absensi/jadwalmatkul/{{ Auth::user()->id}}/insert" method="POST">

               {{csrf_field()}}
        <h2 class="text-center">Absensi</h2>       
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Mata Kuliah" required="required" id="mata_kuliah" name="mata_kuliah">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Nama" required="required" readonly  name="nama" id="nama" value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" placeholder="Nim" required="required" readonly id="nim" name="nim" value="{{ Auth::user()->nim }}">
        </div>
              <div class="form-group">
            <input type="number" class="form-control" placeholder="Imei" required="required" readonly id="imei" name="imei" value="{{ Auth::user()->imei }}">
        </div>
            <div class="form-group">
            <input type="text" class="form-control" placeholder="Absensi" required="required" id="absensi" name="absensi">
        </div>
                 
         <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background: #F85F6A">Continue</button>
        </div>   
           <!--      <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox">I agree to the terms and services and privacy police</label><br>
      <a href="#" class="pull-right">Forgot Password?</a> -->
      <!--   </div>  -->  <br>  
    </form>
<!--     <p class="text-center"><a href="#">Create an Account</a></p> -->
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
@endsection('content')