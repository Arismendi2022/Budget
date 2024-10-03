{{-- Modal Budget Edit --}}
<div id="editBudget" class="modal-fresh mod-skinny modal-budget-settings">
	<div class="modal" role="dialog" aria-modal="true" style="left: 720px; top: 263.5px;">
		<div class="modal-fresh-header">
			<div class="modal-fresh-title">Budget Settings</div>
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
		<div class="modal-fresh-body">
			<section>
				<form id="edit-budget-form" action="{{ route('budget.update') }}" method="POST">
					@csrf
					<input type="hidden" name="budget_id" value="{{ $budget->id }}">
					<label for="budget-name" class="type-body-bold">Budget Name</label>
					<div class="field-with-error">
						<div>
							<input id="modal-settings-budget-name" name="name" class="ember-text-field ember-view modal-budget-settings-name " type="text" value="{{
              $budget->name }}">
							<!---->
						</div>
						{{-- <ul id="errorList" class="errors warnings">
							<li></li>
						</ul> --}}
						<!---->
						@error('name')
						<span class="text-danger" style="color: red;">{{ $message }}</span>
						@enderror
					</div>
					<div class="modal-budget-settings-currency-fields">
						<div>
							<label for="modal-settings-currency" class="type-body-bold">Currency</label>
							<div class="x-select-container ">
								<select class="js-x-select" id="modal-settings-currency">
									<!---->
									@foreach (App\Helpers\FormatHelper::getCurrencies() as $item => $currencies)
										<optgroup label="{{ $item }}">
											@foreach ($currencies as $code => $name)
												<option value="{{ $code }}"
													{{ isset($budget) && $budget['currency'] == $code ? 'selected' : '' }}>
													{{ $name }} – {{ $code }}
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
							<div class="x-select-container  ">
								<select class="js-x-select" id="modal-settings-currency-placement" name="currency_placement">
									<!---->
									@foreach (App\Helpers\FormatHelper::getPlacement() as $item => $displayPlacement)
										<option value="{{ $item }}"
											{{ isset($budget) && $budget->currency_placement === $item ? 'selected' : '' }}>
											{{ $displayPlacement }}
										</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<label for="modal-settings-currency-format" class="type-body-bold">Number Format</label>
					<div class="x-select-container  ">
						<select class="js-x-select" id="modal-settings-currency-format">
							<!---->
							@foreach (App\Helpers\FormatHelper::getNumberFormats() as $item => $displayNumber)
								<option value="{{ $item }}"
									{{ isset($budget) && $budget->number_format === $item ? 'selected' : '' }}>
									{{ $displayNumber }}
								</option>
							@endforeach
						</select>
					</div>
					<label for="modal-settings-date-format" class="type-body-bold">Date Format</label>
					<div class="x-select-container  ">
						<select class="js-x-select" id="modal-settings-date-format">
							<!---->
							@foreach (App\Helpers\FormatHelper::getDateFormats() as $item => $displayDate)
								<option value="{{ $item }}"
									{{ isset($budget) && $budget->date_format === $item ? 'selected' : '' }}>
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
			<button class="ynab-button secondary" type="button">Cancel</button>
			<button class="ynab-button primary" type="submit">Apply Settings</button>
		</div>
		<!---->
	</div>
</div>

@push('scripts')
	<script>
		$(function() {
			// Centra al redimensionar la ventana
			$(window).on('resize', function() {
				$('.modal-fresh .modal').css({
					'top': ($(window).height() - $('.modal-fresh .modal').outerHeight()) / 2 + 'px',
					'left': ($(window).width() - $('.modal-fresh .modal').outerWidth()) / 2 + 'px'
				});
			}).trigger('resize');

			// Manejar el envío del formulario
			$('.modal-fresh-footer').on('click', '.ynab-button.primary', function(e) {
				e.preventDefault();

				const $form = $('#edit-budget-form');

				$.ajax({
					url: $form.attr('action'),
					method: $form.attr('method'),
					data: $form.serialize(),
					dataType: 'json',
					success: function(response) {
						if(response.success) {
							closeModal(); // Llamar a la función para cerrar el modal
						}
					},
					error: function(xhr) {
						if(xhr.status === 422) {
							const errors = xhr.responseJSON.errors;

							if(errors.name) {
								$('.field-with-error').addClass('has-errors');
								$('.errors').removeClass('warnings'); // Quita la clase 'warnings'
								$('#message-error').text(errors.name[0]);
							}
						} else {
							// Mensaje genérico para otros errores
							$('#message-error').text('Ocurrió un error, por favor intenta de nuevo.');
						}
					}
				});
			});

			// Llama a la función closeModal al hacer clic en el botón de cerrar
			$(".modal-fresh-close").click(function() {
				closeModal();
			});

			// Función para cerrar el modal
			function closeModal() {
				$('#editBudget').removeClass('modal-overlay active');
				$('#edit-budget-form')[0].reset();
			}

			// Eventos
			//$('#modal-settings-budget-name').focus();
			//Cierra el modal.
			$('.modal-fresh-footer .ynab-button.secondary').on('click', closeModal);
		})

	</script>
@endpush

