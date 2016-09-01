@extends('layouts.dogadmin')

@section('page_title', 'Portfolio')
@section('page_heading', 'Portfolio')

@section('dogadmin-content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        {{ isset($item)? 'Editar' : 'Crear nuevo' }}
                    </h3>
                </div>

                <div class="box-body">

                    {!! Form::open(['method' => isset($item)? 'put':'post', 'url' => 'portfolio' . (isset($item) ? '/'.$item->id : '')]) !!}

                    <section class="form-group">
    <label>Titulo corto</label>
    <input type="text" class="form-control" name="titulo_corto" placeholder="Titulo corto" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>Titulo completo</label>
    <input type="text" class="form-control" name="titulo_completo" placeholder="Titulo completo" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>Texto</label>
    <textarea class="form-control" rows="3" name="texto" placeholder="Texto"></textarea>
</section>



                    <div class="input-group">
				            <span class="input-group-btn">
				                <button type="submit" name="search" class="btn btn-primary">Enviar</button>
				            </span>
				        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor_styles')

@endsection

@section('vendor_scripts')

@endsection

@section('scripts')

@endsection