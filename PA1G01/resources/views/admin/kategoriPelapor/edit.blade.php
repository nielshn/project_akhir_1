@extends('layouts.backend.main')
@section('title')
Edit Kategori Pelapor
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">Edit kategoriPelapor <i>{{ $kategoriPelapor->nama_kategori }}</i>
                            </div>
                            <a href="{{ route('kategoriPelapor.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fas fa-undo"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategoriPelapor.update', $kategoriPelapor->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kategori" class="form-label">{{ __('Nama Kategori Pelapor') }}</label>
                                <input type="text" name="nama_kategori"
                                    value="{{ old('nama_kategori', $kategoriPelapor->nama_kategori) }}" class="form-control"
                                    id="kategori" placeholder="Enter kategori">
                                @error('nama_kategori')
                                    <span class="text-danger mt-2"{{ __('Update') }}></span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button id="btn-simpan" class="btn btn-primary btn-sm"
                                    type="submit">{{ $submit }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
