@extends('layouts.dogadmin')

@section('page_title', 'Portfolio')
@section('page_heading', 'Portfolio')

@section('dogadmin-content')
	<div class="box">
		<div class="box-header">
          	<h3 class="box-title">Listado</h3>
        </div>
		<div class="box-body table-responsive table-striped">
	        <table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
<th>Titulo corto</th>
<th>Titulo completo</th>
<th>Texto</th>
<th>Acciones</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach ($items as $item)
						    <tr><td>{{ $item->id }}</td>
<td>{{ $item->titulo_corto }}</td>
<td>{{ $item->titulo_completo }}</td>
<td>{{ $item->texto }}</td>
<td></td></tr>

						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<div class="row">
				<div class="col-md-2">
					<a href="portfolio/create" type="button" class="btn btn-block btn-primary">Agregar nuevo</a>
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