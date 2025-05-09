<div>
	{{-- Modal Calendar--}}
	@if($isOpenCalendarModal)
		<div id="modalCalendarHeader" class=" modal-overlay active ynab-u modal-calendar " wire:click="closeCalendarModal">
			<div class="modal" role="dialog" aria-modal="true" style="top: 57.4667px; left: 258.15px; " wire:click.stop>
				<div class="ynab-calendar">
					<div class="month-picker">
						<div class="month-picker-years">
							<div class="month-picker-years-item month-picker-prev-year">
								<button class="ghost-button primary is-icon-only type-body month-picker-nav-button" title="Previous Year" type="button" wire:click="previousYear">
									<svg class="ynab-new-icon " width="24" height="24">
										<!---->
										<use href="#icon_sprite_chevron_left_circle">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_left_circle" fill="none" viewBox="0 0 24 24">
												<path fill="currentColor"
													d="M12 24a12 12 0 0 0 12-12c0-6.6-5.5-12-12-12A12 12 0 0 0 0 12a12 12 0 0 0 12 12m0-2A10 10 0 0 1 2 12a10 10 0 1 1 10 10m2.3-4.2a1 1 0 0 0 0-1.2L9.5 12l4.8-4.5a1 1 0 0 0 0-1.3 1 1 0 0 0-1.2 0L8 11c-.6.6-.6 1.7 0 2.3l5 4.6c.3.3 1 .3 1.2 0"></path>
											</symbol>
										</use>
									</svg>
								</button>
							</div>
							<div class="month-picker-years-item month-picker-selected-year">
								{{ $selectedYear }}
							</div>
							<div class="month-picker-years-item month-picker-next-year">
								<button class="ghost-button primary is-icon-only type-body month-picker-nav-button" title="Next Year" type="button" wire:click="nextYear">
									<svg class="ynab-new-icon " width="24" height="24">
										<!---->
										<use href="#icon_sprite_chevron_right_circle">
											<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_chevron_right_circle" fill="none" viewBox="0 0 24 24">
												<path fill="currentColor"
													d="M12 .4A12 12 0 0 0 0 12.2a12 12 0 0 0 24 0A12 12 0 0 0 12 .4m0 2A9.8 9.8 0 1 1 12 22a10 10 0 0 1-10-9.8c0-5.5 4.5-9.8 10-9.8m-2.3 4a1 1 0 0 0 0 1.3l4.8 4.5-4.8 4.4a1 1 0 0 0 0 1.3c.3.3.9.3 1.2 0l5-4.6c.6-.6.6-1.7 0-2.3l-5-4.5c-.3-.3-1-.3-1.2 0"></path>
											</symbol>
										</use>
									</svg>
								</button>
							</div>
						</div>
						<div class="month-picker-months">
							@foreach($months as $month)
								<button
									wire:click="selectMonth({{ $month['number'] }})"
									class="ghost-button secondary type-body month-picker-months-item {{ $month['isSelected'] ? 'is-selected' : '' }} {{ $month['isCurrentMonth'] ? 'is-current-month' : '' }}"
									aria-label="{{ $month['name'] }} {{ $selectedYear }}"
									type="button">
									{{ $month['name'] }}
								</button>
							@endforeach
						</div>
					</div>
				</div>
				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none" style="left: 97px; bottom: 100%; height: 0.9375rem; width: 1.875rem;">
					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform=""></path>
				</svg>
			</div>
		</div>
	@endif
</div>
@push('scripts')
	<script>
		/**
		 * Ajusta el modal del calendario según el estado de la barra lateral
		 */
		const updateCalendarHeaderModal = () => {
			const collapsed = document.getElementById("sidebar")?.classList.contains("sidebar-resized-collapsed");

			// Actualiza específicamente el modalCalendarHeader usando su ID
			const calendarHeaderModal = document.getElementById("modalCalendarHeader");
			if (calendarHeaderModal) {
				const calendarHeaderModalContent = calendarHeaderModal.querySelector(".modal");
				if (calendarHeaderModalContent) {
					calendarHeaderModalContent.style.left = collapsed ? "56.0663px" : "258.15px";
				}
			}
		};

		// Observer y eventos
		new MutationObserver(() => {
			if (document.getElementById("modalCalendarHeader")) {
				updateCalendarHeaderModal();
			}
		}).observe(document.body, {childList: true, subtree: true});

		document.addEventListener("livewire:load", updateCalendarHeaderModal);
		window.addEventListener("livewire:update", updateCalendarHeaderModal);
	</script>
@endpush
