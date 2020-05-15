@extends('layouts.app')

@section('content')
 <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
 
             <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
         <div class="login-form">
    <form action="{{ route('register') }}" method="POST">
                     @csrf
        <h2 class="text-center">Data Diri</h2>    
              <div class="form-group">
            <input id="email" name="email" type="text" class="form-control" placeholder="email" readonly  required="required">
        </div>
        
                  <div class="form-group">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password" readonly  required="required">
        </div>
                     <div class="form-group">
            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" readonly placeholder="confirm"  required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" style="background: #F85F6A">Log in</button>
        </div>     
    </form><br><br>
<!--     <p class="text-center"><a href="#">Create an Account</a></p> -->
</div>
          </div>

        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200"><br><br><br><br><br>
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
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
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->