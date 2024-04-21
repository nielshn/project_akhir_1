@extends('layouts.frontend.main')
@section('title')
    Galeri Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-9">
                <h4 class="widgettitle mb-4">Galeri</h4>
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
        <div class="gallery row">
            @foreach ($galery as $row)
                <div class="col-md-3 mb-3 cardColumn" data-category="{{ $row->category }}">
                    @php
                        $bodyWords = str_word_count(strip_tags($row->nama), 1);
                        $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                        $imagePath = public_path('uploads/galeri/' . $row->images->first()->image);
                    @endphp

                    <div class="card">
                        @if (file_exists($imagePath) && is_readable($imagePath))
                            @php
                                $resizedImage = Image::make($imagePath)->fit(1280, 960);
                            @endphp
                            <a href="{{ asset('uploads/galeri/' . $row->images->first()->image) }}" target="_blank">
                                <img class="card-img-top" src="{{ $resizedImage->encode('data-url') }}"
                                    onclick="openLightbox('{{ asset('uploads/galeri/' . $row->images->first()->image) }}')"
                                    alt="{{ $row->nama }}">
                            </a>
                        @else
                            <div class="card">
                                <div class="image-not-found">
                                    <p class="text-danger">Gambar tidak ditemukan</p>
                                </div>
                            </div>
                        @endif
                        <div class="card-body">
                            <a href="{{ route('multi.image', [$row->id, $row->slug]) }}" class="card-title"
                                style="font-weight: 560; font-family: 'Nunito', sans-serif; font-size:0.9em;">
                                {{ $shortBody }}...
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
        <div class="no-results" style="display: none;">No results found.</div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12">
                {{ $galery->links() }}
            </div>
        </div>
    </div>

    <style type="text/css" media="all">
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

        .card {
            border: 1px solid #ced4da;
            /* Warna border card */
            border-radius: 10px;
            /* Sudut lengkung border */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Efek shadow */
            transition: all 0.3s ease;
            /* Transisi perubahan hover */
        }

        .card:hover {
            transform: translateY(-5px);
            /* Efek mengangkat card saat hover */
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
            /* Efek shadow saat hover */
        }
    </style>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                var value = $(this).val().toLowerCase();

                $('.cardColumn').each(function() {
                    var cardText = $(this).find('.card-title').text().toLowerCase();
                    if (cardText.indexOf(value) > -1) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                if ($('.cardColumn:visible').length === 0) {
                    $('.no-results').show();
                } else {
                    $('.no-results').hide();
                }
            });

            $('#categoryFilter').on('change', function() {
                var selectedCategory = $(this).val();

                $('.cardColumn').each(function() {
                    var cardCategory = $(this).data('category').toLowerCase();
                    if (selectedCategory === 'all' || cardCategory === selectedCategory
                        .toLowerCase()) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                if ($('.cardColumn:visible').length === 0) {
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
