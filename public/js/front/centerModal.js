//Centra el modalsegun tamaño de la ventana.
/*function centerModal(selector) {
  const modal = document.querySelector(selector);
  if(!modal) return;

  requestAnimationFrame(() => {
    const {innerWidth: wW, innerHeight: wH} = window;
    const {offsetWidth: mW, offsetHeight: mH} = modal;
    Object.assign(modal.style, {
      position: 'fixed',
      left: `${(wW - mW) / 2}px`,
      top: `${(wH - mH) / 2}px`,
      margin: '0',
      transform: 'none'
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  const observer = new MutationObserver(() => {
    centerModal('.modal'); // Replace with your modal selector
  });

  observer.observe(document.body, {childList: true, subtree: true});

  window.addEventListener('resize', () => {
    centerModal('.modal'); // Replace with your modal selector
  });
});*/
