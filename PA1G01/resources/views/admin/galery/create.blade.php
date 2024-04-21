@extends('layouts.backend.main')
@section('title')
    Create Galeri
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form Galeri') }}</div>
                            <a href="{{ route('galery.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('galery.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">{{ __('Judul Image') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="nama" class="form-control" id="judul"
                                    placeholder="Enter artikel">
                                @error('nama')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi Image') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <textarea type="text" name="description" class="form-control" id="description"></textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">{{ __('Image') }}</label><span aria-hidden="true"
                                    role="presentation" class="field_required" style="color:#ee0000;">*</span>
                                <input type="file" name="image[]" class="form-control-file" id="gambar"
                                    accept="image/*" multiple>
                                @error('image')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
