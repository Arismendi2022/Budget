{{-- Main Sidebar Container --}}
<nav id="sidebar" class="ynab-u sidebar logged-in " style="width:260px;" role="navigation">
	<div class="sidebar-left">
		<div class="sidebar-contents">
			<div class="sidebar-nav">
				<livewire:admin.left-budget-name/>
				<ul class="nav-main">
					<li class="navlink sidebar-nav-menu-collapsed">
						<button class="js-sidebar-nav-menu" type="button">
							<svg class="ynab-new-icon " width="24" height="24">
								<!---->
								<use href="#icon_sprite_ynab_logo">
									<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_ynab_logo" fill="none" viewBox="0 0 24 24">
										<path fill="currentColor"
											d="M19.4 10.8H15l-.3.2-2.6 4.3h-.2L9.3 11l-.2-.2H4.7c-.1 0-.2.1-.1.2l5.2 7.6v4.9l.2.2h4s.2 0 .2-.2v-4.9l5.2-7.6c.1-.1 0-.2 0-.2m-7.7-6.6.3.1h.3c2.5-1.6.4-3.6-.3-4.3-.7.7-2.8 2.7-.3 4.2M9.1 10h.3l.2-.3C11 6.7 8 6.2 6.8 6c-.2 1-.9 4 2.3 4m-4-.7.2-.2v-.3c-.2-3.2-3.1-2.2-4.2-2 .3 1.1 1.1 4 4 2.5m.4 5.3.1-.3c0-.1 0-.2-.2-.3-2-2.4-3.8 0-4.5 1 .9.6 3.3 2.4 4.6-.4M12 5c-.6.6-2.2 2.2-.2 3.6h.4c2-1.4.3-3-.2-3.6">
										</path>
										<path fill="currentColor"
											d="m6.6 16-.2-.1c-2 0-1.6 1.8-1.5 2.5.7-.2 2.5-.5 1.8-2.3zm5-3.1h.5c2-1.4.3-3-.2-3.6-.6.6-2.2 2.2-.2 3.6m-8.2-1v-.5c-1.2-2-3-.5-3.6 0 .6.5 2 2.3 3.6.5m2-5.6h.2l.1-.3c.9-2.1-1.4-2.6-2.2-2.7-.1.8-.5 3 1.9 3m3.2-.7H9s.2 0 .2-.2c1.5-2.1-.8-3.2-1.6-3.6-.4.8-1.4 3.2 1.2 3.8m5.8 4.4h.3c3.2.1 2.5-2.9 2.3-4-1 .3-4 .8-2.8 3.7 0 .2.1.2.2.3m4-1.1.1.3.3.2c2.8 1.5 3.6-1.4 4-2.4-1.2-.3-4-1.3-4.3 1.9m-.1 5.2c-.2.1-.2.2-.2.3v.3c1.4 2.8 3.8 1 4.7.3-.7-.8-2.5-3.3-4.5-1m-1 2h-.2l-.1.2c-.7 1.8 1.1 2.1 1.8 2.3 0-.7.4-2.5-1.5-2.5m2.8-4.6v.5c1.5 1.8 3 0 3.6-.6-.7-.4-2.4-1.9-3.6.1m-2.2-5.2.2.1c2.4 0 2-2.2 1.9-3-.8.1-3 .6-2.2 2.7zM15 5.5h.2c2.6-.6 1.6-3 1.2-3.8-.8.4-3.1 1.5-1.6 3.6z">
										</path>
									</symbol>
								</use>
								<title>{{ $budget->name ?? 'YNAB' }}</title>
							</svg>
						</button>
					</li>
					<li class="navlink navlink-budget {{ Route::is('admin.budget') ? 'active' : '' }} ">
						<a id="ember5" class="ember-view" wire:navigate href="{{ route('admin.budget') }}">
							<svg id="icon_sprite_navigation_budget" viewBox="0 0 24 24">
								<path fill-rule="evenodd" d="M6.2 10.6h.6zm11.7 0h.4-.2z" clip-rule="evenodd"></path>
								<path fill-rule="evenodd"
									d="M18.4 10.1H5.6l-.2-.1-.1-.1v-1l.2-.3c0-.2.3-.3.4-.3h12.2l.4.3.2.3v1c-.1.2-.2.2-.3.2m-1.1-2.7H6.5v-.7l.1-.5.2-.2h10.4l.2.2.2.5v.4l-.1.2zM16 5.1H8.2L8.1 5v-.8l.2-.2H16l.1.2.1.3V5z"
									clip-rule="evenodd" opacity="0.4"></path>
								<path fill-rule="evenodd" d="M13.6 14c.2.1.3.4.3.7v1.2a.4.4 0 0 1-.4.4h-3a.4.4 0 0 1-.4-.4v-1.2l.5-1A2 2 0 0 1 12 13a2 2 0 0 1 1.6.8" clip-rule="evenodd">
								</path>
								<path fill-rule="evenodd"
									d="M19.2 10.4v5.3l-.5.6H18l-.5-.6v-2.5h-.1a2 2 0 0 1-1.7-1.6v-.1H8.3a1.7 1.7 0 0 1-1.9 1.6v2.6l-.5.6h-.7l-.5-.6v-5.4l.5-.5h13.2a1 1 0 0 1 .7.6m1.8 8v1.3l-.1.2-.2.1H3.4l-.3-.1-.1-.4v-2l.1-.3.4-.2h.8c.1 0 .3 0 .3.2l.2.4v.4h14.4v-.4l.2-.4.3-.2h.8l.3.2.2.3z"
									clip-rule="evenodd"></path>
							</svg>
							<div class="navlink-label">Budget</div>
						</a>
					</li>
					<li class="navlink navlink-reports {{ Route::is('admin.reflect') ? 'active' : '' }} ">
						<a id="ember6" wire:navigate href="{{ route('admin.reflect') }}">
							<svg id="icon_sprite_navigation_reports" viewBox="0 0 24 24">
								<path d="M20.6 19H3.4c-.2 0-.4.2-.4.4v1.2c0 .2.2.4.4.4h17.2c.2 0 .4-.2.4-.4v-1.2c0-.2-.2-.4-.4-.4" opacity="0.4"></path>
								<path fill-rule="evenodd"
									d="M8 9.7v6.6l-.1.5-.4.2H4.3l-.1-.2-.2-.2V9.4l.2-.2.1-.1.2-.1h3l.4.2zM14 4v12.2c0 .2 0 .5-.2.6l-.5.3h-2.6l-.5-.3-.2-.6V3.9c0-.2 0-.5.2-.6l.5-.3h2.8l.3.3.1.3zm6 2.9v9.4l-.2.6-.5.2h-2.6l-.5-.2-.2-.6V6.8l.2-.6.5-.2h2.6l.5.2z"
									clip-rule="evenodd"></path>
							</svg>
							<div class="navlink-label">Reflect</div>
						</a>
					</li>
					<li class="navlink navlink-accounts {{ Route::is('admin.accounts') ? 'active' : '' }} ">
						<a id="ember7" wire:navigate href="{{ route('admin.accounts') }}">
							<svg id="icon_sprite_navigation_accounts" viewBox="0 0 24 24">
								<path fill-rule="evenodd"
									d="M4.6 19h14.8l1.3.7.3.6v1l-.2.5-.5.2H3.7l-.5-.2-.2-.5v-1l.3-.5M20.8 8.6 12.1 3h-.7L3.2 8.6 3 9v.5l.1.4.4.1h17l.4-.1.1-.4V9zm-9-.6-.6-.1-.4-.6a1 1 0 0 1 .2-1.2 1 1 0 0 1 1.2-.2c.2 0 .4.2.5.4a1 1 0 0 1-.1 1.4z"
									clip-rule="evenodd"></path>
								<path fill-rule="evenodd"
									d="M7 19H5v-9h2l-.1.3v8.4zm4 0H9l.1-.4v-8.3L9 10h2l-.1.3v8.5zm3.9-.4.1.4h-2l.1-.3V10H15l-.1.3zm4-8.3v8.3l.1.3v.1h-2l.1-.2v-8.5L17 10h2z"
									clip-rule="evenodd" opacity="0.4"></path>
							</svg>
							<div class="navlink-label">All Accounts</div>
						</a>
					</li>
				</ul>
				<!---->
				<livewire:admin.nav-accounts/>
				<!---->
				<livewire:admin.add-account/>
				<!---->
			</div>
		</div>
		<div class="sidebar-bottom">
			<!---->
			<button class="sidebar-collapse tooltip-relative-container" aria-describedby="sidebar-collapse-tooltip" type="button">
				<svg class="ynab-new-icon" width="24" height="24">
					<!---->
					<use href="#icon_sprite_sidebar_close">
						<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sidebar_close" fill="none" viewBox="0 0 24 24">
							<path fill="currentColor" fill-rule="evenodd"
								d="M22 22H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2M7 4.5 6.5 4h-4l-.5.5v15l.5.5h4l.5-.5zm11 4a.5.5 0 0 0-.8-.4l-5 3.5a.5.5 0 0 0 0 .8l5 3.5a.5.5 0 0 0 .8-.4z"
								clip-rule="evenodd"></path>
						</symbol>
						<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_sidebar_open" fill="none" viewBox="0 0 24 24">
							<path fill="currentColor" fill-rule="evenodd"
								d="M22 22H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2M7 4.5 6.5 4h-4l-.5.5v15l.5.5h4l.5-.5zm11.8 7-5-3.4a.5.5 0 0 0-.8.4v7a.5.5 0 0 0 .8.4l5-3.5a.5.5 0 0 0 0-.8"
								clip-rule="evenodd"></path>
						</symbol>
					</use>
				</svg>
				<span role="tooltip" id="sidebar-collapse-tooltip" class="tooltip-content tooltip-above tooltip-center">
          <div class="shortcut-tooltip">
            <div class="shortcut-description">Expand/Collapse Sidebar</div>
            <div class="shortcut-keys">
              <div class="shortcut-key ">
                shift
              </div>
              <div class="shortcut-key ">
                :
              </div>
            </div>
          </div>
        </span>
			</button>
		</div>
	</div>
	<div class="sidebar-resizer">
		<div class="sidebar-resizer-indicator"></div>
	</div>
