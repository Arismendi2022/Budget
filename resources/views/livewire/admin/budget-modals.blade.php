<div>
	{{-- Modal Category Group --}}
	@if($isOpenCategoryGroupModal)
		<div id="categoryGroup" class="modal-overlay active ynab-u modal-popup modal-add-master-category" >
			<div class="modal" role="dialog" aria-modal="true" style="top: 179.5px; left: {{ $modalGroupLeft }};">
				<div class="modal-content">
					<div class="fieldset">
						<div class="field-with-error {{ $errors->has('name') ? 'has-errors' : '' }}">
							<div>
								<input id="nameGroup" placeholder="New Category Group" class="user-data js-focus-on-start"
									wire:model="name" wire:keydown.enter="createCategoryGroup">
							</div>
							@if ($errors->has('name'))
								<ul class="errors">
									<li>{{ $errors->first('name') }}</li>
								</ul>
							@endif
							<!---->
						</div>
					</div>
				</div>
				<div class="modal-actions">
					<button wire:click="hidenCategoryGroupModal" class="ynab-button secondary " type="button">
						Cancel
					</button>
					<button wire:click="createCategoryGroup" class="ynab-button primary " type="button">
						OK
					</button>
				</div>
				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none"
					style="left: 97px; bottom: 100%; height: 0.9375rem; width: 1.875rem;">
					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform=""></path>
				</svg>
			</div>
		</div>
	@endif
	{{--Modal Edit Category group--}}
	@if($isUpdateCategoryGroupModal)
		<div id="editCategoryGroup" class="modal-overlay active ynab-u modal-popup modalc-budget-edit-category" wire:click.self="$set('isUpdateCategoryGroupModal', false)">
			<div class="modal" role="dialog" aria-modal="true" style="top: {{ $modalTop }}px; left: {{ $modalLeft }}px;">
				<div class="modal-content">
					<div class="fieldset">
						<div class="field-with-error {{ $errors->has('name') ? 'has-errors' : '' }}">
							<div>
								<input id="nameGroupEdit" placeholder="Enter category name"
									class="modal-budget-edit-category-name user-data js-focus-on-start" wire:model="name"
									wire:keydown.enter="updateCategoryGroup">
							</div>
							@if ($errors->has('name'))
								<ul class="errors">
									<li>{{ $errors->first('name') }}</li>
								</ul>
							@endif
							<!---->
						</div>
					</div>
				</div>
				<div class="modal-actions">
					<div class="modal-actions-left">
						<button class="ynab-button secondary   button-hide" type="button">
							Hide
						</button>
						<button class="ynab-button destructive   button-delete" type="button" wire:click="deleteCategoryGroup">
							Delete
						</button>
					</div>
					<div class="modal-actions-right">
						<button class="ynab-button secondary button-cancel" type="button" wire:click="hideEditCategoryGroupModal">
							Cancel
						</button>
						<button class="ynab-button primary  " type="button" wire:click="updateCategoryGroup">
							OK
						</button>
					</div>
				</div>
				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none"
					style="left: {{$modalArrowLeft}}px; {{$modalArrowStyle}}; height: 0.9375rem; width: 1.875rem;">
					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="{{$modalArrowTransform}}"></path>
				</svg>
			</div>
		</div>
	@endif
	{{--Modal New Category--}}
	@if($isOpenNewCategoryModal)
		<div id="newCategory" class="modal-overlay active ynab-u modal-popup modal-add-sub-category" wire:click.self="$set('isOpenNewCategoryModal', false)">
			<div class="modal" role="dialog" aria-modal="true" style="top: {{ $modalTop }}px; left: {{ $modalLeft }}px;">
				<div class="modal-content">
					<div class="fieldset">
						<div class="field-with-error {{ $errors->has('name') ? 'has-errors' : '' }}">
							<div>
								<input id="category" placeholder="New Category" autofocus="" class="user-data js-focus-on-start" wire:model="name" wire:keydown.enter="createCategoryGroup">
							</div>
							@if ($errors->has('name'))
								<ul class="errors">
									<li>{{ $errors->first('name') }}</li>
								</ul>
							@endif
							<!---->
						</div>
					</div>
				</div>
				<div class="modal-actions">
					<button class="ynab-button secondary  " type="button" wire:click="hideNewCategoryModal">
						Cancel
					</button>
					<button class="ynab-button primary  " type="button" wire:click="createNewCategory">
						OK
					</button>
				</div>
				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none" style="left: {{$modalArrowLeft}}px; {{$modalArrowStyle}}; height: 0.9375rem; width: 1.875rem;">
					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="{{$modalArrowTransform}}"></path>
				</svg>
			</div>
		</div>
	@endif
	{{--Modal Edit Category--}}
	@if($isOpenEditCategoryModal)
		<div id="editCategoryModal" class="modal-overlay active ynab-u modal-popup modal-budget-edit-category" wire:click.self="$set('isOpenEditCategoryModal', false)">
			<div class="modal" role="dialog" aria-modal="true" style="top: {{ $modalTop }}px; left: {{ $modalLeft }}px;">
				<div class="modal-content">
					<div class="fieldset">
						<div class="field-with-error {{ $errors->has('name') ? 'has-errors' : '' }} ">
							<div>
								<input id="editCategory" placeholder="Enter category name" class="modal-budget-edit-category-name user-data js-focus-on-start" wire:model="name"
									wire:keydown.enter="updateModalCategory">
							</div>
							@if ($errors->has('name'))
								<ul class="errors">
									<li>{{ $errors->first('name') }}</li>
								</ul>
							@endif
						</div>
					</div>
				</div>
				<div class="modal-actions">
					<div class="modal-actions-left">
						<button class="ynab-button secondary   button-hide" type="button">
							Hide
						</button>
						<button class="ynab-button destructive   button-delete" type="button" wire:click="deleteCategory">
							Delete
						</button>
					</div>
					<div class="modal-actions-right">
						<button wire:click="hideCategoryModal" class="ynab-button secondary button-cancel" type="button">
							Cancel
						</button>
						<button class="ynab-button primary  " type="button" wire:click="updateModalCategory">
							OK
						</button>
					</div>
				</div>
				<svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none"
					style="left: {{$modalArrowLeft}}px; {{$modalArrowStyle}}; height: 0.9375rem; width: 1.875rem;">
					<path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform="{{$modalArrowTransform}}"></path>
				</svg>
			</div>
		</div>
	@endif
