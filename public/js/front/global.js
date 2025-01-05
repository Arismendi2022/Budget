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

// funcion drag & drop
function initializeDragAndDrop() {
	const groupContainers = document.querySelectorAll('.accounts-container');

	groupContainers.forEach(container => {
		let draggedElement = null;
		let placeholder = document.createElement('div');
		placeholder.classList.add('drag-placeholder');

		container.addEventListener('dragstart', event => {
			if (!event.target.classList.contains('nav-account-row')) return;

			draggedElement = event.target;
			draggedElement.style.opacity = '0.9';
			placeholder.style.height = `${draggedElement.offsetHeight + 3}px`;
			event.dataTransfer.setData('text/plain', '');
			event.dataTransfer.effectAllowed = 'move';
		});

		container.addEventListener('dragend', () => {
			if (draggedElement) {
				draggedElement.style.opacity = '1';
				placeholder.remove();
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
		});

		container.addEventListener('drop', event => {
			event.preventDefault();
			if (draggedElement) {
				placeholder.parentNode.replaceChild(draggedElement, placeholder);
				const order = Array.from(container.querySelectorAll('.nav-account-row'))
					.map(item => item.dataset.accountId);

				// Llamar al metodo Livewire para actualizar el orden
				Livewire.dispatch('updateOrder', {orderedIds: order});
			}
		});
	});
};

// Ejecutar la función al cargar la página
document.addEventListener('DOMContentLoaded', initializeDragAndDrop);


                   