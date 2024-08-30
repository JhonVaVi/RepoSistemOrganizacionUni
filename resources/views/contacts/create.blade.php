@extends('adminlte::page')

@section('title', 'Contactos')

@section('content_header')

@endsection

@section('content')
<div class="card m-3">
    <div class="card-header">
        <h3> Registrar un nuevo Contacto </h3>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'contacts.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="mb-3">
            {!! Form::label('name', 'Nombre', ['class' => 'form-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre']) !!}
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('surname', 'Apellido', ['class' => 'form-label']) !!}
            {!! Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Apellido']) !!}
            @error('surname')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::email('email', null, ['class' => 'form-control' ,'placeholder' => 'Ingrese el Correo']) !!}
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::label('number', 'Numero', ['class' => 'form-label']) !!}
            {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Numero telefonico']) !!}

            @error('number')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            {!! Form::submit('Guardar Informacion', ['class' => 'btn btn-primary float-right']) !!}
        </div>

        {!! Form::close() !!}
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

@endsection

@section('css')


@endsection

@section('js')

@endsection
