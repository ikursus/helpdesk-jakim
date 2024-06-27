@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('alert-berjaya'))

<div class="alert alert-success">
    {{ session('alert-berjaya') }}
</div>

@endif
