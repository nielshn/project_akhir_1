@extends('layouts.backend.main')
@section('title')
    Index Kategori Pelapor
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
                            <div class="card-title">{{ __('Data Kategori') }}</div>
                            <a href="{{ route('kategoriPelapor.create') }}" class="btn btn-primary btn-sm ml-auto"><i
                                    class="fa fa-plus"></i> &nbsp;Add Kategori</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="cth" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($kategoriPelapor as $row)
                                        <tr>
                                            <td>{{ $kategoriPelapor->firstItem() + $loop->index }}</td>
                                            <td>{{ $row->nama_kategori }}</td>
                                            <td>{{ $row->slug_kategori }}</td>
                                            <td>
                                                <a href="{{ route('kategoriPelapor.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('kategoriPelapor.destroy', $row->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm" id="btn-hapus"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">{{ 'Data Masih Kosong' }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
