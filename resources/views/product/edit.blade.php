@extends('layouts.master');

@section('title','Editar producto')

@section('content')

  <ol class="breadcrumb">
      <li><a href="{{url('dashboard')}}"></a>Escritorio</li>
      <li><a href="{{url('product')}}"></a>Productos</li>
      <li class="active">Editar Producto</li>
    </ol>
@include ('partials.messages')
    <div class="page-header">
      <h1>Editar Producto</h1>
    </div>

    <div class="row">
      <div class="col-md-8">

         <div class="panel panel-default">
           <div class="panel-heading">
              Editar Producto

            </div>
           <div class="panel-body">

                  {!!Form::model($products,['route'=>['product.update',$products->id],'method'=>'PUT'])!!}

                  <div class="form-group">
                      {!!Form::label('Nombre')!!}
                      {!!Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Digite Producto'])!!}
                  </div>
                  <div class="form-group">
                      <label for="exampleInputPasword1">Precio</label>
                      {!!Form::label('Precio')!!}
                      {!!Form::text('price',null,['id'=>'price','class'=>'form-control','placeholder'=>'Digite el Precio'])!!}
                  </div>
                  <div class="form-group">
                      {!!Form::label('Marca')!!}
                      {!!Form::select('marks_id',$marks,null,['id'=>'marks_id','class'=>'form-control'])!!}
                  </div>
                    {!!Form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                  {!!Form::close()!!}

                              </div>

                       </div>


                    </div>
                  </div>


@endsection
