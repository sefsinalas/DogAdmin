@extends('layouts.dogadmin')

@section('page_title', 'Contacto')
@section('page_heading', 'Contacto')

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
<th>Email</th>
<th>Dirección</th>
<th>Localidad</th>
<th>URL Facebook</th>
<th>URL Behance</th>
<th>URL Vimeo</th>
<th>URL Pinterest</th>
<th>URL LinkedIn</th>
<th>Acciones</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						@foreach ($items as $item)
						    <tr><td>{{ $item->id }}</td>
<td>{{ $item->email }}</td>
<td>{{ $item->dirección }}</td>
<td>{{ $item->localidad }}</td>
<td>{{ $item->url__facebook }}</td>
<td>{{ $item->url__behance }}</td>
<td>{{ $item->url__vimeo }}</td>
<td>{{ $item->url__pinterest }}</td>
<td>{{ $item->url__linked_in }}</td>
<td></td></tr>

						@endforeach
					</tr>
				</tbody>
			</table>
		</div>
		<div class="box-footer">
			<div class="row">
				<div class="col-md-2">
					<a href="contacto/create" type="button" class="btn btn-block btn-primary">Agregar nuevo</a>
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