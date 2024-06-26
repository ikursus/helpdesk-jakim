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

        <div class="card">
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Submitter Name</label>
                    <input type="text" class="form-control" name="submitter_name" placeholder="Nama Anda">
                </div>

                <div class="mb-3">
                    <label class="form-label">Submitter Email</label>
                    <input type="email" class="form-control" name="submitter_email" placeholder="name@example.com">
                </div>

                <div class="mb-3">
                    <label class="form-label">Subject/Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Tajuk Soalan">
                </div>

                <div class="mb-3">
                    <label class="form-label">Pesanan/Mesej</label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
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
