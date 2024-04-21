@extends('layouts.frontend.main')
@section('title', 'Laporan Satuan Pengawas Internal - IT DEL')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5 class="m-0 text-white">Daftar File</h5>
                    </div>
                    <div class="card-body">
                        @if ($file->isEmpty())
                            <p class="text-center">Data Masih Kosong</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama File</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Unduh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($file as $index => $row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $row->namaFile }}</td>
                                                <td>
                                                    @php
                                                        $shortDescription = Str::words(strip_tags($row->description), 10);
                                                    @endphp
                                                    {{ $shortDescription }}
                                                </td>
                                                <td>
                                                    @if ($row->lampiran)
                                                        @if (Str::endsWith($row->lampiran, ['.pdf']))
                                                            <a href="{{ asset('uploads/file/' . $row->lampiran) }}"
                                                                class="btn btn-success btn-sm" target="_blank"><i
                                                                    class="fa fa-download"></i></a>
                                                        @else
                                                            <button type="button" class="btn btn-success btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal{{ $row->id }}">
                                                                <i class="fa fa-eye"></i>
                                                            </button>

                                                            <div class="modal fade" id="exampleModal{{ $row->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                {{ $row->namaFile }}</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <embed
                                                                                src="{{ asset('uploads/file/' . $row->lampiran) }}"
                                                                                width="100%" height="500px"
                                                                                type="{{ mime_content_type(public_path('uploads/file/' . $row->lampiran)) }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
