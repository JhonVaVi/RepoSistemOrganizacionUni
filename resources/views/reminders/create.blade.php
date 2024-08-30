@extends('adminlte::page')

@section('title', 'Recordatorios')

@section('content_header')
    <h1>Crear un Nuevo Recordatorio</h1>
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Header
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'reminders.store']) !!}
            <div class="mb-3">

                {!! Form::label('title', 'Titulo') !!}
                {!! Form::text('title', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese el Titulo del Recordatorio',
                ]) !!}

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">

                {!! Form::label('description', 'Descripcion') !!}
                {!! Form::text('description', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la Descripcion del Recordatorio',
                ]) !!}

                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">

                {!! Form::label('start', 'Fecha de Inico del Recordatorio') !!}
                {!! Form::date('start', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Fecha del Recordatorio']) !!}

                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">

                {!! Form::label('end', 'Fecha del Fin del Recordatorio') !!}
                {!! Form::date('end', null, [
                    'class' => 'form-control',
                    'placeholder' => 'Ingrese la Fecha del Recordatorio opcional',
                ]) !!}

                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">

                {!! Form::label('color', 'Color') !!}
                {!! Form::select(
                    'color',
                    [
                        'primary' => 'Azul',
                        'secondary' => 'Gris',
                        'success' => 'Verde',
                        'danger' => 'Rojo',
                        'warning' => 'Amarillo',
                        'info' => 'Celeste',
                        'light' => 'Blanco',
                    ],
                    null,
                    ['class' => 'form-control'],
                ) !!}

                @error('color')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">

                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="cursos" name="confir" >
                    <label class="custom-control-label" for="cursos">Quiere asignar un Curso</label>
                </div>
            </div>
            <div class="mb-3" id="cursosuser" hidden>
                <select name="user_courses_id"  class="form-control">
                    <option value="">seleccion Un Curso</option>
                    @foreach ($courses as $user_course)
                        <option value="{{ $user_course->id }}">{{ $user_course->course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">

               {{form::submit('Crear Recordatorio', ['class' => 'btn btn-primary'])}}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>

@endsection

@section('css')

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            let cursos = document.getElementById('cursos');
            let cursosuser = document.getElementById('cursosuser');
            $(cursos).click(function(e) {
                if (this.checked) {

                 cursosuser.removeAttribute('hidden');
                } else {
                    cursosuser.setAttribute('hidden', true);
                }
            });
        });
    </script>

@endsection
