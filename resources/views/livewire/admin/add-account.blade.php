<div>
	<!---->
	<div class="nav-add-accounts">
		@if($budgetAccounts->isEmpty())
			<div class="nav-accounts-empty-state">
				<h5>No Accounts</h5>
				<p>You can't plan without adding accounts to YNAB first. How about adding one now?</p>
			</div>
		@endif
		<button class="ynab-button contrast button-sidebar nav-add-account" type="button" wire:click="addAccountModal">
			<svg class="ynab-new-icon" width="12" height="12">
				<!---->
				<use href="#icon_sprite_plus_circle_fill">
					<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
						<path fill="currentColor"
							d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2"></path>
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
						<div class="account-widget-step account-widget-search-institutions">
							<div class="account-widget-header">
								<div class="hidden-header-button"></div>
								<div class="account-widget-header-title">
									<h1>Add Accounts</h1>
									<!---->
								</div>
								<button wire:click="hideAccountModalForm" aria-label="Close" title="Close" type="button">
									<svg class="ynab-new-icon icon-close" width="16" height="16">
										<!---->
										<use href="#icon_sprite_close">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close" fill="none" viewBox="0 0 24 24">
												<path fill="currentColor" fill-rule="evenodd"
													d="M20.7 20.7a1 1 0 0 1-1.6 0L12 13.6l-7 7a1.1 1.1 0 0 1-1.7-1.5l7.1-7.1-7-7a1.1 1.1 0 0 1 1.5-1.7l7 7.1 7.2-7a1.1 1.1 0 0 1 1.8 1.2l-.2.3-7.1 7.1 7 7a1 1 0 0 1 0 1.7"
													clip-rule="evenodd"></path>
											</symbol>
										</use>
									</svg>
								</button>
							</div>
							<div class="account-widget-body user-data">
								<!---->
								<div class="account-widget-search-input">
									<label>Search for your Financial Institution</label>
									<input id="searchFinancial" class="ember-text-field ember-view y-input" autocomplete="nope" autocorrect="off" spellcheck="false" autocapitalize="none"
										type="text"/>
									<div class="y-form-note">
										<!---->
										<div class="note-container">
											<em>Search by institution name or web address (URL)</em>
										</div>
									</div>
								</div>
								<h3>Popular Options</h3>
								<div class="account-widget-api-popular-list">
									<button class="ins_56" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkYzM2NGYxN2ItOGI5Ny00NDA3LThjMzctYzg4NTNlMGM4ODQwo3B1cqdibG9iX2lk--fca64e4f0a4b8286fb7f58fc22126177abb6a38e/popular.png"
												alt="Chase"/>
										</div>
									</button>
									<button class="ins_128026" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkOWE2MjFlZDEtOTc3NC00YWI2LWIyMjMtMjI3MTg3MzZlMjgyo3B1cqdibG9iX2lk--ff530ba3b0edd185e42a6b9dfde59c299a4f0a9e/popular.png"
												alt="Capital One"/>
										</div>
									</button>
									<button class="ins_10" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkMWRiMDdjYWQtY2FmNy00MGY5LWIxZDAtYzFjY2Y1NjQwNTRmo3B1cqdibG9iX2lk--e37e1c7d3e58e6683ac56a17cff472dd64965974/popular.png"
												alt="American Express"/>
										</div>
									</button>
									<button class="ins_127989" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkNTI0ZWM3MTUtMTQ3MS00ODcyLWFlODItNWJlZWJhYTgwYzAyo3B1cqdibG9iX2lk--793076c6ddc0922ced27a82b1bfd9c3acabc7b32/popular.png"
												alt="Bank of America"/>
										</div>
									</button>
									<button class="ins_5" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkMjlmYjI5YjMtYmRhMC00ZjAwLTgxNzgtMjQ1ZDFhNmU4Njcwo3B1cqdibG9iX2lk--2755640f1022df0ef1dac394e5092f92a66d0fbf/popular.png"
												alt="Citibank Online"/>
										</div>
									</button>
									<button class="ins_33" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkYjI0MjhhNmItOTIyMy00NDJjLWIwMDktYmM5YjUyMTcyYjNio3B1cqdibG9iX2lk--3f8c742566f864149fc4e640665213a60119bd1f/popular.png"
												alt="Discover"/>
										</div>
									</button>
									<button class="wells_fargo" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkZThlNWU5MmYtMDMwYS00M2Y0LTk0MTEtNGNmYmYzNmU0MThlo3B1cqdibG9iX2lk--5d1af4bdb56556b969f54686022aca67959fbecc/popular.png"
												alt="Wells Fargo"/>
										</div>
									</button>
									<button class="apple" type="button">
										<div class="grid-item">
											<img
												src="https://app.ynab.com/rails/active_storage/blobs/redirect/zICBpl9yYWlsc4KkZGF0YdkkYWZjOGNkZTEtNWI3ZC00ZTcxLWJhZjctYWI4NzIwN2JlZjU1o3B1cqdibG9iX2lk--f2ef867b720f8210dae1061a75d1ea5e491436be/popular.png"
												alt="Apple Wallet"/>
										</div>
									</button>
								</div>
								<div class="divider">
									<span>or</span>
								</div>
								<div class="button-group">
									<button wire:click="showUnlinkedModal" class=" ynab-button secondary is-large" type="button">
										Add an Unlinked Account
									</button>
								</div>
							</div>
							<!-- Sección para agregar cuenta no vinculada -->
							@elseif($currentSection === 2)
								<div class="account-widget-step account-widget-add-unlinked-account account-widget-step-with-help-box">
									<div class="account-widget-header">
										<button aria-label="Back" title="Back" type="button" wire:click="goToSection(1)">
											<svg class="ynab-new-icon icon-back" width="16" height="16">
												<!---->
												<use href="#icon_sprite_chevron_left">
													<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left" fill="none" viewBox="0 0 24 24">
														<path fill="currentColor" fill-rule="evenodd"
															d="M18.7 23.6a2 2 0 0 1-2.1 0L5.3 13a1.4 1.4 0 0 1 0-2L16.6.4a2 2 0 0 1 2 0c.7.6.7 1.5 0 2L8.6 12l10.2 9.6c.6.5.6 1.4 0 2"
															clip-rule="evenodd"></path>
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
											And don’t worry—if you change your mind, you can link your account at any time. </p>
										<div class="y-form-field field-with-error {{ $errors->has('nickname') ? 'has-errors' : '' }}">
											<label>Give it a nickname</label>
											<input id="nickname" class="ember-text-field ember-view y-input name-input user-data" autocomplete="nope" autocorrect="off" spellcheck="false"
												autocapitalize="words" autofocus="" type="text" wire:model.live="nickname">
											<!---->
											<ul class="errors{{ $errors->has('nickname') ? '' : 'warnings' }}">
												@if ($errors->has('nickname'))
													<li>{{ $errors->first('nickname') }}</li>
												@endif
											</ul>
										</div>
										<div class="y-form-field field-with-error">
											<label>
												What type of account are you adding?
											</label>
											<button class="account-type-select-button" type="button" wire:click="selectAccountType" wire:model.live="selectedAccountType">
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
										@if($selectedCategoryGroup !== 'Loans')
											<div class="y-form-field field-with-error  currency-input-group">
												<label>
													What is your current account balance?
												</label>
												<input id="balance" class="ember-text-field ember-view y-input balance-input user-data" autocomplete="nope" autocorrect="off" spellcheck="false"
													autocapitalize="none" inputmode="decimal" type="text" wire:model.live="balance">
												<!---->
											</div>
										@endif
										<!---->
										@if($selectedCategoryGroup === 'Loans')
											<div class="add-unlinked-account-split-row">
												<div class="add-unlinked-account-current-balance">
													<div class="y-form-field field-with-error  currency-input-group">
														<label>
															Current account balance
														</label>
														<input id="balance" class="ember-text-field ember-view y-input current-account-balance-input user-data" autocomplete="nope" autocorrect="off"
															spellcheck="false" autocapitalize="none" inputmode="decimal" type="text" wire:model.live="balance">
														<!---->
													</div>
												</div>
												<div class="add-unlinked-account-interest-rate">
													<div class="y-form-field field-with-error  currency-input-group interest-input-group">
														<label>Interest rate</label>
														<label class="input-icon">%</label>
														<input id="interest" class="ember-text-field ember-view y-input interest-rate-input user-data" autocomplete="nope" autocorrect="off"
															spellcheck="false"
															autocapitalize="none" inputmode="decimal" type="text" wire:model.live="interest">
														<!---->
													</div>
												</div>
											</div>
											<div class="y-form-field field-with-error  currency-input-group">
												<label>
													Monthly payment required by your lender
												</label>
												<input id="payment" class="ember-text-field ember-view y-input minimum-payment-input user-data" autocomplete="nope" autocorrect="off"
													spellcheck="false"
													autocapitalize="none" inputmode="decimal" type="text" wire:model.live="payment">
												<!---->
											</div>
											<div class="y-form-note ">
												<!---->
												<div class="note-container">
													<em>Enter the total amount you are required to pay your lender each month, including principal, interest, escrow, fees, etc.</em>
												</div>
											</div>
											<div class="y-form-note ">
												<!---->
												<div class="note-container">
													<em>You can add extra payments as a target in your budget later.</em>
												</div>
											</div>
										@endif
									
									</div>
									<div class="account-widget-footer">
										<button class="ynab-button primary is-large" @if(!$this->canProceed) disabled
											@endif  wire:click="{{ $selectedCategoryGroup === 'Loans' ? 'planCategory' : 'saveBudgetTracking' }}">
											Next
										</button>
									</div>
								</div>
								<!-- Sección para agregar tipo de cuenta -->
							@elseif($currentSection === 3)
								<div class="account-widget-step account-widget-add-unlinked-account account-widget-step-with-help-box">
									<div class="account-widget-header">
										<button aria-label="Back" title="Back" type="button" wire:click="goToSection(2)">
											<svg class="ynab-new-icon icon-back" width="16" height="16">
												<!---->
												<use href="#icon_sprite_chevron_left">
													<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left" fill="none" viewBox="0 0 24 24">
														<path fill="currentColor" fill-rule="evenodd"
															d="M18.7 23.6a2 2 0 0 1-2.1 0L5.3 13a1.4 1.4 0 0 1 0-2L16.6.4a2 2 0 0 1 2 0c.7.6.7 1.5 0 2L8.6 12l10.2 9.6c.6.5.6 1.4 0 2"
															clip-rule="evenodd"></path>
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
											@foreach($accountTypes as $category => $data)
												<div class="account-type-select-group">
													<h3>{{ $category }}</h3>
													<p>{{ $data['description'] }}</p>
													@foreach($data['accounts'] as $account)
														<button class="account-widget-list-button" data-account-type="{{ $account['data-account-type'] }}"
															wire:click="selectAccount('{{ $account['type'] }}', '{{ $category }}', '{{ $account['data-account-type'] }}')" type="button">
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
								<!-- Sección Optional: Pair a Category -->
							@elseif($currentSection === 4)
								<div class="account-widget-step account-widget-loan-category">
									<div class="account-widget-header">
										<button aria-label="Back" title="Back" type="button" wire:click="goToSection(2)">
											<svg class="ynab-new-icon icon-back" width="16" height="16">
												<!---->
												<use href="#icon_sprite_chevron_left">
													<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left" fill="none" viewBox="0 0 24 24">
														<path fill="currentColor" fill-rule="evenodd"
															d="M18.7 23.6a2 2 0 0 1-2.1 0L5.3 13a1.4 1.4 0 0 1 0-2L16.6.4a2 2 0 0 1 2 0c.7.6.7 1.5 0 2L8.6 12l10.2 9.6c.6.5.6 1.4 0 2"
															clip-rule="evenodd"></path>
													</symbol>
												</use>
											</svg>
										</button>
										<div class="account-widget-header-title">
											<h1>Optional: Pair a Category</h1>
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
										<label>Pair your loan with a budget category</label>
										<p class="pairing-your-account-paragraph">Pairing with a budget category helps better show how your payments will affect your debt. Pairing works best
											when there is
											a one-to-one relationship between your loan account and a budget category.</p>
										<label>Which category do you want to pair your loan with?</label>
										<div class="account-widget-radio-button-list">
											<label class="radio">
												<input name="categoryToPair" autofocus="" aria-label="Select an existing category" type="radio" value="existing"
													{{ $selectedOption === 'existing' ? 'checked' : '' }}wire:click="setOption('existing')" checked>
												<span>
                      <div class="account-widget-loan-category-radio-description">
                        <div class="account-widget-loan-category-radio-description-title">Select an existing category</div>
                        <div class="account-widget-loan-category-radio-description-subtitle">Pair with a category already in your budget</div>
                      </div>
                    </span>
											</label>
											<label class="radio">
												<input name="categoryToPair" aria-label="Create a new category" type="radio" value="new"
													{{ $selectedOption === 'new' ? 'checked' : '' }}wire:click="setOption('new')">
												<span>
                      <div class="account-widget-loan-category-radio-description">
                        <div class="account-widget-loan-category-radio-description-title">Create a new category</div>
                        <div class="account-widget-loan-category-radio-description-subtitle">Pair with a brand new category</div>
                      </div>
                    </span>
											</label>
										</div>
										<!---->
										@if ($selectedOption === 'existing')
											<div class="y-form-field field-with-error">
												<label>Select a category</label>
												<div class="category-select">
													<div class="x-select-container">
														<select wire:model="selectedGroup" wire:input="checkSelection" class="js-x-select type-input account-widget-loan-category-existing-subcategory">
															<!---->
															<option value=""></option>
															@foreach($categoriesByGroup as $group)
																<optgroup label="{{ $group->name }}">
																	@foreach($group->categories as $category)
																		<option value="{{ $category->id }}">
																			{{ $category->name }}
																		</option>
																	@endforeach
																</optgroup>
															@endforeach
														</select>
													</div>
												</div>
												<!---->
											</div>
											<!---->
										@elseif ($selectedOption === 'new')
											<div class="y-form-field field-with-error ">
												<label>Give your category a name</label>
												<input id="nickname" wire:model.live="nickname" class="ember-text-field ember-view y-input account-widget-loan-category-new-subcategory"
													autocomplete="nope"
													autocorrect="off" spellcheck="false" autocapitalize="words" type="text">
												<!---->
											</div>
											<div class="y-form-field field-with-error ">
												<label>Add to category group:</label>
												<div class="category-select">
													<div class="x-select-container  ">
														<select wire:model.live="selectedGroup" wire:input="checkSelection" class="js-x-select type-input account-widget-loan-category-existing-group">
															<!---->
															<option value=""></option>
															<option value="-1">New Category Group</option>
															@foreach($categoriesByGroup as $group)
																<option value="{{ $group->id }}">{{ $group->name }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<!---->
												@if($selectedGroup == -1)
													<div class="y-form-field field-with-error {{ $errors->has('newMasterCategory') ? 'has-errors' : '' }}">
														<label>New category group name</label>
														<input id="newMasterCategory" class="ember-text-field ember-view y-input account-widget-loan-category-new-master-category" autocomplete="nope"
															autocorrect="off" spellcheck="false" autocapitalize="words" type="text" wire:model.live="newMasterCategory">
														<!---->
														<ul class="errors{{ $errors->has('newMasterCategory') ? '' : 'warnings' }}">
															@if ($errors->has('newMasterCategory'))
																<li>{{ $errors->first('newMasterCategory') }}</li>
															@endif
														</ul>
													</div>
												@endif
											</div>
										@endif
										<!---->
									</div>
									<div class="account-widget-footer">
										<button class="ynab-button secondary is-large  skip-pairing" type="button" wire:click="saveMortgageLoans">
											Skip
										</button>
										<button class="ynab-button primary is-large" type="button" @if(!$this->canSubmit) disabled @endif wire:click="saveMortgageLoans">
											Next
										</button>
									</div>
									<!---->
								</div>
								<!-- Sección Success! -->
							@elseif($currentSection === 5)
								<div class="account-widget-step account-widget-success-screen">
									<div class="account-widget-header">
										<div class="hidden-header-button"></div>
										<div class="account-widget-header-title">
											<h1>Add Unlinked Account</h1>
											<!---->
										</div>
										<button aria-label="Close" title="Close" type="button" wire:click="closeBudgetAccount">
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
										<svg class="ynab-new-icon icon-checkmark-circle" width="16" height="16">
											<!---->
											<use href="#icon_sprite_check_circle_fill">
												<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
													<path fill="currentColor"
														d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0"></path>
												</symbol>
											</use>
										</svg>
										<h3>Success!</h3>
										<p>Add transactions on the web or in our mobile apps. You can also download a transaction file from your institution and use <a href="#"
												onclick="return false;"
												target="_blank"
												rel="noopener noreferrer">File-Based
												Import</a>. </p>
									</div>
									<div class="account-widget-footer">
										<button class="ynab-button secondary is-large  js-add-another-account-btn" type="button" wire:click="addAnotherAccount">
											Add Another
										</button>
										<button class="ynab-button primary is-large " type="button" wire:click="closeBudgetAccount">
											Done
										</button>
									</div>
								</div>
								<!---->
							@endif
							<!---->
						</div>
						<!---->
				</div>
			</div>
			<!-- End Modal -->
			@endif
		</div>
		@push('scripts')
			<script>
				//Da el foco a los inputs
				document.addEventListener('DOMContentLoaded', () => {
					window.addEventListener('focusInput', e =>
						setTimeout(() => document.getElementById(e.detail.inputId)?.focus(), 10)
					);
				});
			
			</script>
@endpush


