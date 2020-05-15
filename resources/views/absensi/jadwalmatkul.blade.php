@extends('layouts.app')

@section('content')
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
              <div class="row">
 
             <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
              <div style="margin-top: -100px">
      <table id="datatable" class="table table-bordered table-hover table-striped tblind">
            <center><h1>Daftar Mahasiswa</h1></center>
            <thead>
                <tr>
  <th style="width: 400px">Mata Kuliah</th>
    <th style="width: 500px">Dosen</th>
    <th style="width: 200px">Hari</th>
    <th style="width: 300px">Jam</th>
    <th style="width: 300px">Aksi</th>
    </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $data)
                <tr>
    <td>{{  $data->mata_kuliah }}</td>
        <td>{{  $data->dosen }}</td>
        <td>{{  $data->hari }}</td>
        <td>{{  $data->jam }}</td>
         <td>
              <a href="/absensi/absensi/{{ Auth::user()->id }}" class="btn btn-success detail">Absensi</a>
         </td>
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