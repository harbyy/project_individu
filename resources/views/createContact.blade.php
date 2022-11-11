@extends('layout.admin')
@section('title', 'createContact')
@section('content-title','createContact')
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
        <form method="post" enctype="multipart/form-data" action="{{ url('masterContact/store', $siswa->id) }}">
            @csrf
            <input type="hidden" name="siswa_id" value="{{ $siswa->id }}">
            <div class="form-group">
                <label for="nama">Jenis</label>
                <select name="jenis_contact_id" id="jenis_contact_id" class="form-control">
                    <option>Pilih Kontak</option>
                    @foreach ($jenis as $item)
                    <option value="{{ $item->id }}">{{ $item->jenis_contact }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi</label>
                <textarea type="deskripsi" name="deskripsi" id="deskripsi" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <a href="{{ route('masterContact.index') }}" class="btn btn-danger">Batal</a>
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
</div>
@endsection