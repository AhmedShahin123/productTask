
@if (count($errors) > 0)
	<div class="alert alert-danger alert-dismissible">
		<ul>
			@foreach ($errors->all() as $error)
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ session()->get('success') }}</p>
    </div>

	
@endif

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ session()->get('error') }}</p>
    </div>
@endif
