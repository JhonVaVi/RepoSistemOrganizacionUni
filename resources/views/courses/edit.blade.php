@extends('adminlte::page')

@section('title', 'Contactos')

@section('content_header')

<h1>Actualizar los datos de :{{$course->name}}</h1>

<div class="alert alert-primary" role="alert">
  Los unicos datos que se podran actualizar van a ser la descripcion y el color de fondo
  </div>


@endsection

@section('content')

{{-- mostrar los datos que traigo --}}

{!! Form::model($course, ['route' => ['courses.update', $course], 'method' => 'PUT']) !!}

<div class="mb-3">
    {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control ', 'placeholder' => 'Ingrese el Nombre','readonly']) !!}
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    {!! Form::label('class', 'Numero de Clases', ['class' => 'form-label']) !!}
    {!! Form::number('class', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Cantidad de clases']) !!}
    @error('class')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    {!! Form::label('description', 'Descripcion del Curso', ['class' => 'form-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control' ,'placeholder' => 'Ingrese Una Descripcion']) !!}
    @error('email')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    {!! Form::label('teacher_id', 'Selecione un profesor para el Curso', ['class' => 'form-label']) !!}
  <select name="teacher_id" id="" class="form-control">
    @foreach ($teachers as $teacher)
    <option value="{{ $teacher->id }}">{{ $teacher->name }} {{$teacher->surname}} ({{$teacher->nickname}} )</option>
    @endforeach
  </select>
</div>
<div class="mb-3">
{!! Form::label('color', 'Seleccione un Color', ['class'=>'form-label']) !!}
{!! Form::select('color',
['bg-primary' => 'Azul','bg-secondary' => 'Gris','bg-success' => 'Verde','bg-danger' => 'Rojo','bg-warning' => 'Amarillo','bg-info' => 'Celeste','bg-light' => 'Blanco',
],Null, ['class'=>'form-control']) !!}
</div>
<div class="mb-3">
    {!! Form::submit('Guardar Informacion', ['class' => 'btn btn-primary float-right']) !!}
</div>

{!! Form::close() !!}

@endsection

@section('css')

@endsection

@section('js')

@endsection

