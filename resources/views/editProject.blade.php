@extends('layout.admin')
@section('title', 'editProject')
@section('content-title','edit Project')
@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                        <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('masterProject.update', $project->id)}}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="nama">Nama Project</label>
                <input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ $project->nama_project }}">
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi Project</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" >{{ $project->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="nama">Tanggal Project</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $project->tanggal }}">
            </div>
            <div class="form-group">
                <a href="{{ route('masterProject.index') }}" class="btn btn-danger">Batal</a>
                <button type="submit" value="Update" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>


@endsection