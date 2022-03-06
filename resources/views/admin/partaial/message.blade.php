@if ($errors->any())
    <div class="alert alert-danger">

        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('sucess'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-success">
                    <p>{{ Session::get('sucess') }}</p>
                </div>
            </div>
        </div>


    </div>
@endif
@if (Session::has('errors'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <p>{{ Session::get('errors') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if (Session::has('error'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <p>{{ Session::get('errors') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
