@extends('layouts.frontend.main')

@section('title')
    Struktur Organisasi Satuan Pengawas Internal - IT DEL
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: 28px; font-weight: bold; margin-bottom: 1.5rem;">{{ $menu->meta_title }}</h2>
                        <p class="card-text" style="font-size: 16px;">{!! $menu->meta_description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow">
                    <div class="card-body">
                        <h2 class="card-title" style="font-size: 20px; font-weight: bold; margin-bottom: 1.5rem;">Kegiatan Terbaru</h2>
                        @foreach ($event as $row)
                            <div class="rpwe-li d-flex mb-3">
                                @if (file_exists(public_path('uploads/event/' . $row->gambar_event)))
                                    @php
                                        $resizedImage = Image::make(public_path('uploads/event/' . $row->gambar_event))->fit(120, 80);
                                    @endphp
                                    <img class="img-fluid me-3" style="object-fit: cover; border-radius: 8px; box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.1);" src="{{ $resizedImage->encode('data-url') }}" alt="Event Image">
                                @else
                                    <div class="image-not-found me-3" style="border-radius: 8px; box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.1);">
                                        <p class="text-danger">Gambar tidak ditemukan</p>
                                    </div>
                                @endif
                                <div class="rpwe-content">
                                    <?php
                                    $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                    $shortBody = implode(' ', array_slice($bodyWords, 0, 6));
                                    ?>
                                    <h6 class="card-title" style="font-size: 18px;"><a href="{{ route('detailEvent', [$row->id, $row->slug]) }}" class="text-primary">{{ $shortBody }}...</a></h6>
                                    <small class="text-muted" style="font-size: 14px;">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}</small>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="dropdown mt-3">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                View All
                            </button>
                            <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                                <a class="dropdown-item" href="{{ route('allArtikel') }}">Artikel</a>
                                <a class="dropdown-item" href="{{ route('allEvent') }}">Kegiatan</a>
                                <a class="dropdown-item" href="{{ route('allNews') }}">Berita</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .image-not-found {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px;
            background-color: #f8d7da;
            border: 2px dashed #dc3545;
            border-radius: 8px;
        }

        .image-not-found p {
            margin: 0;
            font-size: 16px;
            color: #dc3545;
            font-weight: bold;
        }
    </style>
@endsection
