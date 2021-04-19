@extends('layouts.admin')
@section('title','Editar Proveedor')
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
            Editar Proveedor
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Proveedor</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Proveedor</h4>
                    </div>
                    {!! Form::model($provider, ['route'=> ['providers.update', $provider ], 'method'=>'PUT']) !!}

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$provider->name}}" class="form-control" placeholder="Nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{$provider->email}}" class="form-control" placeholder="Email" required>
                      </div>
                      <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="number" name="phone" id="phone" value="{{$provider->phone}}" class="form-control" placeholder="Teléfono" required>
                      </div>
                      <div class="form-group">
                        <label for="cif">Cif</label>
                        <input type="text" name="cif" id="cif" value="{{$provider->cif}}" class="form-control" placeholder="Cif" required>
                      </div>
                      <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" value="{{$provider->address}}" class="form-control" placeholder="Dirección" required>
                      </div>






                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('providers.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$providers->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
