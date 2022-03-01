@extends('layouts.main')

@section('container')
<div class="container text-center mb-5 mt-3">
    <h3>DETAIL PELANGGAN PELAYANAN PEMBAYARAN TAGIHAN</h1>
    <p>Silahkan periksa kembali identitas pelanggan yang telah terdata dibawah ini sebelum melanjutkan untuk melakukan pelayanan<p>
    <hr class="solid mt-4">
</div>

<div class="card mt-5 mb-5">
  <h5 class="card-header text-center">PDAM TIRTA KHATULISTIWA PONTIANAK</h5>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <p class="card-text text-left">Nama PAM:</p>
          <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
        </li>
        <li class="list-group-item">
          <p class="card-text text-left">Nomor Pelanggan:</p>
          <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
        </li>
        <li class="list-group-item">
          <p class="card-text text-left">Nama Pelanggan:</p>
          <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
        </li>
        <li class="list-group-item">
          <p class="card-text text-left">Alamat Pelanggan:</p>
          <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
        </li>
        <li class="list-group-item">
          <p class="card-text text-left">Stand Meter:</p>
          <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
        </li>
        <li class="list-group-item">
          <p class="card-text text-left">Total Tagihan:</p>
          <input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly>
        </li>
      </ul>
    </div>
  </div>
  <div class="container text-center mt-3 mb-3 col-6">
    <a href="#" class="btn btn-primary">Lanjutkan</a>
  </div>
</div>
@endsection
