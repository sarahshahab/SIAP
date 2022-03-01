@extends('layouts.main')

@section('container')
<div class="container text-center mb-5">
    <h2>SELAMAT DATANG</h2>
    <p>Silahkan pilih layanan yang anda butuhkan untuk mengambil nomor antrean!</p>
        <hr class="solid mt-4">
</div>
<div class="form-group">
    <label for="exampleFormControlSelect1">Pilih cabang PDAM Tirta Khatulistiwa yang Ingin dikunjungi:</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
</div>
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h5 class="card-title">Primary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
  </div>
</div>

<div class="card mt-5 mb-5">
  <h5 class="card-header text-center">Pelayanan Pembayaran</h5>
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mb-3">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      <div class="col-sm-2 mb-3 text-center">
        <div class="text-white bg-info p-2 rounded">
          <p>Hari ini</p>
          <h1>11</h1>
          <p>Antrean terdaftar</p>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="container text-center col-6 mt-3 mb-3">
    <a href="/antrian-pembayaran" class="btn btn-primary">Antri untuk Pelayanan Pembayaran</a>
  </div>
</div>

<div class="card mt-5 mb-5">
  <h5 class="card-header text-center">Pelayanan Pengaduan</h5>
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mb-3">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      <div class="col-sm-2 mb-3 text-center">
        <div class="text-white bg-info p-2 rounded">
          <p>Hari ini</p>
          <h1>11</h1>
          <p>Antrean terdaftar</p>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="container text-center mt-3 mb-3">
    <a href="/antrian-pembayaran" class="btn btn-primary">Antri untuk Pelayanan Pengaduan</a>
  </div>
</div>

<div class="card mt-5 mb-5">
  <h5 class="card-header text-center">Pelayanan Sambungan Baru</h5>
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mb-3">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      <div class="col-sm-2 mb-3 text-center">
        <div class="text-white bg-info p-2 rounded">
          <p>Hari ini</p>
          <h1>11</h1>
          <p>Antrean terdaftar</p>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="container text-center mt-3 mb-3">
    <a href="/antrian-pembayaran" class="btn btn-primary">Antri untuk Pelayanan Sambungan Baru</a>
  </div>
</div>

<div class="card mt-5 mb-5">
  <h5 class="card-header text-center">Pelayanan Pasang Kembali</h5>
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mb-3">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      <div class="col-sm-2 mb-3 text-center">
        <div class="text-white bg-info p-2 rounded">
          <p>Hari ini</p>
          <h1>11</h1>
          <p>Antrean terdaftar</p>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="container text-center mt-3 mb-3">
    <a href="/antrian-pembayaran" class="btn btn-primary">Antri untuk Pelayanan Pasang Kembali</a>
  </div>
</div>
@endsection


