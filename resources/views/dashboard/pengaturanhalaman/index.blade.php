@extends('dashboard.layout')

@section('konten')
        <form action="{{ route('pengaturanhalaman.update') }}" method="post">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2">About</label>
                <div class="col-sm-6">
                    <select class="form-control form-control-sm" name="_halaman_about">
                        <option value="">-Pilih-</option>
                        @foreach ($datahalaman as $item)
                            <option value="{{ $item->id }}" {{ get_meta_value('_halaman_about') == $item->id? 'selected' : ''}}>{{ $item->judul }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-sm-2">Interest</label>
                    <div class="col-sm-6">
                        <select class="form-control form-control-sm" name="_halaman_interest">
                            <option value="">-Pilih-</option>
                            @foreach ($datahalaman as $item)
                                <option value="{{ $item->id }}" {{ get_meta_value('_halaman_interest') == $item->id? 'selected' : ''}}>{{ $item->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Awards</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="_halaman_awards">
                                <option value="">-Pilih-</option>
                                @foreach ($datahalaman as $item)
                                    <option value="{{ $item->id }}" {{ get_meta_value('_halaman_awards') == $item->id? 'selected' : ''}}>{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Educations</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="_halaman_education">
                                <option value="">-Pilih-</option>
                                @foreach ($datahalaman as $item)
                                    <option value="{{ $item->id }}" {{ get_meta_value('_halaman_education') == $item->id? 'selected' : ''}}>{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Experience</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="_halaman_experience">
                                <option value="">-Pilih-</option>
                                @foreach ($datahalaman as $item)
                                    <option value="{{ $item->id }}" {{ get_meta_value('_halaman_experience') == $item->id? 'selected' : ''}}>{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Profile</label>
                        <div class="col-sm-6">
                            <select class="form-control form-control-sm" name="_halaman_profile">
                                <option value="">-Pilih-</option>
                                @foreach ($datahalaman as $item)
                                    <option value="{{ $item->id }}" {{ get_meta_value('_halaman_profile') == $item->id? 'selected' : ''}}>{{ $item->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
        </form>
@endsection