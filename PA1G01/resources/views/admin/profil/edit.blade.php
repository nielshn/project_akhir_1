@extends('layouts.backend.main')
@section('title')
    Edit Data Diri
@endsection
<@section('content') <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            @foreach ($profil as $row)
                                <img src="{{ asset('uploads/galeri/' . $row->foto_profil) }}" class="img-fluid mb-3"
                                    alt="Foto Profil" width="300">
                            @endforeach
                            <input type="file" class="form-control-file" name="foto_profil" accept=".jpeg,.png">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @foreach ($profil as $row)
                            <form action="{{ route('profil.update', $row->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">{{ __('Nama Lengkap') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="nama"
                                            placeholder="{{ __('Nama Lengkap') }}"
                                            value="{{ old('name', Auth::user()->name) }}">
                                        @error('name')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">{{ __('Email') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', Auth::user()->email) }}" readonly>
                                        @error('email')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_telepon" class="col-sm-3 col-form-label">{{ __('No. Telepon') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="text" name="no_telepon" class="form-control" id="no_telepon"
                                            placeholder="{{ __('No. Telepon') }}"
                                            value="{{ old('no_telepon', Auth::user()->no_telepon) }}">
                                        @error('no_telepon')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 col-form-label">{{ __('Alamat') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ Auth::user()->alamat }}"
                                            id="alamat" name="alamat" placeholder="{{ __('Alamat') }}">
                                        @error('alamat')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="facebook" class="col-sm-3 col-form-label">{{ __('Facebook') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="facebook" name="facebook"
                                            placeholder="{{ __('Facebook') }}"
                                            value="{{ old('facebook', Auth::user()->facebook) }}">
                                        @error('facebook')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="twitter" class="col-sm-3 col-form-label">{{ __('Twitter') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="twitter" name="twitter"
                                            placeholder="{{ __('Twitter') }}" value="{{ old('twitter', $row->twitter) }}">
                                        @error('twitter')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="instagram" class="col-sm-3 col-form-label">{{ __('Instagram') }}</label><span
                                    aria-hidden="true" role="presentation" class="field_required"
                                    style="color:#ee0000;">*</span>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instagram" name="instagram"
                                            placeholder="{{ __('Instagram') }}"
                                            value="{{ old('instagram', $row->instagram) }}">
                                        @error('instagram')
                                            <span class="text-danger mt-2">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                                        <a href="{{ route('dashboard') }}"
                                            class="btn btn-secondary">{{ __('Batal') }}</a>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endsection
