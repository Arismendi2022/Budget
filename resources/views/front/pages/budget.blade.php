@extends('front.layouts.pages-layout')
@section('pageTitle', $pageTitle ?? 'Page Title Here')
@section('content')
	{{-- Main content --}}
	<div class="content-min-break has-budget-views">
		<!---->
		<header id="ember15" class="budget-header left-to-budget-is-positive">
			@livewire('admin.header-calendar')
		</header>
		<section class="budget-view-row">
			<ul class="budget-view-buttons">
				<li class="view-button-item index-0 selected condensed" title="All">
					<button title="All" class="view-button view-button-all selected" type="button">
						<!---->
						All
					</button>
				</li>
				<li class="view-button-item index-1 condensed" title="Underfunded">
					<button title="Underfunded" class="view-button  " type="button">
						<!---->
						Underfunded
					</button>
				</li>
				<li class="view-button-item index-2 condensed" title="Overfunded">
					<button title="Overfunded" class="view-button  " type="button">
						<!---->
						Overfunded
					</button>
				</li>
				<li class="view-button-item index-3 condensed" title="Money Available">
					<button title="Money Available" class="view-button  " type="button">
						<!---->
						Money Available
					</button>
				</li>
				<li class="view-button-item index-4 condensed" title="Snoozed">
					<button title="Snoozed" class="view-button  " type="button">
						<!---->
						Snoozed
					</button>
				</li>
				<li aria-describedby="viewsMenu" class="view-button views-menu-button">
					<button id="miBoton" aria-haspopup="true" aria-label="Views Menu" type="button">
						<svg class="ynab-new-icon views-menu-icon" width="16" height="16">
							<!---->
							<use href="#icon_sprite_filter_circle">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_filter_circle" fill="none" viewBox="0 0 24 24">
									<path fill="currentColor"
										d="M6 8a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2zm1 5c0-.6.5-1 1-1h8c.5 0 1 .4 1 1s-.5 1-1 1H8a1 1 0 0 1-1-1m3 3a1 1 0 0 0-1 .9v.1c0 .5.5 1 1 1h4c.6 0 1-.5 1-1a1 1 0 0 0-1-1z"></path>
									<path fill="currentColor" fill-rule="evenodd" d="M24 12a12 12 0 1 1-24 0 12 12 0 0 1 24 0m-2 0a10 10 0 1 1-20 0 10 10 0 0 1 20 0" clip-rule="evenodd"></path>
								</symbol>
							</use>
						</svg>
						<!---->
					</button>
				</li>
			</ul>
		</section>
		<div class="budget-table-and-inspector js-budget-table-and-inspector">
			<!---->
			@livewire('admin.budget-table')
			<!---->
			<aside class="budget-inspector" style="width: 33%">
				<div class="budget-inspector-resizer">
					<div class="budget-inspector-resizer-indicator">
					</div>
				</div>
				<div class="budget-inspector-content">
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
											<button class="budget-inspector-button js-focus-on-start underfunded" type="button">
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
						<!---->
						<!---->
					</div>
				</div>
			</aside>
		</div>
		<!---->
	</div>
	<!---->
	@if($isOpenModalAssign = false)
		<div class="auto-assign-confirmation">
			<div id="ember102" class="modal-overlay active modal-fresh mod-skinny auto-assign-preview">
				<div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 344px;">
					<div class="modal-fresh-header">
						<div class="modal-fresh-title">
							Auto-Assign Preview: Underfunded
						</div>
						<button class="modal-fresh-close" aria-label="Close" title="Close" type="button">
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
						<button class="ynab-button primary  " type="button">
							OK
						</button>
					</div>
					<!---->
				</div>
			</div>
		</div>
	@endif
	
	<!-- Tooltip Global -->
	<div class="tooltip-global">
    <span role="tooltip" id="viewsMenu" class="tooltip-content " style="top: calc(108px + 0.5rem); left: 687.817px;">
      Views Menu
    </span>
		<span role="tooltip" id="addCategoryGroup" class="tooltip-content" style="top: calc(94.5px - 0.5rem); left: 269.458px;">
      Add Category Group
    </span>
		<span role="tooltip" id="recentMoves" class="tooltip-content" style="top: calc(80.5px - 0.5rem); left: 430.833px;">
      Previous 34 days of assigning and moving money (Rule Three is a thing!)
    </span>
		<span role="tooltip" id="progressBarOn" class="tooltip-content" data-position="top" style="top: calc(96.5px - 0.5rem); left: 1253.1px;">
      Progress Bars On
    </span>
		<span role="tooltip" id="progressBarOff" class="tooltip-content" data-position="top" style="top: calc(96.5px - 0.5rem); left: 1280.82px;">
      Progress Bars Off
    </span>
		<span role="tooltip" id="addCategory" class="tooltip-content" style="top: calc(249px - 0.2rem); left: 319.175px;">
			Add Category
		</span>
	
	</div>
@endsection

