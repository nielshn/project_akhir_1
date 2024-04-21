@extends('layouts.backend.main')
@section('title')
    Edit Kategori
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">Edit Kategori <i>{{ $kategori->nama_kategori }}</i></div>
                            <a href="{{ route('kategori.index') }}" class="btn btn-warning btn-sm ml-auto"><i
                                    class="fas fa-undo"></i>Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            @include('admin.kategori._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
