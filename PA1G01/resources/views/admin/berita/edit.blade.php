@extends('layouts.backend.main')
@section('title')
    Edit Berita
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Edit Berita') }}</div>
                            <a href="{{ route('berita.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('berita.update', $berita->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="judulBerita" class="form-label">{{ __('Judul Berita') }}</label>
                                <span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <input id="judulBerita" type="text"
                                    class="form-control  @error('judulBerita') is-invalid @enderror" name="judulBerita"
                                    value="{{ old('judulBerita', $berita->judulBerita) }}" required
                                    autocomplete="judulBerita" autofocus>
                                @error('judulBerita')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('Isi Berita') }}</label>
                                <span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <textarea id="description" class="form-control  @error('body') is-invalid @enderror" name="body" required
                                    autocomplete="body" rows="6">{!! old('body', $berita->body) !!}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">{{ __('Kategori Berita') }}</label>
                                <span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <select id="kategori_id" class="form-control" name="kategori_id" required>
                                    <option value="">{{ __('Pilih kategori berita') }}</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('kategori_id', $berita->kategori_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="is_active" class="form-label">{{ __('Status') }}</label>
                                <span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <select id="is_active" class="form-control" name="is_active" required>
                                    <option value="1" {{ $berita->is_active == '1' ? 'selected' : '' }}>
                                        {{ __('Publish') }}</option>
                                    <option value="0" {{ $berita->is_active == '0' ? 'selected' : '' }}>
                                        {{ __('Draft') }}</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar_berita" class="form-label">{{ __('Gambar Berita') }}</label>
                                <input id="gambar_berita" type="file"
                                    class="form-control-file @error('gambar_berita') is-invalid @enderror"
                                    name="gambar_berita">
                                @if ($berita->gambar_berita)
                                    <div class="mt-3">
                                        <label for="gambar" class="form-label">{{ __('Gambar saat ini') }}</label><br>
                                        <img src="{{ asset('uploads/berita/' . $berita->gambar_berita) }}"
                                            alt="Gambar Berita" width="200">
                                    </div>
                                @endif
                                @error('gambar_berita')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    {{ __(' Update Berita') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
