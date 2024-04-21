@extends('layouts.backend.main')
@section('title')
    Create Kategori Pelapor
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('Form Kategori Pelapor') }}</div>
                            <a href="{{ route('kategoriPelapor.index') }}" class="btn btn-warning btn-sm ml-auto "><i
                                    class="fa-solid fa-backward"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategoriPelapor.store') }}" method="post">
                            @csrf
                            @include('admin.kategori._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
