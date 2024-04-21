@extends('layouts.backend.main')
@section('title')
    Create Artikel
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form Artikel') }}</div>
                            <a href="{{ route('artikel.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">{{ __('Judul Artikel') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <input type="text" name="judul" class="form-control" id="judul"
                                    placeholder="Enter artikel">
                                @error('judul')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">{{ __('Deskripsi') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <textarea name="body" class="form-control" id="description"></textarea>
                                @error('body')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">{{ __('Kategori') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <select name="kategori_id" class="form-control" id="kategori">
                                    @foreach ($kategori as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">{{ __('Gambar Artikel') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <input type="file" name="gambar_article" class="form-control-file" id="gambar">
                                @error('gambar_article')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">{{ __('Status') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <select name="is_active" class="form-control" id="status">
                                    <option value="1">{{ __('Publish') }}</option>
                                    <option value="0">{{ __('Draft') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="submit">{{ __('Create') }}</button>
                                <button class="btn btn-danger btn-sm" type="reset">{{ __('Reset') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
