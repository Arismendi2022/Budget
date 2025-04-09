{{-- Because she competes with no one, no one can compete with her. --}}
<aside class="budget-inspector" style="width: 33%">
	<div class="budget-inspector-resizer">
		<div class="budget-inspector-resizer-indicator">
		</div>
	</div>
	<div class="budget-inspector-content">
		@if($isAutoAssign = true)
			<div class="budget-breakdown ">
				<!---->
				<!---->
				<!---->
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
										<div><strong class="user-data" title="$0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
								</div>
								<div>
									<button class="budget-inspector-button  assigned-last month" type="button">
										<div>Assigned Last Month</div>
										<div><strong class="user-data" title="$0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  spent-last month" type="button">
										<div>Spent Last Month</div>
										<div><strong class="user-data" title="$0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  average-assigned"
										title="Feeling average? Fund all of your categories with your historical average assigned." type="button">
										<div>Average Assigned</div>
										<div><strong class="user-data" title="$0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  average-spent"
										title="Assign your historical average spent. Though you're above average in my book." type="button">
										<div>Average Spent</div>
										<div><strong class="user-data" title="$0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
								</div>
								<div>
									<button class="budget-inspector-button  set-available amount to zero"
										title="Want to start from zero? Set the available amounts of all of your categories to $0.00, making the funds ready to assign. It's like a mini Fresh Start!"
										type="button">
										<div>Reset Available Amounts</div>
										<div><strong class="user-data" title="$0.00"><span
													class="user-data currency tabular-nums zero"><bdi>{{ currency() }}</bdi>0.00</span></strong></div>
									</button>
									<button class="budget-inspector-button  reset-assigned amount"
										title="Reset all assigned amounts for this month, in case you want a do-over." type="button">
										<div>Reset Assigned Amounts</div>
										<div><strong class="user-data" title="$0.00"><span
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
									Assigned in March
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
							<span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span>
						</h2>
					</button>
					<div class="card-body" aria-hidden="false" id="controls-ember104">
						<!---->
						<div class="ynab-breakdown">
							<button class="future-month-button" type="button">
								<div class="future-month-button-interior">
									<div class="month-label">
										<!---->
										<div>May</div>
									</div>
									<div class="user-data">
										<span class="user-data currency tabular-nums zero"><bdi>$</bdi>0.00</span>
									</div>
								</div>
							</button>
						</div>
						<!---->
					</div>
				</section>
				<!---->
				<!---->
			</div>
		@endif
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
