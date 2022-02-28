<div class="list-group">

    @foreach (App\Models\Category::orderby('name', 'asc')->where('praent_id', null)->get()
    as $praent)
        <a href="#main-{{ $praent->id }}" class="list-group-item" data-bs-toggle="collapse">
            <img src="{{ asset('images/' . $praent->image) }}" width="50">
            {{ $praent->name }}</a>

        <div class="collapse" id="main-{{ $praent->id }}">
            <div class="child-row">

                @foreach (App\Models\Category::orderby('name', 'asc')->where('praent_id', $praent->id)->get()
                as $child)
                            <a href="#main-{{ $praent->id }}" class="list-group-item">

                                <img src="{{ asset('images/' . $child->image) }}" width="30">
                                {{ $child->name }}</a>
                        @endforeach
            </div>


        </div>
    @endforeach


</div>

