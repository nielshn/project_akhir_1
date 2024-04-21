@extends('layouts.backend.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h3 class="fw-normal mb-0">Change Password</h3>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            <script>
                                // Membuat pesan success menghilang secara otomatis setelah 3 detik
                                setTimeout(function() {
                                    $('.alert-success').fadeOut('slow');
                                }, 2400);
                            </script>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Please check the form below for errors
                            </div>
                        @endif
                        <form method="POST" action="{{ route('resetPassword.update') }}">
                            @method('put')
                            @csrf
                            <input type="hidden" name="token" value="">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email"
                                    value="{{ old('email', Auth::user()->email) }}" readonly class="form-control" autofocus>
                                @error('email')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input id="current_password" type="password" name="current_password" required
                                    autocomplete="current_password" class="form-control">
                                @error('current_password')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label">New Password</label>
                                <input id="new_password" type="password" name="password" required
                                    autocomplete="new_password" class="form-control">
                                @error('password')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                <input id="password-confirm" type="password" name="password_confirmation" required
                                    autocomplete="password_confirmation" class="form-control">
                                @error('password_confirmation')
                                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
