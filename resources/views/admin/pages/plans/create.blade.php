@extends('adminlte::page')

@section('title', 'Cadastrar plano')

@section('content_header')
    <h1>Cadastrar plano</h1>
@stop

@section('content')  
    <div class="card">  
		<div class="card-body">
			<form action="{{ route('plans.store') }}" method="POST" class="form">
				@csrf
				<div class="form-group">
				  <label for="name">Nome:</label>
				  <input type="text" name="name" id="name" class="form-control" placeholder="Nome do plano" aria-describedby="helpId">	
				</div>

				<div class="form-group">
				  <label for="price">Preço:</label>
				  <input type="text" name="price" id="price" class="form-control" placeholder="Preço" aria-describedby="helpId">	
				</div>

				<div class="form-group">
				  <label for="description">Descrição:</label>
				  <textarea  name="description" id="description" class="form-control"></textarea>
				</div>

				<div class="form-group">
				  <button type="submit" class="btn btn-dark">Enviar</button>
				</div>
				 
			</form>
		</div>

	</div>
     
@stop