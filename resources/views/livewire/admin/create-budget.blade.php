{{-- modal new budget --}}
<div id="new-budget" class="modal-overlay active modal-fresh mod-skinny modal-budget-settings" style="display: none;">
  <div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 263.5px;">
    <div class="modal-fresh-header">
      <div class="modal-fresh-title">
        <div class="ynab4-migration">
          New Budget
          <button class="button" type="button">
            Migrate a YNAB 4 Budget
            <svg class="ynab-new-icon" width="8" height="8">
              <!---->
              <use href="#icon_sprite_chevron_right">
                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right" fill="none" viewBox="0 0 24 24">
                  <path fill="currentColor" fill-rule="evenodd"
                    d="M7.4 23.6a1.5 1.5 0 0 1-2 0 1.4 1.4 0 0 1 0-2l10-9.6-10-9.6a1.4 1.4 0 0 1 0-2 1.5 1.5 0 0 1 2 0L18.6 11c.5.6.5 1.4 0 2z" clip-rule="evenodd"></path>
                </symbol>
              </use>
            </svg>
          </button>
        </div>
      </div>
      <!---->
    </div>
    <div class="modal-fresh-body">
      <section>
        <form id="newBudget-form">
          @csrf
          <label for="budget-name" class="type-body-bold">Budget Name</label>
          <div class="field-with-error {{ $errors->has('name') ? 'has-errors' : '' }}">
            <div>
              <input id="modal-settings-budget-name" class="ember-text-field ember-view modal-budget-settings-name" type="text" wire:model="name">
            </div>
            <!---->
            <ul class="errors {{ $errors->has('name') ? '' : 'warnings' }}">
              @if ($errors->has('name'))
                <li>{{ $errors->first('name') }}</li> <!-- Muestra el primer error -->
              @endif
            </ul>
          </div>
          <!---->
          <div class="modal-budget-settings-currency-fields">
            <div>
              <label for="modal-settings-currency" class="type-body-bold">Currency</label>
              <div class="x-select-container">
                <select wire:model="currency" class="js-x-select" id="modal-settings-currency">
                  <!---->
                  @foreach (App\Helpers\FormatHelper::getCurrencies() as $item => $currencies)
                    <optgroup label="{{ $item }}">
                      @foreach ($currencies as $code => $name)
                        <option value="{{ $code }}">
                          {{ $name }}
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
                <select wire:model="currency_placement" class="js-x-select" id="modal-settings-currency-placement">
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
            <select wire:model="number_format" class="js-x-select" id="modal-settings-currency-format">
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
            <select wire:model="date_format" class="js-x-select" id="date-format">
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
      <button class="ynab-button secondary" type="button">Cancel</button>
      <button class="ynab-button primary" type="button" wire:click.prevent="saveBudget">Create Budget</button>
    </div>
    <!---->
  </div>
</div>

@push('scripts')
  <script>
    $(function() {
      const $newBudget = $('#new-budget');
      const $newBudgetForm = $('#newBudget-form');
      const $errorDiv = $('.field-with-error');
      const $errorList = $('.errors');

      // Cierra el modal y restablece el formulario
      $('.secondary').on('click', function() {
        $newBudget.hide();
        $newBudgetForm[0].reset();

        // Limpia los errores
        $errorDiv.removeClass('has-errors');
        $errorList.addClass('warnings');
        $errorList.empty();
      });

      // Re-centra el modal cuando se redimensiona la ventana
      $(window).on('resize', function() {
        if($newBudget.is(':visible')) {
          centerModal();
        }
      });

    })

  </script>
@endpush

