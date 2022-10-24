@extends('layout.admin')
@section('title', 'Master Project')
@section('content-title','Master Project')
@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"> Data Siswa</i></h6>
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
                        <td>{{$item -> nisn}}</td>
                        <td>{{$item -> nama}}</td>
                        <td class="text-center">
                            <a class="btn btn-info btn-circle" onclick="show({{ $item->id }})">
                                <i class="fas fa-folder-open"></i>
                            </a>
                            <a href="{{ route('masterProject.tambah', $item->id )}}" class="btn btn-success btn-circle">
                                <i class="fas fa-plus"></i>
                            </a>
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
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks"> Project Siswa</i></h6>
            </div>
            <div id="project" class="card-body">
                <h6 class="text-center">Pilih siswa terlebih dahulu</h6>
            </div>
        </div>
    </div>
</div>

<script>
    function show(id){
        $.get('masterProject/'+id, function(data){
            $('#project').html(data);
        })
    }
</script>

@endsection