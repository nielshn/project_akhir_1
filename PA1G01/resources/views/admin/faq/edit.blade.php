@extends('layouts.backend.main')
@section('title')
    Edit FAQ
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form FAQ') }}</div>
                            <a href="{{ route('faq.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('faq.update', $faq->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="pertanyaan" class="form-label">{{ __('Pertanyaan') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                <input type="text" name="pertanyaan" class="form-control" id="namaFile"
                                    placeholder="Masukkan pertanyaan" value="{{ old('pertanyaan', $faq->pertanyaan) }}">
                                @error('pertanyaan')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jawaban" class="form-label">{{ __('Jawaban') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <textarea name="jawaban" class="form-control" id="description">{!! $faq->jawaban !!}</textarea>
                                @error('jawaban')
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
