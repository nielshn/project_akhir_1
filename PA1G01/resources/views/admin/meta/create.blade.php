@extends('layouts.backend.main')
@section('title')
    Create Profil SPI
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form Profil SPI') }}</div>
                            <a href="{{ route('meta.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('meta.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="meta_key" class="form-label">{{ __('Profil Key') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="meta_key" class="form-control" id="meta_key"
                                    placeholder="Enter Meta_key">
                                @error('meta_key')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="meta_title" class="form-label">{{ __('Title Profil') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="meta_title" class="form-control" id="meta_title"
                                    placeholder="Enter Profile Title">
                                @error('meta_title')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi Profil') }}</label>
                                <textarea name="meta_description" class="form-control" id="description"></textarea>
                                @error('meta_description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="submit">{{ __('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
