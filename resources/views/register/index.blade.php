@extends( 'layouts.main')

@section('container')
<div class="row justify-content-center">
 <div class="col-md-5">
<main class="form-registration">
  <h1 class="fs-3 mb-3 fw-normal text-center">Form Registrasi</h1>
  <form>
    <div class="form-floating">
      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
      <label for="floatingInput">Nama Lengkap</label>
    </div>
    <div class="form-floating">
      <input type="text" name="nomor_pelanggan" class="form-control" id="nomor_pelanggan" placeholder="Nomor Pelanggan">
      <label for="floatingInput">Nomor Pelanggan</label>
    </div>
    <div class="form-floating">
      <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat">
      <label for="floatingInput">Alamat</label>
    </div>
    <div class="form-floating">
      <input type="text" name="nomor_pelanggan" class="form-control" id="nomor_pelanggan" placeholder="Nomor Pelanggan">
      <label for="floatingInput">Nomor Pelanggan</label>
    </div>
        <div class="form-floating">
      <input type="nomor_hp" class="form-control" id="nomor_hp" placeholder="Nomor HP">
      <label for="floatingInput">Nomor HP</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3">

    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
  </form>
  <p class= "d-block fs-5 fw-normal text-center mt-3">Belum mendaftar? <a href="/register">Daftar sekarang!</a></p>
</main>

 </div>
</div>

@endsection