@extends('layouts.induk')

@section('page_title')
<h1 class="mt-4">Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Kemaskini User {{ $user->name }}</li>
</ol>
@endsection

@section('page_content')
<div class="row">
    <div class="col-12">

        <form method="POST" action="{{ route('users.update', $user->id) }}">

            <input type="hidden" name="_method" value="PATCH">
            @method('PATCH')

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }}
            @csrf

        <div class="card">
            <div class="card-body">

                @include('layouts.alerts')

                <div class="mb-3">
                    <label class="form-label">Nama User</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama User" value="{{ old('name') ?? $user->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    placeholder="name@example.com"
                    value="{{ old('email') ?? $user->email }}">

                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">
                </div>

                <div class="mb-3">
                    <label class="form-label">No. Telefon</label>
                    <input type="text" class="form-control" name="phone" placeholder="No. Telefon" value="{{ old('phone') ?? $user->phone }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control">

                        <option value="">-- Sila Pilih --</option>

                        @foreach (config('sistem.helpdesk.status') as $key => $value)
                        <option value="{{ $key }}" {{ (old('status') ?? $user->status) == $key ? 'selected="selected"' : NULL }}>{{ $value }}</option>
                        @endforeach

                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

        </form>

    </div>

</div>
@endsection
