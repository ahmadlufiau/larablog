@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                    <td><a href="artikel/{{ $items->id }}/komentar" class=" btn btn-warning">Lihat Komentar</a></td>
                                    <td><a href="" class=" btn btn-primary">Edit</a></td>
                                    <td>
                                        <form action="{{ route('artikel.destroy', $items->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    <div class="text-center">
                    <nav>
                        {{ $data->render() }}
                    </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection