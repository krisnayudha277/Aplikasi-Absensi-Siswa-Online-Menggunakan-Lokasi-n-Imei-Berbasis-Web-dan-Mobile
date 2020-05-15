@extends('layouts.app')

@section('content')
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
              <div class="row">
 
             <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <div style="margin-top: -100px">
      <table id="datatable" class="table table-bordered table-hover table-striped tblind">
            <center><h1>Daftar Kehadiran</h1></center>
            <thead>
                <tr>
  <th style="width: 400px">Mata Kuliah</th>
    <th style="width: 500px">Nama</th>
    <th style="width: 200px">Absensi</th>
    </tr>
            </thead>
            <tbody>
                @foreach($kehadiran as $data)
                <tr>
    <td>{{  $data->mata_kuliah }}</td>
        <td>{{  $data->nama }}</td>
        <td>{{  $data->absensi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
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