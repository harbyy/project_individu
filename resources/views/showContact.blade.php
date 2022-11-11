@if ($contact->isEmpty())
<h6>Siswa belum memiliki kontak</h6>
@else
@foreach($contact as $item)
<div class="card">
    <div class="card-header">
        <strong>{{$item->jenis_contact}}</strong>
    </div>
    <div class="card-body">
        <strong>Jenis Contact :</strong>
        <p>{{$item->jenis_contact}}</p>
        <strong>Deskripsi Contact :</strong>
        <p>{{$item->pivot->deskripsi}}</p>
    </div>
    <div class="card-footer">
        <!-- <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
        <a href="{{ route('masterContact.edit', $item->pivot->id)}}" class="btn btn-sm btn-warning btn-circle">
            <i class="fas fa-edit"></i>
        </a> -->
        <form action="/masterContact/{{$item->pivot->id}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
            <a href="{{ route('masterContact.edit', $item->pivot->id) }}" class="btn btn-sm btn-warning btn-circle">
                <i class="fas fa-edit"></i>
            </a>
        </form>
    </div>
</div>
<br>
@endforeach
@endif