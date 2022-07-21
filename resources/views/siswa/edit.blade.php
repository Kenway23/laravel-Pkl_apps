@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Data Posts </div>

                    <div class="card-body">
                    <form action="{{ route('siswa.update', $post->id) }}" method="post">
                        @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="">Nis</label>
                                <input type="text" name="nis"
                                    class="form-control @error('nis') is-invalid @enderror" value ={{$post -> nis}}>
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nama Siswa</label>
                                <input type="text" name="nama_siswa"
                                    class="form-control @error('nama_siswa') is-invalid @enderror" value ={{$post -> nama_siswa}}>
                                @error('nama_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat Siswa</label>
                                <input type="text" name="alamat_siswa"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" value ={{$post -> alamat_siswa}}>
                                @error('alamat_siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" value ={{$post -> tanggal_lahir}}>
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection