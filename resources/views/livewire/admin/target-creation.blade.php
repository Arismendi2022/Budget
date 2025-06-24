{{-- Because she competes with no one, no one can compete with her. --}}
<aside class="budget-inspector" style="width: 33%">
	<div class="budget-inspector-resizer">
		<div class="budget-inspector-resizer-indicator">
		</div>
	</div>
	<div class="budget-inspector-content">
		@if($state['isAutoAssign'])
			<div class="budget-breakdown ">
				<section class="card {{ $state['isSummaryEnabled'] ? 'is-collapsed' : '' }} ">
					<button wire:click="toggleMonthSummary" class="card-roll-up" aria-expanded="true" aria-controls="controls-ember117" type="button">
						<h2>{{ now()->format('F') }}'s Summary
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="{{ $state['isSummaryEnabled'] ? '#icon_sprite_chevron_right' : '#icon_sprite_chevron_down' }}"></use>
							</svg>
						</h2>
					</button>
					<div class="card-body" aria-hidden="false" id="controls-ember117">
						<div class="ynab-breakdown">
							<div tabindex="0" class="ynab-breakdown-leftover-prev-month" aria-describedby="ember118">
								<div>
									Left Over from Last Month
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
							</div>
							<div tabindex="0" class="ynab-breakdown-assigned-in-month" aria-describedby="ember119">
								<div>
									Assigned in {{ now()->format('F') }}
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>{{ format_currency($totalAssigned) }}</bdi></span></div>
							</div>
							<div tabindex="0" class="ynab-breakdown-activity" aria-describedby="ember120">
								<div>
									Activity
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
							</div>
							<div tabindex="0" class="ynab-breakdown-available" aria-describedby="ember121">
								<div>
                <span class="ynab-breakdown-available-heading">
                  Available</span>
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>{{ format_currency($totalAssigned) }}</bdi></span></div>
							</div>
						</div>
						<div class="cost-to-be-me-summary">
							<div>
								<div class="cost-to-be-me-separator">
								</div>
								<div tabindex="0" class="title">Cost to Be Me</div>
								<div tabindex="0" class="label">
									<span class="description">{{ now()->format('F') }}'s  Targets</span>
									<span class="amount">{{ format_currency($totalMonthlyTarget) }}</span>
								</div>
								<!---->
							</div>
							<div>
								<button class="ynab-button secondary   income-button" type="button">
									Enter your expected income
								</button>
								<div tabindex="0" class="next-month-section">
									<span class="description">Next month's targets could increase your total to $472.79
									</span>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="card budget-breakdown-auto-assign is-collapsed">
					<button class="card-roll-up" aria-expanded="true" aria-controls="controls-ember95" type="button">
						<h2>
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_lightning">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_lightning" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
											d="M19.8 10a1 1 0 0 1-.2 1.2L8.8 23.7a1 1 0 0 1-1.2.2l-.5-.6v-.6l3-8.2h-5l-.5-.2a1 1 0 0 1-.2-1.5L15.2.3a1 1 0 0 1 1.2-.2 1 1 0 0 1 .5 1.2l-3 8.2h5a1 1 0 0 1 .9.6"
											clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							Auto-Assign
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="#icon_sprite_chevron_right">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
											d="M7.4 23.6a1.5 1.5 0 0 1-2 0 1.4 1.4 0 0 1 0-2l10-9.6-10-9.6a1.4 1.4 0 0 1 0-2 1.5 1.5 0 0 1 2 0L18.6 11c.5.6.5 1.4 0 2z" clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
						</h2>
					</button>
					<div class="card-body" aria-hidden="true" id="controls-ember368">
						<div class="inspector-quick-budget">
							<div class="option-groups">
								<div>
									<button wire:click="showAutoAssignModal" class="budget-inspector-button js-focus-on-start underfunded" type="button">
										<div>Underfunded</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
								</div>
								<div>
									<button class="budget-inspector-button  assigned-last month" type="button">
										<div>Assigned Last Month</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  spent-last month" type="button">
										<div>Spent Last Month</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  average-assigned"
										title="Feeling average? Fund all of your categories with your historical average assigned." type="button">
										<div>Average Assigned</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  average-spent"
										title="Assign your historical average spent. Though you're above average in my book." type="button">
										<div>Average Spent</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
								</div>
								<div>
									<button class="budget-inspector-button  set-available amount to zero"
										title="Want to start from zero? Set the available amounts of all of your categories to {{ currency() }}0.00, making the funds ready to assign. It's like a mini Fresh Start!"
										type="button">
										<div>Reset Available Amounts</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  reset-assigned amount"
										title="Reset all assigned amounts for this month, in case you want a do-over." type="button">
										<div>Reset Assigned Amounts</div>
										<div><strong class="user-data" title="{{ currency() }}0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
								</div>
							</div>
						</div>
					</div>
				
				</section>
				<section class="card budget-breakdown-future-totals future-assignments-update {{ $state['isAssignedMonthEnabled'] ? 'is-collapsed' : '' }} ">
					<button wire:click="toogleAssignedMonth" class="card-roll-up" aria-expanded="true" aria-controls="controls-ember104" type="button">
						<h2>
							<!---->
							<span>Assigned in Future Months</span>
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="{{ $state['isAssignedMonthEnabled'] ? '#icon_sprite_chevron_right' : '#icon_sprite_chevron_down' }}"></use>
							</svg>
							<span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span>
						</h2>
					</button>
					<div class="card-body" aria-hidden="false" id="controls-ember104">
						<!---->
						<div class="ynab-breakdown">
							<button class="future-month-button" type="button">
								<div class="future-month-button-interior">
									<div class="month-label">
										<svg width="13" height="13" viewBox="-1 -1 2 2" class="icon-circle-progress zero" xmlns="http://www.w3.org/2000/svg">
											<defs>
												<clipPath id="icon-circle-progress-clip-ember108">
													<path d="M 1 0 A 1 1 0 0 1 0.9048270524660195 0.4257792915650727 L 0 0"></path>
												</clipPath>
											</defs>
											<circle r=".9" cx="0" cy="0" stroke-width=".2" class="outer"></circle>
											<circle r=".65" cx="0" cy="0" class="inner" clip-path="url(#icon-circle-progress-clip-ember108)"></circle>
										</svg>
										<!---->
										<div>{{ ucfirst(now()->addMonth()->monthName) }}</div>
									</div>
									<div class="user-data">
										<span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span>
									</div>
								</div>
							</button>
						</div>
						<!---->
					</div>
				</section>
			</div>
		@else
			<div class="budget-breakdown ">
				<div id="ember304" class="budget-inspector-category-header">
					<div class="budget-inspector-category">
						<div class="inspector-category-name user-data">
							<div class="user-entered-text"><h1>{{ $category->name }}</h1></div>
						</div>
						<button wire:click="openCategoryEditModal({{ $category->id }})" class="inspector-category-edit" aria-label="Edit category: 🛒 Groceries" aria-describedby="ember305"
							type="button">
							<svg class="ynab-new-icon fill-secondary" width="16" height="16">
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
					</div>
					<!---->
				</div>
				<section class="card budget-breakdown-available-balance ">
					<button class="card-roll-up" aria-expanded="true" aria-controls="controls-ember306" type="button">
						<h2>
							Available Balance
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="#icon_sprite_chevron_down"></use>
							</svg>
							<span class="ynab-new-budget-available-number js-budget-available-number user-data {{ $this->statusClass }}" title=""
								aria-disabled="true" disabled="" type="button">
								@if($category->categoryTarget?->amount > 0)
									@if($category->categoryTarget?->progress_data && $category->categoryTarget->progress_data['class'] === 'complete')
										<!-- 100% - SVG con checkmark -->
										<svg width="13" height="13" viewBox="-1 -1 2 2" class="icon-circle-progress complete" xmlns="http://www.w3.org/2000/svg">
											<defs>
												<clipPath id="icon-circle-progress-clip-{{ $category->categoryTarget->id }}">
													<path class="checkmark" transform="scale(.015) rotate(90) translate(-35, -28)"
														d="M62.7217 10.8417L30.1078 58.1502C29.4223 59.1438 28.4948 59.977 27.3909 60.5596C26.2858 61.1429 25.0439 61.454 23.773 61.454C22.5022 61.454 21.2603 61.1429 20.1551 60.5596C19.0513 59.977 18.1247 59.1451 17.4392 58.1515L1.27863 34.7095C0.350892 33.4061 -0.0848857 31.8439 0.0136661 30.2872C0.113302 28.7133 0.756408 27.1933 1.8757 26.0008L1.91649 25.9574L1.95863 25.9151C2.66751 25.2047 3.53559 24.6456 4.50937 24.2916C5.484 23.9373 6.53103 23.8009 7.57331 23.8971C8.61533 23.9933 9.61275 24.3184 10.4957 24.838C11.3768 25.3567 12.1179 26.0535 12.6786 26.8673L23.7732 42.9608L51.3201 3.00222C51.8809 2.18833 52.6235 1.48932 53.5048 0.970699C54.3877 0.451064 55.3851 0.126086 56.4272 0.0299405C57.4695 -0.0662309 58.5165 0.0703119 59.4911 0.424682C60.4648 0.778745 61.3328 1.33782 62.0417 2.04835L62.0837 2.09048L62.1244 2.13382C63.2435 3.32618 63.8866 4.84599 63.9863 6.41967C64.0849 7.97627 63.6493 9.53835 62.7217 10.8417Z"></path>
												</clipPath>
											</defs>
												<circle r=".9" cx="0" cy="0" stroke-width=".2" class="outer"></circle>
												<circle r=".65" cx="0" cy="0" class="inner" clip-path="url(#icon-circle-progress-clip-{{ $category->categoryTarget->id }})"></circle>
										</svg>
									@else
										<!-- SVG normal para progreso -->
										<svg width="13" height="13" viewBox="-1 -1 2 2" class="icon-circle-progress {{ $category->categoryTarget?->progress_data['class'] ?? '' }}"
											xmlns="http://www.w3.org/2000/svg">
											<defs>
												<clipPath id="icon-circle-progress-clip-{{ $category->categoryTarget->id }}">
													<path d="{{ $category->categoryTarget?->progress_data['path'] ?? 'M 1 0 A 1 1 0 0 1 0.9048270524660195 0.4257792915650727 L 0 0' }}"></path>
												</clipPath>
											</defs>
											<circle r=".9" cx="0" cy="0" stroke-width=".2" class="outer"></circle>
											<circle r=".65" cx="0" cy="0" class="inner" clip-path="url(#icon-circle-progress-clip-{{ $category->categoryTarget->id }})"></circle>
									</svg>
									@endif
								@endif
								<span class="user-data currency tabular-nums zero"><bdi>{{ format_currency($category->categoryTarget?->assigned) }}</bdi></span>
							</span>
						</h2>
					</button>
					<div class="card-body" aria-hidden="false" id="controls-ember306">
						<div class="ynab-breakdown">
							<div tabindex="0">
								<div>Cash Left Over From Last Month</div>
								<div class="user-data" title="{{ currency() }}0.00"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
							</div>
							<div tabindex="0">
								<div>
									Assigned This Month
								</div>
								<div class="user-data" title="{{ format_currency($category->categoryTarget?->assigned) }}"><span class="user-data currency tabular-nums positive">{{$category->categoryTarget?->assigned > 0 ? '+' : '' }}<bdi>{{
								format_currency($category->categoryTarget?->assigned) }}</bdi></span>
								</div>
							</div>
							<div tabindex="0">
								<div>Cash Spending</div>
								<div title="{{ currency() }}0.00"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
							</div>
							<div tabindex="0">
								<div>Credit Spending</div>
								<div title="{{ currency() }}0.00"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
							</div>
						</div>
						<!---->
					</div>
				</section>
				<!---->
				<section class="card target-inspector-card {{ $state['isCollapsed'] ? 'is-collapsed' : '' }} ">
					@if(!$state['isCreateTarget'])
						<div id="ember131" class="ynab-new-inspector-goals">
							<button wire:click="toggleGoalTarget" class="card-roll-up" aria-expanded="{{ $state['isCollapsed'] ? 'false' : 'true' }}" aria-controls="controls-ember132"
								type="button">
								<h2>
									@if($state['isSaveSuccessful'])
										@if($category->categoryTarget->progress_data['class'] === 'complete')
											<!-- 100% - SVG con checkmark -->
											<svg width="13" height="13" viewBox="-1 -1 2 2" class="icon-circle-progress complete" xmlns="http://www.w3.org/2000/svg">
												<defs>
													<clipPath id="icon-circle-progress-clip-{{ $category->categoryTarget->id }}">
														<path class="checkmark" transform="scale(.015) rotate(90) translate(-35, -28)"
															d="M62.7217 10.8417L30.1078 58.1502C29.4223 59.1438 28.4948 59.977 27.3909 60.5596C26.2858 61.1429 25.0439 61.454 23.773 61.454C22.5022 61.454 21.2603 61.1429 20.1551 60.5596C19.0513 59.977 18.1247 59.1451 17.4392 58.1515L1.27863 34.7095C0.350892 33.4061 -0.0848857 31.8439 0.0136661 30.2872C0.113302 28.7133 0.756408 27.1933 1.8757 26.0008L1.91649 25.9574L1.95863 25.9151C2.66751 25.2047 3.53559 24.6456 4.50937 24.2916C5.484 23.9373 6.53103 23.8009 7.57331 23.8971C8.61533 23.9933 9.61275 24.3184 10.4957 24.838C11.3768 25.3567 12.1179 26.0535 12.6786 26.8673L23.7732 42.9608L51.3201 3.00222C51.8809 2.18833 52.6235 1.48932 53.5048 0.970699C54.3877 0.451064 55.3851 0.126086 56.4272 0.0299405C57.4695 -0.0662309 58.5165 0.0703119 59.4911 0.424682C60.4648 0.778745 61.3328 1.33782 62.0417 2.04835L62.0837 2.09048L62.1244 2.13382C63.2435 3.32618 63.8866 4.84599 63.9863 6.41967C64.0849 7.97627 63.6493 9.53835 62.7217 10.8417Z">
														</path>
													</clipPath>
												</defs>
												<circle r=".9" cx="0" cy="0" stroke-width=".2" class="outer"></circle>
												<circle r=".65" cx="0" cy="0" class="inner" clip-path="url(#icon-circle-progress-clip-{{ $category->categoryTarget->id }})"></circle>
											</svg>
										@else
											<!-- SVG normal para progreso -->
											<svg width="13" height="13" viewBox="-1 -1 2 2" class="icon-circle-progress {{ $category->categoryTarget?->progress_data['class'] ?? '' }}"
												xmlns="http://www.w3.org/2000/svg">
												<defs>
													<clipPath id="icon-circle-progress-clip-{{ $category->categoryTarget->id }}">
														<path d="{{ $category->categoryTarget?->progress_data['path'] ?? 'M 1 0 A 1 1 0 0 1 0.9048270524660195 0.4257792915650727 L 0 0' }}"></path>
													</clipPath>
												</defs>
												<circle r=".9" cx="0" cy="0" stroke-width=".2" class="outer"></circle>
												<circle r=".65" cx="0" cy="0" class="inner" clip-path="url(#icon-circle-progress-clip-{{ $category->categoryTarget->id }})"></circle>
											</svg>
										@endif
									@endif
									Target
									<svg class="ynab-new-icon card-chevron" width="12" height="12">
										<use href="{{ $state['isCollapsed'] ? '#icon_sprite_chevron_right' : '#icon_sprite_chevron_down' }}"></use>
									</svg>
								</h2>
							</button>
							@if(!$state['isSaveSuccessful'])
								<div class="card-body" aria-hidden="{{ $state['isCollapsed'] ? 'true' : 'false' }}"
									id="controls-ember132">
									<div class="target-inspector">
										<div class="view-target-empty-state">
											<strong>How much do you need for {{ $category->name }}?</strong>
											<p>
												When you create a target, we’ll let you know how much money to set aside to stay on track over time.
											</p>
											<button wire:click="openCreateTarget" class="ynab-button secondary   budget-inspector-goals-create" type="button">
												Create Target
											</button>
										</div>
									</div>
								</div>
							@endif
						</div>
					@else
						<div id="ember308" class="ynab-new-inspector-goals">
							<h2>
								Target
							</h2>
							<div id="ember310" class="ynab-new-inspector-goals-edit-goal {{ $errors->has('currencyAmount') ? 'is-error' : '' }}">
								<div class="budget-inspector-goals-edit-section">
									<div class="goal-body">
										<dl>
											<dd>
												<div class="segmented-control textOnlyOption frequency-group" role="tablist" tabindex="0">
													<button wire:click="setFrequency('weekly')" class="segmented-control-button {{ $selectedFrequency == 'weekly' ? 'selected' : '' }} frequency-group-button"
														aria-selected="{{ $selectedFrequency == 'weekly' ? 'true' : 'false' }}" role="tab"
														tabindex="-1" id="frequency_weekly" type="button">
														Weekly
													</button>
													<button wire:click="setFrequency('monthly')"
														class="segmented-control-button {{ $selectedFrequency == 'monthly' ? 'selected' : '' }} frequency-group-button"
														aria-selected="{{ $selectedFrequency == 'monthly' ? 'true' : 'false' }}" role="tab"
														tabindex="-1" id="frequency_monthly" type="button">
														Monthly
													</button>
													<button wire:click="setFrequency('yearly')" class="segmented-control-button {{ $selectedFrequency == 'yearly' ? 'selected' : '' }} frequency-group-button"
														aria-selected="{{ $selectedFrequency == 'yearly' ? 'true' : 'false' }}" role="tab"
														tabindex="-1" id="frequency_yearly" type="button">
														Yearly
													</button>
													<button wire:click="setFrequency('custom')" class="segmented-control-button {{ $selectedFrequency == 'custom' ? 'selected' : '' }} frequency-group-button"
														aria-selected="{{ $selectedFrequency == 'custom' ? 'true' : 'false' }}" role="tab"
														tabindex="-1" id="frequency_custom" type="button">
														Custom
													</button>
												</div>
												<dl>
													<dt>{{ $selectedFrequency == 'custom' ? 'Amount' : 'I need' }}</dt>
													<dd class="user-data">
														<div id="new-currency" class="ynab-new-currency-input {{ $state['isFocusedInput'] ? 'is-focused is-editing' : '' }} mod-left-aligned text-input">
															<button tabindex="-1" class="button-calculator" aria-hidden="true" type="button">
																<svg class="icon-calculator" viewBox="0 0 16 16">
																	<desc>Clicking this button will open the calculator</desc>
																	<path
																		d="m3.8 0 .5.5v2.3h2.2l.5.5v.5l-.5.5H4.3v2.2l-.5.5h-.5l-.5-.5V4.3H.5L0 3.8v-.5l.5-.5h2.3V.5l.5-.5zM9 3.3l.5-.5h6l.5.5v.5l-.5.5h-6L9 3.8zm3.5 7.7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M9 12.3a.5.5 0 0 1 .5-.6h6a.5.5 0 0 1 .5.6v.4a.5.5 0 0 1-.5.6h-6a.5.5 0 0 1-.5-.6zm-2.8-2.1v.7l-1.6 1.6 1.6 1.6v.7l-.4.4h-.7l-1.6-1.6-1.6 1.6h-.7l-.4-.4v-.7l1.6-1.6L1 10.9v-.7l.3-.4H2l1.6 1.6 1.6-1.6h.7z"></path>
																</svg>
															</button>
															<div class="input-wrapper">
																<input id="target-amount" class="ember-text-field ember-view " title="Target Amount" aria-label="Target Amount" onfocus="this.select()" autofocus=""
																	type="text" wire:model.lazy="targetAmount" wire:blur="unsetFocused">
																<button class="user-data currency tabular-nums zero " wire:click="setFocused">
																	<span><bdi>{{ format_currency($currencyAmount) }}</bdi></span>
																</button>
															</div>
														</div>
														@if($errors->has('currencyAmount'))
															<div class="error-message" title="{{ $errors->first('currencyAmount') }}">
																{{ $errors->first('currencyAmount') }}
															</div>
														@endif
														<!---->
													</dd>
												</dl>
												@if ($selectedFrequency == 'weekly')
													<dl>
														<dt>
															Every
														</dt>
														<dd class="ynab-new-inspector-goals-day-of-week goal-options-select user-data">
															<div class="x-select-container  ">
																<select wire:model="dayOfWeek" class="js-x-select" aria-label="Select Day of Week"
																	@change="$wire.selectedDay = $event.target.selectedOptions[0].text">
																	<!---->
																	<option value="0">
																		Sunday
																	</option>
																	<option value="1">
																		Monday
																	</option>
																	<option value="2">
																		Tuesday
																	</option>
																	<option value="3">
																		Wednesday
																	</option>
																	<option value="4">
																		Thursday
																	</option>
																	<option value="5">
																		Friday
																	</option>
																	<option value="6">
																		Saturday
																	</option>
																</select>
															</div>
														</dd>
													</dl>
												@elseif ($selectedFrequency == 'monthly')
													<dl>
														<dt>
															By
														</dt>
														<dd class="ynab-new-inspector-goals-day-of-month goal-options-select user-data">
															<div class="x-select-container  ">
																<select wire:model="dayOfMonth" class="js-x-select" aria-label="Select Day of Month"
																	@change="$wire.dayOfMonthText = $event.target.selectedOptions[0].text">
																	{!! generateDayOptions() !!}
																</select>
															</div>
														</dd>
													</dl>
												@elseif ($selectedFrequency == 'yearly')
													<dl>
														<dt aria-label="By">
															By
														</dt>
														<dd class="ynab-new-inspector-goals-calendar-select" wire:click="showModalCalendar">
															<div id="ember160" class="date-picker {{ $state['isCalendarVisible'] ? 'calendar-visible' : '' }}">
																<div class="date-picker-input">
																	<input id="ember161" class="ember-text-field ember-view date-picker-input-field user-data" aria-haspopup="true"
																		aria-expanded="false" title="Date" placeholder="DD/MM/YYYY" type="text" value="{{ $formattedDate }}">
																	<button class="date-picker-input-icon-button" tabindex="-1" type="button">
																		<svg class="ynab-new-icon date-picker-input-icon" width="12" height="12">
																			<!---->
																			<use href="#icon_sprite_calendar">
																				<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calendar" fill="none" viewBox="0 0 24 24">
																					<path fill="currentColor" fill-rule="evenodd"
																						d="M7.6 1v2.1c0 .3 0 .6-.3.8l-.8.3-.7-.3-.3-.9V1c0-.3 0-.6.3-.8l.7-.3c.2 0 .6.1.8.3s.3.5.3.7M24 4.2v17.7q0 .9-.6 1.5c-.6.6-1 .6-1.6.6H2.2c-.6 0-1.2-.2-1.6-.6a2 2 0 0 1-.6-1.5V4.2q0-.9.6-1.5c.6-.6 1-.6 1.6-.6h1.6l.4.1.2.4V3c0 .6.1 1 .5 1.5s.9.6 1.4.7A2 2 0 0 0 8 4.7l.5-.7.2-.9v-.5l.2-.4.4-.1h5.4l.4.1.2.4V3c0 .6.2 1 .5 1.5.4.4.9.6 1.4.7a2 2 0 0 0 1.7-.5 2 2 0 0 0 .7-1.6v-.5l.2-.4.4-.1h1.6c.6 0 1.2.2 1.6.6s.6 1 .6 1.5m-2.7 6.2H2.7l-.4.2-.1.4v10.4l.1.4.4.1h18.6l.4-.1.1-.4V11l-.1-.4zM17.5 0c.2 0 .5.1.7.3s.3.5.3.7v2.1c0 .3 0 .6-.3.8l-.7.3c-.3 0-.6-.1-.8-.3l-.3-.8v-2c0-.3 0-.6.3-.8s.5-.3.8-.3"
																						clip-rule="evenodd"></path>
																				</symbol>
																			</use>
																		</svg>
																	</button>
																</div>
																<!---->
															</div>
														</dd>
														<div class="ynab-new-inspector-goals-calendar">
															@if($state['isOpenCalendarModal'])
																<div id="calendarModal" class="modal-overlay active modal-account-calendar js-ynab-new-calendar-overlay"
																	wire:click.self="hideModalCalendar">
																	<div class="modal" role="dialog" aria-modal="true" style="top: 329.4px; left: 937.367px;">
																		<div class="accounts-calendar">
																			<ul class="accounts-calendar-date">
																				<li class="accounts-calendar-prev">
																					<button class="ghost-button primary is-icon-only type-body" aria-label="Previous month" type="button" wire:click="previousMonth">
																						<svg class="ynab-new-icon" width="24" height="24">
																							<use href="#icon_sprite_chevron_left_circle"></use>
																						</svg>
																					</button>
																				</li>
																				<li class="accounts-calendar-selected-date">
																					{{ $monthName }}
																				</li>
																				<li class="accounts-calendar-next">
																					<button class="ghost-button primary is-icon-only type-body" aria-label="Next month" type="button" wire:click="nextMonth">
																						<svg class="ynab-new-icon" width="24" height="24">
																							<use href="#icon_sprite_chevron_right_circle"></use>
																						</svg>
																					</button>
																				</li>
																			</ul>
																			<ul class="accounts-calendar-weekdays">
																				<li>Su</li>
																				<li>Mo</li>
																				<li>Tu</li>
																				<li>We</li>
																				<li>Th</li>
																				<li>Fr</li>
																				<li>Sa</li>
																			</ul>
																			<ul class="accounts-calendar-grid">
																				@for ($i = 0; $i < $firstDayOfMonth; $i++)
																					<li class="accounts-calendar-empty" data-date="">
																						&nbsp;
																					</li>
																				@endfor
																				@foreach ($daysInMonth as $day)
																					<li
																						class="accounts-calendar-day {{ $targetFinishDate == Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') ? 'accounts-calendar-day-selected' : '' }}"
																						data-date="{{ Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') }}"
																						wire:click="selectDate({{ $day }})">
																						{{ $day }}
																					</li>
																				@endforeach
																			</ul>
																			<div class="modal-actions">
																			</div>
																		</div>
																		<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none" style="top: 100%; left: 113px; height: 0.9375rem; width: 1.875rem;">
																			<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="rotate(180 50 50)"></path>
																		</svg>
																	</div>
																</div>
															@endif
														</div>
													</dl>
												@elseif ($selectedFrequency == 'custom')
													<dl>
														<dt>I want to</dt>
														<dd>
															<div class="type-dropdown target-behavior-dropdown">
																<div id="ember160" class="ynab-new-dropdown js-ynab-new-dropdown {{ $state['isOpenAsideCustomModal'] ? 'is-dropdown-showing' : '' }}">
																	<button wire:click="showAsideCustomModal" class="ynab-new-dropdown-container js-ynab-new-dropdown-container user-data" aria-haspopup="true"
																		aria-expanded="true" aria-label="I want to, Popup button collapsed, Set aside <bdi>$</bdi>0.00 selected" title="I want to" type="button">
																		<span>{{ $selectedTextCustom }} <bdi>{{ format_currency($currencyAmount) }}</bdi></span>
																		<svg class="ynab-new-icon" width="9" height="9">
																			<use href="#icon_sprite_caret_down"></use>
																		</svg>
																	</button>
																	<!---->
																	@if($state['isOpenAsideCustomModal'])
																		<div id="asideCustomModal" class="modal-overlay active ynab-new-dropdown-modal" wire:click.self="$set('state.isOpenAsideCustomModal', false)">
																			<div class="modal" role="dialog" aria-modal="true" style="top: 226px; left: 887.533px; height: auto; width: 355.667px;">
																				<div class="js-ynab-modal-scrollable-area" role="listbox" style="overflow: visible;">
																					<button wire:click="updateSelectedTextCustom('Set aside','set-aside')" class="type-dropdown-option is-selected" role="option"
																						aria-selected="true"
																						type="button">
																						<div class="type-dropdown-label">
																							<div class="type-dropdown-label-title">
																								<svg class="ynab-new-icon type-dropdown-icon" width="16" height="16">
																									<use href="#icon_sprite_check_circle_fill"></use>
																								</svg>
																								<strong>Set aside
																									<span><bdi>{{ format_currency($currencyAmount) }}</bdi></span>
																								</strong>
																							</div>
																							<em>Use for: bills, subscriptions, saving over time</em>
																							<div class="type-dropdown-label-tagline ">
																								Add
																								<span><bdi>{{ format_currency($currencyAmount) }}</bdi></span> to this category, regardless of its current balance.
																							</div>
																						</div>
																					</button>
																					<hr class="dropdown-divider">
																					<button wire:click="updateSelectedTextCustom('Fill up to','refill')" class="type-dropdown-option " role="option" aria-selected="false"
																						type="button">
																						<div class="type-dropdown-label">
																							<div class="type-dropdown-label-title">
																								<strong>Fill up to
																									<span><bdi>{{ format_currency($currencyAmount) }}</bdi></span></strong>
																							</div>
																							<em>Use for: gasoline, fun money, dining out</em>
																							<div class="type-dropdown-label-tagline ">
																								Use what is already in this category and fill it up to
																								<span><bdi>{{ format_currency($currencyAmount) }}</bdi></span>
																							</div>
																						</div>
																					</button>
																					<hr class="dropdown-divider">
																					<button wire:click="updateSelectedTextCustom('Have a balance of','have')" class="type-dropdown-option " role="option"
																						aria-selected="false"
																						type="button">
																						<div class="type-dropdown-label">
																							<div class="type-dropdown-label-title">
																								<strong>Have a balance of
																									<span><bdi>{{ format_currency($currencyAmount) }}</bdi></span></strong>
																							</div>
																							<em>Use for: long-term savings</em>
																							<div class="type-dropdown-label-tagline ">
																								Reach this amount by a specific time and refrain from spending until you reach it.
																							</div>
																						</div>
																					</button>
																					<hr class="dropdown-divider">
																				</div>
																				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none"
																					style="top: 100%; left: 162.834px; height: 0.9375rem; width: 1.875rem;">
																					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="rotate(180 50 50)"></path>
																				</svg>
																			</div>
																		</div>
																	@endif
																</div>
															</div>
														</dd>
													</dl>
													<dl>
														@if($selectedOptionType != 'have')
															<dt aria-label="Due on">
																Due on
															</dt>
															<dd class="ynab-new-inspector-goals-calendar-select" wire:click="showModalCalendar">
																<div id="ember160" class="date-picker {{ $state['isCalendarVisible'] ? 'calendar-visible' : '' }}">
																	<div class="date-picker-input">
																		<input id="ember161" class="ember-text-field ember-view date-picker-input-field user-data" aria-haspopup="true"
																			aria-expanded="false" title="Date" placeholder="DD/MM/YYYY" type="text" value="{{ $formattedDate }}">
																		<button class="date-picker-input-icon-button" tabindex="-1" type="button">
																			<svg class="ynab-new-icon date-picker-input-icon" width="12" height="12">
																				<!---->
																				<use href="#icon_sprite_calendar">
																					<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_calendar" fill="none" viewBox="0 0 24 24">
																						<path fill="currentColor" fill-rule="evenodd"
																							d="M7.6 1v2.1c0 .3 0 .6-.3.8l-.8.3-.7-.3-.3-.9V1c0-.3 0-.6.3-.8l.7-.3c.2 0 .6.1.8.3s.3.5.3.7M24 4.2v17.7q0 .9-.6 1.5c-.6.6-1 .6-1.6.6H2.2c-.6 0-1.2-.2-1.6-.6a2 2 0 0 1-.6-1.5V4.2q0-.9.6-1.5c.6-.6 1-.6 1.6-.6h1.6l.4.1.2.4V3c0 .6.1 1 .5 1.5s.9.6 1.4.7A2 2 0 0 0 8 4.7l.5-.7.2-.9v-.5l.2-.4.4-.1h5.4l.4.1.2.4V3c0 .6.2 1 .5 1.5.4.4.9.6 1.4.7a2 2 0 0 0 1.7-.5 2 2 0 0 0 .7-1.6v-.5l.2-.4.4-.1h1.6c.6 0 1.2.2 1.6.6s.6 1 .6 1.5m-2.7 6.2H2.7l-.4.2-.1.4v10.4l.1.4.4.1h18.6l.4-.1.1-.4V11l-.1-.4zM17.5 0c.2 0 .5.1.7.3s.3.5.3.7v2.1c0 .3 0 .6-.3.8l-.7.3c-.3 0-.6-.1-.8-.3l-.3-.8v-2c0-.3 0-.6.3-.8s.5-.3.8-.3"
																							clip-rule="evenodd"></path>
																					</symbol>
																				</use>
																			</svg>
																		</button>
																	</div>
																	<!---->
																</div>
															</dd>
														@endif
														<!---->
														<div class="ynab-new-inspector-goals-calendar">
															@if($state['isOpenCalendarModal'])
																<div id="calendarCustomModal" class="modal-overlay active modal-account-calendar js-ynab-new-calendar-overlay"
																	wire:click.self="hideModalCalendar">
																	<div class="modal" role="dialog" aria-modal="true" style="top: 396.4px; left: 937.367px; height: auto;">
																		<div class="accounts-calendar">
																			<ul class="accounts-calendar-date">
																				<li class="accounts-calendar-prev">
																					<button class="ghost-button primary is-icon-only type-body" aria-label="Previous month" type="button" wire:click="previousMonth">
																						<svg class="ynab-new-icon" width="24" height="24">
																							<use href="#icon_sprite_chevron_left_circle"></use>
																						</svg>
																					</button>
																				</li>
																				<li class="accounts-calendar-selected-date">
																					{{ $monthName }}
																				</li>
																				<li class="accounts-calendar-next">
																					<button class="ghost-button primary is-icon-only type-body" aria-label="Next month" type="button" wire:click="nextMonth">
																						<svg class="ynab-new-icon" width="24" height="24">
																							<use href="#icon_sprite_chevron_right_circle"></use>
																						</svg>
																					</button>
																				</li>
																			</ul>
																			<ul class="accounts-calendar-weekdays">
																				<li>Su</li>
																				<li>Mo</li>
																				<li>Tu</li>
																				<li>We</li>
																				<li>Th</li>
																				<li>Fr</li>
																				<li>Sa</li>
																			</ul>
																			<ul class="accounts-calendar-grid">
																				@for ($i = 0; $i < $firstDayOfMonth; $i++)
																					<li class="accounts-calendar-empty" data-date="">
																						&nbsp;
																					</li>
																				@endfor
																				@foreach ($daysInMonth as $day)
																					<li
																						class="accounts-calendar-day {{ $targetFinishDate == Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') ? 'accounts-calendar-day-selected' : '' }}"
																						data-date="{{ Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') }}"
																						wire:click="selectDate({{ $day }})">
																						{{ $day }}
																					</li>
																				@endforeach
																			</ul>
																			<div class="modal-actions">
																			</div>
																		</div>
																		<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none" style="top: 100%; left: 100px; height: 0.9375rem; width: 1.875rem;">
																			<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="rotate(180 50 50)"></path>
																		</svg>
																	</div>
																</div>
															@endif
														</div>
													</dl>
													@if($selectedOptionType != 'have')
														<div class="frequency-repeat">
															<button wire:click="toggleRepeat" class="ynab-switch {{ $state['isRepeatEnabled'] ? 'on' : 'off' }} " role="checkbox" aria-checked="{{ $state['isRepeatEnabled'] ?
														'true' :'false' }}"
																type="button">
																<svg class="switch-toggle" xmlns="http://www.w3.org/2000/svg">
																	<rect></rect>
																	<circle></circle>
																</svg>
																Repeat
															</button>
														</div>
														@if($state['isRepeatEnabled'])
															<dl>
																<dt>
																	Every
																</dt>
																<dd class="ynab-new-inspector-goals-repeats-options user-data">
																	<div class="x-select-container  ">
																		<select wire:model.live="cadenceFrequency" class="js-x-select cadence-frequency-selector" aria-label="Select Interval">
																			<!---->
																			@foreach($frequencyOptions as $option)
																				<option value="{{ $option }}">{{ $option }}</option>
																			@endforeach
																		</select>
																	</div>
																	<div class="x-select-container  ">
																		<select wire:model.live="cadenceUnit" class="js-x-select cadence-selector" aria-label="Select Unit of Time">
																			<!---->
																			@foreach($this->getUnitOptions() as $value => $label)
																				<option value="{{ $value }}">{{ $label }}</option>
																			@endforeach
																		</select>
																	</div>
																</dd>
															</dl>
														@endif
													@elseif($selectedOptionType === 'have')
														<div class="goal-due-by-date-switch">
															<button wire:click="toggleDateFilter" class="ynab-switch {{ $state['isDateFilterEnabled'] ? 'on' : 'off' }} " role="checkbox" aria-checked="{{
															$state['isDateFilterEnabled'] ?
														'true' :'false' }}" type="button">
																<svg class="switch-toggle" xmlns="http://www.w3.org/2000/svg">
																	<rect></rect>
																	<circle></circle>
																</svg>
																Due by date
															</button>
														</div>
													@endif
												@endif
												@if($selectedFrequency != 'custom')
													<dl>
														<dt>{{ $selectedFrequency === 'yearly' ? 'Next year I want to' : 'Next month I want to' }}</dt>
														<dd>
															<div class="type-dropdown target-behavior-dropdown">
																<div id="ember313" class="ynab-new-dropdown js-ynab-new-dropdown {{ $state['isOpenAsideModal'] ? 'is-dropdown-showing' : '' }}">
																	<button wire:click="showNextMonthModal" class="ynab-new-dropdown-container js-ynab-new-dropdown-container user-data" aria-haspopup="true"
																		aria-expanded="true"
																		aria-label="undefined, Popup button collapsed, Set aside another <bdi>$</bdi>0.00 selected" type="button">
																		<span>{{ $selectedText }} <bdi>{{ format_currency($currencyAmount) }} {{ $selectedFrequency === 'weekly' ? '/week' : '' }}</bdi></span>
																		<svg class="ynab-new-icon" width="9" height="9">
																			<!---->
																			<use href="#icon_sprite_caret_down"></use>
																		</svg>
																	</button>
																	@if($state['isOpenAsideModal'])
																		<div id="asideModal" class="modal-overlay active ynab-new-dropdown-modal "
																			wire:click.self="$set('state.isOpenAsideModal', false)">
																			<div class="modal" role="dialog" aria-modal="true" style="top: 409.8px; left: 887.533px; height: auto; width: 355.667px;">
																				<div class="js-ynab-modal-scrollable-area" role="listbox" style="overflow: visible;">
																					<button wire:click="updateSelectedText('Set aside another','set-aside')" class="type-dropdown-option is-selected" role="option"
																						aria-selected="true"
																						type="button">
																						<div class="type-dropdown-label">
																							<div class="type-dropdown-label-title">
																								<svg class="ynab-new-icon type-dropdown-icon" width="16" height="16">
																									<!---->
																									<use href="#icon_sprite_check_circle_fill">
																										<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
																											<path fill="currentColor"
																												d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0"></path>
																										</symbol>
																									</use>
																								</svg>
																								<strong>Set aside another
																									<bdi>{{ format_currency($currencyAmount) }}</bdi>
																								</strong>
																							</div>
																							<em>Use for: bills, subscriptions, saving over time</em>
																							<div class="type-dropdown-label-tagline callout">
																								Most people choose this
																							</div>
																						</div>
																					</button>
																					<hr class="dropdown-divider">
																					<button wire:click="updateSelectedText('Refill up to','refill')" class="type-dropdown-option " role="option"
																						aria-selected="false" type="button">
																						<div class="type-dropdown-label">
																							<div class="type-dropdown-label-title">
																								<!---->
																								<strong>Refill up to
																									<bdi>{{ format_currency($currencyAmount) }}</bdi>
																								</strong>
																							</div>
																							<em>Use for: gasoline, fun money, dining out</em>
																							<div class="type-dropdown-label-tagline ">
																								Sets a Target to have
																								<bdi>{{ format_currency($currencyAmount) }}</bdi>
																								on hand each month. Whatever you don't spend will get applied toward next month's
																								<bdi>{{ format_currency($currencyAmount) }}</bdi>
																							</div>
																						</div>
																					</button>
																					<hr class="dropdown-divider">
																				</div>
																				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none"
																					style="top: 100%; left: 162.834px; height: 0.9375rem; width: 1.875rem;">
																					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="rotate(180 50 50)"></path>
																				</svg>
																			</div>
																		</div>
																	@endif
																</div>
															</div>
														</dd>
													</dl>
												@endif
											</dd>
											@if($state['isDateFilterEnabled'])
												<dt aria-label="Due on">
													Due on
												</dt>
												<dd>
													<div class="ynab-new-inspector-goals-month-year">
														<div class="x-select-container goal-target-month ">
															<select wire:model="selectedMonth" class="js-x-select" aria-label="Select Month">
																<!---->
																<option value="0">
																	January
																</option>
																<option value="1">
																	February
																</option>
																<option value="2">
																	March
																</option>
																<option value="3">
																	April
																</option>
																<option value="4">
																	May
																</option>
																<option value="5">
																	June
																</option>
																<option value="6">
																	July
																</option>
																<option value="7">
																	August
																</option>
																<option value="8">
																	September
																</option>
																<option value="9">
																	October
																</option>
																<option value="10">
																	November
																</option>
																<option value="11">
																	December
																</option>
															</select>
														</div>
														<div class="x-select-container goal-target-year ">
															<select wire:model="selectedYear" name="target_year" class="js-x-select" aria-label="Select Year">
																@foreach(years_range() as $year => $yearValue)
																	<option value="{{ $year }}">{{ $yearValue }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</dd>
											@endif
										</dl>
									</div>
									<div class="goal-actions">
										<div class="actions">
											<div class="actions-left">
												<button wire:click="deleteTarget({{ $category->categoryTarget->id ?? 0 }})" class="ghost-button destructive type-body-large" type="button">
													<svg class="ynab-new-icon" width="16" height="16">
														<!---->
														<use href="#icon_sprite_trash_can"></use>
													</svg>
													Delete
												</button>
											</div>
											<div class="actions-right">
												<button wire:click="cancelCreateTarget" class="ghost-button primary type-body-large" type="button">
													Cancel
												</button>
												<button
													wire:click="{{ $isUpdateTargetMode && $category->categoryTarget ? 'updateTarget(' . $category->categoryTarget->id . ')' : 'saveTarget(' . $category->id .
													')' }}"
													class="ynab-button primary  "
													arial-label="Save Target, 0.00, Set aside another <bdi>$</bdi>0.00"
													type="button">
													Save Target
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					@endif
					<!-- Mostrar éxito después de guardar -->
					@if($state['isSaveSuccessful'])
						<div class="card-body" aria-hidden="false" id="controls-ember113">
							<div class="target-inspector">
								@php
									$targetData = $this->getCategoryTargetData($category->categoryTarget?->id);
								@endphp
									<!---->
								<div class="target-inspector-header">
									<!---->
									<div class="header-bottom">
										<h2 class="target-behavior">{{ $targetData['target_behavior'] }}</h2>
										<div class="target-by-date">{{ $targetData['target_by_date'] }}</div>
									</div>
								</div>
								<hr>
								<!---->
								<div class="donut-container">
									<div class="donut-wrapper">
										@if($targetData['show_label'])
											<span class="label">
												<span class="percent">{{ $targetData['percentage'] }}</span><span>%</span>
											</span>
										@endif
										@if($targetData['show_icon'])
											<svg class="ynab-new-icon progress-complete-icon" width="16" height="16">
												<use href="#icon_sprite_check_circle_fill">
													<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
														<path fill="currentColor"
															d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0"></path>
													</symbol>
												</use>
											</svg>
										@endif
										<div class="donut" style="{{ $targetData['clip_style'] }}">
											<div class="left half-circle {{ $targetData['css_class'] }}" style="transform: rotate({{ $targetData['left_rotation'] }}deg);"></div>
											<div class="right half-circle {{ $targetData['css_class'] }}" style="transform: rotate({{ $targetData['right_rotation'] }}deg);"></div>
										</div>
										<div class="shadow"></div>
									</div>
								</div>
								<!---->
								@if($targetData['show_label'])
									<div class="impact-message warning">
										Assign
										<span class="highlighted">{{ format_currency($targetData['to_assing']) }}
											{{ $category->categoryTarget->assigned > 0 ? ' more' : '' }}
										</span>
										{{ $targetData['target_message'] }}
									</div>
								@else
									<div class="impact-message positive">
										You've met your target!
									</div>
								@endif
								<!---->
								<div class="target-breakdown">
									<div class="target-breakdown-item">
										<div class="target-breakdown-item-label">{{ $targetData['to_label'] }}</div>
										<div class="target-breakdown-item-value"><span
												class="user-data currency tabular-nums positive"><bdi>{{ format_currency($targetData['to_amount']) }}</bdi></span></div>
									</div>
									<div class="target-breakdown-item">
										<div class="target-breakdown-item-label">{{ $targetData['so_label'] }}</div>
										<div class="target-breakdown-item-value"><span
												class="user-data currency tabular-nums zero"><bdi>{{ format_currency($targetData['so_far']) }}</bdi></span></div>
									</div>
									<hr>
									<div class="target-breakdown-item">
										<div class="target-breakdown-item-label">To Go</div>
										<div class="target-breakdown-item-value"><span
												class="user-data currency tabular-nums positive"><bdi>{{ format_currency($targetData['to_go']) }}</bdi></span></div>
									</div>
								</div>
								<button wire:click="openEditTargetForm({{ $category->categoryTarget?->id ?? '' }})" class="ynab-button secondary  "
									type="button">
									Edit Target
								</button>
								<div class="goal-snooze">
									<button wire:click="toogleSnooze" class="ynab-switch {{ $state['isSnoozeEnabled'] ? 'on' : 'off' }}" role="checkbox" aria-checked="{{ $state['isSnoozeEnabled'] ? 'true' :
										'false' }}" type="button">
										<svg class="switch-toggle" xmlns="http://www.w3.org/2000/svg">
											<rect></rect>
											<circle></circle>
										</svg>
										Snooze target for this month
										<span class="info-icon-tooltip" aria-describedby="ember159">
											<a href="#">
												<svg class="ynab-new-icon" width="16" height="16">
													<!---->
													<use href="#icon_sprite_question_mark_circle">
														<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_question_mark_circle" fill="none" viewBox="0 0 24 24"><path fill="currentColor"
																fill-rule="evenodd"
																d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m0-22a10 10 0 1 0 0 20 10 10 0 0 0 0-20m1.1 12-.5.5h-1.1L11 14c0-3.3 2.8-3 2.8-5.5 0-.8-1-1.5-1.9-1.5-1 0-2 .7-2 1.5l.2.8a.5.5 0 0 1-.5.7h-1l-.5-.4L8 8.5C8 6.5 9.8 5 12 5s4 1.6 4 3.5c0 3.2-2.9 3-2.9 5.5M12 16a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 12 16"
																clip-rule="evenodd"></path>
														</symbol>
													</use>
												</svg>
											</a>
        						</span>
									</button>
								</div>
								<!---->
							</div>
						</div>
					@endif
				</section>
				<!---->
				<section class="card budget-breakdown-auto-assign {{ !$state['isAutoAssignEnabled'] ? 'is-collapsed' : '' }}">
					<button wire:click="toogleAutoAssign" class="card-roll-up" aria-expanded="false" aria-controls="controls-ember119" type="button">
						<h2>
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_lightning"></use>
							</svg>
							Auto-Assign
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="{{ !$state['isAutoAssignEnabled'] ? '#icon_sprite_chevron_right' : '#icon_sprite_chevron_down' }}">
								</use>
							</svg>
						</h2>
					</button>
					<div class="card-body" aria-hidden="false" id="controls-ember106">
						<!---->
						<div class="inspector-quick-budget">
							<div class="option-groups">
								<div>
									<button class="budget-inspector-button js-focus-on-start underfunded" type="button">
										<div>Underfunded</div>
										<div><strong class="user-data" title="$100.00"><span class="user-data currency tabular-nums positive"><bdi>$</bdi>100.00</span></strong></div>
									</button>
								</div>
								<div>
									<button class="budget-inspector-button  assigned-last month" type="button">
										<div>Assigned Last Month</div>
										<div><strong class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  spent-last month" type="button">
										<div>Spent Last Month</div>
										<div><strong class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  average-assigned" title="Feeling average? Fund all of your categories with your historical average assigned."
										type="button">
										<div>Average Assigned</div>
										<div><strong class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  average-spent" title="Assign your historical average spent. Though you're above average in my book." type="button">
										<div>Average Spent</div>
										<div><strong class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></strong></div>
									</button>
								</div>
								<div>
									<button class="budget-inspector-button  set-available amount to zero"
										title="Want to start from zero? Set the available amounts of all of your categories to $0.00, making the funds ready to assign. It's like a mini Fresh Start!"
										type="button">
										<div>Reset Available Amount</div>
										<div><strong class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  reset-assigned amount" title="Reset all assigned amounts for this month, in case you want a do-over." type="button">
										<div>Reset Assigned Amount</div>
										<div><strong class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></strong></div>
									</button>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!---->
				<section class="card  ">
					<div class="inspector-notes ">
						<h2>Notes</h2>
						<p class="inspector-category-note user-data">
							Enter a note...
						</p>
					</div>
				</section>
			</div>
		@endif
	</div>
	{{-- modal --}}
	@if($state['isOpenModalAssign'])
		<div class="auto-assign-confirmation">
			<div id="auto_assign" class="modal-overlay active modal-fresh mod-skinny auto-assign-preview is-centered">
				<div class="modal" role="dialog" aria-modal="true">
					<div class="modal-fresh-header">
						<div class="modal-fresh-title">
							Auto-Assign Preview: Underfunded
						</div>
						<button wire:click="hidenAutoAssignModal" class="modal-fresh-close" aria-label="Close" title="Close" type="button">
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
					<div class="modal-fresh-body scrollable">
						<div class="auto-assign-preview-funding-groups">
							<div class="auto-assign-preview-funding-group">
								<div class="auto-assign-preview-funding-banner mod-positive">
									<!---->
									<svg class="ynab-new-icon icon-checkmark" width="24" height="24">
										<use href="#icon_sprite_check_circle_fill">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
												<path fill="currentColor"
													d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0">
												</path>
											</symbol>
										</use>
									</svg>
									<!---->
									<p>
										You have already fully funded this month.
									</p>
								</div>
								<!---->
							</div>
						</div>
						<div class="auto-assign-preview-detail-text">
							This is a good thing! You can now assign money to a future month or manually assign more money this month.
						</div>
					</div>
					<div class="modal-fresh-footer with-top-border">
						<button class="ynab-button secondary  " type="button">
							Go to Next Month
						</button>
						<button wire:click="hidenAutoAssignModal" class="ynab-button primary  " type="button">
							OK
						</button>
					</div>
					<!---->
				</div>
			</div>
		</div>
	@endif
