@extends('layouts.backend.main')
@section('title')
    Index Laporan
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
                            <div class="card-title">{{ __('Data Pelapor') }}</div>
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
                                        <th scope="col">Nama Pelapor</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Lampiran</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pelapor as $row)
                                        <tr>
                                            <td>{{ $pelapor->firstItem() + $loop->index }}</td>
                                            <td>
                                                <a href="#" class="modal-trigger" data-toggle="modal"
                                                    data-target="#myModal{{ $row->id }}">{{ $row->nama_pelapor }}</a>
                                            </td>
                                            <td>
                                                @if ($row->created_at == null)
                                                    <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($row->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($row->lampiran)
                                                    @if (Str::endsWith($row->lampiran, ['.pdf', '.docx', '.jpeg', '.jpg', '.png']))
                                                        <a href="{{ asset('uploads/lampiran/' . $row->lampiran) }}"
                                                            class="btn btn-success btn-sm" download><i
                                                                class="fa fa-download"></i> Unduh</a>
                                                    @else
                                                        {{ $row->lampiran }}
                                                    @endif
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('laporan.destroy', $row->id) }}" method="post"
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

                        @foreach ($pelapor as $row)
                            <div class="modal fade" id="myModal{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Data Pelapor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Nama:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->nama_pelapor }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>No Telp:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->noTelepon }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Judul Laporan:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->judul_laporan }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Email:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->email }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Kategori yang dilapor:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->kategoriPelapor->nama_kategori }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Unit kerja Pelapor:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{{ $row->unit_pelapor }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <p><strong>Isi laporan:</strong></p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p>{!! $row->body !!}</p>
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
