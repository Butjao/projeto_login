@if (session('status'))
    <div class="alert alert-warning" alert-dismissible fade show" role="alert" style="display: flex">
        <div style="width:99%">{{ session('status') }}</div>
        <div style="float: right">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: flex">
        <div style="width:99%">{{ session('success') }}</div>
        <div style="float: right">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    </div>
@endif