@extends('adminlte::page')

@section('title', 'Contactos')

@section('content_header')

@endsection

@section('content')
    <div class="accordion" id="accordionExample">
       
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    Some placeholder content for the second accordion panel. This panel is hidden by default.
                </div>
            </div>
        </div>

    </div>

@endsection

@section('css')

@endsection

@section('js')

@endsection
