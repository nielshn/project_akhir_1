@extends('layouts.frontend.main')
@section('title')
    Detail Pengumuman Satuan Pengawas Internal - IT DEL
@endsection

@section('content')

    <div class="page-header">
        <h1><b>
                @foreach ($user as $u)
                    <font color="#800080"> [{{ $u->name }}] </font>
                @endforeach
                <font color="#0000FF"> {{ $pengumuman->judul_pengumuman }}</font>
            </b></h1>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10">
                <div class="box box-solid">
                    <div class="box-body">
                        <p>{!! $pengumuman->deskripsi !!}</p>
                    </div>
                </div>
            </div>
            @if ($pengumuman->lampiran)
                <div class="col-sm-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama File:</th>
                                        <th scope="col">Size:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            @if ($pengumuman->lampiran)
                                                @php
                                                    $lampiranPath = public_path('uploads/pengumuman/' . $pengumuman->lampiran);
                                                @endphp

                                                @if (file_exists($lampiranPath))
                                                    @if (Str::endsWith($pengumuman->lampiran, ['.pdf', '.docx']))
                                                        <a href="{{ asset('uploads/pengumuman/' . $pengumuman->lampiran) }}"
                                                            target="_blank">{{ $pengumuman->lampiran }}</a>
                                                    @else
                                                        <embed
                                                            src="{{ asset('uploads/pengumuman/' . $pengumuman->lampiran) }}"
                                                            width="500" height="375"
                                                            type="{{ mime_content_type($lampiranPath) }}"></embed>
                                                    @endif

                                                    <?php $size = filesize($lampiranPath); ?>
                                                @else
                                                    <p class="text-danger">File lampiran tidak ditemukan</p>
                                                @endif
                                            @else
                                                -
                                            @endif

                                        </td>
                                        <td>
                                            {{ isset($size)
                                                ? ($size >= 1024 * 1024 * 1024
                                                    ? number_format($size / (1024 * 1024 * 1024), 2) . ' GB'
                                                    : ($size >= 1024 * 1024
                                                        ? number_format($size / (1024 * 1024), 2) . ' MB'
                                                        : number_format($size / 1024, 2) . ' KB'))
                                                : '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-8">
                <div class="box box-solid">
                    <div class="box-body">Salam, <br>
                        <br>
                        <br>
                        Sitoluama, @if ($pengumuman->created_at == null)
                            <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                        @else
                            {{ Carbon\Carbon::parse($pengumuman->created_at)->format('Y-m-d') }}
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box box-solid">
                    <div class="box-body mb-5">
                        ttd
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="box box-solid">
                    <div class="box-body">
                        @foreach ($user as $u)
                            {{ $u->name }}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <p>Expired Time {{ Carbon\Carbon::parse($pengumuman->expired_time)->format('Y-m-d') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
