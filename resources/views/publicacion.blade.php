@extends('layouts.app')
@section('content')
<section class="page-section">
  <!-- Page Content -->
  <div class="container">

    <div class="row d-flex flex-wrap justify-content-center">

      <!-- Post Content Column -->
      <div class="col-lg-8 pt-5">
      	@if(Auth::user()->admin)
      	<div class="d-flex justify-content-end">
      		<!-- Ya que es un administrador, tiene derecho a eliminar algún artículo del blog -->
      		<a href="{{route('AdminArticulos.edit', $articulo->id)}}"><button class="btn btn-light border" type="button">Editar</button></a>
      		<form method="POST" action="{{route('AdminArticulos.destroy',$articulo->id)}}">
      			@csrf
      			@method('DELETE')
      				<button class="btn btn-danger ml-3" type="submit">Eliminar</button>
      		</form>
      	</div>
      	@endif

        <!-- Title -->
        <h1>{{$articulo->title}}</h1>

        <!-- Author -->
        <p class="lead">
          por
          <a href="{{route('show.edit',$articulo->author_id)}}">{{$articulo->author_name}}</a>
        </p>

        <p class="lead">
        	categoría 
        	@if($articulo->category == "varonil")
        	<a href="">Baloncesto masculino</a>
        	@elseif($articulo->category == "femenil")
        	<a href="">Baloncesto femenino</a>
        	@else
        	<a href="#">Sin categoría</a>
        	@endif
        </p>

        <hr>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{asset("img/$articulo->img")}}" alt="Foto del articulo {{$articulo->title}}">

        <hr>

        <!-- Post Content -->
        <p class="lead">{{$articulo->description}}</p>

        <p>{{$articulo->content}}</p>

        <hr>
        <!-- Contenedor de la seción de comentarios -->
        <section class="comentarios">
        	<h5>Comentarios:</h5>
        	<!-- 
        		Aquí abrá un FOREACH que muestre los comentarios que se han realizado de la publicación
        	-->
        	@foreach($comentarios as $comentario)
        		@if($articulo->id == $comentario->article_id)
        		<!-- Single Comment -->
        		<div class="media mb-4">
        		  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        		  <div class="media-body">
        		    <h6 class="mt-0"><a href="{{route('show.edit',$comentario->user_id)}}">{{$comentario->user_name}}</a></h6>
        		    {{$comentario->comment}}
        		  </div>
        		  @if(Auth::user()->admin)
        		  <form method="POST" action="{{route('comment.destroy',$comentario->id)}}">
        		  	@csrf
        		  	@method('DELETE')
        		  	<button class="btn btn-danger" type="submit">
        		  		Eliminar comentario
        		  	</button>
        		  </form>
        		  @endif
        		</div>
        		@endif
        	@endforeach
        </section>

        <div>
        	@guest
        	<h3>¡Inicia sesión para que puedas comentar este artículo!</h3>
        	@else
        	<!-- Comments Form -->
        	<div class="card my-4">
        	  <h5 class="card-header">Deja un comentario</h5>
        	  <div class="card-body">
        	    <form method="POST" action="{{route('comment.store')}}">
        	    	@csrf
        	    	<div class="form-group">
	        	    	<input name="article_id" value="{{$articulo->id}}" class="d-none">
        	    		<textarea class="form-control" name="comment" rows="3"></textarea>
        	    	</div>
        	    	<input class="btn btn-primary" type="submit" value="Enviar"></input>
        	    </form>
        	  </div>
        	</div>
        	@endguest
        </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</section>
@endsection