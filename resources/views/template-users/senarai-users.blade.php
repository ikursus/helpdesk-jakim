@extends('layouts.induk')

@section('page_title')
<h1 class="mt-4">Users</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai Users</li>
</ol>
@endsection

@section('page_content')
<div class="row">
    <div class="col-12">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>

            <tbody>

                @foreach( $senaraiUsers as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="#" class="btn btn-primary">Edit</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>
@endsection

@push('js_additional')

@endpush
