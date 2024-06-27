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

        <a href="{{ route('users.index') }}?status=active" class="btn btn-success">Aktif</a>
        <a href="{{ route('users.index') }}?status=pending" class="btn btn-primary">Pending</a>
        <a href="{{ route('users.index') }}?status=terminated" class="btn btn-danger">Terminated</a>

        @include('layouts.alerts')

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>STATUS</th>
                    <th>TINDAKAN</th>
                </tr>
            </thead>

            <tbody>

                @foreach( $senaraiUsers as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->status }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>


                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $user->id }}">Hapus</button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-delete-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">

                                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pengesahan Hapus Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Adakah anda bersetuju untuk menghapuskan data {{ $user->name }}???
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Hapuskan Rekod</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $senaraiUsers->links() }}

    </div>

</div>
@endsection

@push('js_additional')

@endpush
