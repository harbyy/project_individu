@extends('layout.admin')
@section('title', 'Tambah Kontak')
@section('content-title', 'Tambah Kontak')
@section('content')
@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ url('createJenis/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden">
            <div class="form-group">
            </div>
            <div class="form-group">
                <label for="nama">Tambah Jenis Kontak</label>
                <textarea type="Tambah Janis Kontak" name="jenis_contact" id="Tambah Jenis Kontak" class="form-control"></textarea>
            </div>
            <br>
            <div class="form-group">
                <a href="{{ route('masterContact.index') }}" class="btn btn-danger">Batal</a>
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
</div>
@endsection