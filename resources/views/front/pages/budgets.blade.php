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
    $(function() {
      const $menuSettings = $('#menu-settings');
      // Mostrar el modal menu settings
      $('.sibedar-nav-menu-budget').on('click', function() {
        $menuSettings.toggle(); // Alterna la visibilidad del modal
      });

      // Cierra el modal si se hace clic fuera de él
      $(document).on('click', function(event) {
        if(!$(event.target).closest($menuSettings).length && !$(event.target).closest('.sibedar-nav-menu-budget').length) {
          $menuSettings.hide();
        }
      });
    })

  </script>
@endpush



