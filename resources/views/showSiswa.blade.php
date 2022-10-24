@extends('layout.admin')
@section('title', 'Show Siswa')
@section('content-title','Show Siswa')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                <img src="{{ asset('/template/img/'.$siswa->foto) }}" width="200" class=" rounded-circle img-thumbnail">
                <h4>{{$siswa->nama}}</h4>
                <h6><i class="fas fa-id-card"></i> {{$siswa->nisn}}</h6>
                <h6><i class="fas fa-venus-mars"></i> {{$siswa->jk}}</h6>
                <h6><i class="fas fa-map-marker"></i> {{$siswa->alamat}}</h6>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"> Contact Siswa</i></h6>
                </div>
                <div class="card-body text-center">
                @foreach ($contacts as $contact)
                <li>{{$contact->jenis_contact}} : {{$contact->pivot->deskripsi}}</li>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"> About Siswa</i></h6>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">{{$siswa->about}}</p>
                        <footer class="blockquote-footer">Di tulis oleh <cite title="Source Title">{{$siswa->nama}}</cite></footer>
                    </blockquote>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks"> Project Siswa</i></h6>
                </div>
                <div class="card-body text-center"></div>
            </div>
        </div>
    </div>
@endsection