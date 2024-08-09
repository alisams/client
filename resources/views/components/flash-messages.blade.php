<div class="container-fluid">
    <div class="row">
        <div class=" offset-9 col-3" style="position: fixed; top: 80px; right: 20px; z-index: 9999;">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('danger'))
                <div class="alert alert-danger" style="color:red;">
                    <b>{{ session()->get('danger') }} </b>
                </div>
            @endif
        </div>
    </div>
</div>