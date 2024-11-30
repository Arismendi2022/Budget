<div>
  {{-- Care about people's approval and you will be their prisoner. --}}
  @if($isOpenEditAccountModal)
    <div id="editAccount" class="modal-overlay active ynab-u modal-popup account-modal">
      <div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 172px;">
        <div class="modal-header modal-header-with-close">
        <span class="modal-header-with-close-title">
          Edit Account
        </span>
          <button type="button" wire:click="hideEditAccountModalForm">
            <svg class="ynab-new-icon" width="16" height="16">
              <!---->
              <use href="#icon_sprite_close"></use>
            </svg>
          </button>
        </div>
        <div class="modal-content account-details-modal-scrollable">
          <!---->
          <div class="fieldset">
            <dl>
              <dt class="section-header">Account Information</dt>
            </dl>
          </div>
          <div class="fieldset modal-account-settings-name edit-account-name">
            <dl>
              <dt>Account Nickname</dt>
              <dd class="user-data">
                <div class="field-with-error">
                  <div>
                    <input id="nickname" wire:model="nickname">
                  </div>
                  <!---->
                  <!---->
                </div>
              </dd>
            </dl>
          </div>
          <div class="fieldset modal-account-settings-name edit-account-note">
            <dl>
              <dt>Account Notes</dt>
              <dd class="user-data">
                <textarea aria-label="Account Notes"></textarea>
              </dd>
            </dl>
          </div>
          <hr>
          <div class="fieldset edit-working-balance">
            <dl>
              <dt class="section-header">{{ $accountGroupType === 'Loans' ? "Today's Balance" : "Working Balance" }}</dt>
              <dd class="user-data">
                <div class="field-with-error">
                  <div>
                    <div id="ember132" class="ynab-new-currency-input is-editing legacy-currency-input">
                      <!---->
                      <div class="input-wrapper">
                        <input id="balance" class="ember-text-field ember-view" placeholder="What is the balance of this account right now?"
                          title="Working Balance" aria-label="Working Balance" type="text" wire:model="balance">
                        <button class="user-data currency tabular-nums positive">
                          <bdi>$</bdi>
                        </button>
                      </div>
                      <!---->
                    </div>
                  </div>
                  <!---->
                  <!---->
                </div>
                <div class="info space-top">An adjustment transaction will be created automatically if you change this amount.</div>
              </dd>
            </dl>
          </div>
          <!---->
          <hr>
          @if($accountGroupType !== 'Loans')
            <div class="fieldset edit-direct-import-toggle">
              <dl>
                <dt class="section-header">Financial Institution Connection</dt>
                <dd class="user-data">
                  <button class="ynab-button primary   link-to-bank" type="button">
                    Link Account
                  </button>
                  <div class="info">
                    Link your account to your financial institution and import transactions without ever leaving YNAB.
                  </div>
                  <!---->
                </dd>
              </dl>
            </div>
          @endif
          <!---->
          @if($accountGroupType === 'Loans')
            <div class="fieldset">
              <dl>
                <dt class="section-header">Loan Details</dt>
              </dl>
            </div>
            <div class="fieldset">
              <dl>
                <dt>Loan Type</dt>
                <dd class="modal-account-settings-type ">
                  <div class="field-with-error">
                    <div>
                      <div class="x-select-container">
                        <select class="js-x-select" wire:model="dataAccountType">
                          @foreach(App\Helpers\LoanTypesHelper::getLoanOptions() as $option)
                            <option value="{{ $option['type'] }}">
                              {{ $option['data-account-type'] }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!---->
                  </div>
                </dd>
              </dl>
            </div>
            <div class="split-fieldset">
              <div class="fieldset">
                <dl>
                  <dt>Minimum Monthly Payment</dt>
                  <dd class="modal-account-settings-minimum-payment">
                    <div class="field-with-error">
                      <div>
                        <div id="ember143" class="ynab-new-currency-input is-editing legacy-currency-input">
                          <!---->
                          <div class="input-wrapper">
                            <input id="ember144" class="ember-text-field ember-view" title="Minimum Monthly Payment" aria-label="Minimum Monthly Payment" type="text"
                              wire:model="payment">
                            <button class="user-data currency tabular-nums positive">
                              <bdi>$</bdi>
                              120,00
                            </button>
                          </div>
                          <!---->
                        </div>
                      </div>
                      <!---->
                      <!---->
                    </div>
                  </dd>
                </dl>
              </div>
              <div class="fieldset">
                <dl>
                  <dt>Interest Rate (%)</dt>
                  <dd class="modal-account-settings-interest-rate">
                    <div class="field-with-error">
                      <div>
                        <div id="ember145" class="ynab-new-currency-input is-editing legacy-currency-input">
                          <!---->
                          <div class="input-wrapper">
                            <input id="ember146" class="ember-text-field ember-view" title="Interest Rate (%)" aria-label="Interest Rate (%)" type="text" wire:model="interest">
                            <button class="user-data currency tabular-nums positive">
                              <bdi>$</bdi>
                              10,00
                            </button>
                          </div>
                          <!---->
                        </div>
                      </div>
                      <!---->
                      <!---->
                    </div>
                  </dd>
                </dl>
              </div>
            </div>
            <hr>
            <div class="fieldset edit-loan-account-pairing">
              <dl>
                <dt class="section-header">Paired Budget Category</dt>
                <dd class="space-vertical">
                  <div class="med-info">
                    Pairing a category helps you create realistic payoff plans, and keep track of your progress.
                  </div>
                  <button class="ynab-button secondary   unpair-loan-category" type="button">Unpair Category</button>
                  <div class="info">Paired with
                    "<a href="#" class="paired-subcategory-name">MackBook</a>"
                  </div>
                </dd>
              </dl>
            </div>
            <hr>
            <div class="fieldset account-di-connection">
              <dl>
                <dt class="section-header">Financial Institution Connection</dt>
                <dd class="space-vertical">
                  <div class="med-info">
                    New transactions are unable to import into loan accounts.
                  </div>
                  <button class="ynab-button primary   learn-more-loan-accounts-di" type="button">
                    Learn More
                  </button>
                  <!---->
                </dd>
              </dl>
            </div>
          @endif
          <!---->
        </div>
        <div class="modal-actions top-border">
          <button class="ynab-button destructive   left-button" type="button">

            Delete Account

          </button>
          <button class="ynab-button secondary   button-cancel" type="button">
            Cancel
          </button>
          <button class="ynab-button primary   js-primary-action save-account-button" type="button">
            Save
          </button>
        </div>
        <!---->
      </div>
    </div>
  @endif
</div>

@push('scripts')
  <script>

    $(function() {

      window.addEventListener('focusInput', function() {
        setTimeout(function() {
          $('#nickname').focus();
        }, 10); // Retraso de 10 ms
      });
    });

    /* const isOpenEditAccountModal = true; // Cambia esto según tu lógica

     if(isOpenEditAccountModal) {
       const modal = document.getElementById('editAccount');
       centerModal('#editAccount'); // Centra el modal
     }*/

  </script>
@endpush
