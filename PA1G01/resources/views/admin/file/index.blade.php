@extends('layouts.backend.main')
@section('title')
    Index File
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
                            <div class="card-title">{{ __('All File') }}</div>
                            <a href="{{ route('file.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                    class="fa fa-plus"></i> &nbsp;{{ __('Add File') }}</a>
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
                                        <th scope="col">Nama File</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($file as $row)
                                        <tr>
                                            <td>{{ $file->firstItem() + $loop->index }}</td>
                                            <?php
                                            $bodyWords = str_word_count(strip_tags($row->namaFile), 1);
                                            $shortBody = implode(' ', array_slice($bodyWords, 0, 6));
                                            ?>
                                            <td> {{ $shortBody }}...</td>
                                            <td>
                                                <button class="btn btn-success btn-sm modal-trigger" data-toggle="modal"
                                                    data-target="#myModal{{ $row->id }}"> <i
                                                        class="fas fa-eye"></i></button>
                                                <a href="{{ route('file.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('file.destroy', $row->id) }}" method="post"
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
                                            <td colspan="3" class="text-center">{{ 'Data Masih Kosong' }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @foreach ($file as $row)
                            <div class="modal fade" id="myModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data File</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Nama File:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->namaFile }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Lampiran</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>
                                                            @if ($row->lampiran)
                                                                @if (Str::endsWith($row->lampiran, ['.pdf']))
                                                                    <a href="{{ asset('uploads/file/' . $row->lampiran) }}"
                                                                        target="_blank">{{ $row->lampiran }}</a>
                                                                @else
                                                                    <embed
                                                                        src="{{ asset('uploads/file/' . $row->lampiran) }}"
                                                                        width="500" height="375"
                                                                        type="{{ mime_content_type(storage_path('app/uploads/file/' . $row->lampiran)) }}">
                                                                @endif
                                                            @else
                                                                -
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Deskripsi:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{!! $row->description !!}</p>
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
