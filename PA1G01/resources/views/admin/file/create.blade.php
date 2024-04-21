@extends('layouts.backend.main')
@section('title')
    Create File
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form File') }}</div>
                            <a href="{{ route('file.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="namaFile" class="form-label">{{ __('Nama File') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="namaFile" class="form-control" id="namaFile"
                                    placeholder="Enter Nama file">
                                @error('namaFile')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi') }}</label>
                                <textarea name="description" class="form-control" id="description"></textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">{{ __('File') }}</label><span aria-hidden="true"
                                    role="presentation" class="field_required" style="color:#ee0000;">*</span>
                                <input type="file" name="lampiran" class="form-control-file" id="file"
                                    accept=".pdf">
                                @error('lampiran')
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
