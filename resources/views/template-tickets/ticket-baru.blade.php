@extends('layouts.induk')

@section('page_title')
<h1 class="mt-4">Tickets</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Tiket Baru</li>
</ol>
@endsection

@section('page_content')
<div class="row">
    <div class="col-12">

        <form method="POST" action="">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }}
            @csrf

        <div class="card">
            <div class="card-body">

                @include('layouts.alerts')

                <div class="mb-3">
                    <label class="form-label">Submitter Name</label>
                    <input type="text" class="form-control" name="submitter_name" placeholder="Nama Anda" value="{{ old('submitter_name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Submitter Email</label>

                    <input type="email"
                    class="form-control @error('submitter_email') is-invalid @enderror"
                    name="submitter_email"
                    placeholder="name@example.com"
                    value="{{ old('submitter_email') }}">

                    @error('submitter_email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="category" class="form-control">

                        <option value="">-- Sila Pilih --</option>

                        @foreach (config('sistem.helpdesk.category') as $key => $value)
                        <option value="{{ $key }}" {{ old('category') == $key ? 'selected="selected"' : NULL }}>{{ $value }}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Subject/Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Tajuk Soalan" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pesanan/Mesej</label>
                    <textarea class="form-control" name="content" rows="3">{{ old('content') }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit Ticket</button>
            </div>
        </div>

        </form>

    </div>

</div>
@endsection
