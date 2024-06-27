@extends('layouts.induk')

@section('page_title')
<h1 class="mt-4">Tickets</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Senarai Tickets</li>
</ol>
@endsection

@section('page_content')
<div class="row">
    <div class="col-12">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>SUBMITTER NAME</th>
                    <th>SUBMITTER EMAIL</th>
                    <th>SUBMITTER PHONE</th>
                    <th>CATEGORY</th>
                </tr>
            </thead>

            <tbody>

                {{-- <?php //foreach( $senaraiTickets as $ticket ): ?> --}}
                @foreach( $senaraiTickets as $ticket )
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->submitter_name }}</td>
                        <td>{{ $ticket->submitter_email }}</td>
                        <td>{{ $ticket->getUser->phone }}</td>
                        <td>{{ $ticket->category }}</td>
                    </tr>
                @endforeach
                {{-- <?php //endforeach; ?> --}}

            </tbody>
        </table>

    </div>

</div>
@endsection

@push('js_additional')

@endpush
