@extends('dashboard.layout')

@section('konten')
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-between">
                <div class="col-5">
                    <h4>Profile</h4>
                    @if (get_meta_value('_foto'))
                        <img style="max-width:100px;max-height:100px" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}">
                    @endif
                    <div class="mb-3">
                    <label for="_foto" class="form-label">Foto</label>
                    <input
                        type="file"
                        class="form-control form-control-sm"
                        name="_foto"
                        id="_foto"
                    />
                </div>
                <div class="mb-3">
                    <label for="_kota" class="form-label">Kota/Kabupaten</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_kota"
                        id="_kota"
                        value="{{ get_meta_value('_kota') }}"
                    />
                </div>
                <div class="mb-3">
                    <label for="_provinsi" class="form-label">Provinsi</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_provinsi"
                        id="_provinsi"
                        value="{{ get_meta_value('_provinsi') }}"
                    />
                </div>
                <div class="mb-3">
                    <label for="_nomor" class="form-label">Nomor Telepon</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_nomor"
                        id="_nomor"
                        value="{{ get_meta_value('_nomor') }}"
                    />
                </div>
                <div class="mb-3">
                    <label for="_email" class="form-label">Email</label>
                    <input
                        type="text"
                        class="form-control form-control-sm"
                        name="_email"
                        id="_email"
                        value="{{ get_meta_value('_email') }}"
                        />
                </div>
                <div class="col-5">
                    <h4>Akun Sosmed</h4>
                    <div class="mb-3">
                        <label for="_facebook" class="form-label">Facebook</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="_facebook"
                            id="_facebook"
                            value="{{ get_meta_value('_facebook') }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="_github" class="form-label">Github</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="_github"
                            id="_github"
                            value="{{ get_meta_value('_github') }}"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="_linkedin" class="form-label">Linkedin</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="_linkedin"
                            id="_linkedin"
                            value="{{ get_meta_value('_linkedin') }}"
                        />
                    </div>
                    <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
@endsection