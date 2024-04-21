@extends('layouts.backend.main')
@section('title')
    Create Pengumuman
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form Pengumuman') }}</div>
                            <a href="{{ route('pengumuman.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pengumuman.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">{{ __('Judul Pengumuman') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="judul_pengumuman" class="form-control" id="judul">
                                @error('judul_pengumuman')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Deskripsi') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <textarea name="deskripsi" class="form-control" id="description"></textarea>
                                @error('deskripsi')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="expired" class="form-label">{{ __('Expired Time') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="datetime-local" name="expired_time" class="form-control" id="expired">
                                @error('expired_time')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-8">
                                <label for="user_id" class="form-label">{{ __('Author') }}</label><span aria-hidden="true"
                                    role="presentation" class="field_required" style="color:#ee0000;">*</span>
                                <select name="user_id" class="form-control" id="user_id">
                                    @foreach ($user as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="lampiran" class="form-label">{{ __('Lampiran File') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <div class="btn btn-default btn-file">
                                    <i class="fas fa-paperclip"></i>
                                    <input type="file" name="lampiran" class="form-control-file" id="lampiran"
                                    accept=".pdf,.docx,.xlsx">
                                </div>
                                @error('lampiran')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mx-4">
                                <button class="btn btn-primary" type="submit">{{ __('Create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
