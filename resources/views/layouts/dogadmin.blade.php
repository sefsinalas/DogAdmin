@extends('layouts.app')

@section('page_title', 'Dashboard')
@section('page_heading', 'Dashboard')

@section('main-content')

	@yield('dogadmin-content')

@endsection

@section('vendor_styles')

@endsection

@section('vendor_scripts')

@endsection

@section('scripts')
    <script src="{{ elixir('js/dashboard.js') }}"></script>
@endsection