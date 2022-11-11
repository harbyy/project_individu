@extends('layout.admin')
@section('title', 'Master Contact')
@section('content-title','Master Contact')
@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif

{{-- dckdacbcklsnladnclnldc --}}
<div class="row">
    <div class="col-lg">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-address-card">Jenis Kontak</i></h6>
            </div>
            <div class="card-body">
                <table class="table table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kontak</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contact as $i=> $item)
                        <tr>
                            <td scope="row">{{++ $i}}</td>
                            <td>{{ $item->jenis_contact }}</td>
                            <td class="text-center">
                                <form action="/masterContact/hapus/{{$item->id}}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-end">
                    {{ $contact->links() }}
                    &nbsp;
                    &nbsp;
                    <div style="font-weight: 500;">
                        <a href="/createJenis" class="btn btn-success">Tambah Kontak</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user">Data Siswa</i></h6>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">NISN</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item -> nisn }}</td>
                            <td>{{ $item -> nama }}</td>
                            <td class="text-center">
                                <a class="btn btn-info" onclick="show({{ $item->id }})"><i class="fas fa-folder-open"></i></a>
                                <a class="btn btn-success" href="/masterContact/create/{{ $item -> id }}"><i class="fas fa-plus"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer d-flex justify-content-end">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks">Contact Siswa</i></h6>
            </div>
            <div class="card-body" id="contact">
                <h6 class="text-center">Pilih siswa terlebih dahulu</h6>
            </div>
        </div>
    </div>
</div>

<script>
    function show(id) {
        $.get('masterContact/' + id, function(data) {
            $('#contact').html(data);
        });
    }
</script>

@endsection