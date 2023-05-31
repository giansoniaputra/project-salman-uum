@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title data-pelanggan">Detail Profile</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <input type="text" name="username" id="username" class="form-control @error('username')is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukan Username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="username">Username<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <input type="email" name="email" id="email" class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" placeholder="Masukan Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="email">Email<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 form-floating">
                            <input type="text" name="password" id="password" class="form-control @error('password')is-invalid @enderror" value="{{ old('password') }}" placeholder="Masukan Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <label class="text-label" for="password">Password<span class="text-danger"> *</span></label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" />
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Edit Data Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
