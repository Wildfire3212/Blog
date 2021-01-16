@extends('layouts.admin')
@section('content')
<section class="page-section" id="crear-articulo">
	<div id="register" class="form">
		<h3 class="mb-4">Editar un artículo</h3>
		<div class="register-page">
			<form method="POST" action="{{route('AdminArticulos.update', $articulo->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="title">Nombre del artículo: </label>
					</div>
					<input class="form-control" type="text" name="title" value="{{$articulo->title}}" required>
				</div>
				@if($articulo->img)
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label for="img" class="col-md-4 col-form-label text-md-left">Imagen actual: </label>
					</div>
					<a class="form-control text-center" href="{{asset("img/$articulo->img")}}" target="_blank">{{$articulo->img}}</a>
				</div>
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label for="img" class="col-md-4 col-form-label text-md-left">Modificar imagen: </label>
					</div>
					<input class="form-control" type="file" name="img" enctype>
				</div>
				@else
				<div class="form-group">
					<label class="col-md-4 col-form-label text-md-right" for="img">Añade una imagen de presentación: </label>
					<input class="form-control" type="file" name="img" enctype>
				</div>
				@endif
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-8 col-form-label text-md-left" for="category">Categoría: </label>
					</div>
					<input class="form-control" type="text" name="category" required value="{{$articulo->category}}">
				</div>
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="description">Descripción: </label>
					</div>
					<textarea class="form-control" name="description" id="" rows="5" required>{{$articulo->description}}</textarea>
				</div>
				<div class="form-group">
					<div class="d-flex justify-content-left">
						<label class="col-md-4 col-form-label text-md-left" for="content">Contenido actual: </label>
					</div>
					<textarea class="form-control" name="content" id="" rows="5" required>{{$articulo->content}}</textarea>
				</div>
				<input class="form-control d-none" name="author_id" value="{{Auth::user()->id}}">
				<div class="form-group row d-flex justify-content-center mt-5">
					<div class="col-md-6">
						<button id="btn-register" type="submit" class="btn btn-primary">
							{{ __('Guardar cambios') }}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection