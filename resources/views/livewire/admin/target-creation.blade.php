{{-- Because she competes with no one, no one can compete with her. --}}
<aside class="budget-inspector" style="width: 33%">
	<div class="budget-inspector-resizer">
		<div class="budget-inspector-resizer-indicator">
		</div>
	</div>
	<div class="budget-inspector-content">
		<div class="budget-breakdown">
			<div id="ember182" class="budget-inspector-category-header">
				<div class="budget-inspector-category">
					<div class="inspector-category-name user-data">
						<div class="user-entered-text"><h1>💻 Internet</h1></div>
					</div>
					<button class="inspector-category-edit" aria-label="Edit category: 💻 Internet" aria-describedby="ember183" type="button">
						<svg class="ynab-new-icon fill-secondary" width="16" height="16">
							<!---->
							<use href="#icon_sprite_pencil"></use>
						</svg>
					</button>
					<!---->
				</div>
				<!---->
			</div>
			<!---->
			<!---->
			<section class="card budget-breakdown-available-balance ">
				<button class="card-roll-up" aria-expanded="true" aria-controls="controls-ember184" type="button">
					<h2>
						Available Balance
						<svg class="ynab-new-icon card-chevron" width="12" height="12">
							<!---->
							<use href="#icon_sprite_chevron_down">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor" fill-rule="evenodd"
										d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z" clip-rule="evenodd"></path>
								</symbol>
							</use>
						</svg>
						<span class="ynab-new-budget-available-number js-budget-available-number user-data zero" title="" aria-disabled="true" disabled="" type="button">
							<span class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span>
						</span>
					</h2>
				</button>
				<div class="card-body" aria-hidden="false" id="controls-ember184">
					<div class="ynab-breakdown">
						<div tabindex="0">
							<div>Cash Left Over From Last Month</div>
							<div class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
						</div>
						<div tabindex="0">
							<div>
								Assigned This Month
							</div>
							<div class="user-data" title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
						</div>
						<div tabindex="0">
							<div>Cash Spending</div>
							<div title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
						</div>
						<div tabindex="0">
							<div>Credit Spending</div>
							<div title="$0.00"><span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span></div>
						</div>
					</div>
					<!---->
				</div>
			</section>
			<section class="card target-inspector-card ">
				@if(!$isCreateTarget)
					<div id="ember186" class="ynab-new-inspector-goals">
						<button class="card-roll-up" aria-expanded="true" aria-controls="controls-ember187" type="button">
							<h2>
								<!---->
								Target
								<svg class="ynab-new-icon card-chevron" width="12" height="12">
									<!---->
									<use href="#icon_sprite_chevron_down"></use>
								</svg>
							</h2>
						</button>
						<div class="card-body" aria-hidden="false" id="controls-ember187">
							<div class="target-inspector">
								<div class="view-target-empty-state">
									<strong>How much do you need for 💻 Internet?</strong>
									<p>
										When you create a target, we’ll let you know how much money to set aside to stay on track over time.
									</p>
									<button wire:click="showCreateTarget" class="ynab-button secondary  budget-inspector-goals-create" type="button">
										Create Target
									</button>
								</div>
							</div>
						</div>
					</div>
				@else
					<div id="ember351" class="ynab-new-inspector-goals">
						<h2>
							<!---->
							Target
						</h2>
						<div id="ember369" class=" ynab-new-inspector-goals-edit-goal">
							<div class="budget-inspector-goals-edit-section">
								<div class="goal-body">
									<dl>
										<dd>
											<div class="segmented-control textOnlyOption frequency-group" role="tablist" tabindex="0">
												<button class="segmented-control-button  frequency-group-button" aria-selected="false" role="tab"
													tabindex="-1" id="frequency_weekly" type="button">
													Weekly
												</button>
												<button class="segmented-control-button selected frequency-group-button" aria-selected="true" role="tab"
													tabindex="-1" id="frequency_monthly" type="button">
													Monthly
												</button>
												<button class="segmented-control-button  frequency-group-button" aria-selected="false" role="tab"
													tabindex="-1" id="frequency_yearly" type="button">
													Yearly
												</button>
												<button class="segmented-control-button  frequency-group-button" aria-selected="false" role="tab"
													tabindex="-1" id="frequency_custom" type="button">
													Custom
												</button>
											</div>
											<dl>
												<dt>I need</dt>
												<dd class="user-data">
													<div id="ember370" class="ynab-new-currency-input mod-left-aligned text-input">
														<button tabindex="-1" class="button-calculator" aria-hidden="true" type="button">
															<svg class="icon-calculator" viewBox="0 0 16 16">
																<desc>Clicking this button will open the calculator</desc>
																<path
																	d="m3.8 0 .5.5v2.3h2.2l.5.5v.5l-.5.5H4.3v2.2l-.5.5h-.5l-.5-.5V4.3H.5L0 3.8v-.5l.5-.5h2.3V.5l.5-.5zM9 3.3l.5-.5h6l.5.5v.5l-.5.5h-6L9 3.8zm3.5 7.7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M9 12.3a.5.5 0 0 1 .5-.6h6a.5.5 0 0 1 .5.6v.4a.5.5 0 0 1-.5.6h-6a.5.5 0 0 1-.5-.6zm-2.8-2.1v.7l-1.6 1.6 1.6 1.6v.7l-.4.4h-.7l-1.6-1.6-1.6 1.6h-.7l-.4-.4v-.7l1.6-1.6L1 10.9v-.7l.3-.4H2l1.6 1.6 1.6-1.6h.7z">
																</path>
															</svg>
														</button>
														<div class="input-wrapper">
															<input id="ember371" class="ember-text-field ember-view" title="Target Amount"
																aria-label="Target Amount" type="text">
															<button class="user-data currency tabular-nums zero">
																<bdi>$</bdi>
																0.00
															</button>
														</div>
														<!---->
													</div>
													<!---->
												</dd>
											</dl>
											<!---->
											<!---->
											<!---->
											<!---->
											<dl>
												<dt>
													By
												</dt>
												<dd class="ynab-new-inspector-goals-day-of-month goal-options-select user-data">
													<div class="x-select-container  ">
														<select class="js-x-select" aria-label="Select Day of Month">
															{!! generateDayOptions() !!}
														</select>
													</div>
												</dd>
											</dl>
											<!---->
											<!---->
											<dl>
												<dt>Next month I want to</dt>
												<dd>
													<div class="type-dropdown target-behavior-dropdown">
														<div class="ynab-new-dropdown js-ynab-new-dropdown " id="ember372">
															<button class="ynab-new-dropdown-container js-ynab-new-dropdown-container user-data" aria-haspopup="true" aria-expanded="false"
																aria-label="undefined, Popup button collapsed, Set aside another <bdi>$</bdi>0.00 selected"
																type="button">
																<span>Set aside another <bdi>$</bdi>0.00</span>
																<svg class="ynab-new-icon" width="9" height="9">
																	<!---->
																	<use href="#icon_sprite_caret_down"></use>
																</svg>
															</button>
															<!---->
														</div>
													</div>
												</dd>
											</dl>
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
											<button wire:click="hideCreateTarget" class="ghost-button primary type-body-large" type="button">
												Cancel
											</button>
											<button class="ynab-button primary  " arial-label="Save Target, 0.00, Set aside another <bdi>$</bdi>0.00"
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
				<!---->
			</section>
			<!---->
			<!---->
			<!---->
			<section class="card budget-breakdown-auto-assign is-collapsed">
				<button class="card-roll-up" aria-expanded="false" aria-controls="controls-ember99" type="button">
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
				<div class="card-body" aria-hidden="true" id="controls-ember99">
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
								<button class="budget-inspector-button  average-assigned" title="Feeling average? Fund all of your categories with your historical average assigned." type="button">
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
			<!---->
			<section class="card  ">
				<div class="inspector-notes ">
					<h2>Notes</h2>
					<p class="inspector-category-note user-data">
						Enter a note...
					</p>
				</div>
			</section>
			<!---->
		</div>
	</div>
	{{-- modal --}}
	@if($isOpenModalAssign)
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
