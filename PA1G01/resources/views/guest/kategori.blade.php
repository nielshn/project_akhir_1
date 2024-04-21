@extends('layouts.frontend.main')
@section('title')
    Kategori Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="row g-5">
        <div class="dropdown mb-1">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="mr-2"></span>
                <p class="text-white m-0 d-inline">Nama Kategori</p>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach ($kategori as $row)
                    <li><a class="dropdown-item"
                            href="{{ route('detail.kategori', [$row->id, $row->slug]) }}">{{ $row->nama_kategori }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Blog Start -->
        <div class="col-md-8">
            <div class="row g-5">
                <!-- Article Section Start -->
                <div class="col-md-6">
                    <div class="position-relative pb-3 mb-4">
                        <h4 class="mb-0">ARTICLES</h4>
                    </div>
                    <div class="row">
                        @foreach ($artikel as $row)
                            <div class="col-md-12 mb-4">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        @php
                                            $resizedImage = Image::make(public_path('uploads/artikel/' . $row->gambar_article))->fit(600, 400);
                                        @endphp
                                        <img class="img-fluid" src="{{ $resizedImage->encode('data-url') }}">
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3">
                                                @foreach ($user as $p)
                                                    <i class="far fa-user text-primary me-2"></i>{{ $p->name }}
                                                @endforeach
                                            </small>
                                            <small>
                                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                                @if ($row->created_at == null)
                                                    <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}
                                                @endif
                                            </small>
                                        </div>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                                        ?>
                                        <h6 class="mb-2 border-l-4">{{ $shortBody }}...</h6>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->body), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 10));
                                        ?>
                                        <p>{!! $shortBody !!}...</p>
                                        <a style="font-size: 0.8rem"
                                            href="{{ route('detailArtikel', [$row->id, $row->slug]) }}">READ MORE <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Article Section End -->

                <!-- Event Section Start -->
                <div class="col-md-6">
                    <div class="position-relative pb-3 mb-4">
                        <h4 class="mb-0">EVENTS</h4>
                    </div>
                    <div class="row">
                        @foreach ($event as $row)
                            <div class="col-md-12 mb-4">
                                <div class="blog-item bg-light rounded overflow-hidden">
                                    <div class="blog-img position-relative overflow-hidden">
                                        @php
                                            $resizedImage = Image::make(public_path('uploads/event/' . $row->gambar_event))->fit(600, 400);
                                        @endphp
                                        <img class="img-fluid" src="{{ $resizedImage->encode('data-url') }}">
                                    </div>
                                    <div class="p-4">
                                        <div class="d-flex mb-3">
                                            <small class="me-3">
                                                @foreach ($user as $u)
                                                    <i class="far fa-user text-primary me-2"></i>{{ $u->name }}
                                                @endforeach
                                            </small>
                                            <small>
                                                <i class="far fa-calendar-alt text-primary me-2"></i>
                                                @if ($row->created_at == null)
                                                    <span class="text-danger">{{ __('Tidak ada tanggal') }}</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}
                                                @endif
                                            </small>
                                        </div>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->judul), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 4));
                                        ?>
                                        <h6 class="mb-2 border-l-4">{{ $shortBody }}...</h6>
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->body), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 10));
                                        ?>
                                        <p>{!! $shortBody !!}...</p>
                                        <a style="font-size: 0.8rem"
                                            href="{{ route('detailEvent', [$row->id, $row->slug]) }}">READ MORE <i
                                                class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-12">
                            {{ $event->links() }}
                        </div>
                    </div>
                </div>
                <!-- Event Section End -->
            </div>
        </div>
        <!-- Blog End -->

        <!-- Sidebar Start -->
        <div class="col-md-4">
            <div id="sidebar">
                <div id="rpwe_widget-2" class="et_pb_widget rpwe_widget recent-posts-extended">
                    <h4 class="widgettitle" style="margin-bottom: 1.5em">DEL NEWS</h4>
                    <div class="rpwe-block">
                        @foreach ($berita as $row)
                            <ul class="rpwe-ul" style="margin-bottom: 1.2em">
                                <li class="rpwe-li rpwe-clearfix">
                                    @php
                                        $resizedImage = Image::make(public_path('uploads/berita/' . $row->gambar_berita))->fit(110, 75);
                                    @endphp
                                    <img class="img-fluid" style="object-fit: cover;"
                                        src="{{ $resizedImage->encode('data-url') }}">
                                    <div class="rpwe-content">
                                        <?php
                                        $bodyWords = str_word_count(strip_tags($row->judulBerita), 1);
                                        $shortBody = implode(' ', array_slice($bodyWords, 0, 6));
                                        ?>
                                        <p class="rpwe-title"><a href="{{ route('detailBerita', [$row->id, $row->slug]) }}"
                                                style="font-size: 1em;"
                                                class="h5 fw-medium d-flex align-items-center px-3 mb-0 text-primary">{{ $shortBody }}...</a>
                                        </p>
                                        <small class="rpwe-time published text-center ps-3"
                                            datetime="2023-04-12T16:28:02+07:00"
                                            style="font-size: 12px;">{{ Carbon\Carbon::parse($row->created_at)->format(' F d, Y') }}</small>
                                    </div>
                                </li>
                                <hr style="border-top: 1px solid #ccc;">
                                <!-- Add more recent posts here -->
                            </ul>
                        @endforeach
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
            <!-- Sidebar End -->
        </div>
    </div>
    <style type="text/css" media="all">
        .rpwe-ul {
            list-style: none;
            padding: 0;
        }

        .rpwe-li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .rpwe-li .rpwe-img {
            margin-right: 10px;
        }

        .rpwe-li .rpwe-title a {
            color: #000;
            font-weight: normal;
            text-decoration: none;
        }

        .widget_categories ul {
            list-style: none;
            padding: 0;
        }

        .widget_categories li {
            margin-bottom: 5px;
        }

        .feedzy-rss .rss_item .title a {
            font-weight: bold;
            color: #000;
            text-decoration: none;
        }

        .feedzy-rss .rss_item .rss_content p {
            margin-bottom: 0;
        }

        .feedzy-rss .rss_item hr {
            border: none;
            border-top: 1px solid #bbb8b8;
            margin: 10px 0;
        }

        .feedzy-rss .rss_item .title a {
            color: #00aaff;
        }

        .sidebar {
            float: right;
            width: 100%;
        }

        .sidebar-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-list li {
            margin-bottom: 20px;
        }
    </style>
@endsection
