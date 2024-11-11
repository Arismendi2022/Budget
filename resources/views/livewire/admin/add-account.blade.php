<div>
  <div class="nav-add-accounts">
    @if(empty($accounts))
      <div class="nav-accounts-empty-state">
        <h5>No Accounts</h5>
        <p>You can't budget without adding accounts to YNAB first. How about adding one now?</p>
      </div>
    @endif
    <button class="ynab-button contrast button-sidebar nav-add-account" type="button" wire:click="addAccountModal">
      <svg class="ynab-new-icon" width="12" height="12">
        <!---->
        <use href="#icon_sprite_plus_circle_fill">
          <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
            <path fill="currentColor"
              d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2">
            </path>
          </symbol>
        </use>
      </svg>
      Add Account
    </button>
    <!---->
  </div>
  <!-- Add Account Modal -->
  @if($isOpenAccountModal)
    <div id="add_account" class="modal-overlay active ynab-u modal-generic self-centered account-widget-modal">
      <div class="modal" role="dialog" aria-modal="true">
        <div class="account-widget" tabindex="0">
          <!-- Sección de selección de Linked/Unlinked -->
          @if($currentSection === 1)
            <div class="account-widget-step account-widget-select-linked-unlinked account-widget-step-with-help-box">
              <div class="account-widget-header">
                <div class="hidden-header-button"></div>
                <div class="account-widget-header-title">
                  <h1>Add Account</h1>
                  <!---->
                </div>
                <button aria-label="Close" title="Close" type="button" wire:click="hideAccountModalForm">
                  <svg class="ynab-new-icon icon-close" width="16" height="16">
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
              <div class="account-widget-body">
                <div class="select-linked-unlinked-box select-linked-unlinked-box-linked" role="button" tabindex="0">
                  <div class="select-linked-unlinked-box-text">
                    <div class="select-linked-unlinked-box-icon">
                      <svg class="ynab-new-icon icon-download" width="28" height="26">
                        <!---->
                        <use href="#icon_sprite_arrow_from_cloud">
                          <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_from_cloud" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd"
                              d="M18.5 16.6h-2.8a1 1 0 1 1 0-1.8h2.7a3.7 3.7 0 0 0 3.8-3.7c0-2.5-2-3.3-3-3.7a1 1 0 0 1-.7-.8v-.5a5 5 0 0 0-4.6-4.3c-2.1 0-3.3 1.3-4 2.2a1 1 0 0 1-1 .3l-1.1-.1A3 3 0 0 0 5 6.9v.6a1 1 0 0 1-.6.8c-1.2.5-2.7 1.2-2.7 3.4a3 3 0 0 0 3.3 3h3.2a1 1 0 1 1 0 2H5.1a5 5 0 0 1-1.9-9.9 4.6 4.6 0 0 1 5.6-4.4 6.5 6.5 0 0 1 11.5 3.4 5.5 5.5 0 0 1-1.8 10.8m-9.7 1.9H11V9.2a1 1 0 0 1 1.8 0v9.3h2.3a.5.5 0 0 1 .4.7l-3.2 4.6a.5.5 0 0 1-.8 0l-3.2-4.6a.5.5 0 0 1 .4-.7"
                              clip-rule="evenodd"></path>
                          </symbol>
                        </use>
                      </svg>
                    </div>
                    <div class="select-linked-unlinked-box-icon-title-message">
                      <span class="select-linked-unlinked-box-title">Linked</span>
                      <p class="select-linked-unlinked-box-message">
                        Connect to your bank and automatically import transactions.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="separator-text">
                  <span>or</span>
                </div>
                <div class="select-linked-unlinked-box select-linked-unlinked-box-unlinked" role="button" tabindex="0" wire:click="showUnlinkedModal">
                  <div class="select-linked-unlinked-box-text">
                    <div class="select-linked-unlinked-box-icon">
                      <svg class="ynab-new-icon icon-edit" width="24" height="24">
                        <!---->
                        <use href="#icon_sprite_square_and_pencil">
                          <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_square_and_pencil" fill="none" viewBox="0 0 24 25">
                            <path fill="currentColor" fill-rule="evenodd"
                              d="M22 4.8h-.5l-2.3-2.3a.4.4 0 0 1 0-.6L20.8.4a1.2 1.2 0 0 1 1.7 0l1.1 1a1.2 1.2 0 0 1 0 1.8zM9.8 16.6l-2.8.8a.3.3 0 0 1-.4-.3l.9-2.8c.1-.5.4-1 .8-1.4l9.5-9.5c.2-.2.5-.2.6 0l2.3 2.3a.4.4 0 0 1 0 .6l-9.5 9.5a3 3 0 0 1-1.4.8m12.1-5.1v9.2a3.3 3.3 0 0 1-3.3 3.3H3.3A3.3 3.3 0 0 1 0 20.7V5.5a3.3 3.3 0 0 1 3.3-3.3h9.2a1 1 0 1 1 0 2.2H3.3a1 1 0 0 0-1.1 1v15.3c0 .6.5 1.1 1 1.1h15.3c.6 0 1.1-.5 1.1-1v-9.3a1 1 0 1 1 2.2 0"
                              clip-rule="evenodd"></path>
                          </symbol>
                        </use>
                      </svg>
                    </div>
                    <div class="select-linked-unlinked-box-icon-title-message">
                      <span class="select-linked-unlinked-box-title">Unlinked</span>
                      <p class="select-linked-unlinked-box-message">
                        Start with your current balance and enter your own transactions.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="account-widget-help-box">
                  <svg class="ynab-new-icon" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_info_circle_fill">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0"></path>
                      </symbol>
                    </use>
                  </svg>
                  <p>
                    Linked or unlinked? <a href="#info-matrix" tabindex="0">Learn more</a> to help you decide.
                  </p>
                </div>
              </div>
            </div>
          @endif
          <!-- Sección para agregar cuenta no vinculada -->
          @if($currentSection === 2)
            <div class="account-widget-step account-widget-add-unlinked-account account-widget-step-with-help-box">
              <div class="account-widget-header">
                <button aria-label="Back" title="Back" type="button" wire:click="goToSection(1)">
                  <svg class="ynab-new-icon icon-back" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_chevron_left">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M18.7 23.6a2 2 0 0 1-2.1 0L5.3 13a1.4 1.4 0 0 1 0-2L16.6.4a2 2 0 0 1 2 0c.7.6.7 1.5 0 2L8.6 12l10.2 9.6c.6.5.6 1.4 0 2" clip-rule="evenodd"></path>
                      </symbol>
                    </use>
                  </svg>
                </button>
                <div class="account-widget-header-title">
                  <h1>Add Unlinked Account</h1>
                  <!---->
                </div>
                <button aria-label="Close" title="Close" type="button" wire:click="hideAccountModalForm">
                  <svg class="ynab-new-icon icon-close" width="16" height="16">
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
              <div class="account-widget-body">
                <p>
                  <span class="header-strong">Let's go!</span>
                  And don’t worry—if you change your mind, you can link your account at any time.
                </p>
                <div class="y-form-field field-with-error ">
                  <label>Give it a nickname</label>
                  <input id="nickname" class="ember-text-field ember-view y-input name-input user-data" autocomplete="nope" autocorrect="off" spellcheck="false"
                    autocapitalize="words" autofocus="" type="text" wire:model="nickname">
                  <!---->
                </div>
                <div class="y-form-field field-with-error ">
                  <label>
                    What type of account are you adding?
                  </label>
                  <button class="account-type-select-button" type="button" wire:click="selectAccountType">
                    {{ $selectedAccountType ?? 'Select account type...' }}
                    <svg class="ynab-new-icon" width="16" height="16">
                      <!---->
                      <use href="#icon_sprite_caret_right">
                        <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_right" fill="none" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M19.5 13 6.1 23.8c-.9.7-2.1 0-2.1-1V1.3c0-1 1.2-1.7 2-1l13.5 10.6a1.4 1.4 0 0 1 0 2.2"></path>
                        </symbol>
                      </use>
                    </svg>
                  </button>
                  <!---->
                </div>
                <div class="y-form-field field-with-error  currency-input-group">
                  <label>
                    What is your current account balance?
                  </label>
                  <input id="balance" class="ember-text-field ember-view y-input balance-input user-data" autocomplete="nope" autocorrect="off" spellcheck="false"
                    autocapitalize="none" inputmode="decimal" type="text" wire:model="balance">
                  <!---->
                </div>
                <!---->
              </div>
              <div class="account-widget-footer">
                <button disabled="" class="ynab-button primary is-large " type="button">
                  Next
                </button>
              </div>
            </div>
          @endif
          <!-- Sección para agregar tipo de cuenta -->
          @if($currentSection === 3)
            <div class="account-widget-step account-widget-add-unlinked-account account-widget-step-with-help-box">
              <div class="account-widget-header">
                <button aria-label="Back" title="Back" type="button" wire:click="goToSection(2)">
                  <svg class="ynab-new-icon icon-back" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_chevron_left">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="M18.7 23.6a2 2 0 0 1-2.1 0L5.3 13a1.4 1.4 0 0 1 0-2L16.6.4a2 2 0 0 1 2 0c.7.6.7 1.5 0 2L8.6 12l10.2 9.6c.6.5.6 1.4 0 2" clip-rule="evenodd"></path>
                      </symbol>
                    </use>
                  </svg>
                </button>
                <div class="account-widget-header-title">
                  <h1>Select Account Type</h1>
                  <!---->
                </div>
                <button aria-label="Close" title="Close" type="button" wire:click="hideAccountModalForm">
                  <svg class="ynab-new-icon icon-close" width="16" height="16">
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
              <div class="account-widget-body">
                <div class="account-type-select">
                  @foreach($accountTypes as $category => $accounts)
                    <div class="account-type-select-group">
                      <h3>{{ $category }}</h3>
                      <p>Accounts description for {{ $category }}.</p>
                      @foreach($accounts as $account)
                        <button class="account-widget-list-button" data-account-type="{{ $account['data-account-type'] }}" wire:click="selectAccount('{{ $account['type'] }}')"
                          type="button">
                          {{ $account['type'] }}
                          @if($selectedAccountType === $account['type'])
                            <svg class="ynab-new-icon" width="16" height="16">
                              <use href="#icon_sprite_check">
                                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check" fill="none" viewBox="0 0 24 24">
                                  <path fill="currentColor"
                                    d="m7.4 17.6-5-5a1.4 1.4 0 0 0-2 0 1.4 1.4 0 0 0 0 2l6 6a1.4 1.4 0 0 0 2 0L23.6 5.4a1.4 1.4 0 0 0 0-2 1.4 1.4 0 0 0-2 0z"></path>
                                </symbol>
                              </use>
                            </svg>
                          @endif
                        </button>
                      @endforeach
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          @endif
          <!---->
        </div>
        <!---->
      </div>
    </div> <!-- End Modal -->
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

  </script>
@endpush


