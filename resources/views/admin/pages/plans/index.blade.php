@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>    
    </ol>
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark">Cadastrar</a></h1>

   
@stop

@section('content')
    <p>Listagem de planos.</p>
    <div class="card">  
        <div class="card-header">
        <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
          @csrf
          <input type="text" name="filter" id="filter" class="form-control" value="{{ $filters ?? ''}}">
          <button <i class="btn btn-dark">Pesquisar</button>
        </form>
        
        </div>   
      <div class="card-body">
       <table class="table table-striped table-condensed">
         <thead>
           <tr>
             <th>Nome</th>
             <th>Preço</th>
             <th style="width:50px">Ações</th>
           </tr>
         </thead>
         <tbody>
         @foreach ($plans as $plan )
            <tr>
             <td>{{ $plan->name }}</td>
             <td> R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
             <td class="td-custom"> <a href="{{route('plans.show', $plan->url)}}" class="btn btn-info">Ver</a></td>

            
             <td class="td-custom"> <a href="{{route('plans.edit', $plan->url)}}" class="btn btn-warning">Editar</a></td>
             
            <td class="td-custom"> 
              <form action="{{route('plans.destroy', $plan->url)}}" method="POST">
              @method('DELETE')
              @csrf

              <button type="submit" class="btn btn-danger">Excluir</button>
              </form>
           
           </tr>
         @endforeach
         
          
         </tbody>
       </table>
      </div>
      
    </div>
     <div class="card-footer">
      @if (isset($filters))

      	{!! $plans->appends($filters)->links() !!}

      @else
        	{!! $plans->links() !!}
      @endif
       
      </div>
@stop

<style>
.td-custom {
  width: 10px !important;
  padding-left: 0 !important;
}

</style>

