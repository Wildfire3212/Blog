@extends('layouts.admin')
@section('content')
<section class="page-section" id="crear-articulo">
	<div id="register" class="form">
		<h3 class="mb-4">Agregar una categoria</h3>
		<div class="register-page">
			<form method="POST" action="{{route('AdminCategorias.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="nombre">Nombre de la categoría </label>
					</div>
					<input class="form-control" type="text" name="nombre" required>
				</div>
				
				
				<div class="form-group row d-flex justify-content-center mt-5">
					<div class="col-md-6">
						<button id="btn-register" type="submit" class="btn btn-primary">
							{{ __('Agregar') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection