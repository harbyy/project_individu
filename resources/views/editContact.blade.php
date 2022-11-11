@extends('layout.admin')
@section('title', 'editContact')
@section('content-title','Edit Contact')
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
        <form method="post" enctype="multipart/form-data" action="{{ route('masterContact.update', $contact->id)}}">
            @csrf
            @method('put')
            <input type="hidden" name="siswa_id" value="{{ $contact->siswa_id }}">
            <div class="form-group">
                <label for="nama">Jenis Contact</label>
                <select class="form-control" id="jenis_contact_id" name="jenis_contact_id">
                    <option value="">Pilih Kontak</option>
                    @foreach ($jenis as $item)
                    <option value="{{ $item->id }}">{{$item->jenis_contact}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" >{{ $contact->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <a href="{{ route('masterContact.index') }}" class="btn btn-danger">Batal</a>
                <button type="submit" value="Update" class="btn btn-success">Simpan</button>
            </div>
        </form>

    </div>
</div>

@endsection