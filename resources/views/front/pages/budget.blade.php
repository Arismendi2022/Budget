@extends('front.layouts.pages-layout')
@section('pageTitle', $pageTitle ?? 'Page Title Here')
@section('content')
	{{-- Main content --}}
	<div class="content-min-break has-budget-views">
		<header id="budget-header" class="budget-header left-to-budget-is-positive">
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
			@livewire('admin.target-creation')
		</div>
		<!---->
	</div>
	
	<!-- Tooltip Global -->
	<div class="tooltip-global">
    <span role="tooltip" id="viewsMenu" class="tooltip-content " style="top: calc(108px + 0.5rem); left: 687.817px;">
      Views Menu
    </span>
		<span role="tooltip" id="addCategoryGroup" class="tooltip-content" style="top: calc(94.5px - 0.5rem); left: 269.458px;">
      Add Category Group
    </span>
		<span role="tooltip" id="recentMoves" class="tooltip-content" style="top: calc(80.5px - 0.5rem); left: 430.833px;">
      Previous 34 days of assigning and moving money
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

		$(function () {
			window.addEventListener('focusInput', function () {
				setTimeout(function () {
					$('#budget-name').focus();
				}, 50); // Retraso de 50 ms
			});
			const $newBudget = $('#new_budget_modal');
		});

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