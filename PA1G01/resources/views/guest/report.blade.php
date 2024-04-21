@extends('layouts.frontend.main')
@section('title')
    Report Satuan Pengawas Internal - IT DEL
@endsection
@section('content')
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="fw-bold text-primary text-uppercase">Report</h5>
            <h3 class="mb-0">Silahkan laporkan sesuai dengan pedoman dan ketentuan. <br> Jangan Ragu Untuk Menghubungi Kami</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('laporan.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="nama_pelapor" class="form-control" id="floatingName"
                                    placeholder="Your Name">
                                <label for="floatingName">Your Name</label>
                                @error('nama_pelapor')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="floatingEmail"
                                    placeholder="Your Email">
                                <label for="floatingEmail">Your Email</label>
                                @error('email')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" name="noTelepon" class="form-control" id="floatingPhone"
                                    placeholder="Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <label for="floatingPhone">Phone Number</label>
                                @error('noTelepon')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" name="judul_laporan" class="form-control" id="floatingTitle"
                                    placeholder="Report Title">
                                <label for="floatingTitle">Report Title</label>
                                @error('judul_laporan')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select name="kategoriPelapor_id" class="form-control" id="kategoriPelapor">
                                    @foreach ($kategori_pelapor as $row)
                                        <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <label for="kategoriPelapor">Kategori yang Dilapor</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="unit_pelapor" class="form-control" id="unit"
                                    placeholder="Unit Kerja">
                                <label for="unit">Unit Kerja Pelapor</label>
                                @error('unit_pelapor')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea name="body" class="form-control" rows="5" id="description" placeholder="Your Report"></textarea>
                                {{-- <label for="description">Your Report</label> --}}
                                @error('body')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="formFile" class="form-label">Lampiran</label><span aria-hidden="true"
                                    role="presentation" class="field_required" style="color:#ee0000;">*</span>
                                <input name="lampiran" class="form-control" type="file" id="formFile"
                                    accept=".pdf,.docx,.jpeg,.png,.jpg">
                                @error('lampiran')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Send Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
