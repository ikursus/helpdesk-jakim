<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

@php
    $title = '<h1>Senarai Ticket</h1><script>alert("test")</script>';
@endphp

{{ $title }}
{!! $title !!}

<table>
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


<ul>
    <li><a href="<?php echo route('home'); ?>">Homepage</a></li>
    <li><a href="<?php echo route('ticket.semak'); ?>">Semak Tiket</a></li>
    <li><a href="<?php echo route('ticket.baru'); ?>">Hantar Tiket Baru</a></li>
</ul>
