@extends('layouts.backend.main')
@section('title')
    Edit Artikel
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">Edit Artikel</div>
                            <a href="{{ route('artikel.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fa fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('artikel.update', $artikel->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="judul" class="form-label">{{ __('Judul Artikel') }}</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <input type="text" name="judul" class="form-control" id="judul"
                                    value="{{ $artikel->judul }}">
                                @error('judul')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Body</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <textarea name="body" class="form-control" id="description">{{ $artikel->body }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <select name="kategori_id" class="form-control" id="kategori">
                                    @foreach ($kategori as $row)
                                        @if ($row->id == $artikel->kategori_id)
                                            <option value={{ $row->id }} selected='selected'>
                                                {{ $row->nama_kategori }}</option>
                                        @else
                                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label><span
                                aria-hidden="true" role="presentation" class="field_required"
                                style="color:#ee0000;">*</span>
                                <select name="is_active" class="form-control" id="status">
                                    <option value="1" {{ $artikel->is_active == '1' ? 'selected' : '' }}>Publish
                                    </option>
                                    <option value="0" {{ $artikel->is_active == '0' ? 'selected' : '' }}>Draft
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar Artikel</label>
                                <input type="file" name="gambar_article" class="form-control-file" id="gambar"> <br>
                                @error('gambar_article')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                                <div class="mt-3">
                                    <label for="gambar" class="form-label">Gambar Saat ini</label><br>
                                    <img src="{{ asset('uploads/artikel/' . $artikel->gambar_article) }}" width="160">

                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-sm" type="submit">{{ __('Update') }}</button>
                                <a id="btn-batal" href="{{ route('artikel.index') }}"
                                    class="btn btn-danger btn-sm">{{ __('Batal') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
