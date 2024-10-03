{{-- modal settings --}}
<div id="settings-menu" class="ynab-u ynab-new-settings-menu">
  <div class="modal" role="dialog" aria-modal="true" style="top: 60px; left: 16px;">
    <!---->
    <ul class="modal-list">
      <li>
        <button class="modal-select-budget-create" type="button">
          <svg class="ynab-new-icon" width="16" height="16">
            <!---->
            <use href="#icon_sprite_plus_circle_fill">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor"
                  d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2">
                </path>
              </symbol>
            </use>
          </svg>
          New Budget
        </button>
      </li>
      <li>
        <a href="#" onclick="return false;" class="recent-budgets-view-all">
          <span class="open-budgets-link">
            <svg class="ynab-new-icon " width="16" height="16">
              <!---->
              <use href="#icon_sprite_folder">
                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_folder" fill="none" viewBox="0 0 24 24">
                  <path fill="currentColor" fill-rule="evenodd"
                    d="m24 10-.8 10.6a1.5 1.5 0 0 1-1.5 1.4H2.3a1.5 1.5 0 0 1-1.5-1.4L0 10.1A1 1 0 0 1 1 9h22a1 1 0 0 1 1 1m-1-4v1.5l-.5.5h-21L1 7.5V3a1 1 0 0 1 1-1h5.7a2 2 0 0 1 1.4.6l1.8 1.8a2 2 0 0 0 1.4.6H22a1 1 0 0 1 1 1"
                    clip-rule="evenodd"></path>
                </symbol>
              </use>
            </svg>
            View All Budgets
          </span>
        </a>
      </li>
      <li>
        <hr>
      </li>
      <li class="modal-list-header">Current Budget</li>
      <li>
        <button class="modal-select-budget-settings" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_wrench">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_wrench" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M2 17.6a3 3 0 1 0 4.4 4.3l7.2-8.2.5-.2a7 7 0 0 0 3.5.4 7 7 0 0 0 5.2-5 6 6 0 0 0 .1-2.3.5.5 0 0 0-.8-.3l-3.4 3.5-.5.1-3-.8-.3-.3-.8-3 .1-.5 3.5-3.4a.5.5 0 0 0-.3-.8A6 6 0 0 0 15 1a7 7 0 0 0-5 5.3 7 7 0 0 0 .4 3.5l-.2.5zm2 3.9A1.5 1.5 0 1 1 5.5 20 1.5 1.5 0 0 1 4 21.5"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Budget Settings
        </button>
      </li>
      <li>
        <button class="modal-select-budget-manage-payees" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_arrows_circle_fill">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrows_circle_fill" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M10.5 15v-2.5a.5.5 0 0 0-.8-.4l-5 3.5a.5.5 0 0 0 0 .8l5 3.5a.5.5 0 0 0 .8-.4V17h11.8a.4.4 0 0 1 .3.6A12 12 0 0 1 0 12c0-.8.1-1.7.3-2.5L.9 9h12.6v2.5a.5.5 0 0 0 .8.4l5-3.5a.5.5 0 0 0 0-.8l-5-3.5a.5.5 0 0 0-.8.4V7H1.7a.4.4 0 0 1-.3-.6A12 12 0 0 1 24 12l-.3 2.5-.6.5z"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Manage Payees
        </button>
      </li>
      <li>
        <button class="modal-select-budget-flag-names" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_flag_fill">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_flag_fill" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M23 19.5H1.5A1.5 1.5 0 0 1 0 18V6a1.5 1.5 0 0 1 1.5-1.5H23a1 1 0 0 1 .9 1.5l-3.3 5.8v.4l3.3 5.8a1 1 0 0 1-.9 1.5" clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Edit Flags
        </button>
      </li>
      <li>
        <button class="modal-select-theme-switcher" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_paint_roller">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_paint_roller" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="m20.5 11.4-7.6 1.2a2 2 0 0 0-1.2.7 2 2 0 0 0-.5 1.3c.3 0 .6.1.8.3s.3.5.3.8V22c0 .2-.1.5-.3.7l-.8.3H9.1l-.8-.3L8 22v-6.3c0-.3.1-.6.3-.8s.5-.3.8-.3c0-1 .3-2 1-2.7a4 4 0 0 1 2.5-1.4L20 9.3a2 2 0 0 0 1.3-.7c.3-.4.5-.8.5-1.3s-.2-.8-.5-1.1-.7-.5-1.1-.5v.5c0 .6-.3 1.1-.7 1.5s-.9.6-1.5.6H2q-.7 0-1.5-.6A2 2 0 0 1 0 6.2V3.1c0-.6.2-1 .6-1.5s1-.6 1.5-.6h16a2 2 0 0 1 2.1 2v.6c1 0 2 .4 2.7 1S24 6.4 24 7.4s-.3 2-1 2.7a4 4 0 0 1-2.5 1.4"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Display Options
        </button>
      </li>
      <li>
        <button class="modal-select-budget-export" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_document_with_arrow_down">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document_with_arrow_down" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M21 9.5A1.5 1.5 0 0 0 19.5 8h-5A1.5 1.5 0 0 1 13 6.5v-5A1.5 1.5 0 0 0 11.5 0h-7A1.5 1.5 0 0 0 3 1.5v21A1.5 1.5 0 0 0 4.5 24h15a1.5 1.5 0 0 0 1.5-1.5zm-9.8 7.2h-2a.4.4 0 0 0-.1.6l2.6 4v.1a.4.4 0 0 0 .6 0l2.6-4 .1-.3c0-.2-.2-.4-.4-.4h-1.9v-6.4c0-.4-.3-.8-.7-.8s-.8.4-.8.8z"
                  clip-rule="evenodd"></path>
                <path fill="currentColor" d="m14 6.5.5.5h5.3a.5.5 0 0 0 .3-.9L15 1a.5.5 0 0 0-.9.3z"></path>
              </symbol>
            </use>
          </svg>
          Export Budget
        </button>
      </li>
      <li>
        <button class="modal-select-budget-fresh-start" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_leaf">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_leaf" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M9 24a8 8 0 0 1-2.7-.5l-.2-.7A140 140 0 0 1 14 10a.3.3 0 0 0-.4-.3A47 47 0 0 0 4 21.3a.5.5 0 0 1-.8 0 8 8 0 0 1-1.7-4.8C1.5 4.7 15.4.9 20.9 0c.4 0 .7.2.8.5.3 1 .8 3 .8 6.5 0 9.3-5.8 17-13.5 17"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Make a Fresh Start
        </button>
      </li>
      <li>
        <hr>
      </li>
      <li class="modal-list-header">Account</li>
      <li>
        <button class="menu-item js-menu-item modal-select-budget-my-account" role="menuitem" id="accountSettings" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_user">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_user" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M21.3 22H2.7c-.4 0-.7-.3-.7-.6.3-3 3.5-6 10-6s9.7 3 10 6c0 .3-.2.6-.6.6zM12 13.7c-3 0-5.4-2.3-5.4-6C6.6 4.3 8.8 2 12 2s5.5 2.4 5.5 5.6c0 3.8-2.6 6-5.5 6"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Account Settings
        </button>
      </li>
      <li>
        <button class="modal-select-family" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_together">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_together" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="m23.1 9.3-3.4.7-.3.2a7 7 0 0 0 0 4.4l1.6 5a1 1 0 0 1-.5 1.1h-.3l-.7-.4-2.4-5-2.5 5-.7.5a1 1 0 0 1-.7-.9v-.2l1.6-5.1a7 7 0 0 0 0-4.4l-.3-.2-2.5-.4-2.5.4-.3.2a7 7 0 0 0 0 4.4l1.6 5a1 1 0 0 1-.5 1.1H10l-.6-.4-2.4-5h-.1l-2.4 5a1 1 0 0 1-.8.5 1 1 0 0 1-.7-.9v-.2l1.6-5.1a7 7 0 0 0 0-4.4l-.3-.2-3.5-.7-.5-.7.6-.6H23c.4 0 .7.3.7.7s-.4.6-.7.6m-6-6c1 0 2 .8 2 2 0 1-1 2-2 2s-2-1-2-2c0-1.2 1-2 2-2m-10.2 0c1 0 2 .8 2 2 0 1-1 2-2 2s-2-1-2-2c0-1.2 1-2 2-2"
                  clip-rule="evenodd"></path>
                <path fill="currentColor" fill-rule="evenodd"
                  d="M7 3c1 0 2 1 2 2.2s-.9 2.3-2 2.3A2.2 2.2 0 0 1 7 3m10.2 0c1.2 0 2.2 1 2.2 2.2s-1 2.3-2.2 2.3-2.2-1-2.2-2.3.9-2.2 2-2.2M.9 8.3l-.4.3a.4.4 0 0 0 .3.5l3.5.6M.7 9.5l3.6.7v.1a7 7 0 0 1 0 4.2l-1.5 5.1v.3a1 1 0 0 0 1 1.1 1 1 0 0 0 .9-.6l2.2-4.7 2.2 4.7a1 1 0 0 0 1.2.5c.6-.1.9-.7.7-1.3l-1.6-5.1a7 7 0 0 1 0-4.2h.2l2.4-.5 2.4.4.2.1c.4 1.4 0 3.9 0 4.2L13 19.6v.3a1 1 0 0 0 1 1.1 1 1 0 0 0 .9-.6l2.2-4.7 2.2 4.7c.2.4.5.6 1 .6h.3c.5-.2.8-.8.6-1.4l-1.6-5.1a7 7 0 0 1 0-4.2h.1l3.4-.7m-3.4.1 3-.5.5-.1.3-.4a.4.4 0 0 0-.4-.4m-3.4 1.4-.5.5a7 7 0 0 0 0 4.4l1.5 5.2-.3.7h-.2l-.4-.3-2.4-5a.3.3 0 0 0-.6 0l-2.4 5-.5.3-.5-.6v-.1l1.6-5.2a7 7 0 0 0 0-4.4l-.5-.5m-5 0-.5.5a7 7 0 0 0 0 4.4l1.6 5.2.2-.1h-.2a1 1 0 0 1-.4.8H10l-.4-.3-2.4-5a.3.3 0 0 0-.6 0l-2.4 5-.4.3-.6-.6v-.1l1.6-5.2a7 7 0 0 0 0-4.4h-.2M.7 9.6a1 1 0 0 1-.7-1 1 1 0 0 1 .9-.8H23c.5 0 .9.4.9.9s-.9.8-.9.8"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          YNAB Together
        </button>
      </li>
      <li>
        <button class="modal-select-budget-manage-connections" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_bank">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_bank" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M11.5.1a1 1 0 0 1 1 0L23.6 7c.3.2.4.4.4.7v.9l-.5.5H22l-.5.5v10l.2.5 2 1.2c.2.1.3.4.3.6v1.7l-.5.5H.5l-.5-.5v-1.7c0-.2.1-.5.4-.6L2.3 20l.2-.4V9.5L2 9H.5L0 8.5v-1c0-.2.1-.4.4-.6zM16 19.5l.5.5h2l.5-.5v-10l-.5-.5h-2l-.5.5zm-5.5 0 .5.5h2l.5-.5v-10L13 9h-2l-.5.5zm1.5-13a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-7 13 .5.5h2l.5-.5v-10L7.5 9h-2l-.5.5z"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Manage Connections
        </button>
      </li>
      <li>
        <button class="modal-select-budget-workshops" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_graduation_hat">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_graduation_hat" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M3.6 9.6.3 7.9l-.2-.2.2-.8 11.3-5.8h.8l11.3 5.8.2.2-.2.8-11.3 5.8h-.8l-5-2.6a.2.2 0 0 1 0-.4l5.6-2.9.2-.3v-.3L12 7h-.3l-6 3.1-.4.3-.2.4-.7 5.7a1.4 1.4 0 0 1 0 2l.4 2.7v.2l-.3.2a3 3 0 0 1-3.1-.4l-.1-.5 1-2.5-.2-1a1 1 0 0 1 .6-.9zm7.6 4.9a2 2 0 0 0 1.6 0l6-3h.3l.4 4-.1.4a14 14 0 0 1-7.4 2.4 14 14 0 0 1-6.3-1.7l-.2-.2v-.2l.5-4V12h.3z"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Join a Workshop
        </button>
      </li>
      <li class="modal-submenu-item">
        <button class="modal-submenu-item modal-select-budget-keyboard-shortcuts" type="button">
          <span>
            <svg class="ynab-new-icon " width="16" height="16">
              <!---->
              <use href="#icon_sprite_keyboard">
                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_keyboard" fill="none" viewBox="0 0 24 24">
                  <path fill="currentColor" fill-rule="evenodd"
                    d="M21.8 19.6H2.2A2.2 2.2 0 0 1 0 17.3V6.7c0-1.3 1-2.3 2.2-2.3h19.6c1.2 0 2.2 1 2.2 2.3v10.6a2.2 2.2 0 0 1-2.2 2.3m-16-2.3c0 .3.2.5.4.5h11.6a.4.4 0 0 0 .4-.5V16a.4.4 0 0 0-.4-.4H6.2a.4.4 0 0 0-.4.4zm-4 0c0 .3.2.5.4.5h1.4a.4.4 0 0 0 .4-.5V16a.4.4 0 0 0-.4-.4H2.2a.4.4 0 0 0-.4.4zM4.4 8a.4.4 0 0 0-.4-.4H2.2a.4.4 0 0 0-.4.4v1.3c0 .3.2.5.4.5H4a.4.4 0 0 0 .4-.5zm.5 3.6H2.2a.4.4 0 0 0-.4.4v1.3c0 .3.2.5.4.5H5a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M8.4 8a.4.4 0 0 0-.4-.4H6.7a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5H8a.4.4 0 0 0 .4-.5zm.5 3.6H7.6a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h1.3a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M12.4 8a.4.4 0 0 0-.4-.4h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5H12a.4.4 0 0 0 .4-.5zm.5 3.6h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h1.3a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M16.4 8a.4.4 0 0 0-.4-.4h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5H16a.4.4 0 0 0 .4-.5zm.5 3.6h-1.3a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h1.3a.4.4 0 0 0 .4-.5V12a.4.4 0 0 0-.4-.4M22.2 8a.4.4 0 0 0-.4-.4h-3.1a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h3a.4.4 0 0 0 .5-.5zm0 4a.4.4 0 0 0-.4-.4h-2.2a.4.4 0 0 0-.5.4v1.3c0 .3.2.5.5.5h2.2a.4.4 0 0 0 .4-.5zm0 4a.4.4 0 0 0-.4-.4h-1.4a.4.4 0 0 0-.4.4v1.3c0 .3.2.5.4.5h1.4a.4.4 0 0 0 .4-.5z"
                    clip-rule="evenodd"></path>
                </symbol>
              </use>
            </svg>
            Keyboard Shortcuts
          </span>
          <!---->
        </button>
      </li>
      <li class="modal-submenu-item">
        <button class="modal-submenu-item modal-import-from-open" type="button">
          <span>
            <svg class="ynab-new-icon " width="16" height="16">
              <!---->
              <use href="#icon_sprite_arrow_down_to_surface">
                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_down_to_surface" fill="none" viewBox="0 0 24 24">
                  <path fill="currentColor" fill-rule="evenodd"
                    d="M18.9 24H4.2A3 3 0 0 1 1 20.9v-2.1c0-.6.5-1 1-1s1.1.4 1.1 1v2c0 .6.5 1.1 1 1.1H19c.5 0 1-.5 1-1v-2.1c0-.6.5-1 1-1s1.1.4 1.1 1v2A3 3 0 0 1 19 24M11.5 0c.6 0 1 .5 1 1v10.5h2.7a.5.5 0 0 1 .4.8l-3.7 5.2a.5.5 0 0 1-.8 0l-3.7-5.2a.5.5 0 0 1 .4-.8h2.7V1c0-.5.4-1 1-1"
                    clip-rule="evenodd"></path>
                </symbol>
              </use>
            </svg>
            Migrate From
          </span>
          <svg class="ynab-new-icon icon-chevron-right" width="12" height="12">
            <!---->
            <use href="#icon_sprite_chevron_right">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M7.4 23.6a1.5 1.5 0 0 1-2 0 1.4 1.4 0 0 1 0-2l10-9.6-10-9.6a1.4 1.4 0 0 1 0-2 1.5 1.5 0 0 1 2 0L18.6 11c.5.6.5 1.4 0 2z" clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
        </button>
      </li>
      <li>
        <hr>
      </li>
      <li>
        <button type="button" onclick="event.preventDefault();document.getElementById('usersLogoutForm').submit()">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_logout">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_logout" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M1 2.8 8.6 1l.8.2.2.3.1.3v1H14l.6.1.4.3a1 1 0 0 1 .5 1v4.1L15 9l-.7.2-.7-.2-.3-.7V4.7H9.6v14.6h3.8v-3.6l.3-.7.7-.2c.3 0 .5 0 .7.2s.3.4.3.7v4l-.1.6-.4.5-.4.3H9.6v1.4l-.3.3-.8.2-7.4-1.8-.8-.5L0 20V4c0-.3.1-.6.3-.8l.8-.5M12.5 12c0-.2 0-.5.3-.6l.6-.3h4.8V8.8l.1-.2.2-.2h.5l4.8 3.2.1.2a.4.4 0 0 1-.1.6L19 15.6l-.7-.1v-2.6h-4.9l-.6-.2z"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Log Out
        </button>
        <form action="<?= route('admin.logout') ?>" id="usersLogoutForm" method="POST">@csrf</form>
      </li>
      <li>
        <hr>
      </li>
      <li class="modal-list-header">Legal</li>
      <li>
        <a class="privacy" rel="noopener noreferrer" target="_blank" href="https://www.ynab.com/privacy-policy/">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_document">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="m14.5 7-.5-.5V1.2a.5.5 0 0 1 .9-.3L20 6a.5.5 0 0 1-.3.9zM21 9.5v13a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 22.5v-21A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v5A1.5 1.5 0 0 0 14.5 8h5A1.5 1.5 0 0 1 21 9.5"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Privacy Policy
        </a>
      </li>
      <li>
        <a class="privacy" rel="noopener noreferrer" target="_blank" href="https://www.ynab.com/california-privacy-disclosure/">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_document">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="m14.5 7-.5-.5V1.2a.5.5 0 0 1 .9-.3L20 6a.5.5 0 0 1-.3.9zM21 9.5v13a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 22.5v-21A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v5A1.5 1.5 0 0 0 14.5 8h5A1.5 1.5 0 0 1 21 9.5"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          California Privacy Policy
        </a>
      </li>
      <li>
        <button class="modal-your-privacy-choices" type="button">
          <svg class="ynab-new-icon " width="16" height="16">
            <!---->
            <use href="#icon_sprite_document">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="m14.5 7-.5-.5V1.2a.5.5 0 0 1 .9-.3L20 6a.5.5 0 0 1-.3.9zM21 9.5v13a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 22.5v-21A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v5A1.5 1.5 0 0 0 14.5 8h5A1.5 1.5 0 0 1 21 9.5"
                  clip-rule="evenodd"></path>
              </symbol>
            </use>
          </svg>
          Your Privacy Choices
          <svg class="ynab-new-icon " width="20" height="20" role="img" aria-label="California Consumer Privacy Act (CCPA) Opt-Out Icon">
            <!---->
            <use href="#icon_sprite_privacy_choices">
              <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_privacy_choices" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                  d="M5.8 6.3h12.4c3.2 0 5.8 2.5 5.8 5.7a5.7 5.7 0 0 1-5.8 5.8H5.8A5.7 5.7 0 0 1 0 12a5.7 5.7 0 0 1 5.8-5.7m0 1A5 5 0 0 0 1 12a5 5 0 0 0 4.8 4.8h5.5L14 7.2zm14 2.9v-.7h-.6l-1.8 1.8-1.8-1.8H15v.7l1.8 1.8-1.8 1.8v.7h.7l1.8-1.8 1.8 1.8h.7v-.7L18.2 12z"
                  clip-rule="evenodd"></path>
                <path fill="currentColor" d="M10.1 9.6c.2.2.3.5 0 .7l-3.4 4-.2.2-.6-.1-1.8-1.8v-.7h.7l1.4 1.4 3.2-3.7z"></path>
              </symbol>
            </use>
          </svg>
        </button>
      </li>
    </ul>
    <!---->
  </div>
</div>

@push('scripts')
  <script>
    //Activación modal New Bodget
    $(document).ready(function() {
      $('.modal-select-budget-create').on('click', function() {
        // Muestra el modal
        $('#newBudget').addClass('modal-overlay active');
        $('#settings-menu').removeClass('modal-overlay active'); //Cierra el modal settings
        // Establece el foco en el campo de entrada
        $('#modal-settings-budget-name').focus();
      });
    })

    //Activacion modal Budget Settings
    $(document).ready(function() {
      $('.modal-select-budget-settings').on('click', function() {
        // Muestra el modal
        $('#editBudget').addClass('modal-overlay active');
        $('#settings-menu').removeClass('modal-overlay active'); //Cierra el modal settings
      });
    })

    //Activa modal Account Settings
    $(document).ready(function() {
      $('#accountSettings').on('click', function() {
        $('#settings-menu').removeClass('modal-overlay active'); // cerrar modal quitando clase
        window.location.href = "{{ route('admin.settings') }}";
      });
    });

  </script>
@endpush


