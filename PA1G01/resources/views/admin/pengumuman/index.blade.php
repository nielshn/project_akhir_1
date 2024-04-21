@extends('layouts.backend.main')
@section('title')
    Index Pengumuman
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
                            <a href="{{ route('pengumuman.create') }}" class="btn btn-primary btn-sm ml-auto"><i
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
                                        <th scope="col">Nama Pengumuman</th>
                                        <th scope="col">File Pengumuman</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pengumuman as $row)
                                        <tr>
                                            <td>{{ $pengumuman->firstItem() + $loop->index }}</td>
                                            <?php
                                            $bodyWords = str_word_count(strip_tags($row->judul_pengumuman), 1);
                                            $shortBody = implode(' ', array_slice($bodyWords, 0, 6));
                                            ?>
                                            <td> {{ $shortBody }}...</td>
                                            <td>
                                                @if ($row->lampiran)
                                                    @if (Str::endsWith($row->lampiran, ['.pdf', '.docx']))
                                                        <a href="{{ asset('uploads/pengumuman/' . $row->lampiran) }}"
                                                            target="_blank">{{ $row->lampiran }}</a>
                                                    @else
                                                        <embed src="{{ asset('uploads/pengumuman/' . $row->lampiran) }}"
                                                            width="500" height="375"
                                                            type="{{ mime_content_type(public_path('uploads/pengumuman/' . $row->lampiran)) }}"></embed>
                                                    @endif
                                                    <?php $size = filesize(public_path('uploads/pengumuman/' . $row->lampiran)); ?>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            </td>
                                            <td>
                                                <button class="btn btn-success btn-sm modal-trigger" data-toggle="modal"
                                                    data-target="#myModal{{ $row->id }}"> <i
                                                        class="fas fa-eye"></i></button>
                                                <a href="{{ route('pengumuman.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('pengumuman.destroy', $row->id) }}" method="post"
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

                        @foreach ($pengumuman as $row)
                            <div class="modal fade" id="myModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data Pengumuman</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Judul Pengumuman:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->judul_pengumuman }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Deskripsi</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{!! $row->deskripsi !!}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>File Lampiran</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>
                                                            @if ($row->lampiran)
                                                                @if (Str::endsWith($row->lampiran, ['.pdf', '.docx']))
                                                                    <a href="{{ asset('uploads/pengumuman/' . $row->lampiran) }}"
                                                                        target="_blank">{{ $row->lampiran }}</a>
                                                                @else
                                                                    <embed
                                                                        src="{{ asset('uploads/pengumuman/' . $row->lampiran) }}"
                                                                        width="500" height="375"
                                                                        type="{{ mime_content_type(public_path('uploads/pengumuman/' . $row->lampiran)) }}"></embed>
                                                                @endif
                                                                <?php $size = filesize(public_path('uploads/pengumuman/' . $row->lampiran)); ?>
                                                            @else
                                                                -
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Size File</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ isset($size) ? number_format($size / 1024, 2) . ' KB' : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Author</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->user->name }}</p>
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