@push('scripts')
	<script>

		document.querySelectorAll('[aria-describedby]').forEach(element => {
			element.addEventListener('mouseenter', function () {
				const tooltipId = this.getAttribute('aria-describedby');
				const tooltip = document.getElementById(tooltipId);
				if (tooltip) {
					tooltip.classList.add('tooltip-visible');
					//tooltip.style.opacity = '1';
				}
			});

			element.addEventListener('mouseleave', function () {
				const tooltipId = this.getAttribute('aria-describedby');
				const tooltip = document.getElementById(tooltipId);
				if (tooltip) {
					tooltip.classList.remove('tooltip-visible');
					//tooltip.style.opacity = '0';
				}
			});
		});

		$(function () {
			window.addEventListener('focusInput', function () {
				setTimeout(function () {
					$('#budget-name').focus();
				}, 50); // Retraso de 50 ms
			});

			const $newBudget = $('#new_budget_modal');
			//Abre modal New Budget
			window.addEventListener('showCreateModalForm', function () {
				$('#new_budget_modal').show();
				$('#modal-settings-budget-name').focus();
			})

			//Cierra el modal New Budget
			window.addEventListener('hideCreateModalForm', function () {
				$('#new_budget_modal').hide();
			})
		});

		/** TOOLTIP GLOBAL POCISION  */
		document.addEventListener('DOMContentLoaded', () => {
			const sidebar = document.getElementById('sidebar');
			const tooltips = document.querySelectorAll('.tooltip-content');
			const tooltipData = {};

			// Inicializar tooltips y asociar eventos
			tooltips.forEach(tooltip => {
				const tooltipId = tooltip.id;
				const button = document.querySelector(`[aria-describedby="${tooltipId}"]`);

				tooltipData[tooltipId] = {
					button,
					position: tooltip.dataset.position || 'bottom', // 'top' o 'bottom'
					expandedPosition: parseFloat(tooltip.style.left)
				};

				if (button && !button.dataset.tooltipEventsAdded) {
					button.addEventListener('mouseenter', (e) => showTooltip(e, tooltipId));
					button.addEventListener('mouseleave', () => hideTooltip(tooltipId));
					button.dataset.tooltipEventsAdded = true;
				}
			});

			// Calcular el offset del sidebar
			const getSidebarOffset = () => {
				if (sidebar.classList.contains('sidebar-resized-collapsed')) {
					const expandedWidth = parseInt(sidebar.dataset.expandedWidth || sidebar.offsetWidth);
					const collapsedWidth = parseInt(sidebar.dataset.collapsedWidth || sidebar.offsetWidth);
					return collapsedWidth - expandedWidth;
				}
				return 0;
			};

			// Ajustar la posición de todos los tooltips
			const adjustAllTooltips = () => {
				const offset = getSidebarOffset();
				tooltips.forEach(tooltip => {
					const data = tooltipData[tooltip.id];
					if (data && data.button) {
						tooltip.style.left = `${data.expandedPosition + offset}px`;
						if (tooltip.style.visibility === 'visible') updateTooltipPosition(tooltip, data.button);
					}
				});
			};

			// Actualizar la posición de un tooltip
			const updateTooltipPosition = (tooltip, button) => {
				const rect = button.getBoundingClientRect();
				const data = tooltipData[tooltip.id];
				const horizontalCenter = rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + window.scrollX;

				tooltip.style.left = `${horizontalCenter + getSidebarOffset()}px`;
				tooltip.style.top = data.position === 'top'
					? `${rect.top + window.scrollY - tooltip.offsetHeight - 6}px`
					: `${rect.bottom + window.scrollY + 6}px`;
			};

			// Guardar el ancho del sidebar expandido
			if (!sidebar.dataset.expandedWidth && !sidebar.classList.contains('sidebar-resized-collapsed')) {
				sidebar.dataset.expandedWidth = sidebar.offsetWidth;
			}

			// Funciones globales para mostrar/ocultar tooltips
			window.showTooltip = (e, tooltipId) => {
				const tooltip = document.getElementById(tooltipId);
				if (tooltip) {
					const button = e.currentTarget;
					if (!tooltipData[tooltipId].button) tooltipData[tooltipId].button = button;
					updateTooltipPosition(tooltip, button);
					tooltip.style.visibility = 'visible';
				}
			};

			window.hideTooltip = (tooltipId) => {
				const tooltip = document.getElementById(tooltipId);
				if (tooltip) tooltip.style.visibility = 'hidden';
			};

			// Ajustar tooltips al cargar y observar cambios en el sidebar
			adjustAllTooltips();
			new MutationObserver((mutations) => {
				mutations.forEach(mutation => {
					if (mutation.attributeName === 'class') {
						if (sidebar.classList.contains('sidebar-resized-collapsed') && !sidebar.dataset.collapsedWidth) {
							sidebar.dataset.collapsedWidth = sidebar.offsetWidth;
						}
						setTimeout(adjustAllTooltips, 50);
					}
				});
			}).observe(sidebar, {attributes: true});
		});

		// Function to add toggle functionality to card sections
		function setupCardToggles() {
			document.querySelectorAll('.card').forEach(card => {
				const rollupButton = card.querySelector('.card-roll-up');
				if (rollupButton) {
					rollupButton.onclick = () => {
						const chevronUse = card.querySelector('.card-chevron use');

						card.classList.toggle('is-collapsed');

						const isExpanded = !card.classList.contains('is-collapsed');
						if (chevronUse) {
							chevronUse.setAttribute('href', isExpanded
								? '#icon_sprite_chevron_down'
								: '#icon_sprite_chevron_right'
							);
						}
					};
				}
			});
		}

		// Run the setup when the DOM is fully loaded
		document.addEventListener('DOMContentLoaded', setupCardToggles);
	
	</script>
@endpush