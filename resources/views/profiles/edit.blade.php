@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.update', $profile) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama User</label>

                            <div class="col-md-6">
                                <select name="user_id" id="" class="form-control">
                                <option value="">Pilih Nama User</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input type="text" name="nama_lengkap" class="form-control"
                            value="{{ $profile->nama_lengkap ?? old('nama_lengkap') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                            <div class="col-md-6">
                                <textarea name="alamat" id="" cols="4" rows="5" class="form-control">{{ $profile->alamat }}</textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">Pekerjaan</label>

                            <div class="col-md-6">
                                <input type="text" name="pekerjaan" class="form-control"
                            value="{{ $profile->pekerjaan ?? old('pekerjaan') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Pendidikan</label>

                            <div class="col-md-6">
                                <input type="text" name="pendidikan" class="form-control"
                            value="{{ $profile->pendidikan ?? old('pendidikan') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">No Telepon</label>

                            <div class="col-md-6">
                                <input type="text" name="no_tlp" class="form-control"
                            value="{{ $profile->no_tlp ?? old('no_tlp') }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
