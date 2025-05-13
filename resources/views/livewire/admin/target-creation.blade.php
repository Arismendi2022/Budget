{{-- Because she competes with no one, no one can compete with her. --}}
<aside class="budget-inspector" style="width: 33%">
	<div class="budget-inspector-resizer">
		<div class="budget-inspector-resizer-indicator">
		</div>
	</div>
	<div class="budget-inspector-content">
		@if($state['isAutoAssign'])
			<div class="budget-breakdown ">
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
				<section class="card budget-breakdown-monthly-totals ">
					<button class="card-roll-up" aria-expanded="true" aria-controls="controls-ember369" type="button">
						<h2 class="ynab-breakdown-available-in-month">
							Available in {{ ucfirst(now()->monthName) }}
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="#icon_sprite_chevron_down">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
											d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z" clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
							<span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span>
						</h2>
					</button>
					<div class="card-body" aria-hidden="false" id="controls-ember369">
						<div class="ynab-breakdown">
							<div tabindex="0" class="ynab-breakdown-leftover-prev-month">
								<div aria-describedby="ember370">
									Left Over from Last Month
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
							</div>
							<div tabindex="0" class="ynab-breakdown-assigned-in-month">
								<div aria-describedby="ember371">
									Assigned in {{ ucfirst(now()->monthName) }}
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
							</div>
							<div tabindex="0" class="ynab-breakdown-activity">
								<div aria-describedby="ember372">
									Activity
								</div>
								<div class="user-data"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
							</div>
						</div>
					</div>
				</section>
				<section class="card budget-breakdown-future-totals future-assignments-update ">
					<button class="card-roll-up" aria-expanded="true" aria-controls="controls-ember104" type="button">
						<h2>
							<!---->
							<span>Assigned in Future Months</span>
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="#icon_sprite_chevron_down"></use>
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
						<button class="inspector-category-edit" aria-label="Edit category: 🛒 Groceries" aria-describedby="ember305" type="button">
							<svg class="ynab-new-icon fill-secondary" width="16" height="16">
								<!---->
								<use href="#icon_sprite_pencil"></use>
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
							<span class="ynab-new-budget-available-number js-budget-available-number user-data zero" title="" aria-disabled="true" disabled="" type="button">
								<span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span>
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
								<div class="user-data" title="{{ currency() }}0.00"><span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></div>
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
				<section class="card target-inspector-card ">
					@if(!$state['isCreateTarget'])
						<div id="ember131" class="ynab-new-inspector-goals">
							<button wire:click="toggleCollapse" class="card-roll-up" aria-expanded="{{ $state['isCollapsed'] ? 'false' : 'true' }}" aria-controls="controls-ember132"
								type="button">
								<h2>
									@if($state['isTargetSuccess'])
										<svg width="16" height="16" viewBox="-1 -1 2 2" class="icon-circle-progress zero" xmlns="http://www.w3.org/2000/svg">
											<defs>
												<clipPath id="icon-circle-progress-clip-ember158">
													<path d="M 1 0 A 1 1 0 0 1 0.9048270524660195 0.4257792915650727 L 0 0"></path>
												</clipPath>
											</defs>
											<circle r=".9" cx="0" cy="0" stroke-width=".2" class="outer"></circle>
											<circle r=".65" cx="0" cy="0" class="inner" clip-path="url(#icon-circle-progress-clip-ember158)"></circle>
										</svg>
									@endif
									Target
									<svg class="ynab-new-icon card-chevron" width="12" height="12">
										<use href="{{ $state['isCollapsed'] ? '#icon_sprite_chevron_right' : '#icon_sprite_chevron_down' }}"></use>
									</svg>
								</h2>
							</button>
							@if(!$state['isTargetSuccess'])
								<div class="card-body" style="{{ $state['isCollapsed'] ? 'display: none;' : '' }}" aria-hidden="{{ $state['isCollapsed'] ? 'true' : 'false' }}"
									id="controls-ember132">
									<div class="target-inspector">
										<div class="view-target-empty-state">
											<strong>How much do you need for {{ $category->name }}?</strong>
											<p>
												When you create a target, we’ll let you know how much money to set aside to stay on track over time.
											</p>
											<button wire:click="showCreateTarget" class="ynab-button secondary   budget-inspector-goals-create" type="button">
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
																	type="text" wire:model.lazy="amount" wire:blur="unsetFocused">
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
																<select wire:model="selectedDayOfWeek" class="js-x-select" aria-label="Select Day of Week"
																	@change="$wire.selectedDayText = $event.target.selectedOptions[0].text">
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
																<select wire:model="selectedDay" class="js-x-select" aria-label="Select Day of Month"
																	@change="$wire.selectedDayText = $event.target.selectedOptions[0].text">
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
																<div id="ember168" class="modal-overlay active modal-account-calendar js-ynab-new-calendar-overlay"
																	wire:click.self="hideModalCalendar">
																	<div class="modal" role="dialog" aria-modal="true" style="top: 647.8px; left: 1271.1px;">
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
																						class="accounts-calendar-day {{ $selectedDate == Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') ? 'accounts-calendar-day-selected' : '' }}"
																						data-date="{{ Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') }}"
																						wire:click="selectDate({{ $day }})">
																						{{ $day }}
																					</li>
																				@endforeach
																			</ul>
																			<div class="modal-actions">
																			</div>
																		</div>
																		<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none"
																			style="left: 100px; bottom: 100%; height: 0.9375rem; width: 1.875rem;">
																			<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform=""></path>
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
																		<div id="asideModal" class="modal-overlay active ynab-new-dropdown-modal" wire:click.self="$set('state.isOpenAsideCustomModal', false)">
																			<div class="modal" role="dialog" aria-modal="true" style="top: 264.8px; left: 1145.2px; height: auto; width: 481.8px;">
																				<div class="js-ynab-modal-scrollable-area" role="listbox" style="overflow: visible;">
																					<button wire:click="updateSelectedTextCustom('Set Aside Another')" class="type-dropdown-option is-selected" role="option"
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
																					<button wire:click="updateSelectedTextCustom('Fill up to')" class="type-dropdown-option " role="option" aria-selected="false"
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
																					<button wire:click="updateSelectedTextCustom('Have a balance of')" class="type-dropdown-option " role="option" aria-selected="false"
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
																					style="top: 100%; left: 225.9px; height: 0.9375rem; width: 1.875rem;">
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
														<!---->
														<div class="ynab-new-inspector-goals-calendar">
															@if($state['isOpenCalendarModal'])
																<div id="ember168" class="modal-overlay active modal-account-calendar js-ynab-new-calendar-overlay"
																	wire:click.self="hideModalCalendar">
																	<div class="modal" role="dialog" aria-modal="true" style="top: 400.4px; left: 1271.1px;">
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
																						class="accounts-calendar-day {{ $selectedDate == Carbon\Carbon::create($currentYear, $currentMonth, $day)->format('Y-m-d') ? 'accounts-calendar-day-selected' : '' }}"
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
													<div class="frequency-repeat">
														<button wire:click="switchToggle" class="ynab-switch {{ $state['isActiveSwitch'] ? 'on' : 'off' }} " role="checkbox" aria-checked="{{ $state['isActiveSwitch'] ?
														'true' :'false' }}"
															type="button">
															<svg class="switch-toggle" xmlns="http://www.w3.org/2000/svg">
																<rect></rect>
																<circle></circle>
															</svg>
															Repeat
														</button>
													</div>
													@if($state['isSwitchRepeat'])
														<dl>
															<dt>
																Every
															</dt>
															<dd class="ynab-new-inspector-goals-repeats-options user-data">
																<div class="x-select-container  ">
																	<select class="js-x-select cadence-frequency-selector" aria-label="Select Interval">
																		<!---->
																		<option value="1">
																			1
																		</option>
																		<option value="2">
																			2
																		</option>
																		<option value="3">
																			3
																		</option>
																		<option value="4">
																			4
																		</option>
																		<option value="5">
																			5
																		</option>
																		<option value="6">
																			6
																		</option>
																		<option value="7">
																			7
																		</option>
																		<option value="8">
																			8
																		</option>
																		<option value="9">
																			9
																		</option>
																		<option value="10">
																			10
																		</option>
																		<option value="11">
																			11
																		</option>
																	</select>
																</div>
																<div class="x-select-container  ">
																	<select class="js-x-select cadence-selector" aria-label="Select Unit of Time">
																		<!---->
																		<option value="1">
																			Month
																		</option>
																		<option value="2">
																			Year
																		</option>
																	</select>
																</div>
															</dd>
														</dl>
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
																		<div id="dropdownModal" class="modal-overlay active ynab-new-dropdown-modal "
																			wire:click.self="$set('state.isOpenAsideModal', false)">
																			<div class="modal" role="dialog" aria-modal="true" style="top: 429.6px; left: 1145.2px; height: auto; width: 481.8px;">
																				<div class="js-ynab-modal-scrollable-area" role="listbox" style="overflow: visible;">
																					<button wire:click="updateSelectedText('Set aside another')" class="type-dropdown-option is-selected" role="option" aria-selected="true"
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
																					<button wire:click="updateSelectedText('Refill up to')" class="type-dropdown-option " role="option" aria-selected="false" type="button">
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
																					style="top: 100%; left: 225.9px; height: 0.9375rem; width: 1.875rem;">
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
										</dl>
									</div>
									<div class="goal-actions">
										<div class="actions">
											<div class="actions-left">
												<button class="ghost-button destructive type-body-large" type="button">
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
												<button wire:click="saveTarget" class="ynab-button primary  " arial-label="Save Target, 0.00, Set aside another <bdi>$</bdi>0.00" type="button">
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
					@if($state['isTargetSuccess'])
						<div class="card-body" aria-hidden="false" id="controls-ember108">
							<div class="target-inspector">
								<div class="target-inspector-header">
									<!---->
									<div class="header-bottom">
										<h2
											class="target-behavior">{{ $selectedFrequency === 'custom' ? $selectedTextCustom : $selectedText }} {{ format_currency($currencyAmount) }}
											@if ($selectedFrequency == 'weekly')
												Each Week
											@elseif ($selectedFrequency == 'monthly')
												Each Month
											@elseif ($selectedFrequency == 'yearly')
												Each Year
											@elseif ($selectedFrequency == 'custom')
												<!-- Nada o texto personalizado para custom -->
											@endif
										</h2>
										<div class="target-by-date">
											@if ($selectedFrequency == 'weekly')
												By {{ $selectedDayText }}
											@elseif ($selectedFrequency == 'monthly')
												By the {{ $selectedDayText }} of the Month
											@elseif ($selectedFrequency == 'yearly')
												By {{ \Carbon\Carbon::createFromFormat('d/m/Y', $formattedDate)->format('M j Y') }}
											@elseif ($selectedFrequency == 'custom')
												By {{ \Carbon\Carbon::createFromFormat('d/m/Y', $formattedDate)->format('M j Y') }}
											@endif
										</div>
									</div>
								</div>
								<hr>
								<div class="donut-container">
									<div class="donut-wrapper">
                    <span class="label">
                        <span class="percent">0</span><span>%</span>
                    </span>
										<div class="donut" style="clip: rect(0px, 1em, 1em, 0.5em);">
											<div class="left half-circle passive" style="transform: rotate(7deg);"></div>
											<div class="right half-circle passive" style="transform: rotate(0deg);"></div>
										</div>
										<div class="shadow"></div>
									</div>
								</div>
								<div class="impact-message warning">
									Assign
									<span class="highlighted">{{ format_currency($currencyAmount) }}</span>
									to meet your target
								</div>
								<div class="target-breakdown">
									<div class="target-breakdown-item">
										<div class="target-breakdown-item-label">Amount to Assign This Month</div>
										<div class="target-breakdown-item-value"><span class="user-data currency tabular-nums positive"><bdi>{{ format_currency($currencyAmount) }}</bdi></span></div>
									</div>
									<div class="target-breakdown-item">
										<div class="target-breakdown-item-label">Assigned So Far</div>
										<div class="target-breakdown-item-value"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
									</div>
									<hr>
									<div class="target-breakdown-item">
										<div class="target-breakdown-item-label">To Go</div>
										<div class="target-breakdown-item-value"><span class="user-data currency tabular-nums positive"><bdi>{{ format_currency($currencyAmount) }}</bdi></span></div>
									</div>
								</div>
								<button class="ynab-button secondary  " type="button">
									Edit Target
								</button>
								<div class="goal-snooze">
									<button class="ynab-switch off " role="checkbox" aria-checked="false" type="button">
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
															clip-rule="evenodd"></path></symbol>
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
				<section class="card budget-breakdown-auto-assign is-collapsed">
					<button class="card-roll-up" aria-expanded="false" aria-controls="controls-ember119" type="button">
						<h2>
							<svg class="ynab-new-icon" width="16" height="16">
								<!---->
								<use href="#icon_sprite_lightning"></use>
							</svg>
							Auto-Assign
							<svg class="ynab-new-icon card-chevron" width="12" height="12">
								<!---->
								<use href="#icon_sprite_chevron_right"></use>
							</svg>
						</h2>
					</button>
					<div class="card-body" aria-hidden="true" id="controls-ember119">
						<!---->
						<div class="inspector-quick-budget">
							<div class="option-groups">
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



