@extends('layouts.dogadmin')

@section('page_title', 'Contacto')
@section('page_heading', 'Contacto')

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

                    {!! Form::open(['method' => isset($item)? 'put':'post', 'url' => 'contacto' . (isset($item) ? '/'.$item->id : '')]) !!}

                    <section class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>Dirección</label>
    <input type="text" class="form-control" name="dirección" placeholder="Dirección" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>Localidad</label>
    <input type="text" class="form-control" name="localidad" placeholder="Localidad" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>URL Facebook</label>
    <input type="text" class="form-control" name="url__facebook" placeholder="URL Facebook" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>URL Behance</label>
    <input type="text" class="form-control" name="url__behance" placeholder="URL Behance" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>URL Vimeo</label>
    <input type="text" class="form-control" name="url__vimeo" placeholder="URL Vimeo" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>URL Pinterest</label>
    <input type="text" class="form-control" name="url__pinterest" placeholder="URL Pinterest" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
</section>

<section class="form-group">
    <label>URL LinkedIn</label>
    <input type="text" class="form-control" name="url__linked_in" placeholder="URL LinkedIn" value="{{ ($errors && $errors->any() ? old('description') : (isset($item)? $item->description : '')) }}">
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