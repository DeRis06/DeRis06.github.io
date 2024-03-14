@extends('dashboard.layout')

@section('konten')
 <p class="card-title">Pendidikan</p>
 <div class="pb-3"><a href="{{ route('education.create')}}" class="btn btn-primary">+Tambah Pendidikan</a></div>
 <div class="table-responsive">
    <table class = "table table-stripped">
        <thead>
            <tr>
                <th class="col-1">Nomor</th>
                <th>Jurusan</th>
                <th>Nama Sekolah</th>
                <th>Nilai/IPK</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal akhir</th>
                <th clas="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1;?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->info1 }}</td>
                <td>{{ $item->info2 }}</td>
                <td>{{ $item->tanggal_mulai_kerja }}</td>
                <td>{{ $item->tanggal_akir_kerja }}</td>
                <td><a href='{{ route('education.edit',$item->id) }}' class="btn btn-sm btn-warning">Edit</a>
                    <form onsubmit="return confirm('Are You Sure to delete?')"
                    action="{{ route('education.destroy',$item->id)}}"class="d-inline" method="post">
                    @csrf
                    @method('delete')
                        <button class="btn btn-sm btn-danger" type="submit" name="submit">Delete</button>
            </tr> 
            <?php $i++;?>
            @endforeach
            </tbody>
    </table>
 </div>
@endsection