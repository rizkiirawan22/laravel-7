<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif
        </div>
    </div>
</div>