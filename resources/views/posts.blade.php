@extends('layouts.main')

@section('container')

<div class="container">
      <h1 class="mb-lg-4">Info Pelayanan Pelanggan</h1>

    @foreach ($posts as $post)
      <article>
      <h3 class="mb-lg-1 mt-lg-3">{{ $post->title }}</h3>
      {!! $post->body !!}
      </article>
    @endforeach

    </div>

@endsection
