<div>
	<div class="budget-header-flexbox">
		<div class="budget-header-item budget-header-calendar">
			<button id="prev-month" class="budget-header-calendar-prev " aria-label="previous month budget" type="button" wire:click="previousMonth">
				<svg class="ynab-new-icon " width="30" height="30">
					<!---->
					<use href="#icon_sprite_chevron_left_circle">
						<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left_circle" fill="none" viewBox="0 0 24 24">
							<path fill="currentColor"
								d="M12 24a12 12 0 0 0 12-12c0-6.6-5.5-12-12-12A12 12 0 0 0 0 12a12 12 0 0 0 12 12m0-2A10 10 0 0 1 2 12a10 10 0 1 1 10 10m2.3-4.2a1 1 0 0 0 0-1.2L9.5 12l4.8-4.5a1 1 0 0 0 0-1.3 1 1 0 0 0-1.2 0L8 11c-.6.6-.6 1.7 0 2.3l5 4.6c.3.3 1 .3 1.2 0"></path>
						</symbol>
					</use>
				</svg>
			</button>
			<div class="budget-header-calendar-date">
				<button class="budget-header-calendar-date-button" type="button" wire:click="openCalendarModal">
					<span id="current-date">{{ $formattedDate }}</span>
					<svg class="ynab-new-icon " width="12" height="12">
						<!---->
						<use href="#icon_sprite_caret_down">
							<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
								<path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
							</symbol>
						</use>
					</svg>
				</button>
				<button class="budget-header-calendar-note user-data" title="" type="button">
					Enter a note...
				</button>
			</div>
			<button id="next-month" class="budget-header-calendar-next" aria-label="next month budget" type="button" wire:click="nextMonth">
				<svg class="ynab-new-icon " width="30" height="30">
					<!---->
					<use href="#icon_sprite_chevron_right_circle">
						<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right_circle" fill="none" viewBox="0 0 24 24">
							<path fill="currentColor"
								d="M12 .4A12 12 0 0 0 0 12.2a12 12 0 0 0 24 0A12 12 0 0 0 12 .4m0 2A9.8 9.8 0 1 1 12 22a10 10 0 0 1-10-9.8c0-5.5 4.5-9.8 10-9.8m-2.3 4a1 1 0 0 0 0 1.3l4.8 4.5-4.8 4.4a1 1 0 0 0 0 1.3c.3.3.9.3 1.2 0l5-4.6c.6-.6.6-1.7 0-2.3l-5-4.5c-.3-.3-1-.3-1.2 0"></path>
						</symbol>
					</use>
				</svg>
			</button>
			<!---->
			@if($showTodayButton)
				<button class="ynab-button secondary button budget-header-go-to-today" type="button" wire:click="goToToday">
					Today
				</button>
			@endif
		</div>
		<div class="budget-header-item budget-header-totals ">
			<div class="to-be-budgeted {{ $budgetTotal === 0 ? '' : 'is-positive' }}">
				<div class="to-be-budgeted-heading-wrapper">
					<h1 id="ember-heading">
						<div class="to-be-budgeted-amount">
                <span class="user-data currency {{ $budgetTotal === 0 ? 'zero' : 'positive' }}">
                    <bdi>{{ format_currency($budgetTotal) }}</bdi>
                </span>
							<svg class="ynab-new-icon" width="16" height="16" aria-hidden="true">
								<use href="#icon_sprite_info_circle_fill">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_info_circle_fill" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
											d="M12 24a12 12 0 1 1 0-24 12 12 0 0 1 0 24m.8-16A1.6 1.6 0 0 1 11 6.5 1.6 1.6 0 0 1 12.8 5a1.6 1.6 0 0 1 1.7 1.5A1.6 1.6 0 0 1 12.8 8m.7 3.4L12 16.6c-.2.5.1 1 .6 1.3l.3.4v.2l-.5.5H11a1.5 1.5 0 0 1-1.5-1.9L11 12a1 1 0 0 0-.6-1.3l-.3-.4V10l.5-.5H12a1.5 1.5 0 0 1 1.5 1.9"
											clip-rule="evenodd"></path>
									</symbol>
								</use>
							</svg>
						</div>
						<div class="to-be-budgeted-label">
							{{ $budgetTotal === 0 ? 'All Money Assigned' : 'Ready to Assign' }}
						</div>
					</h1>
					<button class="to-be-budgeted-view-breakdown" aria-label="View Ready to Assign Breakdown" type="button"></button>
				</div>
				@if($budgetTotal === 0)
					<button class="to-be-budgeted-auto-assign to-be-budgeted-icon" disabled aria-label="All Money Assigned" type="button">
						<span class="label"></span>
						<svg class="ynab-new-icon" width="16" height="16" aria-hidden="true">
							<use href="#icon_sprite_check_circle_fill">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check_circle_fill" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor"
										d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24M8.7 17.1l-4.3-4.3a1.2 1.2 0 0 1 0-1.7 1.2 1.2 0 0 1 1.7 0l3.5 3.5 8.3-8.3a1 1 0 0 1 1.6 0 1.2 1.2 0 0 1 0 1.7l-9 9.1a1.2 1.2 0 0 1-1.8 0"></path>
								</symbol>
							</use>
						</svg>
					</button>
				@else
					<button class="to-be-budgeted-auto-assign to-be-budgeted-button" aria-label="Assign" type="button">
						<span class="label">Assign</span>
						<svg class="ynab-new-icon" width="16" height="16" aria-hidden="true">
							<use href="#icon_sprite_caret_down">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_caret_down" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor" d="M11 19.5.2 6.1C-.4 5.2.3 4 1.3 4h21.4c1 0 1.7 1.2 1 2L13.1 19.6a1.4 1.4 0 0 1-2.2 0"></path>
								</symbol>
							</use>
						</svg>
					</button>
				@endif
			</div>
		</div>
		<div class="budget-header-item budget-header-days budget-header-days">
			<div>
				<div class="budget-header-days-age">12 days</div>
				<div class="budget-header-days-label" title="Keep Age of Money above 30 and congrats, you're following Rule Four!">Age of Money</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script>
	
	</script>
@endpush



