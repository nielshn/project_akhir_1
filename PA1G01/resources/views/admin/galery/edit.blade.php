@extends('layouts.backend.main')
@section('title')
    Edit Galeri
@endsection
@section('content')
    <div class="container">5
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">Edit Foto Galery</div>
                            <a href="{{ route('galery.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('galery.update', $galery->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="judul" class="form-label">{{ __('Judul Image') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="nama" class="form-control" id="judul"
                                    value="{{ old('nama', $galery->nama) }}" placeholder="Enter artikel">
                                @error('nama')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi Image') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <textarea type="text" name="description" class="form-control" id="description">{{ old('description', $galery->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">{{ __('Current Image') }}</label>
                                <div class="row">
                                    @foreach ($galery->images as $key => $photo)
                                        <div class="col-md-">
                                            <button type="button" class="btn btn-link"
                                                onclick="window.open('{{ asset('uploads/galeri/' . $photo->image) }}', '_blank')">
                                                <img src="{{ asset('uploads/galeri/' . $photo->image) }}" width="140">
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="new_images" class="form-label">{{ __('New Images') }}</label>
                                <input type="file" name="image[]" class="form-control-file" id="new_images"
                                    multiple>
                                @error('image')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="submit">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
