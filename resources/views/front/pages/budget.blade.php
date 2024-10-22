@extends('front.layouts.pages-budget')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')
  {{-- menu settings --}}
  <livewire:admin.settings-menu :hide-buttons="false"/> {{-- Cambia a true si deseas ocultar los botones --}}
  <livewire:admin.budget-manager/>

@endsection
@push('scripts')
  <script>
    $(function() {
      // Almacena selectores en variables para mejorar el rendimiento
      const $menuSettings = $('#menu-settings');
      const $newBudget = $('#new_budget_modal');
      const $body = $('body');

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

      // Mostrar el modal list budget button
      $('.wants-tombstone-button').on('click', function(e) {
        event.preventDefault();
        event.stopPropagation();
        const $budgetItem = $(this).closest('.budget-list-item');

        // Muestra solo el modal correspondiente
        $budgetItem.find('.are-you-sure').show();
        $('body').addClass('modal-active'); // Agrega la clase al body
      });

      // Cierra el modal list budget button
      $('.primary').on('click', function() {
        $body.removeClass('modal-active');
        $('.are-you-sure').hide();
      });
      // Escuchar el evento de Livewire
      Livewire.on('budgetDeleted', function() {
        $('body').removeClass('modal-active');
        $('.are-you-sure').hide(); // Oculta todos los modales
      });

      window.addEventListener('showCreateModalForm', function() {
        $('#new_budget_modal').show();
        $('#modal-settings-budget-name').focus();
        centerModal();
      })
      window.addEventListener('hideCreateModalForm', function() {
        $('#new_budget_modal').hide();
      })

      // Re-centra el modal cuando se redimensiona la ventana
      $(window).on('resize', function() {
        if($newBudget.is(':visible')) {
          centerModal();
        }
      });

    });

  </script>
@endpush



