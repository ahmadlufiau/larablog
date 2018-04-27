@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
            <br /> <br />
            <div class="card">
                <div class="card-header">Artikel</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                            <thead align="center">
                                <tr>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Komentar</th>
                                    <th colspan="3">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                <tr>
                                    <td>{{ $items->judul }}</td>
                                    <td>{{ substr(strip_tags($items->isi),0,100).'....' }}</td>
                                    <td>{{ $items->jml_komentar }}</td>
                                    <td><a href="{{-- {{ route('artikel.edit',$items->id) }} --}}" class=" btn btn-warning">Edit</a></td>
                                    <td><a href="{{-- artikel/{{ $items->id }} --}}" class=" btn btn-primary">Lihat</a></td>
                                    <td>
                                        <form action="{{-- {{ route('artikel.destroy', $items->id) }} --}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