</aside>

@push('scripts')
	<script>

		$(function () {
			window.addEventListener('focusInput', function () {
				setTimeout(function () {
					$('#target-amount').focus();
				}, 10); // Retraso de 10 ms
			});
		});

		/**
		 * Ajusta modales según el estado de la barra lateral
		 */
		const updateModals = () => {
			const collapsed = document.getElementById("sidebar")?.classList.contains("sidebar-resized-collapsed");

			// Actualiza el modal principal
			const modalOverlay = document.querySelector(".ynab-new-dropdown-modal");
			if (modalOverlay) {
				const modal = modalOverlay.querySelector(".modal");
				const arrow = modalOverlay.querySelector(".modal-arrow");

				if (modal) {
					modal.style.left = collapsed ? "1281.88px" : "1145.2px";
					modal.style.width = collapsed ? "549.117px" : "481.8px";
				}
				if (arrow) arrow.style.left = collapsed ? "259.559px" : "225.9px";
			}

			// Actualiza asideModal
			const asideModalContent = document.getElementById("asideModal")?.querySelector(".modal");
			if (asideModalContent) asideModalContent.style.top = collapsed ? "281.1px" : "264.8px";

			// Actualiza el modal del calendario
			const calendarModal = document.querySelector(".js-ynab-new-calendar-overlay");
			if (calendarModal) {
				const calendarModalContent = calendarModal.querySelector(".modal");
				if (calendarModalContent) {
					calendarModalContent.style.left = collapsed ? "1428.45px" : "1271.1px";
				}
			}
		};

		// Observer y eventos
		new MutationObserver(() => {
			if (document.querySelector(".ynab-new-dropdown-modal") ||
				document.getElementById("asideModal") ||
				document.querySelector(".js-ynab-new-calendar-overlay")) {
				updateModals();
			}
		}).observe(document.body, {childList: true, subtree: true});
		document.addEventListener("livewire:load", updateModals);
		window.addEventListener("livewire:update", updateModals);

		// Script para solucionar el problema de enfoque del input de divisa al hacer clic en otros elementos
		document.addEventListener('click', function (event) {
			// Solo ejecutar cuando el elemento está enfocado
			if (!document.querySelector('.is-focused.is-editing')) return;

			// Si el clic no fue en el componente de divisa
			if (!event.target.closest('#new-currency')) {
				// Obtener el elemento de input
				const input = document.getElementById('target-amount');
				if (input) {
					// Disparar evento blur manualmente
					input.dispatchEvent(new Event('blur'));
				}
			}
		});
	
	</script>
@endpush



