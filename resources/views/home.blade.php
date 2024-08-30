@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="p-3 text-uppercase font-weight-bold">Bienvenido: {{ Auth::user()->name }}</h1>

    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-header">

                    <h1 class="d-inline float-left">Horario </h1>
                    <h1 class="d-inline float-right">

                        <button class="  btn btn-primary ">
                            Agregar Un Curso
                        </button>
                    </h1>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">Horario/Dias</th>
                                    <th scope="col">Lunes</th>
                                    <th scope="col">Martes</th>
                                    <th scope="col">Miercoles</th>
                                    <th scope="col">Jueves</th>
                                    <th scope="col">Viernes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row">7-8 am</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr class="">
                                    <td scope="row">8-9 am</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center"> Recordatorios del Mes</h1>
                </div>
                <div class="card-body h-100">
                    <div id="agenda"></div>
                </div>
                <div class="card-fooder  text-muted"></div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-9">

    <div class="card">
        <div class="card-header">
            <h1> Lista de Cursos</h1>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="w-100 {{ $course->course->color }}  rounded-top" style="height:25px"></div>

                            <div class="card-body">
                                <p class=" text-center card-title">
                                    <strong>{{ $course->course->name }}</strong>
                                </p>
                                <p class="card-text"><strong>Descripcion del curso</strong> :
                                    {{ $course->course->description }}
                                </p>
                                <a href="{{ route('courses.show', $course->course->id) }}" class="btn btn-primary">Ver Mas
                                    del Curso </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="card-footer text-muted">
            Footer
        </div>
    </div>
        </div>
        <div class="text-white-50  bg-dark p-3 col-sm-3 rounded ">
            <h1>Recordatorios</h1>
            @foreach ($reminders as $reminder)
                <div class="card text-dark">
                    <div class="w-100   bg-{{ $reminder->color }} rounded-top" style="height:25px"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $reminder->title }}</h5>
                        <p class="card-text">{{ $reminder->description }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@stop

@section('css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.js"></script>
    <script src="{{ asset('js/agenda.js') }}"></script>
    <script>
        let renders =
            @php
                echo json_encode($reminders)
            @endphp
    </script>
@stop
