@extends('front.layouts.pages-layout')
@section('pageTitle', $pageTitle ?? 'Page Title Here')
@section('content')
	
	<div class="content-min-break register-flex-columns ">
		<!---->
		<!---->
		<header class="accounts-header ">
			<div class="accounts-header-top">
				
				<div class="accounts-header-total user-data">
        <span class="js-accounts-header-account-name" title="{{ $account->nickname }}">
          {{ $account->nickname }}
        </span>
					<div class="account-info-small-text-container">
						<small class="js-account-type-small-text">
							<svg class="ynab-new-icon" width="16" height="16">
								@if(in_array($account->data_type, ['CreditCard', 'LineOfCredit']))
									<use href="#icon_sprite_credit_card"></use>
								@elseif ($account->account_group === 'Loans')
									<use href="#icon_sprite_line_chart_down"></use>
								@else
									<use href="#icon_sprite_cash"></use>
								@endif
								<!-- Definición de los símbolos SVG -->
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cash" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor" fill-rule="evenodd"
												d="M23 19H1a1 1 0 0 1-1-1V6c0-.6.4-1 1-1h22c.6 0 1 .4 1 1v12a1 1 0 0 1-1 1m-.8-9.3a3 3 0 0 1-2.8-2.8H4.6c0 1.5-1.2 2.8-2.8 2.8v5.1c1.4 0 2.6 1 2.8 2.3h14.8a3 3 0 0 1 2.8-2.3zm-10.2 6c-1.7 0-2.8-1.4-2.8-3.7s1.1-3.7 2.8-3.7 2.8 1.4 2.8 3.7-1.1 3.7-2.8 3.7"
												clip-rule="evenodd"></path>
								</symbol>
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_credit_card" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor" fill-rule="evenodd"
												d="M22 21H2a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2M3 16.5l.5.5h2l.5-.5v-1l-.5-.5h-2l-.5.5zm4-7L6.5 9h-4l-.5.5v3l.5.5h4l.5-.5zm4 6-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5zm5 0-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5zm5 0-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5z"
												clip-rule="evenodd"></path>
								</symbol>
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_line_chart_down" fill="none"
												viewBox="0 0 24 24">
									<path fill="currentColor" fill-rule="evenodd"
												d="M1 1.5c.5 0 1 .4 1 1v4.4L9.6 14l5.4-3.4a1 1 0 0 1 1.3.2l4.3 6a1 1 0 0 1-.2 1.3A1 1 0 0 1 19 18l-3.8-5.2-5.2 3.3a1 1 0 0 1-1.1 0L2 9.4v11h21a1 1 0 0 1 0 2H0v-20c0-.6.4-1 1-1"
												clip-rule="evenodd"></path>
								</symbol>
							</svg>
							{{ $account->account_type }}
						</small>
						<!---->
						<small class="js-reconciled-small-text">
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_lock">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_lock" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="M18.4 9.8h.5C20 9.8 21 11 21 12.2v9.4c0 1.3-.9 2.3-2.1 2.4H5a2.3 2.3 0 0 1-2-2.4v-9.4c0-1.3.9-2.3 2.1-2.4h.6V6c0-2.2.4-3.5 1.4-4.5S9.3 0 11.5 0h1c2.2 0 3.4.5 4.4 1.5s1.5 2.3 1.5 4.5zM16.2 6c0-1.4-.3-2.2-.9-2.9s-1.4-1-2.8-1h-1c-1.4 0-2.2.4-2.8 1s-1 1.5-1 2.9v3.8h8.5z"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							{{ $account->account_group === 'Loans' ? 'Updated never' : 'Not Yet Reconciled' }}
						</small>
					</div>
				</div>
				<div class="accounts-header-actions">
					<!---->
					<div class="reconcile-button-and-label">
						<button class="ynab-button primary secondary accounts-header-edit-account tooltip-relative-container"
										aria-describedby="ember142" type="button">
            <span role="tooltip" id="ember142" class="tooltip-content tooltip-below tooltip-right ">
              Edit Account
            </span>
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_pencil">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_pencil" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="m0 23.5 1.1-3.7A4 4 0 0 1 2.2 18l14-14a.5.5 0 0 1 .8 0l3 3a.5.5 0 0 1 0 .8l-14 14c-.5.5-1.1.9-1.8 1L.5 24a.4.4 0 0 1-.5-.5m22-23L23.5 2a1.6 1.6 0 0 1 0 2.3L21.7 6a.5.5 0 0 1-.8 0l-3-3a.5.5 0 0 1 0-.8L19.7.5a1.6 1.6 0 0 1 2.3 0"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
						</button>
						@if($account->account_group !== 'Loans')
							<button class="ynab-button primary accounts-header-reconcile tooltip-relative-container"
											aria-describedby="reconcile-button-tooltip" type="button">
								Reconcile <span role="tooltip" id="reconcile-button-tooltip"
																class="tooltip-content tooltip-below tooltip-right ">
              <div class="shortcut-tooltip">
                <div class="shortcut-description">Reconcile</div>
                <div class="shortcut-keys">
                  <div class="shortcut-key ">
                    shift
                  </div>
                  <div class="shortcut-key ">
                    E
                  </div>
                </div>
              </div>
            </span>
							</button>
						@endif
						@if($account->account_group === 'Loans')
							<button
								class="ynab-button secondary   loan-account-header-button loan-account-header-update-balance-button"
								type="button">
								Update Balance
							</button>
							<button class="ynab-button primary  " type="button">
								Add Activity
							</button>
						@endif
						<!---->
					</div>
				</div>
			</div>
			<hr class="standard">
			@if($account->account_group !== 'Loans')
				<div class="accounts-header-balances">
					<div tabindex="0" aria-describedby="ember230"
							 class="accounts-header-balances-amount accounts-header-balances-cleared tooltip-relative-container">
        <span class="user-data">
          <span class="user-data currency {{ $account->balance > 0 ? 'positive' : 'negative' }}">{{
            (in_array($account->data_type, ['CreditCard', 'LineOfCredit']) || $account->balance < 0) ? '−' : '' }} <bdi>
              $</bdi>{{ number_format(abs($account->balance), 2, ',', '.') }}</span>
        </span>
						<div class="accounts-header-label">
							<svg class="ynab-new-icon" width="12" height="12">
								<!---->
								<use href="#icon_sprite_cleared_circle_fill">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cleared_circle_fill" fill="none"
													viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="M12 0q5 0 8.5 3.5T24 12t-3.5 8.5T12 24t-8.5-3.5T0 12t3.5-8.5T12 0m0 15q-1.2 0-2.1-.9T9 12t.9-2.1T12 9q1.4 0 2.2 1 .4.5 1 .5t1.1-.4.5-1a1 1 0 0 0-.3-1Q14.7 6 12 6 9.5 6 7.8 7.8T6 12t1.8 4.2T12 18q2.7 0 4.5-2 .4-.5.3-1l-.5-1.1a1 1 0 0 0-1-.4q-.7 0-1.1.5-.8 1-2.2 1"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							Cleared Balance <span role="tooltip" id="add-transaction" class="tooltip-content tooltip-below ">
            Link your account to your financial institution and import transactions without ever leaving YNAB.
          </span>
						</div>
					</div>
					<i> + </i>
					<div tabindex="0" aria-describedby="ember231"
							 class="accounts-header-balances-amount accounts-header-balances-uncleared tooltip-relative-container">
        <span class="user-data">
          <span class="user-data currency zero"><bdi>$</bdi>0,00</span>
        </span>
						<div class="accounts-header-label">
							<svg class="ynab-new-icon" width="12" height="12">
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
							Uncleared Balance <span role="tooltip" id="add-transaction"
																			class="tooltip-content tooltip-below tooltip-left ">
            The total of all uncleared transactions. This includes transactions you've manually entered that your bank
            does not know about yet, as well as only those pending transactions from your bank that you've chosen to
            Enter Now.
          </span>
						</div>
					</div>
					<i> = </i>
					<div tabindex="0" aria-describedby="ember232"
							 class="accounts-header-balances-amount accounts-header-balances-working tooltip-relative-container">
        <span class="user-data">
          <span class="user-data currency {{ $account->balance > 0 ? 'positive' : 'negative' }}">{{
            ($account->account_group !== 'Loans' && (in_array($account->data_type, ['CreditCard', 'LineOfCredit']) ||
            $account->balance < 0)) ? '−' : '' }}<bdi>$</bdi>{{
              number_format(abs($account->balance), 2, ',', '.') }}</span>
        </span>
						<div class="accounts-header-label">
							<!---->              Working Balance <span role="tooltip" id="add-transaction"
																												 class="tooltip-content tooltip-below tooltip-left ">
            The sum of your cleared and uncleared transactions. This represents the money you have available to spend
            (or owe, in the case of credit cards and loan accounts).
          </span>
						</div>
					</div>
					<div class="accounts-header-balances-right">
						<!---->
						@if(in_array($account->data_type, ['CreditCard', 'LineOfCredit']))
							<div class="overspending-and-payment">
								<!---->
								<div class="accounts-header-payment">
            <span class="user-data header-currency-label " title="$0,00">
              <div class="payment-currency-label">
                <div id="ember340" class="animate-number  ">
                  <span class="user-data currency zero"><bdi>$</bdi>{{ $account->payment }}</span>
                </div>
              </div>
            </span>
									<button class="accounts-header-label" type="button">
										<svg class="ynab-new-icon" width="12" height="12">
											<!---->
											<use href="#icon_sprite_question_mark_circle">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_question_mark_circle" fill="none"
																viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
																d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20m1.1 12-.5.5h-1.1L11 14c0-3.3 2.8-3 2.8-5.5 0-.8-1-1.5-1.9-1.5-1 0-2 .7-2 1.5l.2.8a.5.5 0 0 1-.5.7h-1l-.5-.4L8 8.5C8 6.5 9.8 5 12 5s4 1.6 4 3.5c0 3.2-2.9 3-2.9 5.5M12 16a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 12 16"
																clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>
										<span>Payment</span>
									</button>
								</div>
							</div>
						@endif
					</div>
				</div>
				<!---->
				<div id="ember233" class="accounts-toolbar">
					<div class="accounts-toolbar-left">
						<button class="ghost-button primary type-body add-transaction tooltip-relative-container" onclick="Livewire.dispatch('addAccountEvent')"
										aria-describedby="add-transaction"
										type="button">
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_plus_circle_fill">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none"
													viewBox="0 0 24 24">
										<path fill="currentColor"
													d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2"></path>
									</symbol>
								</use>
							</svg>
							Add Transaction <span role="tooltip" id="add-transaction"
																		class="tooltip-content tooltip-above tooltip-left ">
            <div class="shortcut-tooltip">
              <div class="shortcut-description">Add new transaction</div>
              <div class="shortcut-keys">
                <div class="shortcut-key ">
                  shift
                </div>
                <div class="shortcut-key ">
                  N
                </div>
              </div>
            </div>
          </span>
						</button>
						@if($account->data_type !== 'Cash')
							<button
								class="ghost-button primary type-body accounts-toolbar-direct-import-link-account tooltip-relative-container"
								aria-describedby="ember234" type="button">
								<svg class="ynab-new-icon" width="16" height="16">
									<!---->
									<use href="#icon_sprite_arrow_from_cloud">
										<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_arrow_from_cloud" fill="none"
														viewBox="0 0 24 24">
											<path fill="currentColor" fill-rule="evenodd"
														d="M18.5 16.6h-2.8a1 1 0 1 1 0-1.8h2.7a3.7 3.7 0 0 0 3.8-3.7c0-2.5-2-3.3-3-3.7a1 1 0 0 1-.7-.8v-.5a5 5 0 0 0-4.6-4.3c-2.1 0-3.3 1.3-4 2.2a1 1 0 0 1-1 .3l-1.1-.1A3 3 0 0 0 5 6.9v.6a1 1 0 0 1-.6.8c-1.2.5-2.7 1.2-2.7 3.4a3 3 0 0 0 3.3 3h3.2a1 1 0 1 1 0 2H5.1a5 5 0 0 1-1.9-9.9 4.6 4.6 0 0 1 5.6-4.4 6.5 6.5 0 0 1 11.5 3.4 5.5 5.5 0 0 1-1.8 10.8m-9.7 1.9H11V9.2a1 1 0 0 1 1.8 0v9.3h2.3a.5.5 0 0 1 .4.7l-3.2 4.6a.5.5 0 0 1-.8 0l-3.2-4.6a.5.5 0 0 1 .4-.7"
														clip-rule="evenodd"></path>
										</symbol>
									</use>
								</svg>
								Link Account <span role="tooltip" id="add-transaction"
																	 class="tooltip-content tooltip-above tooltip-left ">
            Link your account to your financial institution and import transactions without ever leaving YNAB.
          </span>
							</button>
						@endif
						<button
							class="ghost-button primary type-body accounts-toolbar-file-import-transactions js-accounts-toolbar-file-import-transactions tooltip-relative-container"
							aria-describedby="ember235" type="button">
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_document_with_arrow_up">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_document_with_arrow_up" fill="none"
													viewBox="0 0 24 24">
										<path fill="currentColor"
													d="M21 9.5A1.5 1.5 0 0 0 19.5 8h-5A1.5 1.5 0 0 1 13 6.5v-5A1.5 1.5 0 0 0 11.5 0h-7A1.5 1.5 0 0 0 3 1.5v21A1.5 1.5 0 0 0 4.5 24h6.8v-7.2h-2c-.1 0-.3-.2-.3-.4v-.2l2.7-4a.4.4 0 0 1 .6 0l2.6 4 .1.2-.2.3-.2.1h-1.8V24h6.7a1.5 1.5 0 0 0 1.5-1.5z"></path>
										<path fill="currentColor" d="m14 6.5.5.5h5.3a.5.5 0 0 0 .3-.9L15 1a.5.5 0 0 0-.9.3z"></path>
									</symbol>
								</use>
							</svg>
							File Import <span role="tooltip" id="add-transaction" class="tooltip-content tooltip-above tooltip-left ">
            Import transactions from a bank file.
          </span>
						</button>
						<!---->
						@if(in_array($account->data_type, ['CreditCard', 'LineOfCredit']))
							<button class="ghost-button primary type-body js-record-payment tooltip-relative-container"
											aria-describedby="ember86" type="button">
								<svg class="ynab-new-icon" width="16" height="16">
									<!---->
									<use href="#icon_sprite_credit_card">
										<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_credit_card" fill="none"
														viewBox="0 0 24 24">
											<path fill="currentColor" fill-rule="evenodd"
														d="M22 21H2a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2M3 16.5l.5.5h2l.5-.5v-1l-.5-.5h-2l-.5.5zm4-7L6.5 9h-4l-.5.5v3l.5.5h4l.5-.5zm4 6-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5zm5 0-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5zm5 0-.5-.5h-2l-.5.5v1l.5.5h2l.5-.5z"
														clip-rule="evenodd"></path>
										</symbol>
									</use>
								</svg>
								Record Payment <span role="tooltip" id="add-transaction"
																		 class="tooltip-content tooltip-above tooltip-right ">
            Quickly record a credit card payment.
          </span>
							</button>
						@endif
						<hr>
						<span class="undo-redo-container js-undo-redo-container">
          <button disabled="" class="ghost-button primary type-body undo-button" aria-describedby="ember236"
									type="button">
            <svg class="ynab-new-icon" width="12" height="12">
              <!---->
              <use href="#icon_sprite_undo">
                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_undo" fill="none" viewBox="0 0 24 24">
                  <path fill="currentColor" fill-rule="evenodd"
												d="M12.6 24H3.4a1.1 1.1 0 1 1 0-2.3h9.2a8 8 0 1 0 0-16H6.9v2.9a.6.6 0 0 1-1 .4L.2 5a1 1 0 0 1 0-.9L6 .1a.6.6 0 0 1 1 .5v2.8h5.7a10.3 10.3 0 1 1 0 20.6"
												clip-rule="evenodd"></path>
                </symbol>
              </use>
            </svg>
            Undo
          </button>
          <button disabled="" class="ghost-button primary type-body redo-button" type="button">
            <svg class="ynab-new-icon" width="12" height="12">
              <!---->
              <use href="#icon_sprite_redo">
                <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_redo" fill="none" viewBox="0 0 24 24">
                  <path fill="currentColor" fill-rule="evenodd"
												d="M11 21.7h9.2a1.1 1.1 0 1 1 0 2.3H11a10.3 10.3 0 1 1 0-20.6h5.8V.6a.6.6 0 0 1 .9-.5l5.7 4a.6.6 0 0 1 0 1l-5.7 4a.6.6 0 0 1-1-.5V5.7H11a8 8 0 0 0-8 8 8 8 0 0 0 8 8"
												clip-rule="evenodd"></path>
                </symbol>
              </use>
            </svg>
            Redo
          </button>
        </span>
						<!---->
					</div>
					<div class="accounts-toolbar-right">
						<button
							class="ghost-button primary is-dropdown type-body accounts-toolbar-view-options tooltip-relative-container"
							aria-describedby="ember238" type="button">
							View
							<svg class="ynab-new-icon" width="8" height="8">
								<!---->
								<use href="#icon_sprite_caret_down">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none"
													viewBox="0 0 24 24">
										<path fill="currentColor"
													d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
									</symbol>
								</use>
							</svg>
							<span role="tooltip" id="add-transaction" class="tooltip-content tooltip-above tooltip-right ">
            Set view options like date range, reconciliation status, and more.
          </span>
						</button>
						@if($account->account_group !== 'Loans')
							<div id="transaction_search" class="transaction-search js-transaction-search ">
								<div class="transaction-search-inner">
									<div class="transaction-search-icon">
										<svg class="ynab-new-icon" width="12" height="12">
											<!---->
											<use href="#icon_sprite_search">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_search" fill="none"
																viewBox="0 0 24 24">
													<path fill="currentColor" fill-rule="evenodd"
																d="M10 0a10 10 0 0 1 8 15.9l5.3 4.5a2 2 0 0 1 .1 3 2 2 0 0 1-3-.1l-4.5-5.4A10 10 0 1 1 9.9 0m0 17.8A7.8 7.8 0 1 0 10 2a7.8 7.8 0 0 0 0 15.7"
																clip-rule="evenodd"></path>
												</symbol>
											</use>
										</svg>
									</div>
									<input id="search_Input" class="ember-text-field ember-view transaction-search-input"
												 placeholder="Search {{$account->nickname}}"
												 aria-label="Find the transactions you're looking for..."
												 title="Find the transactions you're looking for..." spellcheck="false" autocomplete="off"
												 type="text">
									<!---->
									<button class="transaction-search-cancel-icon js-transaction-search-cancel-icon" style="display: none"
													type="button">
										<svg class="ynab-new-icon" width="12" height="12">
											<!---->
											<use href="#icon_sprite_close_circle_fill">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close_circle_fill" fill="none"
																viewBox="0 0 24 24">
													<path fill="currentColor"
																d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m5.2 17.2a1.2 1.2 0 0 1-1.7 0L12 13.7l-3.5 3.5a1.2 1.2 0 0 1-1.7 0 1.2 1.2 0 0 1 0-1.7l3.5-3.5-3.5-3.5a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 3.5-3.5a1.2 1.2 0 0 1 1.7 0 1.2 1.2 0 0 1 0 1.7L13.7 12l3.5 3.5c.4.4.4 1.2 0 1.7"></path>
												</symbol>
											</use>
										</svg>
									</button>
								</div>
							</div>
						@endif
					</div>
				</div>
			@endif
			<!--Loans-->
			@if($account->account_group === 'Loans')
				<header class="loan-account-account-header">
					<div class="loan-account-header-balances">
						<div class="loan-account-header-element">
							<div class="loan-account-header-element-amount loan-account-header-element-balance">
								<div id="ember390" class="animate-number  ">
              <span class="user-data currency positive"><bdi>$</bdi>{{ number_format(abs($account->balance), 2, ',',
                '.') }}</span>
								</div>
							</div>
							<div class="loan-account-header-element-label">Remaining Balance</div>
						</div>
						<div class="loan-account-header-element">
							<div class="loan-account-header-element-amount loan-account-header-element-interest-rate">
            <span>{{ fmod($account->interest, 1) == 0 ? intval($account->interest) : number_format($account->interest,
              1, ',', '') }}<bdi>%</bdi></span>
							</div>
							<div class="loan-account-header-element-label">Interest Rate</div>
						</div>
						<div class="loan-account-header-element">
							<div class="loan-account-header-element-amount loan-account-header-element-min-payment-amount">
            <span class="user-data currency positive"><bdi>$</bdi>{{ number_format(abs($account->payment), 2, ',', '.')
              }}</span>
							</div>
							<div class="loan-account-header-element-label">Minimum Payment</div>
						</div>
						<!---->
						<div class="loan-account-header-element">
							<div class="loan-account-header-element-amount loan-account-header-element-payoff-date">
								<strong>{{ $account->payoff_date->format('M Y') }}</strong>
							</div>
							<div class="loan-account-header-element-label">Payoff Date</div>
						</div>
					</div>
				</header>
			@endif
		</header>
		<!---->
		<div id="ember255" class="ynab-grid">
			@if($account->account_group !== 'Loans')
				<div id="ember256" class="ynab-grid-header ">
					<div class="ynab-grid-header-row">
						<div class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-checkbox " data-column="checkbox">
							<button class="ynab-checkbox ynab-checkbox-button " role="checkbox" aria-checked="false"
											aria-label="Check all" type="button">
								<svg class="ynab-new-icon ynab-checkbox-button-square " width="13" height="13">
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
						<div class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-notification"
								 data-column="notification">
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_info_circle_fill">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_info_circle_fill" fill="none"
													viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m.8-16A1.6 1.6 0 0 1 11 6.5 1.6 1.6 0 0 1 12.8 5a1.6 1.6 0 0 1 1.7 1.5A1.6 1.6 0 0 1 12.8 8m.7 3.4L12 16.6c-.2.5.1 1 .6 1.3l.3.4v.2l-.5.5H11a1.5 1.5 0 0 1-1.5-1.9L11 12a1 1 0 0 0-.6-1.3l-.3-.4V10l.5-.5H12a1.5 1.5 0 0 1 1.5 1.9"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
						</div>
						<div id="ember257" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-flag "
								 data-column="flag">
							<div class="ynab-grid-header-column-sort-area">
            <span class="icon-wrapper">
              <svg class="ynab-new-icon ynab-flag-header" width="16" height="16">
                <!---->
                <use href="#icon_sprite_flag_fill">
                  <symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_flag_fill" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd"
													d="M23 19.5H1.5A1.5 1.5 0 0 1 0 18V6a1.5 1.5 0 0 1 1.5-1.5H23a1 1 0 0 1 .9 1.5l-3.3 5.8v.4l3.3 5.8a1 1 0 0 1-.9 1.5"
													clip-rule="evenodd"></path>
                  </symbol>
                </use>
              </svg>
            </span>
								<!---->
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember258" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-accountName "
								 data-column="accountName">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">ACCOUNT</span>
								<!---->
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember259" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-date "
								 data-column="date">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">DATE</span>
								<!---->
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember260"
								 class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-payeeName is-sorting"
								 data-column="payeeName">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">PAYEE</span>
								<!---->
								<svg class="ynab-new-icon sort-icon" width="8" height="8">
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
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember261"
								 class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-subCategoryName is-sorting"
								 data-column="subCategoryName">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">CATEGORY</span>
								<!---->
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember262" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-memo "
								 data-column="memo">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">MEMO</span>
								<!---->
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember263" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-outflow "
								 data-column="outflow">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">OUTFLOW</span>
								<!---->
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember264" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-inflow "
								 data-column="inflow">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">INFLOW</span>
								<!---->
								<!---->
							</div>
							<!---->
						</div>
						<div id="ember265" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-balance "
								 data-column="balance">
							<div class="ynab-grid-header-column-sort-area">
								<!---->
								<span class="label">BALANCE</span>
								<button class="balance-learn-more" type="button">
									<svg class="ynab-new-icon" width="12" height="12">
										<!---->
										<use href="#icon_sprite_question_mark_circle">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_question_mark_circle" fill="none"
															viewBox="0 0 24 24">
												<path fill="currentColor" fill-rule="evenodd"
															d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20m1.1 12-.5.5h-1.1L11 14c0-3.3 2.8-3 2.8-5.5 0-.8-1-1.5-1.9-1.5-1 0-2 .7-2 1.5l.2.8a.5.5 0 0 1-.5.7h-1l-.5-.4L8 8.5C8 6.5 9.8 5 12 5s4 1.6 4 3.5c0 3.2-2.9 3-2.9 5.5M12 16a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 12 16"
															clip-rule="evenodd"></path>
											</symbol>
										</use>
									</svg>
								</button>
								<!---->
							</div>
							<div class="ynab-grid-resize-handle js-ynab-grid-resize-handle"></div>
						</div>
						<div id="ember266" class="ynab-grid-header-cell js-ynab-grid-header-cell ynab-grid-cell-cleared "
								 data-column="cleared">
							<div class="ynab-grid-header-column-sort-area">
								<svg class="ynab-new-icon" width="16" height="16">
									<title>Marking a transaction as 'cleared' means it has posted to your bank account.</title>
									<use href="#icon_sprite_cleared_circle_fill">
										<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cleared_circle_fill" fill="none"
														viewBox="0 0 24 24">
											<path fill="currentColor" fill-rule="evenodd"
														d="M12 0q5 0 8.5 3.5T24 12t-3.5 8.5T12 24t-8.5-3.5T0 12t3.5-8.5T12 0m0 15q-1.2 0-2.1-.9T9 12t.9-2.1T12 9q1.4 0 2.2 1 .4.5 1 .5t1.1-.4.5-1a1 1 0 0 0-.3-1Q14.7 6 12 6 9.5 6 7.8 7.8T6 12t1.8 4.2T12 18q2.7 0 4.5-2 .4-.5.3-1l-.5-1.1a1 1 0 0 0-1-.4q-.7 0-1.1.5-.8 1-2.2 1"
														clip-rule="evenodd"></path>
										</symbol>
									</use>
								</svg>
								
								<span class="label"></span>
								<!---->
								<!---->
							</div>
							<!---->
						</div>
					</div>
				</div>
				<!---->
				{{-- Add Transaction --}}
				@livewire('admin.add-transaction')
				<!---->
				<div id="grid-container" class="ynab-grid-container">
					<div class="ynab-grid-body">
						<!---->
						<div class="ynab-grid-body-row ynab-grid-body-parent  " data-row-id="{{ $account->id }}">
							<div class="ynab-grid-cell ynab-grid-cell-checkbox">
								<button class="ynab-checkbox ynab-checkbox-button " role="checkbox" aria-checked="true" aria-label="This transaction" type="button">
									<svg class="ynab-new-icon ynab-checkbox-button-square " width="13" height="13">
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
							<div class="ynab-grid-cell ynab-grid-cell-notification">
								<!---->
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-flag">
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
							<div class="ynab-grid-cell ynab-grid-cell-accountName user-data">
								<span>Cheque</span>&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-date user-data">
								{{ ($account->created_at)->format('m/d/Y') }}&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-payeeName user-data">
								<div class="ynab-grid-cell-inner">
									<span class="ynab-grid-cell-inner-payee-name" title="Starting Balance">Starting Balance</span>&nbsp;
									<!---->
								</div>
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-subCategoryName user-data" title="Inflow: Ready to Assign">
            <span class="indent">{{ in_array($account->data_type, ['CreditCard', 'LineOfCredit']) ? 'Category not
              needed' : 'Inflow: Ready to Assign' }}</span>&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-memo user-data">
								<span></span>&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-outflow user-data">
            <span class="user-data currency tabular-nums "> @if ( in_array($account->data_type, ['CreditCard',
              'LineOfCredit']))
								<bdi>$</bdi>{{ number_format(abs($account->balance), 2, ',', '.') }}
							@endif</span>&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-inflow user-data">
            <span class="user-data currency tabular-nums positive"> @if ( !in_array($account->data_type, ['CreditCard',
              'LineOfCredit']))
								<bdi>$</bdi>{{ number_format(abs($account->balance), 2, ',', '.') }}
							@endif</span>&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-balance">
            <span class="user-data currency tabular-nums positive"><bdi>$</bdi>{{ number_format(abs($account->balance),
              2, ',', '.') }}</span>&nbsp;
							</div>
							<div class="ynab-grid-cell ynab-grid-cell-cleared" data-register-area="Cleared">
								<button class="ynab-cleared is-cleared"
												title="Marking a transaction as 'cleared' means it has posted to your bank account."
												aria-label="This transaction is cleared" type="button">
									<svg class="ynab-new-icon is-cleared-icon" width="12" height="12">
										<!---->
										<use href="#icon_sprite_cleared_circle_fill">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_cleared_circle_fill" fill="none"
															viewBox="0 0 24 24">
												<path fill="currentColor" fill-rule="evenodd"
															d="M12 0q5 0 8.5 3.5T24 12t-3.5 8.5T12 24t-8.5-3.5T0 12t3.5-8.5T12 0m0 15q-1.2 0-2.1-.9T9 12t.9-2.1T12 9q1.4 0 2.2 1 .4.5 1 .5t1.1-.4.5-1a1 1 0 0 0-.3-1Q14.7 6 12 6 9.5 6 7.8 7.8T6 12t1.8 4.2T12 18q2.7 0 4.5-2 .4-.5.3-1l-.5-1.1a1 1 0 0 0-1-.4q-.7 0-1.1.5-.8 1-2.2 1"
															clip-rule="evenodd"></path>
											</symbol>
										</use>
									</svg>
								</button> &nbsp;
							</div>
						</div>
						<!---->
						<div class="ynab-grid-body-row ynab-grid-body-empty">
							<div class="ynab-grid-cell ynab-grid-cell-checkbox" data-register-area="none"></div>
							<div class="ynab-grid-cell ynab-grid-cell-notification"></div>
							<div class="ynab-grid-cell ynab-grid-cell-flag"></div>
							<div class="ynab-grid-cell ynab-grid-cell-accountName"></div>
							<div class="ynab-grid-cell ynab-grid-cell-date"></div>
							<div class="ynab-grid-cell ynab-grid-cell-payeeName"></div>
							<div class="ynab-grid-cell ynab-grid-cell-subCategoryName"></div>
							<div class="ynab-grid-cell ynab-grid-cell-memo"></div>
							<div class="ynab-grid-cell ynab-grid-cell-outflow"></div>
							<div class="ynab-grid-cell ynab-grid-cell-inflow"></div>
							<div class="ynab-grid-cell ynab-grid-cell-balance"></div>
							<div class="ynab-grid-cell ynab-grid-cell-cleared"></div>
						</div>
						<!---->
						<div class="ynab-grid-body-row-bottom" style="height:100px">
							<div class="ynab-grid-cell ynab-grid-cell-checkbox" data-register-area="none"></div>
							<div class="ynab-grid-cell ynab-grid-cell-notification"></div>
							<div class="ynab-grid-cell ynab-grid-cell-flag"></div>
							<div class="ynab-grid-cell ynab-grid-cell-accountName"></div>
							<div class="ynab-grid-cell ynab-grid-cell-date"></div>
							<div class="ynab-grid-cell ynab-grid-cell-payeeName"></div>
							<div class="ynab-grid-cell ynab-grid-cell-subCategoryName"></div>
							<div class="ynab-grid-cell ynab-grid-cell-memo"></div>
							<div class="ynab-grid-cell ynab-grid-cell-outflow"></div>
							<div class="ynab-grid-cell ynab-grid-cell-inflow"></div>
							<div class="ynab-grid-cell ynab-grid-cell-balance"></div>
							<div class="ynab-grid-cell ynab-grid-cell-cleared"></div>
						</div>
					</div>
				</div>
				<div class="register-action-bar-container " id="ember264">
					<div class="register-action-bar-inner ">
						<button class="ghost-button contrast type-body action-bar-button action-bar-uncheck-button" aria-label="Close" title="Close" type="button">
							<svg class="ynab-new-icon" width="8" height="8">
								<!---->
								<use href="#icon_sprite_close">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="M22.5 22.5a1.4 1.4 0 0 1-2 0L12 13.9l-8.6 8.6a1.4 1.4 0 0 1-1.9-2l8.6-8.5-8.6-8.5a1.4 1.4 0 0 1 2-2l8.5 8.6 8.5-8.6a1.4 1.4 0 1 1 2 2L13.9 12l8.6 8.6a1.4 1.4 0 0 1 0 1.9"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							1 Transaction
						</button>
						<hr>
						<!---->
						<!---->
						<!---->
						<button class="ghost-button contrast type-body action-bar-button js-action-bar-categories-menu-button tooltip-relative-container"
										aria-describedby="action-bar-categorize-button-tooltip" type="button">
							<svg class="ynab-new-icon" width="12" height="12">
								<!---->
								<use href="#icon_sprite_checkmark_inbox">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_checkmark_inbox" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" d="m7.2 11 3.3 3.3q.4.4.8 0l5.5-5.5q.4-.4 0-.9l-.7-.7q-.4-.4-.8 0l-4.4 4.4-2.2-2.2q-.4-.4-.8 0l-.7.8q-.4.4 0 .8"></path>
										<path fill="currentColor" fill-rule="evenodd"
													d="M4.3 22h15.4a2.3 2.3 0 0 0 2.3-2.3V15L20.3 4a2.3 2.3 0 0 0-2.2-2H5.8c-1.1 0-2 .8-2.2 2L2 15v4.7A2.3 2.3 0 0 0 4.3 22M18.6 4.2l1.5 11-.5.4h-3.2l-.4.3-.7 2.2-.4.3H9l-.4-.3-.7-2.2-.4-.3H4.4l-.5-.5L5.4 4.2l.4-.4h12.4c.2 0 .4.2.4.4"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							Categorize
							<span role="tooltip" id="action-bar-categorize-button-tooltip" class="tooltip-content tooltip-above tooltip-center " style="bottom: calc(100% + 0.75rem);">
									<div class="shortcut-tooltip">
										<div class="shortcut-description">Categorize</div>
											<div class="shortcut-keys">
										<div class="shortcut-key ">
											K
										</div>
								</div>
									</div>
							</span>
						</button>
						<button class="ghost-button contrast type-body action-bar-button js-action-bar-flags-menu-button tooltip-relative-container"
										aria-describedby="action-bar-flag-button-tooltip" type="button">
							<svg class="ynab-new-icon" width="12" height="12">
								<!---->
								<use href="#icon_sprite_flag_fill">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_flag_fill" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="M23 19.5H1.5A1.5 1.5 0 0 1 0 18V6a1.5 1.5 0 0 1 1.5-1.5H23a1 1 0 0 1 .9 1.5l-3.3 5.8v.4l3.3 5.8a1 1 0 0 1-.9 1.5" clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							Flag
							<span role="tooltip" id="action-bar-flag-button-tooltip" class="tooltip-content tooltip-above tooltip-center " style="bottom: calc(100% + 0.75rem);">
								<div class="shortcut-tooltip">
									<div class="shortcut-description">Flag</div>
										<div class="shortcut-keys">
									<div class="shortcut-key ">
										shift
									</div>
									<div class="shortcut-key ">
										F
									</div>
									<div class="shortcut-key shortcut-then-key">
										then
									</div>
									<div class="shortcut-key ">
										0‑6
									</div>
									</div>
								</div>
							</span>
						</button>
						<!---->
						<!---->
						<hr>
						<button class="ghost-button contrast type-body action-bar-button js-action-bar-more-menu-button" type="button">
							<svg class="ynab-new-icon" width="12" height="12">
								<!---->
								<use href="#icon_sprite_more_horizontal">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_more_horizontal" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="M23.3 12c0 1.5-1.3 2.6-2.7 2.6s-2.7-1.2-2.7-2.6a2.7 2.7 0 0 1 5.4 0m-8.6 0c0 1.5-1.2 2.6-2.7 2.6S9.3 13.5 9.3 12s1.2-2.6 2.7-2.6 2.7 1.1 2.7 2.6M3.4 9.4c1.5 0 2.7 1.1 2.7 2.6S5 14.6 3.4 14.6.8 13.4.8 12 2 9.4 3.4 9.4"
													clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							More
						</button>
					</div>
				</div>
		</div>
		@endif
	</div>
	{{--@livewire('admin.add-transaction')--}}
	<!---->
@endsection

@push('scripts')
	<script>
		// Escuchar el evento de clic en el documento activa checkbox
		document.addEventListener('click', function (e) {
			const button = e.target.closest('.ynab-checkbox-button');
			if (button) {
				const isChecked = button.classList.toggle('is-checked');

				const svg = button.querySelector('svg');
				if (svg) {
					svg.classList.toggle('is-checked', isChecked);
				}

				// Alternar la clase 'is-checked' en todos los checkboxes y sus SVGs
				document.querySelectorAll('.ynab-checkbox-button').forEach(checkbox => {
					checkbox.classList.toggle('is-checked', isChecked);
					const checkboxSvg = checkbox.querySelector('svg');
					if (checkboxSvg) {
						checkboxSvg.classList.toggle('is-checked', isChecked);
					}
				});

				document.querySelectorAll('.ynab-grid-body-row').forEach(row => {
					row.classList.toggle('is-checked', isChecked);
				});

				document.querySelectorAll('.register-action-bar-container, .register-action-bar-inner').forEach(container => {
					container.classList.toggle('show', isChecked);
				});
			}
		});
	
	</script>
@endpush




