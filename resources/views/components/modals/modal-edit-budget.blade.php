{{-- modal edit budget --}}
<div id="editBudget" class="modal-fresh mod-skinny modal-budget-settings">
  <div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 263.5px;">
    <div class="modal-fresh-header">
      <div class="modal-fresh-title">Budget Settings</div>
      <button class="modal-fresh-close" aria-label="Close" title="Close" type="button">
        <svg class="ynab-new-icon" width="16" height="16">
          <!---->
          <use href="#icon_sprite_close">
            <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close" fill="none" viewBox="0 0 24 24">
              <path fill="currentColor" fill-rule="evenodd"
                d="M22.5 22.5a1.4 1.4 0 0 1-2 0L12 13.9l-8.6 8.6a1.4 1.4 0 0 1-1.9-2l8.6-8.5-8.6-8.5a1.4 1.4 0 0 1 2-2l8.5 8.6 8.5-8.6a1.4 1.4 0 1 1 2 2L13.9 12l8.6 8.6a1.4 1.4 0 0 1 0 1.9"
                clip-rule="evenodd"></path>
            </symbol>
          </use>
        </svg>
      </button>
    </div>
    <div class="modal-fresh-body">
      <section>
        <form id="edit-budget-form" action="" method="POST">
          @csrf
          <input type="hidden" name="user_id" value="{{ auth()->id() }}">
          <label for="budget-name" class="type-body-bold">Budget Name</label>
          <div class="field-with-error">
            <div>
              <input id="modal-settings-budget-name" name="name" class="ember-text-field ember-view modal-budget-settings-name" type="text" value="{{ $budget->name }}">
              <!---->
              <ul class="errors warnings">
                <li id="message-error"></li>
              </ul>
              <!---->
            </div>
            <div class="modal-budget-settings-currency-fields">
              <div>
                <label for="modal-settings-currency" class="type-body-bold">Currency</label>
                <div class="x-select-container ">
                  <select class="js-x-select" id="modal-settings-currency">
                    <!---->
                    @foreach (App\Helpers\FormatHelper::getCurrencies() as $group => $currencies)
                      <optgroup label="{{ $group }}">
                        @foreach ($currencies as $code => $name)
                          <option value="{{ $code }}"
                            {{ isset($budget) && $budget['currency'] == $code ? 'selected' : '' }}>
                            {{ $name }} – {{ $code }}
                          </option>
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                </div>
              </div>
              <div>
                <label for="modal-settings-currency-placement" class="type-body-bold">
                  Currency Placement
                </label>
                <div class="x-select-container  ">
                  <select class="js-x-select" id="modal-settings-currency-placement" name="currency_placement">
                    <!---->
                    @foreach (App\Helpers\FormatHelper::getPlacement() as $format => $displayPlacement)
                      <option value="{{ $format }}"
                        {{ isset($budget) && $budget->currency_placement === $format ? 'selected' : '' }}>
                        {{ $displayPlacement }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <label for="modal-settings-currency-format" class="type-body-bold">Number Format</label>
            <div class="x-select-container  ">
              <select class="js-x-select" id="modal-settings-currency-format">
                <!---->
                @foreach (App\Helpers\FormatHelper::getNumberFormats() as $format => $displayNumber)
                  <option value="{{ $format }}"
                    {{ isset($budget) && $budget->number_format === $format ? 'selected' : '' }}>
                    {{ $displayNumber }}
                  </option>
                @endforeach
              </select>
            </div>
            <label for="modal-settings-date-format" class="type-body-bold">Date Format</label>
            <div class="x-select-container  ">
              <select class="js-x-select" id="modal-settings-date-format">
                <!---->
                @foreach (App\Helpers\FormatHelper::getDateFormats() as $format => $displayDate)
                  <option value="{{ $format }}"
                    {{ isset($budget) && $budget->date_format === $format ? 'selected' : '' }}>
                    {{ $displayDate }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </form>
      </section>
      <!---->
    </div>
    <div class="modal-fresh-footer">
      <button class="ynab-button secondary  " type="button">Cancel</button>
      <button class="ynab-button primary  " type="button">Apply Settings</button>
    </div>
    <!---->
  </div>
</div>

@push('scripts')
  <script>
    $(function() {
      var $modal = $('.modal-fresh .modal');

      function centerModal() {
        if($modal.is(':visible')) {
          $modal.css({
            top: ($(window).height() - $modal.outerHeight()) / 2 + 'px',
            left: ($(window).width() - $modal.outerWidth()) / 2 + 'px'
          });
        }
      }

      // Llama a la función closeModal al hacer clic en el botón de cerrar
      $(".modal-fresh-close").click(function() {
        closeModal();
      });

      // Función para cerrar el modal
      function closeModal() {
        $('#editBudget').removeClass('modal-overlay active');
        $('#edit-budget-form')[0].reset();
      }

      // Eventos
      //$('#modal-settings-budget-name').focus();
      $('#editBudget').on('shown.bs.modal', centerModal); // Asegúrate de que este evento sea correcto
      $(window).on('resize', centerModal); // Centra al redimensionar la ventana
      //Cierra el modal.
      $('.modal-fresh-footer .ynab-button.secondary').on('click', closeModal);
    });

  </script>
@endpush
