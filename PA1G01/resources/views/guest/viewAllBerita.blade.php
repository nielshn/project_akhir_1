@extends('layouts.frontend.main')
@section('title')
    All Berita Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-9">
                <h4 class="widgettitle" style="margin-bottom: 1.5em">DEL NEWS</h4>
            </div>
            <div class="col-lg-3">
                <div class="mb-3 wow slideInUp" data-wow-delay="0.1s">
                    <div class="input-group">
                        <input type="text" id="searchInput" class="form-control p-1" placeholder="Search">
                        <button class="btn btn-primary px-2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @php $count = 0; @endphp
            @foreach ($berita as $row)
                <div class="col-md-3 mb-4 cardColumn">
                    <div class="card h-100">
                        @if (file_exists(public_path('uploads/berita/' . $row->gambar_berita)))
                            @php
                                $resizedImage = Image::make(public_path('uploads/berita/' . $row->gambar_berita))->fit(300, 200);
                            @endphp
                            <img class="card-img-top" src="{{ $resizedImage->encode('data-url') }}" alt="Berita Image">
                        @else
                            <div class="image-not-found">
                                <p class="text-danger">
                                    Gambar tidak ditemukan
                                </p>
                            </div>
                        @endif
                        <div class="card-body">
                            <?php
                            $bodyWords = str_word_count(strip_tags($row->judulBerita), 1);
                            $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                            ?>
                            <h5 class="rpwe-title"><a href="{{ route('detailBerita', [$row->id, $row->slug]) }}"
                                    class="h6 fw-medium d-flex align-items-center mb-0 text-primary">{{ $shortBody }}...</a>
                            </h5>
                            <small
                                class="text-muted">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}</small>
                        </div>
                    </div>
                </div>
                @php $count++; @endphp
                @if ($count % 4 === 0)
        </div>
        <div class="row">
            @endif
            @endforeach
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                {{ $berita->links() }}
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="categoryDropdown"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                View All
            </button>
            <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                <a class="dropdown-item" href="{{ route('allArtikel') }}">Artikel</a>
                <a class="dropdown-item" href="{{ route('allEvent') }}">Kegiatan</a>
                <a class="dropdown-item" href="{{ route('allNews') }}">Berita</a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style type="text/css" media="all">
        .card {
            border: none;
            /* Hilangkan border default */
            border-radius: 10px;
            /* Berikan sudut melengkung pada card */
            box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
            /* Tambahkan efek shadow */
            transition: box-shadow 0.3s ease;
            /* Animasi transisi ketika hover */
        }

        .card:hover {
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            /* Efek shadow saat hover */
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .image-not-found {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 200px;
            /* Sesuaikan dengan tinggi gambar yang diharapkan */
            background-color: #f8d7da;
            /* Warna latar belakang yang sesuai */
            border: 2px dashed #dc3545;
            /* Garis putus-putus merah */
        }

        .image-not-found p {
            margin: 0;
            font-size: 16px;
            color: #dc3545;
            /* Warna teks merah yang sesuai */
            font-weight: bold;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                var $cardColumns = $('.cardColumn');

                $cardColumns.each(function() {
                    var cardText = $(this).text().toLowerCase();
                    if (cardText.indexOf(value) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                if ($cardColumns.filter(':visible').length === 0) {
                    $('.no-results').show();
                } else {
                    $('.no-results').hide();
                }
            });

            $('#categoryFilter').on('change', function() {
                var selectedCategory = $(this).val();
                var $cardColumns = $('.cardColumn');

                $cardColumns.each(function() {
                    var cardCategory = $(this).data('category').toLowerCase();
                    if (selectedCategory === 'all' || cardCategory === selectedCategory
                        .toLowerCase()) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                if ($cardColumns.filter(':visible').length === 0) {
                    $('.no-results').show();
                } else {
                    $('.no-results').hide();
                }
            });

            if ($('.cardColumn').length === 0) {
                $('.no-results').show();
            }
        });
    </script>
@endpush
