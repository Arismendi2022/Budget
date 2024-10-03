{{-- modal new budget --}}
<div id="newBudget" class="modal-fresh mod-skinny modal-budget-settings ">
  <div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 263.5px;">
    <div class="modal-fresh-header">
      <div class="modal-fresh-title">
        <div class="ynab4-migration">
          New Budget
          <button class="button" type="button">
            Migrate a YNAB 4 Budget
            <svg class="ynab-new-icon " width="8" height="8">
              <!---->
              <use href="#icon_sprite_chevron_right"></use>
            </svg>
          </button>
        </div>
      </div>
      <!---->
    </div>
    <div class="modal-fresh-body">
      <section>
        <form id="new-budget-form" action="{{ route('budget.create') }}" method="POST">
          @csrf
          <label for="budget-name" class="type-body-bold">Budget Name</label>
          <div class="field-with-error">
            <div>
              <input id="modal-settings-budget-name" name="name" class="ember-text-field ember-view modal-budget-settings-name" type="text" value="{{ old('name') }}">
            </div>
            <!---->
            <ul class="errors warnings">
              <li id="message-error"></li>
            </ul>
          </div>
          <!---->
          <div class="modal-budget-settings-currency-fields">
            <div>
              <label for="modal-settings-currency" class="type-body-bold">Currency</label>
              <div class="x-select-container">
                <select class="js-x-select" id="modal-settings-currency" name="currency">
                  <!---->
                  @foreach (App\Helpers\FormatHelper::getCurrencies() as $item => $currencies)
                    <optgroup label="{{ $item }}">
                      @foreach ($currencies as $code => $name)
                        <option value="{{ $code }}">
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
              <div class="x-select-container">
                <select class="js-x-select" id="modal-settings-currency-placement" name="currency_placement">
                  @foreach (App\Helpers\FormatHelper::getPlacement() as $item => $displayPlacement)
                    <option value="{{ $item }}">
                      {{ $displayPlacement }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <label for="modal-settings-currency-format" class="type-body-bold">
            Number Format
          </label>
          <div class="x-select-container ">
            <select class="js-x-select" id="modal-settings-currency-format" name="number_format">
              @foreach (App\Helpers\FormatHelper::getNumberFormats() as $item => $displayNumber)
                <option value="{{ $item }}">
                  {{ $displayNumber }}
                </option>
              @endforeach
            </select>
          </div>
          <label for="modal-settings-date-format" class="type-body-bold">
            Date Format
          </label>
          <div class="x-select-container ">
            <select class="js-x-select" id="modal-settings-date-format" name="date_format">
              @foreach (App\Helpers\FormatHelper::getDateFormats() as $item => $displayDate)
                <option value="{{ $item }}">
                  {{ $displayDate }}
                </option>
              @endforeach
            </select>
          </div>
        </form>
      </section>
      <!---->
    </div>
    <div class="modal-fresh-footer">
      <button class="ynab-button secondary" type="button">
        Cancel
      </button>
      <button class="ynab-button primary" type="button">
        Create Budget
      </button>
    </div>
    <!---->
  </div>
</div>
@push('scripts')
  <script>
    // Código optimizado para manejar el modal y el formulario
    $(function() {
      // Centra al redimensionar la ventana
      $(window).on('resize', function() {
        $('.modal-fresh .modal').css({
          'top': ($(window).height() - $('.modal-fresh .modal').outerHeight()) / 2 + 'px',
          'left': ($(window).width() - $('.modal-fresh .modal').outerWidth()) / 2 + 'px'
        });
      }).trigger('resize');

      // Manejar el envío del formulario
      $('.modal-fresh-footer').on('click', '.ynab-button.primary', function(e) {
        e.preventDefault();

        const $form = $('#new-budget-form');

        $.ajax({
          url: $form.attr('action'),
          method: $form.attr('method'),
          data: $form.serialize(),
          dataType: 'json',
          success: function(response) {
            if(response.success) {
              closeModal(); // Llamar a la función para cerrar el modal
            }
          },
          error: function(xhr) {
            if(xhr.status === 422) {
              const errors = xhr.responseJSON.errors;

              if(errors.name) {
                $('.field-with-error').addClass('has-errors');
                $('.errors').removeClass('warnings'); // Quita la clase 'warnings'
                $('#message-error').text(errors.name[0]);
              }
            } else {
              // Mensaje genérico para otros errores
              $('#message-error').text('Ocurrió un error, por favor intenta de nuevo.');
            }
          }
        });
      });

      // Función para cerrar el modal
      function closeModal() {
        $('.errors').addClass('warnings');
        $('.field-with-error').removeClass('has-errors');
        $('#message-error').text('');
        $('#new-budget-form')[0].reset();
        $('#newBudget').removeClass('modal-overlay active');
      }

      // Eventos
      $('.modal-fresh-footer .ynab-button.secondary').on('click', closeModal); //Cierra el modal

    });

  </script>
@endpush

