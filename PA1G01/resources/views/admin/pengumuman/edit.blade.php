@extends('layouts.backend.main')
@section('title')
    Edit Pengumuman
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form File') }}</div>
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="judul_pengumuman" class="form-label">{{ __('Judul Pengumuman') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="judul_pengumuman" class="form-control" id="judul_pengumuman"
                                    placeholder="Enter Nama file"
                                    value={{ old('judul_pengumuman', $pengumuman->judul_pengumuman) }}>
                                @error('judul_pengumuman')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi') }}</label>
                                <textarea name="deskripsi" class="form-control" id="description">{{ $pengumuman->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="expired" class="form-label">{{ __('Expired Time') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="datetime-local" name="expired_time" class="form-control" id="expired" value="{{ old('expired_time', $pengumuman->expired_time) }}">
                                @error('expired_time')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">{{ __('File') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="file" name="lampiran" class="form-control-file" id="file"
                                    accept=".pdf, .docx">
                                @error('lampiran')
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