</nav>
{{--   MENU SETTINGS --}}
<!-- Incluye el componente Livewire -->
<livewire:admin.settings-menu :hide-buttons="true"/>  {{-- Cambia a true si deseas ocultar los botones --}}
<livewire:admin.create-budget/>
<livewire:admin.edit-account/>

@push('scripts')
	<script>

		$(function () {
			/** Cambiar el ancho del sidebar y alternar clases/atributos */
			const EXPANDED_WIDTH = "260px";
			const COLLAPSED_WIDTH = "56px";

			function toggleSidebar() {
				const isExpanded = $(".sidebar").css("width") === EXPANDED_WIDTH;
				const newWidth = isExpanded ? COLLAPSED_WIDTH : EXPANDED_WIDTH;
				const display = isExpanded ? "none" : "block";

				// Cambiar el ancho del sidebar y alternar clases
				$(".sidebar").css("width", newWidth).toggleClass("sidebar-resized-collapsed", isExpanded);
				$(".tooltip-content").toggleClass("tooltip-center", !isExpanded);

				// Seleccionar el botón de forma estable
				const $button = $('[aria-describedby="sidebar-collapse-tooltip"]');

				// Alternar clases en el botón
				$button.toggleClass("sidebar-expand", isExpanded).toggleClass("sidebar-collapse", !isExpanded);

				// Cambiar el ícono dentro del <svg>
				$button.find("use").attr("href", isExpanded ? "#icon_sprite_sidebar_open" : "#icon_sprite_sidebar_close");

				// Cambiar visibilidad de elementos
				$(".nav-accounts, .nav-add-accounts, .navlink-label").css("display", display);
			}

			// Evento de clic en el botón
			$('[aria-describedby="sidebar-collapse-tooltip"]').on("click", toggleSidebar);

			// Evento de teclado Shift + :
			$(document).on("keydown", function (event) {
				if (event.shiftKey && event.key === ":") {
					event.preventDefault();
					toggleSidebar();
				}
			});
		});
	
	
	</script>
@endpush

