@extends('layouts.index')
@section('title','Artikel')
@section('content')
<!-- Blog Main -->
<div class="col-sm-8 blog-main">
    <!-- Menampilkan seluruh artikel -->
    @foreach($artikels as $artikel)
    <!-- Blog Post -->
    <div class="blog-post">
        <h2 class="blog-post-title">{{ $artikel->judul }}</h2>
        <p class="blog-post-meta">{{ $artikel->created_at->format('d M Y') }} <a href="#">Mark</a></p>
        <p>{{ $artikel->baca_lanjut.'...' }} <a href="{{ url('blog', ['id' => $artikel->id]) }}">baca lanjut</a></p>
    </div>
    <!--/ Blog Post -->
    @endforeach
    <!--/ Menampilkan seluruh artikel -->
    <!-- Pagination -->
    <nav>
        <ul class="pager">
            <li><a href="{{ $artikels->previousPageUrl() }}">Previous</a></li>
            <li><a href="{{ $artikels->nextPageUrl() }}">Next</a></li>
        </ul>
    </nav>
    <!--/ Pagination -->
</div>
<!--/ Blog Main -->
@endsection