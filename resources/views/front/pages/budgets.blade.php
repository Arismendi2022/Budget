@extends('front.layouts.pages-budget')
@section('pageTitle', $pageTitle ?? 'Page Title Here')
@section('content')
	{{-- menu settings --}}
	<livewire:admin.settings-menu :hide-buttons="false"/> {{-- Cambia a true si deseas ocultar los botones --}}
	<livewire:admin.budget-manager/>
	<!---->
@endsection
@push('scripts')
	<script>
	
	</script>
@endpush



