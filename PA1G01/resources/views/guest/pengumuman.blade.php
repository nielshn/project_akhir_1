@extends('layouts.frontend.main')
@section('title')
    Pengumuman Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Pengumuman</th>
                    <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengumuman as $index => $announcement)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><a href="{{ route('announcement.detail', [$announcement->id, $announcement->slug]) }}">
                                {{ $announcement->judul_pengumuman }}</a>
                        </td>
                        <td>{{ $announcement->user->name }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Data Masih Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <style type="text/css" media="all">
        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
            padding: 12px 15px;
            background-color: #f8f9fa;
        }

        .table th {
            background-color: #343a40;
            color: #fff;
            border: none;
            border-radius: 8px 8px 0 0;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
            border-radius: 0 0 8px 8px;
        }
    </style>
@endsection
