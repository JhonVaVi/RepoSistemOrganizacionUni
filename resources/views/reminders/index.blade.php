@extends('adminlte::page')

@section('title', 'Recordatorios')

@section('content_header')
    <div class="card-header ">
        <h1 class="d-inline">Mis Recordatorios</h1>
        <a href="{{ route('reminders.create') }}" class="btn btn-primary btb-sm float-right d-inline">Crear</a>
    </div>
@endsection

@section('content')

    <div class="card m-12">
        <div class="card-header">
            Mis Recordatorios Personales
        </div>
        <div class="card-body row">
      <div class="col-sm-4">
        @if (!$reminderCourses->count())
        <div class="card border borde mb-3" style="max-width: 18rem;">
            <div class="card-header">Aun no hay recordatorios </div>
            <div class="card-body text-primary">

                <p class="card-text">Cree un recordatorio</p>


            </div>
        </div>
    @endif
    @foreach ($reminders as $reminder)
        <div class="card @if ($reminder->color != null) text-white  bg-{{ $reminder->color }} @else text-dark @endif mb-3 "
            style="max-width: 18rem;">
            <div class="card-header">{{ $reminder->title }} </div>
            <div class="card-body border-danger">

                <p class="card-text">Descripcion: {{ $reminder->description }}</p>
                <p class="card-text">Fecha(s) : {{ $reminder->start }} - {{ $reminder->end }}</p>
            </div>
        </div>
    @endforeach
      </div>


        </div>
        {{-- <div class="card-footer text-muted">
        Footer
    </div> --}}
    </div>
    <div class="card m-12">
        <div class="card-header">
            Mis Recordatorios de Clases
        </div>
        <div class="card-body row ">
            <div class="col-sm-4">
                @if (!$reminderCourses->count())
                    <div class="card border borde mb-3" style="max-width: 18rem;">
                        <div class="card-header">Aun no hay recordatorios </div>
                        <div class="card-body text-primary">

                            <p class="card-text">Cree un recordatorio</p>


                        </div>
                    </div>
                @endif
                @foreach ($reminderCourses as $courses)
                    <div class="card border border-{{ $courses->reminder->color }} mb-3" style="max-width: 18rem;">
                        <div class="card-header">{{ $courses->reminder->title }} </div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">Curso : {{ $courses->userCourse->course->name }}</h5>
                            <p class="card-text">Descripcion : {{ $courses->reminder->description }}</p>
                            <p class="card-text">Fecha(s) : {{ $courses->reminder->start }} -
                                {{ $courses->reminder->end }}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        {{-- <div class="card-footer text-muted">
        Footer
    </div> --}}
    </div>


@endsection

@section('css')

@endsection

@section('js')

@endsection
