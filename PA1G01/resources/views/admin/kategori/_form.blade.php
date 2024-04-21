<div class="mb-3">
    <label for="kategori" class="form-label">Nama Kategori</label><span
    aria-hidden="true" role="presentation" class="field_required"
    style="color:#ee0000;">*</span>
    <input type="text" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" class="form-control" id="kategori" placeholder="Enter kategori">
    @error('nama_kategori')
    <span class="text-danger mt-2">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <button id="btn-simpan" class="btn btn-primary btn-sm" type="submit">{{ $submit }}</button>
</div>