</div>

@push('scripts')
	<script>
		// foco a los inputs
		document.addEventListener('DOMContentLoaded', () => {
			window.addEventListener('focusInput', e =>
				setTimeout(() => document.getElementById(e.detail.inputId)?.focus(), 10)
			);

			const isCollapsed = () =>
				document.querySelector(".sidebar").classList.contains("sidebar-resized-collapsed");

			const calculatePosition = (rect, {modalWidth = 400, modalHeight = 108.7, useCenter = false} = {}) => {
				const margin = 14;
				const left = useCenter ? rect.left + window.scrollX + (rect.width / 2) - (modalWidth / 2)
					: isCollapsed() ? 10 : rect.left + window.scrollX + (rect.width / 2) - (modalWidth / 2);

				const spaceBelow = window.innerHeight - rect.bottom - margin;
				const isBelow = spaceBelow >= modalHeight;

				return {
					left,
					top: isBelow ? rect.bottom + window.scrollY + margin : rect.top + window.scrollY - modalHeight - margin,
					arrowLeft: isCollapsed() && !useCenter ? Math.min(rect.left - left + (rect.width / 2) - 15, modalWidth - 30)
						: Math.max((modalWidth / 2) - 15, 20),
					arrowStyle: isBelow ? "bottom: 100%" : "top: 100%",
					arrowTransform: isBelow ? "" : "rotate(180 50 50)"
				};
			};

			window.setAddGroupModalPosition = () =>
				Livewire.dispatch("updateAddGroupModal", {left: isCollapsed() ? "21.55px" : "225.55px"});

			window.setModalPosition = (event) =>
				Livewire.dispatch("updateModalPosition",
					calculatePosition(event.target.getBoundingClientRect())
				);

			window.setModalPositionCategory = (event) =>
				Livewire.dispatch("updateModalPosition",
					calculatePosition(event.target.getBoundingClientRect(), {modalWidth: 224, useCenter: true})
				);

			window.setModalPositionEdit = (event) =>
				Livewire.dispatch("updateModalPosition",
					calculatePosition(event.target.getBoundingClientRect())
				);

		});

		//Script para colapsar/expandir grupo y sub grupos
		document.addEventListener('DOMContentLoaded', () => {
			const masterToggle = document.querySelector('.js-budget-table-cell-collapse');
			const masterIcon = masterToggle.querySelector('svg use');
			const masterGroups = document.querySelectorAll('.is-master-category');

			const toggleGroup = (group, expand) => {
				const icon = group.querySelector('.js-budget-table-cell-collapse svg use');
				group.setAttribute('aria-expanded', expand);
				icon?.setAttribute('href', expand ? '#icon_sprite_chevron_down' : '#icon_sprite_chevron_right');

				// Buscar todas las subcategorías siguientes hasta el próximo grupo o fin
				let nextElement = group.nextElementSibling;
				const subcategories = [];

				while (nextElement && nextElement.classList.contains('is-sub-category')) {
					subcategories.push(nextElement);
					nextElement = nextElement.nextElementSibling;
				}

				subcategories.forEach(sub => {
					sub.style.display = expand ? '' : 'none';
				});
			};

			const updateMasterIcon = () => {
				const anyExpanded = Array.from(masterGroups).some(g => g.getAttribute('aria-expanded') === 'true');
				masterToggle.setAttribute('aria-expanded', anyExpanded);
				masterIcon.setAttribute('href', anyExpanded ? '#icon_sprite_chevron_down' : '#icon_sprite_chevron_right');
			};

			masterToggle.addEventListener('click', () => {
				const expand = masterToggle.getAttribute('aria-expanded') !== 'true';
				masterGroups.forEach(group => toggleGroup(group, expand));
				updateMasterIcon();
			});

			masterGroups.forEach(group => {
				const collapseBtn = group.querySelector('.js-budget-table-cell-collapse');
				if (collapseBtn) {
					collapseBtn.addEventListener('click', () => {
						toggleGroup(group, group.getAttribute('aria-expanded') !== 'true');
						updateMasterIcon();
					});
				}
			});

			// Establecer estado inicial
			masterGroups.forEach(group => {
				const isExpanded = group.getAttribute('aria-expanded') === 'true';
				toggleGroup(group, isExpanded);
			});
			updateMasterIcon();

		});
	
	
	</script>
@endpush
