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
                    <th>PENGIRIM</th>
                    <th>EMAIL</th>
                </tr>
            </thead>

            <tbody>

                {{-- <?php //foreach( $senaraiTickets as $ticket ): ?> --}}
                @foreach( $senaraiTickets as $ticket )
                    <tr>
                        <td>{{ $ticket['id'] }}</td>
                        <td><?php echo $ticket['title']; ?></td>
                        <td><?php echo $ticket['submitter_name']; ?></td>
                        <td><?php echo $ticket['submitter_email']; ?></td>
                    </tr>
                @endforeach
                {{-- <?php //endforeach; ?> --}}

            </tbody>
        </table>

    </div>

</div>
@endsection

@push('js_additional')
<script>
    alert('Selamat Datang');
</script>
@endpush
