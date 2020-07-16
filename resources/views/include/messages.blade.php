@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
  	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('alert') || $message = Session::get('error'))
  <div class="alert alert-danger alert-block">
  	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ( count($errors) > 0 )
    @foreach($errors->all() as $err)
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $err }}</strong>
        </div>
    @endforeach
@endif

<!-- @unless ( empty($success))
  <div class="alert alert-success alert-block">
  	<button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $success }}</strong>
  </div>
@endunless -->