// expande el input de search dar click...
// Función para inicializar eventos de búsqueda
function initializeSearchEvents() {
	const input = document.getElementById('search_Input');
	const container = document.getElementById('transaction_search');
	const searchInput = document.querySelector('.transaction-search-input');
	const cancelButton = document.querySelector('.js-transaction-search-cancel-icon');

	if (input && container) {
		input.addEventListener('click', function (event) {
			container.classList.add('is-active');
			event.stopPropagation();
		});
	}

	if (searchInput) {
		searchInput.addEventListener('input', function () {
			if (cancelButton) {
				cancelButton.style.display = this.value.trim().length > 0 ? 'block' : 'none';
			}
		});
	}

	if (cancelButton && searchInput) {
		cancelButton.addEventListener('click', function () {
			searchInput.value = '';
			cancelButton.style.display = 'none';
			container.classList.remove('is-active');
		});
	}
}

// Evento para clic fuera
document.addEventListener('click', function () {
	const container = document.getElementById('transaction_search');
	if (container) {
		container.classList.remove('is-active');
	}
});

// Inicializar en carga de página
document.addEventListener('DOMContentLoaded', initializeSearchEvents);

// Función principal de inicialización del drag & drop
document.addEventListener('DOMContentLoaded', () => {
	function initDragAndDrop() {
		const groupContainers = document.querySelectorAll('.accounts-container');

		groupContainers.forEach(container => {
			let draggedElement = null;
			const placeholder = createPlaceholder();

			function createPlaceholder() {
				const el = document.createElement('div');
				el.classList.add('drag-placeholder');
				el.style.display = 'none';
				container.appendChild(el);
				return el;
			}

			container.addEventListener('dragstart', event => {
				if (!event.target.classList.contains('nav-account-row')) return;

				draggedElement = event.target;
				draggedElement.style.opacity = '0.9';

				// Actualizar altura del placeholder
				placeholder.style.height = `${draggedElement.offsetHeight + 5}px`;
				placeholder.style.display = 'block';

				event.dataTransfer.setData('text/plain', '');
				event.dataTransfer.effectAllowed = 'move';
			});

			container.addEventListener('dragend', () => {
				if (draggedElement) {
					draggedElement.style.opacity = '1';
					placeholder.style.display = 'none';
					draggedElement = null;
				}
			});

			container.addEventListener('dragover', event => {
				event.preventDefault();

				const target = event.target.closest('.nav-account-row');
				if (!target || target === draggedElement) return;

				const offset = event.clientY - target.getBoundingClientRect().top;
				target.parentNode.insertBefore(
					placeholder,
					offset > target.offsetHeight / 2 ? target.nextSibling : target
				);
				placeholder.style.display = 'block';
			});

			container.addEventListener('drop', event => {
				event.preventDefault();
				if (draggedElement) {
					placeholder.parentNode.replaceChild(draggedElement, placeholder);
					container.appendChild(placeholder); // Mantener el placeholder en el DOM
					placeholder.style.display = 'none';

					const order = Array.from(container.querySelectorAll('.nav-account-row'))
						.map(item => item.dataset.accountId);
					Livewire.dispatch('updateOrder', {orderedIds: order});
				}
			});
		});
	}

	// Inicializar y manejar eventos livewire
	initDragAndDrop();

	if (typeof Livewire !== 'undefined') {
		Livewire.on('groupToggled', () => setTimeout(initDragAndDrop, 100));
	}

});



                   