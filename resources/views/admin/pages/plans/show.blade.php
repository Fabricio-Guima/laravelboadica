@extends('adminlte::page')

@section('title', 'Detalhes do plano')

@section('content_header')
    <h1>Detalhes do plano <strong>{{$plan->name}}</strong></strong></h1>
@stop

@section('content')  
    <div class="card">  
		<div class="card-body">
		<ul>
			<li><strong>Nome:</strong> {{$plan->name}}</li>
			<li><strong>Preço:</strong> {{number_format($plan->price, 2, ',', '.')}}</li>
			<li><strong>descrição:</strong> {{$plan->description}}</li>
			
		</ul>
		</div>

	</div>
     
@stop