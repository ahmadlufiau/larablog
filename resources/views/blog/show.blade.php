@extends('layouts.index')
@section('title', $data -> judul)
@section('content')
<!-- Blog Main -->
<div class="col-sm-8 blog-main">
    <!-- Blog Post -->
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $data->judul }}</h2>
        <p class="blog-post-meta">{{ $data->created_at->format('d M Y') }} <a href="#">Mark</a></p>
        <p>{{ $data->isi }}</p>
    </div>
    <!--/ Blog Post -->
    <p>Terdapat {{ $data->jml_komentar }} komentar</p>
    <!-- Menampilkan komentar -->
    @foreach($data->komentars as $komentar)
    <blockquote>
        {{ $komentar->nama }}<br/>
        {{ $komentar->email }} <br/>
        {{ $komentar->isi }}
    </blockquote>
    @endforeach
    <!--/ Menampilkan komentar -->
    <!-- Menambahkan komentar -->
    <form action="{{ url('blog/komentar/store/') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="artikel_id" class="form-control" value="{{ $data->id }}">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Isi:</label>
            <textarea name="isi" cols="30" rows="10" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tambah Komentar</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
    </form>
    <!--/ Menambahkan komentar -->
</div>
<!--/ Blog Main -->
@endsection