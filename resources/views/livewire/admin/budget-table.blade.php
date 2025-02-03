<div>
	{{-- Success is as dangerous as failure. --}}
	<div class="budget-table-draggable">
			<!-- GRUPO -->
		@foreach($groups as $group)
			<div id="group-{{ $group->id }}" draggable="true" class="budget-table-row js-budget-table-row budget-table-row-ul is-master-category" role="row" aria-level="1"
					 aria-expanded="true">
				<div class="budget-table-cell-margin-left js-budget-table-cell-margin-left budget-table-row-li" aria-hidden="true">&nbsp;</div>
				<div class="budget-table-cell-collapse budget-table-row-li" role="cell" aria-colindex="2">
					<button class="js-budget-table-cell-collapse" aria-label="Collapse Bills categories" type="button">
						<svg class="ynab-new-icon" width="10" height="10">
							<!---->
							<use href="#icon_sprite_chevron_down">
								<svg xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_down" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor" fill-rule="evenodd"
												d="M13 18.7a1.4 1.4 0 0 1-2 0L.4 7.4a2 2 0 0 1 0-2 1.4 1.4 0 0 1 2 0l9.6 10 9.6-10.2a1.4 1.4 0 0 1 2 0 2 2 0 0 1 0 2.1z" clip-rule="evenodd"></path>
								</svg>
							</use>
						</svg>
					</button>
				</div>
				<div class="budget-table-cell-checkbox budget-table-row-li" role="cell" aria-colindex="1">
					<button class="ynab-checkbox ynab-checkbox-button  " role="checkbox" aria-checked="false" aria-label="Bills" type="button">
						<svg class="ynab-new-icon ynab-checkbox-button-square" width="13" height="13">
							<!---->
							<use href="#icon_sprite_check">
								<svg xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor"
												d="m7.4 17.6-5-5a1.4 1.4 0 0 0-2 0 1.4 1.4 0 0 0 0 2l6 6a1.4 1.4 0 0 0 2 0L23.6 5.4a1.4 1.4 0 0 0 0-2 1.4 1.4 0 0 0-2 0z"></path>
								</svg>
							</use>
						</svg>
						<!---->
					</button>
				</div>
				<div class="budget-table-cell-name budget-table-row-li" role="rowheader" aria-colindex="3">
					<button class="button budget-table-cell-button budget-table-cell-edit-category user-data " title="{{ $group->name }}">{{ $group->name }}</button>
					<button class="button budget-table-cell-add-category budget-table-cell-button " aria-label="Add Category" aria-describedby="addCategory">
						<svg class="ynab-new-icon" width="14" height="14">
							<!---->
							<use href="#icon_sprite_plus_circle_fill">
								<svg xmlns="http://www.w3.org/2000/svg" id="icon_sprite_plus_circle_fill" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor"
												d="M12 0a12 12 0 1 0 0 24 12 12 0 0 0 0-24m4.8 13.2h-3.6v3.6c0 .7-.5 1.2-1.2 1.2s-1.2-.5-1.2-1.2v-3.6H7.2c-.7 0-1.2-.5-1.2-1.2s.5-1.2 1.2-1.2h3.6V7.2c0-.7.5-1.2 1.2-1.2s1.2.5 1.2 1.2v3.6h3.6c.7 0 1.2.5 1.2 1.2s-.5 1.2-1.2 1.2"></path>
								</svg>
							</use>
						</svg>
					</button>
				</div>
				<div class="budget-table-cell-budgeted budget-table-row-li" role="cell" aria-colindex="4">
					<button aria-disabled="true" class="user-data currency tabular-nums zero">
						<span><bdi>$</bdi>{{ format_number($group->total_assigned) }}</span>
					</button>
				</div>
				<div class="budget-table-cell-activity budget-table-cell-flexed budget-table-row-li" role="cell" aria-colindex="5">
					<button id="ember442" class="budget-table-cell-category-moves js-budget-toolbar-open-category-moves" aria-hidden="true" tabindex="-1" type="button">
						<div class="category-moves-moves-icon-wrapper">
							<svg class="ynab-new-icon" width="14" height="14">
								<!---->
								<use href="#icon_sprite_clock_arrow_back">
									<svg xmlns="http://www.w3.org/2000/svg" id="icon_sprite_clock_arrow_back" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor" fill-rule="evenodd"
													d="m17.2 15.3-4.5-2.1A1 1 0 0 1 12 12l.7-7a1 1 0 0 1 .8-.6 1 1 0 0 1 .7.6l.6 6.3L18 14a1 1 0 0 1 0 1l-.8.2M.5 12h2.4A10.5 10.5 0 0 1 24 12c0 5.8-4.7 10.5-10.6 10.5a11 11 0 0 1-6.7-2.4 1 1 0 0 1 0-1.3 1 1 0 0 1 1.3-.1c3.7 3 9.1 2.4 12.1-1.3a8.6 8.6 0 0 0-1.2-12 8.6 8.6 0 0 0-14 6.7h2.3a.5.5 0 0 1 .4.7l-3.4 4.7a.5.5 0 0 1-.8 0L.1 12.8a.5.5 0 0 1 .4-.8"
													clip-rule="evenodd"></path>
									</svg>
								</use>
							</svg>
						</div>
					</button>
					<button id="ember443" class="budget-number user-data" title="(${{ format_number($group->total_activity) }}) View this category's monthly activity. Splendid." tabindex="0"
									aria-disabled="true"
									type="button">
						<span class="user-data currency tabular-nums zero"><bdi>$</bdi>{{ format_number($group->total_activity) }}</span>
					</button>
				</div>
				<div class="budget-table-cell-available budget-table-row-li" role="cell" aria-colindex="6">
					<!---->
					<button class="ynab-new-budget-available-number js-budget-available-number user-data"
									title="${{ format_number($group->total_available) }} Available to plan your spending—or click to move it to another category!" aria-disabled="true" disabled=""
									type="button">
						<!---->
						<span class="user-data currency tabular-nums zero"><bdi>$</bdi>{{ format_number($group->total_available) }}</span>
					</button>
				</div>
				<div class="budget-table-cell-margin-right budget-table-row-li" aria-hidden="true">&nbsp;</div>
			</div>
			<!-- CATEGORIAS -->
			@foreach($group->categories as $category)
				<div id="category-{{ $category->id }}" draggable="true" class="budget-table-row js-budget-table-row budget-table-row-ul is-sub-category " role="row"
						 data-entity-id="4ab7a77e-90ed-4851-b569-c349fc9b29bb" aria-level="2" aria-expanded="true">
		<div class="budget-table-cell-margin-left js-budget-table-cell-margin-left budget-table-row-li" aria-hidden="true">&nbsp;</div>
		<div class="budget-table-cell-collapse budget-table-row-li" role="cell" aria-colindex="2">
			&nbsp;
		</div>
		<div class="budget-table-cell-checkbox budget-table-row-li" role="cell" aria-colindex="1">
			<button class="ynab-checkbox ynab-checkbox-button " role="checkbox" aria-checked="false" aria-label="{{ $category->category }}" type="button">
				<svg class="ynab-new-icon ynab-checkbox-button-square " width="13" height="13">
					<!---->
					<use href="#icon_sprite_check">
						<svg xmlns="http://www.w3.org/2000/svg" id="icon_sprite_check" fill="none" viewBox="0 0 24 24">
							<path fill="currentColor"
										d="m7.4 17.6-5-5a1.4 1.4 0 0 0-2 0 1.4 1.4 0 0 0 0 2l6 6a1.4 1.4 0 0 0 2 0L23.6 5.4a1.4 1.4 0 0 0 0-2 1.4 1.4 0 0 0-2 0z"></path>
						</svg>
					</use>
				</svg>
				<!---->
			</button>
		</div>
		<div class="budget-table-cell-name budget-table-row-li" role="rowheader" aria-colindex="3">
			<div class="budget-table-cell-button budget-table-cell-edit-category user-data">
				<div class="budget-table-cell-edit-category-label js-budget-table-cell-edit-category-label">
					<div class="budget-table-cell-goal-nowrap">
						<button title="{{ $category->category }}">{{ $category->category }}</button>
						<div class="budget-table-cell-goal-gap"></div>
						<div class="budget-table-cell-goal-status"></div>
					</div>
					<div class="budget-table-cell-goal-status-details"></div>
				</div>
				<figure class="ynab-new-budget-bar-v2" role="group">
					<div class="ynab-new-budget-bar-v2-section ynab-new-budget-bar-v2-section-funded" style="flex-basis: 100%;">
						<!---->
					</div>
				</figure>
			</div>
		</div>
		<div class="budget-table-cell-budgeted budget-table-row-li" role="cell" aria-colindex="4">
			<div id="ember161" class="ynab-new-currency-input ">
				<button tabindex="-1" class="button-calculator " aria-hidden="true" type="button">
					<svg class="icon-calculator " viewBox="0 0 16 16">
						<desc>Clicking this button will open the calculator</desc>
						<path
							d="m3.8 0 .5.5v2.3h2.2l.5.5v.5l-.5.5H4.3v2.2l-.5.5h-.5l-.5-.5V4.3H.5L0 3.8v-.5l.5-.5h2.3V.5l.5-.5zM9 3.3l.5-.5h6l.5.5v.5l-.5.5h-6L9 3.8zm3.5 7.7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M9 12.3a.5.5 0 0 1 .5-.6h6a.5.5 0 0 1 .5.6v.4a.5.5 0 0 1-.5.6h-6a.5.5 0 0 1-.5-.6zm-2.8-2.1v.7l-1.6 1.6 1.6 1.6v.7l-.4.4h-.7l-1.6-1.6-1.6 1.6h-.7l-.4-.4v-.7l1.6-1.6L1 10.9v-.7l.3-.4H2l1.6 1.6 1.6-1.6h.7z"></path>
					</svg>
				</button>
				<div class="input-wrapper">
					<input id="dataCurrency" class="ember-text-field ember-view" type="text" value="0.00" onfocus="this.select()">
					<button class="user-data currency tabular-nums zero">
						<span><bdi>$</bdi>{{ format_number($category->assigned) }}</span>
					</button>
				</div>
				<!---->
			</div>
		</div>
		<div class="budget-table-cell-activity budget-table-cell-flexed budget-table-row-li" role="cell" aria-colindex="5">
			<button id="ember163" class="budget-table-cell-category-moves js-budget-toolbar-open-category-moves" aria-hidden="true" tabindex="-1" type="button">
				<div class="category-moves-moves-icon-wrapper">
					<svg class="ynab-new-icon" width="14" height="14">
						<!---->
						<use href="#icon_sprite_clock_arrow_back">
							<svg xmlns="http://www.w3.org/2000/svg" id="icon_sprite_clock_arrow_back" fill="none" viewBox="0 0 24 24">
								<path fill="currentColor" fill-rule="evenodd"
											d="m17.2 15.3-4.5-2.1A1 1 0 0 1 12 12l.7-7a1 1 0 0 1 .8-.6 1 1 0 0 1 .7.6l.6 6.3L18 14a1 1 0 0 1 0 1l-.8.2M.5 12h2.4A10.5 10.5 0 0 1 24 12c0 5.8-4.7 10.5-10.6 10.5a11 11 0 0 1-6.7-2.4 1 1 0 0 1 0-1.3 1 1 0 0 1 1.3-.1c3.7 3 9.1 2.4 12.1-1.3a8.6 8.6 0 0 0-1.2-12 8.6 8.6 0 0 0-14 6.7h2.3a.5.5 0 0 1 .4.7l-3.4 4.7a.5.5 0 0 1-.8 0L.1 12.8a.5.5 0 0 1 .4-.8"
											clip-rule="evenodd"></path>
							</svg>
						</use>
					</svg>
				</div>
			</button>
			<button id="ember164" class="budget-number user-data" title="({{ format_number($category->activity) }}) View this category's monthly activity. Splendid." tabindex="0"
							aria-disabled="true"
							type="button">
				<span class="user-data currency tabular-nums zero"><bdi>$</bdi>{{ format_number($category->activity) }}</span>
			</button>
		</div>
		<div class="budget-table-cell-available budget-table-row-li" role="cell" aria-colindex="6">
			<!---->
			<button class="ynab-new-budget-available-number js-budget-available-number user-data zero" title="" aria-disabled="true" disabled="" type="button">
				<!---->
				<span class="user-data currency tabular-nums zero "><bdi>$</bdi>{{ format_number($category->available) }}</span>
			</button>
		</div>
		<div class="budget-table-cell-margin-right budget-table-row-li" aria-hidden="true">&nbsp;</div>
	</div>
			@endforeach
		@endforeach
	</div>
</div>