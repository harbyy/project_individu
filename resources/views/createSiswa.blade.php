@extends('layout.admin')
@section('title', 'Create Siswa')
@section('content-title','Create Siswa')
@section('content')
    <div class="row">
        <div class="col-lg-12">
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
                    <form method="post" enctype="multipart/form-data" action="{{ route('masterSiswa.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">NAMA</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama') }}">
                        </div>
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="{{old('nisn') }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">ALAMAT</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat') }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">JENIS KELAMIN</label>
                            <select class="form-select form-control" id="jk" name="jk">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">FOTO SISWA</label>
                            <input type="file" class="form-control" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="about">ABOUT</label>
                            <textarea class="form-control" id="about" name="about" value="{{old('about') }}"></textarea>
                        </div>
                        <div class="form-group">
                            <!-- <a type="submit" class="btn btn-success">simpan</a> -->
                            <input type="submit" class="btn btn-success" value="simpan">
                            <a href="{{ route('masterSiswa.index') }}" class="btn btn-danger">batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection