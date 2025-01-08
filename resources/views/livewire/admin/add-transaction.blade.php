<div>
	{{-- Do your work, then step back. --}}
	@if($addTransaction)
		<div class="ynab-grid-add-rows">
			<div id="ember368" class="ynab-grid-body-row is-editing is-adding " data-row-id="8cbff179-e8fb-4554-acdc-cdc0ca6d8e98">
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-checkbox">
					<button class="ynab-checkbox ynab-checkbox-button is-checked" role="checkbox" aria-checked="true" aria-label="This transaction" type="button">
						<svg class="ynab-new-icon ynab-checkbox-button-square is-checked" width="13" height="13">
							<!---->
							<use href="#icon_sprite_check">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor"
												d="m7.4 17.6-5-5a1.4 1.4 0 0 0-2 0 1.4 1.4 0 0 0 0 2l6 6a1.4 1.4 0 0 0 2 0L23.6 5.4a1.4 1.4 0 0 0 0-2 1.4 1.4 0 0 0-2 0z"></path>
								</symbol>
							</use>
						</svg>
						<!---->
					</button>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-notification"></div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-flag">
					<button aria-label="Clear" class="ynab-flag-pill ynab-flag-pill-none ynab-flag-icon-only" type="button">
            <span class="flag-pill-icon-container">
              <svg class="ynab-new-icon flag-pill-icon-none" width="16" height="16">
                <!---->
                <use href="#icon_sprite_flag">
	               	<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_flag" fill="none" viewBox="0 0 24 24">
										<mask id="path-1-inside-1_5064_5725" fill="#fff">
											<path fill-rule="evenodd"
														d="M23 19H1.5A1.5 1.5 0 0 1 0 17.5v-12A1.5 1.5 0 0 1 1.5 4H23a1 1 0 0 1 .9 1.5l-3.3 5.8v.4l3.3 5.8A1 1 0 0 1 23 19"
														clip-rule="evenodd"></path>
										</mask>
										<path fill="currentColor"
													d="M1.5 19v-2zM0 17.5h-2zM23 4v2zm.9 1.5 1.7 1zm-3.3 5.8-1.8-1zm0 .4 1.7-1zm3.3 5.8-1.8 1zM23 19v2zm0-2H1.5v4H23zM1.5 17l.4.1L-1 20a4 4 0 0 0 2.5 1zm.4.1.1.4h-4A4 4 0 0 0-1 20zm.1.4v-12h-4v12zm0-12-.1.4L-1 3a4 4 0 0 0-1 2.5zm-.1.4-.4.1V2A4 4 0 0 0-1 3zm-.4.1H23V2H1.5zM23 6l-.5-.1 2-3.5A3 3 0 0 0 23 2zm-.5-.1-.4-.4 3.5-2a3 3 0 0 0-1.1-1.1zm-.4-.4L22 5h4a3 3 0 0 0-.4-1.5zM22 5l.1-.5 3.5 2c.3-.5.4-1 .4-1.5zm.1-.5-3.3 5.8 3.5 2 3.3-5.8zm-3.3 5.8-.3 1.2h4l-.2.7zm-.3 1.2c0 .4.1.9.3 1.2l3.5-2 .2.8zm.3 1.2 3.3 5.8 3.5-2-3.3-5.7zm3.3 5.8L22 18h4a3 3 0 0 0-.4-1.5zM22 18l.1-.5 3.5 2A3 3 0 0 0 26 18zm.1-.5.4-.4 2 3.5a3 3 0 0 0 1.1-1.1zm.4-.4.5-.1v4c.5 0 1-.1 1.5-.4z"
													mask="url(#path-1-inside-1_5064_5725)"></path>
									</symbol>
								</use>
              </svg>
            </span>
						<!---->
					</button>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-accountName user-data">
					<input id="ember369" class="accounts-text-field dropdown-text-field ember-text-field " autocomplete="off"
								 spellcheck="false" placeholder="account" type="text">
					
					<svg class="ynab-new-icon accounts-text-field-dropdown-icon" width="8" height="8">
						<!---->
						<use href="#icon_sprite_caret_down">
							<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none"
											viewBox="0 0 24 24">
								<path fill="currentColor"
											d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
							</symbol>
						</use>
					</svg>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-date user-data">
					<input id="ember370"
								 class="ember-text-field ember-view accounts-text-field dropdown-text-field ember-text-field "
								 autocomplete="off" spellcheck="false"
								 placeholder="date" type="text">
					
					<svg class="ynab-new-icon accounts-text-field-dropdown-icon" width="8" height="8">
						<!---->
						<use href="#icon_sprite_caret_down">
							<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none"
											viewBox="0 0 24 24">
								<path fill="currentColor"
											d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
							</symbol>
						</use>
					</svg>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-payeeName user-data">
					<input id="ember371" class="accounts-text-field dropdown-text-field ember-text-field " autocomplete="off"
								 spellcheck="false" placeholder="payee" type="text">
					<svg class="ynab-new-icon accounts-text-field-dropdown-icon" width="8" height="8">
						<!---->
						<use href="#icon_sprite_caret_down">
							<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none"
											viewBox="0 0 24 24">
								<path fill="currentColor"
											d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
							</symbol>
						</use>
					</svg>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-subCategoryName user-data">
					<input id="ember372" class="accounts-text-field dropdown-text-field ember-text-field " autocomplete="off"
								 spellcheck="false" placeholder="category" type="text">
					
					<svg class="ynab-new-icon accounts-text-field-dropdown-icon" width="8" height="8">
						<!---->
						<use href="#icon_sprite_caret_down">
							<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none"
											viewBox="0 0 24 24">
								<path fill="currentColor"
											d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
							</symbol>
						</use>
					</svg>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-memo user-data">
					<input id="ember373" class="ember-text-field ember-view accounts-text-field ember-text-field"
								 placeholder="memo" type="text">
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-outflow user-data">
					<div id="ember374" class="ynab-new-currency-input is-editing">
						
						<button tabindex="-1" class="button-calculator" aria-hidden="true" type="button">
							<svg class="icon-calculator" viewBox="0 0 16 16">
								<desc>Clicking this button will open the calculator</desc>
								<path
									d="m3.8 0 .5.5v2.3h2.2l.5.5v.5l-.5.5H4.3v2.2l-.5.5h-.5l-.5-.5V4.3H.5L0 3.8v-.5l.5-.5h2.3V.5l.5-.5zM9 3.3l.5-.5h6l.5.5v.5l-.5.5h-6L9 3.8zm3.5 7.7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M9 12.3a.5.5 0 0 1 .5-.6h6a.5.5 0 0 1 .5.6v.4a.5.5 0 0 1-.5.6h-6a.5.5 0 0 1-.5-.6zm-2.8-2.1v.7l-1.6 1.6 1.6 1.6v.7l-.4.4h-.7l-1.6-1.6-1.6 1.6h-.7l-.4-.4v-.7l1.6-1.6L1 10.9v-.7l.3-.4H2l1.6 1.6 1.6-1.6h.7z"></path>
							</svg>
						</button>
						<div class="input-wrapper">
							<input id="ember375" class="ember-text-field ember-view" placeholder="outflow" type="text">
							<button class="user-data currency tabular-nums zero">
								<bdi>$</bdi>
								0,00
							</button>
						</div>
						<!---->
					</div>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-inflow user-data">
					<div id="ember376" class="ynab-new-currency-input is-editing">
						<button tabindex="-1" class="button-calculator" aria-hidden="true" type="button">
							<svg class="icon-calculator" viewBox="0 0 16 16">
								<desc>Clicking this button will open the calculator</desc>
								<path
									d="m3.8 0 .5.5v2.3h2.2l.5.5v.5l-.5.5H4.3v2.2l-.5.5h-.5l-.5-.5V4.3H.5L0 3.8v-.5l.5-.5h2.3V.5l.5-.5zM9 3.3l.5-.5h6l.5.5v.5l-.5.5h-6L9 3.8zm3.5 7.7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M9 12.3a.5.5 0 0 1 .5-.6h6a.5.5 0 0 1 .5.6v.4a.5.5 0 0 1-.5.6h-6a.5.5 0 0 1-.5-.6zm-2.8-2.1v.7l-1.6 1.6 1.6 1.6v.7l-.4.4h-.7l-1.6-1.6-1.6 1.6h-.7l-.4-.4v-.7l1.6-1.6L1 10.9v-.7l.3-.4H2l1.6 1.6 1.6-1.6h.7z"></path>
							</svg>
						</button>
						<div class="input-wrapper">
							<input id="ember377" class="ember-text-field ember-view" placeholder="inflow" type="text">
							<button class="user-data currency tabular-nums zero">
								<bdi>$</bdi>
								0,00
							</button>
						</div>
						<!---->
					</div>
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-balance">
					&nbsp;
				</div>
				<div class="ynab-grid-cell js-ynab-grid-cell ynab-grid-cell-cleared" data-register-area="Cleared">
					<button class="ynab-cleared is-uncleared"
									title="Marking a transaction as 'cleared' means it has posted to your bank account."
									aria-label="This transaction is not cleared" type="button">
						<svg class="ynab-new-icon is-uncleared-icon" width="12" height="12">
							<!---->
							<use href="#icon_sprite_cleared_circle">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cleared_circle" fill="none"
												viewBox="0 0 24 24">
									<path fill="currentColor"
												d="M9.9 14.1q.9.9 2.1.9 1.4 0 2.2-1l1-.5q.6 0 1.1.4t.5 1-.3 1Q14.7 18 12 18q-2.5 0-4.2-1.8T6 12t1.8-4.2T12 6q2.7 0 4.5 2 .4.5.3 1 0 .7-.5 1.1a1 1 0 0 1-1 .4l-1.1-.5q-.8-1-2.2-1-1.2 0-2.1.9T9 12t.9 2.1"></path>
									<path fill="currentColor" fill-rule="evenodd"
												d="M12 0q5 0 8.5 3.5T24 12t-3.5 8.5T12 24t-8.5-3.5T0 12t3.5-8.5T12 0m0 2c2.8 0 5.1 1 7 3 2 1.9 3 4.2 3 7s-1 5.1-3 7c-1.9 2-4.2 3-7 3s-5.1-1-7-3c-2-1.9-3-4.2-3-7s1-5.1 3-7c1.9-2 4.2-3 7-3"
												clip-rule="evenodd"></path>
								</symbol>
							</use>
						</svg>
					</button>
				</div>
			</div>
		</div>
		<div id="ember378" class="ynab-grid-actions ynab-grid-body-row is-add-row" style="right: 46px; bottom: -36px;">
			<div class="ynab-grid-cell ynab-grid-cell-checkbox" data-register-area="none">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-notification">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-flag">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-accountName">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-date">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-payeeName">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-subCategoryName">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-memo">
				&nbsp;
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-outflow">
				&nbsp;
			</div>
			<!---->
			<div class="ynab-grid-cell ynab-grid-cell-inflow user-data buttons-container">
				<div class="ynab-grid-actions-buttons">
					<button class="button button-cancel-small" type="button">
						Cancel
					</button>
					<button class="button button-primary-small button-save" type="button">
						Save
					</button>
					<button class="button button-primary-small button-another" type="button">
						Save and add another
					</button>
				</div>
			</div>
			<div class="ynab-grid-cell ynab-grid-cell-cleared">
				&nbsp;
			</div>
		</div>
	@endif
</div>
@push('scripts')
	<script>

		document.addEventListener('click', function (event) {
			if (event.target.matches('.ynab-grid-container') || event.target.matches('.ynab-grid-cell')) {
				Livewire.dispatch('closeTransaction');
			}
		});
	
	</script>
@endpush


