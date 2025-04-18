{{-- modal create new budget --}}
<div>
	@if($isOpenCreateModal)
		<div id="new_budget_modal" class="modal-overlay active modal-fresh mod-skinny modal-budget-settings is-centered">
			<div class="modal" role="dialog" aria-modal="true" >
				<div class="modal-fresh-header">
					<div class="modal-fresh-title">{{ $isUpdateBudgetModal ? 'Budget Settings' : 'New Budget' }}</div>
					<button class="modal-fresh-close" aria-label="Close" title="Close" type="button" wire:click="hideCreateModalForm">
						<svg class="ynab-new-icon" width="16" height="16">
							<!---->
							<use href="#icon_sprite_close">
								<symbol xmlns="http://www.w3.org/2000/svg" id="icon_sprite_close" fill="n¶one" viewBox="0 0 24 24">
									<path fill="currentColor" fill-rule="evenodd"
										d="M22.5 22.5a1.4 1.4 0 0 1-2 0L12 13.9l-8.6 8.6a1.4 1.4 0 0 1-1.9-2l8.6-8.5-8.6-8.5a1.4 1.4 0 0 1 2-2l8.5 8.6 8.5-8.6a1.4 1.4 0 1 1 2 2L13.9 12l8.6 8.6a1.4 1.4 0 0 1 0 1.9"
										clip-rule="evenodd"></path>
								</symbol>
							</use>
						</svg>
					</button>
					<!---->
				</div>
				<div class="modal-fresh-body">
					<section>
						<form id="newBudget-form">
							@csrf
							@if($isUpdateBudgetModal)
								<input type="hidden" name="budget_id" wire:model="budgetId">
							@endif
							<label for="budget-name" class="type-body-bold">Budget Name</label>
							<div class="field-with-error {{ $errors->has('name') ? 'has-errors' : '' }}">
								<div>
									<input id="budget-name" class="ember-text-field ember-view modal-budget-settings-name" onfocus="this.select()" autofocus type="text" wire:model="name">
								</div>
								<!---->
								<ul class="errors {{ $errors->has('name') ? '' : 'warnings' }}">
									@if ($errors->has('name'))
										<li>{{ $errors->first('name') }}</li>
									@endif
								</ul>
							</div>
							<!---->
							<div class="modal-budget-settings-currency-fields">
								<div>
									<label for="modal-settings-currency" class="type-body-bold">Currency</label>
									<div class="x-select-container">
										<select wire:model="currency" class="js-x-select" id="modal-settings-currency">
											<!---->
											@foreach ($currencies as $item => $currencyGroup)
												<optgroup label="{{ $item }}">
													@foreach ($currencyGroup as $code => $name)
														<option value="{{ $code }}"
															{{ $isUpdateBudgetModal && isset($budget) && $budget['currency'] === $code ? 'selected' : '' }}>
															{{ $name }}
														</option>
													@endforeach
												</optgroup>
											@endforeach
										</select>
									</div>
								</div>
								<div>
									<label for="modal-settings-currency-placement" class="type-body-bold">
										Currency Placement
									</label>
									<div class="x-select-container">
										<select wire:model="currency_placement" class="js-x-select" id="modal-settings-currency-placement">
											@foreach ($placement as $item => $displayPlacement)
												<option value="{{ $item }}"
													{{ $isUpdateBudgetModal && isset($budget) && $budget['currency_placement'] === $code ? 'selected' : '' }}>
													{{ $displayPlacement }}
												</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<label for="modal-settings-currency-format" class="type-body-bold">
								Number Format
							</label>
							<div class="x-select-container ">
								<select wire:model="number_format" class="js-x-select" id="modal-settings-currency-format">
									@foreach ($numberFormats as $item => $displayNumber)
										<option value="{{ $item }}"
											{{ $isUpdateBudgetModal && isset($budget) && $budget['number_format'] === $code ? 'selected' : '' }}>
											{{ $displayNumber }}
										</option>
									@endforeach
								</select>
							</div>
							<label for="modal-settings-date-format" class="type-body-bold">
								Date Format
							</label>
							<div class="x-select-container ">
								<select wire:model="date_format" class="js-x-select" id="date-format">
									@foreach ($dateFormats as $item => $displayDate)
										<option value="{{ $item }}"
											{{ $isUpdateBudgetModal && isset($budget) && $budget['date_format'] === $code ? 'selected' : '' }}>
											{{ $displayDate }}
										</option>
									@endforeach
								</select>
							</div>
						</form>
					</section>
					<!---->
				</div>
				<div class="modal-fresh-footer">
					<button class="ynab-button secondary" type="button" wire:click.prevent="hideCreateModalForm">Cancel</button>
					<button class="ynab-button primary" type="button" wire:click.prevent="{{ $isUpdateBudgetModal ? 'updateBudget' : 'saveBudget' }}"> {{ $isUpdateBudgetModal ? 'Apply
             Settings' : 'Create Budget' }}</button>
				</div>
				<!---->
			</div>
			<!---->
		</div>
	@endif
	<!---->
</div>
@push('scripts')
	<script>

		$(function () {
			Livewire.on('redirect-budget', function () {
				setTimeout(function () {
					Livewire.navigate("{{ route('admin.budget') }}");
				}, 500); // 500 ms = 0.6 segundos
			});

			window.addEventListener('focusInput', function () {
				setTimeout(function () {
					$('#budget-name').focus();
				}, 10); // Retraso de 10 ms
			});
		});

		// Función para centrar el modal
		/*(function () {
			// Si ya existe la función, no la redefinimos
			if (window.updateModalPosition) return;

			window.updateModalPosition = () => {
				const modal = document.querySelector('#new_budget_modal .modal');
				const modalOverlay = document.querySelector('#new_budget_modal.modal-overlay.active');
				if (!modal) return;
				if (modalOverlay) {
					const left = (window.innerWidth - modal.offsetWidth) / 2;
					const top = (window.innerHeight - modal.offsetHeight) / 2;
					modal.setAttribute('style', `left: ${left}px; top: ${top}px;`);
				} else {
					modal.removeAttribute('style');
				}
			};

			const observer = new MutationObserver(() => window.updateModalPosition());
			window.addEventListener('resize', () => window.updateModalPosition());
			document.addEventListener('DOMContentLoaded', () => {
				observer.observe(document.body, {childList: true, subtree: true});
				window.updateModalPosition();
			});
		})();*/
	
	</script>
@endpush



