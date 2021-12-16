@extends('layouts.app')
@section('title', 'Halaman Profile')
@include('alert')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-header">Data Profile</div>
                <div class="card-body">
                    <a href="{{ route('profiles.create') }}" class="btn btn-primary">Tambah Data</a>
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th>Nama User</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $profile->user_id }}</td>
                        <td>{{ $profile->nama_lengkap }}</td>
                        <td>{{ $profile->alamat }}</td>
                        <td>{{ $profile->pekerjaan }}</td>
                        <td>{{ $profile->pendidikan }}</td>
                        <td>{{ $profile->no_tlp }}</td>
                        <td>
                            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('profiles.edit', $profile) }}">Edit</a>
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')"
                                    class="btn btn-danger">Hapus</i>
                                </button>
                            </form>
                        </td>
                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="" style="display: none">
                        </form>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
