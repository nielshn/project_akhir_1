@extends('layouts.backend.main')
@section('title')
    Index Galeri
@endsection
@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
@endpush
@push('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cth').DataTable();
        });
    </script>
@endpush
@section('content')
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row d-flex">
                            <div class="card-title">{{ __('All Galeri') }}</div>
                            <a href="{{ route('galery.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                    class="fa fa-plus"></i> &nbsp;{{ __('Add Image') }}</a>
                        </div>
                    </div>
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
                        <div class="table-responsive">
                            <table id="cth" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Image</th>
                                        <th scope="col">Total Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($galery as $row)
                                        <tr>
                                            <td>{{ $galery->firstItem() + $loop->index }}</td>
                                            <?php
                                            $bodyWords = str_word_count(strip_tags($row->nama), 1);
                                            $shortBody = implode(' ', array_slice($bodyWords, 0, 3));
                                            ?>
                                            <td> {{ $shortBody }}...</td>
                                            <td> {{ $row->images->count() }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm modal-trigger" data-toggle="modal"
                                                    data-target="#myModal{{ $row->id }}"> <i
                                                        class="fas fa-eye"></i></button>
                                                <a href="{{ route('galery.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('galery.destroy', $row->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" id="btn-hapus"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">{{ 'Data Masih Kosong' }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @foreach ($galery as $row)
                            <div class="modal fade" id="myModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data Galery</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Judul Image:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->nama }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Slug:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->slug }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Image</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        @foreach ($row->images as $image)
                                                            <p><a href="{{ $image->url }}" target="_blank"><img
                                                                        src="{{ asset('uploads/galeri/' . $image->image) }}"
                                                                        alt="{{ $row->nama }}" width="80"></a></p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Created at</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>
                                                            @if ($row->created_at == null)
                                                                <span
                                                                    class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                                            @else
                                                                {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Author</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ Auth::user()->name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
