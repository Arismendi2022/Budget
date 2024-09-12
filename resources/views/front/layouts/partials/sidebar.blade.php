{{-- Main Sidebar Container --}}
<nav id="ember4" class="ynab-u sidebar logged-in" style="width:260px;" role="navigation">
  <div class="sidebar-left">
    <div class="sidebar-contents">
      <div class="sidebar-nav">
        <button class="sidebar-nav-menu sidebar-nav-menu-budget js-sidebar-nav-menu user-data" type="button">
          <svg class="ynab-new-icon sidebar-nav-ynab" width="24" height="24">
            <!---->
            <use href="#icon_sprite_ynab_logo">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_ynab_logo" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M19.4 10.8H15l-.3.2-2.6 4.3h-.2L9.3 11l-.2-.2H4.7c-.1 0-.2.1-.1.2l5.2 7.6v4.9l.2.2h4s.2 0 .2-.2v-4.9l5.2-7.6c.1-.1 0-.2 0-.2m-7.7-6.6.3.1h.3c2.5-1.6.4-3.6-.3-4.3-.7.7-2.8 2.7-.3 4.2M9.1 10h.3l.2-.3C11 6.7 8 6.2 6.8 6c-.2 1-.9 4 2.3 4m-4-.7.2-.2v-.3c-.2-3.2-3.1-2.2-4.2-2 .3 1.1 1.1 4 4 2.5m.4 5.3.1-.3c0-.1 0-.2-.2-.3-2-2.4-3.8 0-4.5 1 .9.6 3.3 2.4 4.6-.4M12 5c-.6.6-2.2 2.2-.2 3.6h.4c2-1.4.3-3-.2-3.6">
                </path>
                <path fill="currentColor"
                  d="m6.6 16-.2-.1c-2 0-1.6 1.8-1.5 2.5.7-.2 2.5-.5 1.8-2.3zm5-3.1h.5c2-1.4.3-3-.2-3.6-.6.6-2.2 2.2-.2 3.6m-8.2-1v-.5c-1.2-2-3-.5-3.6 0 .6.5 2 2.3 3.6.5m2-5.6h.2l.1-.3c.9-2.1-1.4-2.6-2.2-2.7-.1.8-.5 3 1.9 3m3.2-.7H9s.2 0 .2-.2c1.5-2.1-.8-3.2-1.6-3.6-.4.8-1.4 3.2 1.2 3.8m5.8 4.4h.3c3.2.1 2.5-2.9 2.3-4-1 .3-4 .8-2.8 3.7 0 .2.1.2.2.3m4-1.1.1.3.3.2c2.8 1.5 3.6-1.4 4-2.4-1.2-.3-4-1.3-4.3 1.9m-.1 5.2c-.2.1-.2.2-.2.3v.3c1.4 2.8 3.8 1 4.7.3-.7-.8-2.5-3.3-4.5-1m-1 2h-.2l-.1.2c-.7 1.8 1.1 2.1 1.8 2.3 0-.7.4-2.5-1.5-2.5m2.8-4.6v.5c1.5 1.8 3 0 3.6-.6-.7-.4-2.4-1.9-3.6.1m-2.2-5.2.2.1c2.4 0 2-2.2 1.9-3-.8.1-3 .6-2.2 2.7zM15 5.5h.2c2.6-.6 1.6-3 1.2-3.8-.8.4-3.1 1.5-1.6 3.6z">
                </path>
              </symbol>
            </use>
            <title>Arismendi's Budget</title>
          </svg>
          <div class="sidebar-nav-budget-email">
            <span class="sidebar-nav-budget-email-budget">{{ $users->name ? $users->name : "Arismendi" }}'s Budget</span>
            <span class="sidebar-nav-budget-email-email button-truncate">{{ $users->email }}</span>
          </div>
          <svg class="ynab-new-icon" width="12" height="12">
            <!---->
            <use href="#icon_sprite_caret_down">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
              </symbol>
            </use>
          </svg>
        </button>
        <ul class="nav-main">
          <li class="navlink sidebar-nav-menu-collapsed">
            <button class="js-sidebar-nav-menu" type="button">
              <svg class="ynab-new-icon " width="24" height="24">
                <!---->
                <use href="#icon_sprite_ynab_logo">
                  <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_ynab_logo" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor"
                      d="M19.4 10.8H15l-.3.2-2.6 4.3h-.2L9.3 11l-.2-.2H4.7c-.1 0-.2.1-.1.2l5.2 7.6v4.9l.2.2h4s.2 0 .2-.2v-4.9l5.2-7.6c.1-.1 0-.2 0-.2m-7.7-6.6.3.1h.3c2.5-1.6.4-3.6-.3-4.3-.7.7-2.8 2.7-.3 4.2M9.1 10h.3l.2-.3C11 6.7 8 6.2 6.8 6c-.2 1-.9 4 2.3 4m-4-.7.2-.2v-.3c-.2-3.2-3.1-2.2-4.2-2 .3 1.1 1.1 4 4 2.5m.4 5.3.1-.3c0-.1 0-.2-.2-.3-2-2.4-3.8 0-4.5 1 .9.6 3.3 2.4 4.6-.4M12 5c-.6.6-2.2 2.2-.2 3.6h.4c2-1.4.3-3-.2-3.6">
                    </path>
                    <path fill="currentColor"
                      d="m6.6 16-.2-.1c-2 0-1.6 1.8-1.5 2.5.7-.2 2.5-.5 1.8-2.3zm5-3.1h.5c2-1.4.3-3-.2-3.6-.6.6-2.2 2.2-.2 3.6m-8.2-1v-.5c-1.2-2-3-.5-3.6 0 .6.5 2 2.3 3.6.5m2-5.6h.2l.1-.3c.9-2.1-1.4-2.6-2.2-2.7-.1.8-.5 3 1.9 3m3.2-.7H9s.2 0 .2-.2c1.5-2.1-.8-3.2-1.6-3.6-.4.8-1.4 3.2 1.2 3.8m5.8 4.4h.3c3.2.1 2.5-2.9 2.3-4-1 .3-4 .8-2.8 3.7 0 .2.1.2.2.3m4-1.1.1.3.3.2c2.8 1.5 3.6-1.4 4-2.4-1.2-.3-4-1.3-4.3 1.9m-.1 5.2c-.2.1-.2.2-.2.3v.3c1.4 2.8 3.8 1 4.7.3-.7-.8-2.5-3.3-4.5-1m-1 2h-.2l-.1.2c-.7 1.8 1.1 2.1 1.8 2.3 0-.7.4-2.5-1.5-2.5m2.8-4.6v.5c1.5 1.8 3 0 3.6-.6-.7-.4-2.4-1.9-3.6.1m-2.2-5.2.2.1c2.4 0 2-2.2 1.9-3-.8.1-3 .6-2.2 2.7zM15 5.5h.2c2.6-.6 1.6-3 1.2-3.8-.8.4-3.1 1.5-1.6 3.6z">
                    </path>
                  </symbol>
                </use>
                <title>Arismendi's Budget</title>
              </svg>
            </button>
          </li>
          <li class="navlink navlink-budget active">
            <a id="ember5" class="ember-view" href="#">
              <svg id="icon_sprite_navigation_budget" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M6.2 10.6h.6zm11.7 0h.4-.2z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd"
                  d="M18.4 10.1H5.6l-.2-.1-.1-.1v-1l.2-.3c0-.2.3-.3.4-.3h12.2l.4.3.2.3v1c-.1.2-.2.2-.3.2m-1.1-2.7H6.5v-.7l.1-.5.2-.2h10.4l.2.2.2.5v.4l-.1.2zM16 5.1H8.2L8.1 5v-.8l.2-.2H16l.1.2.1.3V5z"
                  clip-rule="evenodd" opacity="0.4"></path>
                <path fill-rule="evenodd" d="M13.6 14c.2.1.3.4.3.7v1.2a.4.4 0 0 1-.4.4h-3a.4.4 0 0 1-.4-.4v-1.2l.5-1A2 2 0 0 1 12 13a2 2 0 0 1 1.6.8" clip-rule="evenodd">
                </path>
                <path fill-rule="evenodd"
                  d="M19.2 10.4v5.3l-.5.6H18l-.5-.6v-2.5h-.1a2 2 0 0 1-1.7-1.6v-.1H8.3a1.7 1.7 0 0 1-1.9 1.6v2.6l-.5.6h-.7l-.5-.6v-5.4l.5-.5h13.2a1 1 0 0 1 .7.6m1.8 8v1.3l-.1.2-.2.1H3.4l-.3-.1-.1-.4v-2l.1-.3.4-.2h.8c.1 0 .3 0 .3.2l.2.4v.4h14.4v-.4l.2-.4.3-.2h.8l.3.2.2.3z"
                  clip-rule="evenodd"></path>
              </svg>
              <div class="navlink-label">Budget</div>
            </a>
          </li>
          <li class="navlink navlink-reports">
            <a id="ember6" href="#">
              <svg id="icon_sprite_navigation_reports" viewBox="0 0 24 24">
                <path d="M20.6 19H3.4c-.2 0-.4.2-.4.4v1.2c0 .2.2.4.4.4h17.2c.2 0 .4-.2.4-.4v-1.2c0-.2-.2-.4-.4-.4" opacity="0.4"></path>
                <path fill-rule="evenodd"
                  d="M8 9.7v6.6l-.1.5-.4.2H4.3l-.1-.2-.2-.2V9.4l.2-.2.1-.1.2-.1h3l.4.2zM14 4v12.2c0 .2 0 .5-.2.6l-.5.3h-2.6l-.5-.3-.2-.6V3.9c0-.2 0-.5.2-.6l.5-.3h2.8l.3.3.1.3zm6 2.9v9.4l-.2.6-.5.2h-2.6l-.5-.2-.2-.6V6.8l.2-.6.5-.2h2.6l.5.2z"
                  clip-rule="evenodd"></path>
              </svg>
              <div class="navlink-label">Reports</div>
            </a>
          </li>
          <li class="navlink navlink-accounts">
            <a id="ember7" href="#">
              <svg id="icon_sprite_navigation_accounts" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                  d="M4.6 19h14.8l1.3.7.3.6v1l-.2.5-.5.2H3.7l-.5-.2-.2-.5v-1l.3-.5M20.8 8.6 12.1 3h-.7L3.2 8.6 3 9v.5l.1.4.4.1h17l.4-.1.1-.4V9zm-9-.6-.6-.1-.4-.6a1 1 0 0 1 .2-1.2 1 1 0 0 1 1.2-.2c.2 0 .4.2.5.4a1 1 0 0 1-.1 1.4z"
                  clip-rule="evenodd"></path>
                <path fill-rule="evenodd"
                  d="M7 19H5v-9h2l-.1.3v8.4zm4 0H9l.1-.4v-8.3L9 10h2l-.1.3v8.5zm3.9-.4.1.4h-2l.1-.3V10H15l-.1.3zm4-8.3v8.3l.1.3v.1h-2l.1-.2v-8.5L17 10h2z"
                  clip-rule="evenodd" opacity="0.4"></path>
              </svg>
              <div class="navlink-label">All Accounts</div>
            </a>
          </li>
        </ul>
        <!---->
        <div class="nav-accounts">
          <div class="nav-account onBudget">
            <div class="nav-account-block">
              <button id="budget-btn" class="nav-account-name nav-account-name-button user-data" aria-label="collapse BUDGET" type="button">
                <svg class="ynab-new-icon" width="8px" height="8px">
                  <!---->
                  <use href="#icon_sprite_chevron_down">
                    <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
                      <path fill="currentColor" fill-rule="evenodd"
                        d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z" clip-rule="evenodd">
                      </path>
                    </symbol>
                    <!---->
                    <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right" fill="none" viewBox="0 0 24 24">
                      <path fill="currentColor" fill-rule="evenodd"
                        d="M7.4 23.6a1.5 1.5 0 0 1-2 0 1.4 1.4 0 0 1 0-2l10-9.6-10-9.6a1.4 1.4 0 0 1 0-2 1.5 1.5 0 0 1 2 0L18.6 11c.5.6.5 1.4 0 2z" clip-rule="evenodd">
                      </path>
                    </symbol>
                  </use>
                </svg>
                <div>BUDGET</div>
              </button>
              <div class="nav-account-value nav-account-block-value user-data">
                <span class="user-data currency positive">
                  <bdi>$</bdi>3,840,000.00</span>
              </div>
              <div class="nav-account-icons nav-account-icons-right"></div>
            </div>
            <div id="budgetDetails">
              <a id="ember8" href="#" class="nav-account-row" draggable="true">
                <div class="nav-account-icons nav-account-icons-left js-nav-account-icons-left" title="Edit Account">
                  <!---->
                  <svg class="ynab-new-icon edit" width="12" height="12">
                    <!---->
                    <use href="#icon_sprite_pencil">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                    </use>
                  </svg>
                </div>
                <div class="nav-account-name user-data" title="Salario">Salario</div>
                <div class="nav-account-value user-data">
                  <span class="user-data currency positive"><bdi>$</bdi>3,040,000.00</span>
                </div>
                <span id="ember9" class="direct-status-import-icon nav-account-icons nav-account-icons-right">
                  <svg class="ynab-new-icon" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_"></use>
                  </svg>
                  <!---->
                </span>
              </a>
              <a id="ember10" href="#" class="nav-account-row" draggable="true">
                <div class="nav-account-icons nav-account-icons-left js-nav-account-icons-left" title="Edit Account">
                  <!---->
                  <svg class="ynab-new-icon edit" width="12" height="12">
                    <!---->
                    <use href="#icon_sprite_pencil">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                    </use>
                  </svg>
                </div>
                <div class="nav-account-name user-data" title="Visa">Visa</div>
                <div class="nav-account-value user-data">
                  <span class="user-data currency negative">−<bdi>$</bdi>1,200,000.00</span>
                </div>

                <span id="ember11" class="direct-status-import-icon nav-account-icons nav-account-icons-right">
                  <svg class="ynab-new-icon" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_"></use>
                  </svg>
                  <!---->
                </span>
              </a>
              <a id="ember12" href="#" class="nav-account-row" draggable="true">
                <div class="nav-account-icons nav-account-icons-left js-nav-account-icons-left" title="Edit Account">
                  <!---->
                  <svg class="ynab-new-icon edit" width="12" height="12">
                    <!---->
                    <use href="#icon_sprite_pencil">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                    </use>
                  </svg>
                </div>
                <div class="nav-account-name user-data" title="Ahorros">Ahorros</div>
                <div class="nav-account-value user-data">
                  <span class="user-data currency positive"><bdi>$</bdi>2,000,000.00</span>
                </div>
                <span id="ember13" class="direct-status-import-icon nav-account-icons nav-account-icons-right">
                  <svg class="ynab-new-icon" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_"></use>
                  </svg>
                  <!---->
                </span>
              </a>
            </div>
          </div>
          <div class="nav-account loan">
            <div class="nav-account-block">
              <button id="loan-btn" class="nav-account-name nav-account-name-button user-data" arial-label="collapse LOANS" type="button">
                <svg class="ynab-new-icon " width="8" height="8">
                  <!---->
                  <use href="#icon_sprite_chevron_down">
                    <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
                      <path fill="currentColor" fill-rule="evenodd"
                        d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z" clip-rule="evenodd">
                      </path>
                    </symbol>
                  </use>
                </svg>
                <div>LOANS</div>
              </button>
              <div class="nav-account-value nav-account-block-value user-data">
                <span class="user-data currency negative">−<bdi>$</bdi>2,700,000.00</span>
              </div>
              <div class="nav-account-icons nav-account-icons-right"></div>
            </div>

            <div id="loanDetails">
              <a id="ember169" href="#" class="nav-account-row" draggable="true">
                <div class="nav-account-icons nav-account-icons-left js-nav-account-icons-left" title="Edit Account">
                  <!---->
                  <svg class="ynab-new-icon edit" width="12" height="12">
                    <!---->
                    <use href="#icon_sprite_pencil">
                      <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                          d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
                          clip-rule="evenodd"></path>
                      </symbol>
                    </use>
                  </svg>
                </div>
                <div class="nav-account-name user-data" title="ipad Air">ipad Air</div>
                <div class="nav-account-value user-data">
                  <span class="user-data currency negative">−<bdi>$</bdi>2,700,000.00</span>
                </div>
                <span id="ember170" class="direct-status-import-icon nav-account-icons nav-account-icons-right">
                  <svg class="ynab-new-icon" width="16" height="16">
                    <!---->
                    <use href="#icon_sprite_"></use>
                  </svg>
                  <!---->
                </span>
              </a>
            </div>
          </div>
          <!---->
          <!---->
        </div>
        <div class="nav-add-accounts">
          <!---->
          <button class="ynab-button contrast button-sidebar nav-add-account" type="button">
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
        </div>
        <!---->
      </div>
    </div>
    <div class="sidebar-bottom">
      <!---->
      <button class="sidebar-collapse tooltip-relative-container" aria-describedby="sidebar-collapse-tooltip" type="button">
        <svg class="ynab-new-icon" width="24" height="24">
          <!---->
          <use href="#icon_sprite_sidebar_close">
            <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sidebar_close" fill="none" viewBox="0 0 24 24">
              <path fill="currentColor" fill-rule="evenodd"
                d="M22 22H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2M7 4.5 6.5 4h-4l-.5.5v15l.5.5h4l.5-.5zm11 4a.5.5 0 0 0-.8-.4l-5 3.5a.5.5 0 0 0 0 .8l5 3.5a.5.5 0 0 0 .8-.4z"
                clip-rule="evenodd"></path>
            </symbol>
            <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sidebar_open" fill="none" viewBox="0 0 24 24">
              <path fill="currentColor" fill-rule="evenodd"
                d="M22 22H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2M7 4.5 6.5 4h-4l-.5.5v15l.5.5h4l.5-.5zm11.8 7-5-3.4a.5.5 0 0 0-.8.4v7a.5.5 0 0 0 .8.4l5-3.5a.5.5 0 0 0 0-.8"
                clip-rule="evenodd"></path>
            </symbol>
          </use>
        </svg>
        <span role="tooltip" id="sidebar-collapse-tooltip" class="tooltip-content tooltip-above tooltip-center">
          <div class="shortcut-tooltip">
            <div class="shortcut-description">Expand/Collapse Sidebar</div>
            <div class="shortcut-keys">
              <div class="shortcut-key ">
                shift
              </div>
              <div class="shortcut-key ">
                .
              </div>
            </div>
          </div>
        </span>
      </button>
    </div>
  </div>
  <div class="sidebar-resizer">
    <div class="sidebar-resizer-indicator"></div>
  </div>
