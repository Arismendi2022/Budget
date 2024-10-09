//Centra el modalsegun tamaño de la ventana.
function centerModal() {
  const modal = $('#new-budget .modal');
  const windowSize = {width: $(window).width(), height: $(window).height()};
  const modalSize = {width: modal.outerWidth(), height: modal.outerHeight()};

  // Calcular y aplicar la posición
  modal.css({
    'left': (windowSize.width - modalSize.width) / 2 + 'px',
    'top': (windowSize.height - modalSize.height) / 2 + 'px',
    'position': 'fixed'
  });
}
