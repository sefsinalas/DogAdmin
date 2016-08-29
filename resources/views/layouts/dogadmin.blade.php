@extends('layouts.app')

@section('page_title', 'Dashboard')
@section('page_heading', 'Dashboard')

@section('main-content')
	<section class="content">

		<!-- Main row -->
		<div class="row">
			<!-- Left col -->
			<div class="col-md-12">

				<!-- TABLE: LATEST ORDERS -->
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Latest Orders</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						@yield('dogadmin-content')
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix">
						<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
						<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
					</div>
					<!-- /.box-footer -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
@endsection

@section('vendor_styles')

@endsection

@section('vendor_scripts')

@endsection

@section('scripts')
    <script src="{{ elixir('js/dashboard.js') }}"></script>
@endsection