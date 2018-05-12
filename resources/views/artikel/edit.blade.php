@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Artikel</div>
                <div class="card-body">
                    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="judul" value="{{ $artikel->judul }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Isi</label>
                                <textarea name="isi" cols="30" rows="10" class="form-control">{{ $artikel->isi }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control"> <br>
                                @if (isset($artikel) && $artikel->gambar)
                                    <p><img src="{{ asset('public/gambar/'.$artikel->gambar) }}" class="img-responsive" alt="" width="100%"></p>
                                @endif
                            </div>     
                        </div>
                        <input type="hidden" name="jml_komentar" value="{{ $artikel->jml_komentar }}" class="form-control">
                        <button type="submit" class="btn btn-info">Simpan</button>
		                <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection