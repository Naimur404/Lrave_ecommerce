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
@if(Session::has('sucess'))
<div class="alert alert-success">
    <p>{{ Session::get('sucess') }}</p>
</div>

@endif
