@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Lista de Cursos</h1>
@endsection

@section('content')
<h1>
    Mierda mueve la descripcion a la tabla intermedia y el profesor asi como el nombre del curso y tambien manten el nombre en la tabla de cursos 
</h1>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('courses.create') }}" class="btn btn-primary btb-sm">Crear</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Number of Class</th>
                        <th>Description</th>
                        <th>Teacher</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$courses->count())
                        <tr>
                            <td colspan="6">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course->name }}</td>
                            <td>{{ $course->course->class }}</td>
                            <td>{{ $course->course->description }}</td>
                            <td>{{ $course->course->teacher->name }} {{ $course->course->teacher->surname }}</td>

                            <td>
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary btn-sm">Editar</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['courses.destroy', $course], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
