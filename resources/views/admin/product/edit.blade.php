@extends('layouts.admin')
@section('title','Editar Producto')
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
            Editar Producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Producto {{$product->name}}</h4>
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
                    {!! Form::model($product, ['route'=> ['products.update', $product ], 'method'=>'PUT', 'enctype' => 'multipart/form-data']) !!}


                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" value="{{$product->name}}" id="name" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="sell_price">Precio de Venta</label>
                        <input type="text" name="sell_price" value="{{$product->sell_price}}" id="sell_price" class="form-control" placeholder="Precio" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categor??a</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    @if ($product->category_id == $category->id)
                                        selected
                                    @endif
                                    >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="provider_id">Proveedor</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                            @foreach ($providers as $provider)
                                <option value="{{$provider->id}}"
                                    @if ($provider->id == $product->provider_id)
                                        selected
                                    @endif
                                    >{{ $provider->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" name="image" id="image" lang="es">
                        <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                      </div> --}}

                      <div class="card-body">
                        <h4 class="card-title d-flex">Imagen de producto

                        </h4>
                        <input type="file" class="dropify" name="image" id="image" />
                      </div>

                     <button type="submit" class="btn btn-primary mr-2">Editar</button>
                     <a href="{{route('products.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$products->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

{!! Html::script('melody/js/dropify.js') !!}

@endsection
