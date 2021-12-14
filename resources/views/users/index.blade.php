@extends('layouts.app')
@section('title', 'Halaman User')
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
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Data</a>
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
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
