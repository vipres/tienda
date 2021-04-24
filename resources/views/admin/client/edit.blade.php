@extends('layouts.admin')
@section('title','Editar Cliente')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar Cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Cliente {{$client->name}}</h4>
                    </div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <p>Corrige los siguientes errores:</p>
                            <ul>
                            @foreach ($errors->all() as $message)
                                 <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                     @endif
                    {!! Form::model($client, ['route'=> ['clients.update', $client ], 'method'=>'PUT']) !!}


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" value="{{$client->name}}" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" value="{{$client->dni}}" name="dni" id="dni" class="form-control" placeholder="DNI" required>
                    </div>
                    <div class="form-group">
                        <label for="cif">CIF</label>
                        <input type="text" value="{{$client->cif}}" name="cif" id="cif" class="form-control" placeholder="CIF">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" value="{{$client->address}}" name="address" id="address" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" value="{{$client->phone}}" name="phone" id="phone" class="form-control" placeholder="Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" value="{{$client->email}}" name="email" id="email" class="form-control" placeholder="Email">
                    </div>


                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('clients.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$clients->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

{!! Html::script('melody/js/dropify.js') !!}

@endsection
