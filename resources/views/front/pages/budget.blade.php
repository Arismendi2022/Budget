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
			<section class="budget-table-container is-expanded" role="main">
				<div id="ember19" class="budget-table" role="treegrid">
					<!--Table Header -->
					<!-- Table -->
					@livewire('admin.budget-table')
				</div>
				<!---->
			</section>
			<aside class="budget-inspector" style="width: 33%">
				<div class="budget-inspector-resizer">
					<div class="budget-inspector-resizer-indicator"></div>
				</div>
				<div class="budget-inspector-content"></div>
			</aside>
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
      Previous 34 days of assigning and moving money (Rule Three is a thing!)
    </span>
		<span role="tooltip" id="progressBarOn" class="tooltip-content" style="top: calc(96.5px - 0.5rem); left: 1253.1px;">
      Progress Bars On
    </span>
		<span role="tooltip" id="progressBarOff" class="tooltip-content" style="top: calc(96.5px - 0.5rem); left: 1280.82px;">
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
		document.addEventListener('DOMContentLoaded', function () {
			const sidebar = document.getElementById('sidebar');
			const tooltips = document.querySelectorAll('.tooltip-content');

			// Guardar la posición original de cada tooltip
			tooltips.forEach(tooltip => {
				const originalLeft = parseFloat(tooltip.style.left);
				tooltip.setAttribute('data-original-left', originalLeft);
			});

			function adjustTooltips() {
				const isCollapsed = sidebar.classList.contains('sidebar-resized-collapsed');
				const offset = isCollapsed ? -204 : 0; // Ajuste necesario cuando el sidebar está colapsado

				tooltips.forEach(tooltip => {
					const originalLeft = parseFloat(tooltip.getAttribute('data-original-left'));
					tooltip.style.left = `${originalLeft + offset}px`;
				});
			}

			// Ajustar tooltips al cargar la página
			adjustTooltips();

			// Escuchar cambios en el sidebar (si es dinámico)
			const observer = new MutationObserver(function (mutations) {
				mutations.forEach(function (mutation) {
					if (mutation.attributeName === 'class') {
						adjustTooltips();
					}
				});
			});

			observer.observe(sidebar, {
				attributes: true // Configura el observer para escuchar cambios en los atributos
			});
		});


		/** Ajustar el Top y left del Tooltip Add Category */
		function showTooltip(event) {
			const tooltip = document.getElementById('addCategory');
			const button = event.target;

			// Obtener la posición del botón
			const rect = button.getBoundingClientRect();

			// Ajustar la posición del tooltip con un margen adicional
			const margin = 6; // Margen en píxeles
			tooltip.style.top = `${rect.bottom + window.scrollY + margin}px`; // Debajo del botón con margen
			tooltip.style.left = `${rect.left + (rect.width / 2) - (tooltip.offsetWidth / 2) + window.scrollX}px`; // Centrado horizontalmente
			tooltip.style.visibility = 'visible';
		}
	
	
	</script>
@endpush
