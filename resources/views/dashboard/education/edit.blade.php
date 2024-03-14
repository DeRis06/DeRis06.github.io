@extends('dashboard.layout')
@section('konten')
    <div class="pb-3"><a href="{{ route('education.index' )}}" class ="btn btn-secondary">
        << kembali</a></div>
        <form action="{{ route('education.update', $data->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="judul" class="form-label">Jurusan</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="judul"
                    id="judul"
                    aria-describedby="helpId"
                    placeholder="Jurusan" value="{{ $data->judul }}"
                />
            </div>
            <div class="mb-3">
                <label for="info1" class="form-label">Nama Sekolah</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="info1"
                    id="info1"
                    aria-describedby="helpId"
                    placeholder="Nama Sekolah" value="{{ $data->info1 }}"
                />
            </div>
            <div class="mb-3">
                <label for="info2" class="form-label">IPK/Nilai</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="info2"
                    id="info2"
                    aria-describedby="helpId"
                    placeholder="IPK/Nilai" value="{{ $data->info2 }}"
                />
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-auto">Tanggal Mulai</div>
                    <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tanggal_mulai"
                        placeholder="dd/mm/yyyy" value="{{ $data->tanggal_mulai }}"></div>
                    <div class="col-auto">Tanggal Akhir</div>
                    <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tanggal_akir"
                        placeholder="dd/mm/yyyy" value="{{ $data->tanggal_akir }}"></div>
                </div>
                <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
            </div>
        </form>
@endsection