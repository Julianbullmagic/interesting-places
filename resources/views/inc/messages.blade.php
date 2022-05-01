@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div id="mapinfo" style="color:red">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div id="mapinfo" style="color:green">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div id="mapinfo" style="color:red">
        {{session('error')}}
    </div>
@endif
