@extends('layouts.admin')
@section('content')
<section class="page-section" id="crear-articulo">
	<div id="register" class="form">
		<h3 class="mb-4">Agregar un artículo</h3>
		<div class="register-page">
			<form method="POST" action="{{route('AdminArticulos.store')}}" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="title">Nombre del artículo: </label>
					</div>
					<input class="form-control" type="text" name="title" required>
				</div>
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label for="img" class="col-md-4 col-form-label text-md-left">Imagen: </label>
					</div>
					<input class="form-control" type="file" name="img" enctype required>
				</div>
				<div class="form-group">
					<div class="d-flex justify-content-left" for="categoria_id" id="categoria">
						<label for="categoria_id">Seleccione una categoria de las siguientes:</label>
						<select class="form-control" id="sel1">
							@foreach($categorias as $categoria)
							<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
							@endforeach
						</select>
					</div>
					
				</div>
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="description">Descripción: </label>
					</div>
					<textarea class="form-control" name="description" required placeholder="Escribe aquí una breve descripción..."></textarea>
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="content">Contenido: </label>
					</div>
					<textarea class="form-control" name="content" required placeholder="Escribe aquí el contenido que quieres que lean!"></textarea>
				</div>
				<input name="author_id" value="{{Auth::user()->id}}" class="d-none">
				
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