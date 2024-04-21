@extends('layouts.backend.main')
@section('title')
    Data Diri
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session()->get('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <script>
                                // Membuat pesan success menghilang secara otomatis setelah 3 detik
                                setTimeout(function() {
                                    $('.alert-success').fadeOut('slow');
                                }, 2400);
                            </script>
                        @endif
                        <div class="row">
                            {{-- <div id="avatar-block" class="col-sm-3">
                                <div class="box box-solid ">
                                    <div id="avatar-block-body" class="box-body">
                                        <img src="{{ asset('uploads/profil/'. Auth::user()->foto_profil) }}"
                                            width="160">
                                    </div>
                                </div>
                            </div> --}}
                            <div id="detail-block" class="col-sm-6 mx-auto">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Profil Admin</h3>
                                    </div>
                                    <div id="detail-block-body" class="box-body">
                                        <table id="w0" class="table table-condensed detail-view">
                                            <tbody>
                                                <tr>
                                                    <th class="col-sm-3">{{ __('Nama') }}</th>
                                                    <td>{{ Auth::user()->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">{{ __('Email') }}</th>
                                                    <td>{{ Auth::user()->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">{{ __('Mobile Phone') }}</th>
                                                    <td>{{ Auth::user()->no_telepon }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">{{ __('Facebook') }}</th>
                                                    <td>{{ Auth::user()->facebook }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">{{ __('Twitter') }}</th>
                                                    <td>{{ Auth::user()->twitter }}</td>
                                                </tr>
                                                <tr>
                                                    <th class="col-sm-3">{{ __('Instagram') }}</th>
                                                    <td>{{ Auth::user()->instagram }}</td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
