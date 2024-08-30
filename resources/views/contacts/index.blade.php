@extends('adminlte::page')

@section('title', 'Contactos')

@section('content_header')
    <h1>Lista de Contactos</h1>
    
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('contacts.create') }}" class="btn btn-primary btb-sm">Crear</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!$contacts->count())
                        <tr>
                            <td colspan="6">No hay registros</td>
                        </tr>
                    @endif
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->surname }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->number }}</td>
                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['contacts.destroy', $contact], 'style' => 'display:inline']) !!}
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