</nav>

@push('scripts')
  <script>
    const listaItems = document.querySelectorAll('.nav-main li');
    const links = document.querySelectorAll('a.nav-account-row');

    const sidebar = document.querySelector(".sidebar");
    const sidebarBtn = document.querySelector(".sidebar-collapse");
    const iconCollapsed = sidebarBtn.querySelector('use');

    const budgetBtn = document.querySelector('#budget-btn');
    const loantBtn = document.querySelector('#loan-btn');

    const budgetDetails = document.querySelector('#budgetDetails');
    const loanDetails = document.querySelector('#loanDetails');

    const iconUseBudget = budgetBtn.querySelector('use');
    const iconUseLoan = loantBtn.querySelector('use');

    const addAccountButton = document.querySelector('.nav-add-accounts');
    const navAccounts = document.querySelector('.nav-accounts');
    const navLabels = document.querySelectorAll('.navlink-label');

    const tooltipContent = document.querySelector('.tooltip-content');

    // Colapsa/Expande el sidebar - Espera a que el DOM esté completamente cargado
    document.addEventListener("DOMContentLoaded", function () {

      // Agregar un evento de clic al botón
      sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("sidebar-resized-collapsed");
        sidebarBtn.classList.toggle("sidebar-expand");
        // Verificar el ancho actual y cambiarlo
        if (sidebar.style.width === "260px") {
          sidebar.style.width = "56px";

          tooltipContent.classList.remove('tooltip-center');
          iconCollapsed.setAttribute('href', '#icon_sprite_sidebar_open');
          navAccounts.style.display = "none";
          addAccountButton.style.display = "none";
          navLabels.forEach(labels => {
            labels.style.display = 'none';
          });
          // Añadir y eliminar clases
          sidebarBtn.classList.add('sidebar-expand');
          sidebarBtn.classList.remove('sidebar-collapse');

        } else {
          sidebar.style.width = "260px";

          tooltipContent.classList.add('tooltip-center');
          iconCollapsed.setAttribute('href', '#icon_sprite_sidebar_close');
          addAccountButton.style.display = "block";
          navAccounts.style.display = "block";
          navLabels.forEach(labels => {
            labels.style.display = 'block';
          });
          // Añadir y eliminar clases
          sidebarBtn.classList.remove('sidebar-expand');
          sidebarBtn.classList.add('sidebar-collapse');
        }
      });
    });

    // Agregar evento de clic al botón "BUDGET"
    budgetBtn.addEventListener('click', () => {
      if (budgetDetails.style.display === 'none') {
        budgetDetails.style.display = 'block';
        // Función para cambiar el ícono
        iconUseBudget.setAttribute('href', '#icon_sprite_chevron_down');
      } else {
        budgetDetails.style.display = 'none';
        iconUseBudget.setAttribute('href', '#icon_sprite_chevron_right');
      }
    });
    // Agregar evento de clic al botón "LOAN"
    loantBtn.addEventListener('click', () => {
      if (loanDetails.style.display === 'none') {
        loanDetails.style.display = 'block';
        // Función para cambiar el ícono
        iconUseLoan.setAttribute('href', '#icon_sprite_chevron_down');
      } else {
        loanDetails.style.display = 'none';
        iconUseLoan.setAttribute('href', '#icon_sprite_chevron_right');
      }
    });

    // Recorrer cada elemento <li> y agregar un evento de clic
    listaItems.forEach(item => {
      item.addEventListener('click', () => {
        // Remover la clase 'active' de todos los elementos <li>
        listaItems.forEach(li => {
          li.classList.remove('active');
        });

        // Agregar la clase 'active' solo al elemento <li> que fue clickeado
        item.classList.add('active');
        // Quitar la clase 'is-selected' de todos los enlaces
        links.forEach(l => l.classList.remove('is-selected'));
      });
    });

    // Agregar un evento de clic a cada enlace
    links.forEach(link => {
      link.addEventListener('click', function (event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

        // Quitar la clase 'is-selected' de todos los enlaces
        links.forEach(l => l.classList.remove('is-selected'));

        // Agregar la clase 'is-selected' solo al enlace clicado
        this.classList.add('is-selected');
        // Remover la clase 'active' de todos los elementos <li>
        listaItems.forEach(li => {
          li.classList.remove('active');
        });
      });
    });

    // Activa el shift + el punto (.)
    document.addEventListener('keydown', function (event) {
      // Obtener el código de la tecla presionada
      var keyPressed = event.key;
      var keyCode = event.code;

      // Verificar si la tecla presionada es '>'
      if (keyPressed === '>' || keyCode === 'IntlBackslash') {
        // Verificar si la tecla Shift también está presionada
        if (event.shiftKey) {
          // Mostrar un mensaje
          sidebar.classList.toggle("sidebar-resized-collapsed");
          sidebarBtn.classList.toggle("sidebar-expand");
          // Verificar el ancho actual y cambiarlo
          if (sidebar.style.width === "260px") {
            sidebar.style.width = "56px";
            tooltipContent.classList.remove('tooltip-center');
            iconCollapsed.setAttribute('href', '#icon_sprite_sidebar_open');
            navAccounts.style.display = "none";
            addAccountButton.style.display = "none";
            navLabels.forEach(labels => {
              labels.style.display = 'none';
            });
            // Añadir y eliminar clases
            sidebarBtn.classList.add('sidebar-expand');
            sidebarBtn.classList.remove('sidebar-collapse');

          } else {
            sidebar.style.width = "260px";
            tooltipContent.classList.add('tooltip-center');
            iconCollapsed.setAttribute('href', '#icon_sprite_sidebar_close');
            addAccountButton.style.display = "block";
            navAccounts.style.display = "block";
            navLabels.forEach(labels => {
              labels.style.display = 'block';
            });
            // Añadir y eliminar clases
            sidebarBtn.classList.remove('sidebar-expand');
            sidebarBtn.classList.add('sidebar-collapse');
          }
        }
      }
    });

    // Activa modal settings
    const openModalButtons = document.querySelectorAll('.js-sidebar-nav-menu');

    openModalButtons.forEach(button => {
      button.addEventListener('click', function (event) {
        const modalActive = document.getElementById('ember180');
        modalActive.classList.add('modal-overlay', 'active');
        event.stopPropagation(); // Detener la propagación del evento para evitar cierres no deseados
      });
    });

    // Cerrar el modal al hacer clic fuera de él
    document.addEventListener('click', function (event) {
      const modalActive = document.getElementById('ember180');
      const modal = document.querySelector('.modal');
      if (modalActive.classList.contains('active') && !modal.contains(event.target) && !event.target.classList.contains('js-sidebar-nav-menu')) {
        modalActive.classList.remove('modal-overlay', 'active');
      }
    });

    // modal nav-add-account
    document.addEventListener('DOMContentLoaded', function () {
      const openButton = document.querySelector('.nav-add-account');

      openButton.addEventListener('click', function () {
        const modalActive = document.getElementById('ember145');
        modalActive.classList.add('modal-overlay', 'active');

      });
    });

    //Edit Account
    document.addEventListener('DOMContentLoaded', function () {
      const editAccountButtons = document.querySelectorAll('.nav-account-icons-left');

      editAccountButtons.forEach(button => {
        button.addEventListener('click', function () {

          const modalActive = document.getElementById('ember42');
          modalActive.classList.add('modal-overlay', 'active');

        });
      });
    });

  </script>
@endpush

