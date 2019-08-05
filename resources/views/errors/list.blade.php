@if($errors->any())
@foreach($errors->all() as $error)
	<div class="alert alert-danger">
      <strong>Error!</strong> {{ $error }}
    </div>
@endforeach
@endif