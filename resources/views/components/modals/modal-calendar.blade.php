{{-- modal calendart --}}
<div id="ember148" class="ynab-u modal-calendar">
  <div class="modal" role="dialog" aria-modal="true" style="top: 57.4667px; left: 256.466px;">
    <div class="ynab-calendar">
      <div class="month-picker">
        <div class="month-picker-years">
          <div class="month-picker-years-item month-picker-prev-year">
            <button class="ghost-button primary is-icon-only type-body month-picker-nav-button" title="Previous Year" type="button">
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
            2024
          </div>
          <div class="month-picker-years-item month-picker-next-year">
            <button class="ghost-button primary is-icon-only type-body month-picker-nav-button" title="Next Year" type="button">
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
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Jan 2024" type="button">
            Jan
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Feb 2024" type="button">
            Feb
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Mar 2024" type="button">
            Mar
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Apr 2024" type="button">
            Apr
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="May 2024" type="button">
            May
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Jun 2024" type="button">
            Jun
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item is-selected is-current-month" aria-label="Jul 2024" type="button">
            Jul
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Aug 2024" type="button">
            Aug
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Sep 2024" type="button">
            Sep
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Oct 2024" type="button">
            Oct
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Nov 2024" type="button">
            Nov
          </button>
          <button class="ghost-button secondary type-body month-picker-months-item" aria-label="Dec 2024" type="button">
            Dec
          </button>
        </div>
      </div>
    </div>
    <svg class="modal-arrow" viewBox="0 0 100 100" preserveAspectRatio="none" style="left: 97px; bottom: 100%; height: 0.9375rem; width: 1.875rem;">
      <path d="M 0 100 L 50 0 L 100 100 L 0 100 Z" transform=""></path>
    </svg>
  </div>
</div>

@push('scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
      const currentDate = new Date();
      const currentMonth = currentDate.getMonth();
      const currentYear = currentDate.getFullYear();
      const monthButtons = document.querySelectorAll(".month-picker-months-item");

      // Seleccionar el mes actual al cargar la página
      monthButtons.forEach(button => {
        if (button.textContent.trim() === monthNames[currentMonth]) {
          button.classList.add("is-selected");
        } else {
          button.classList.remove("is-selected");
        }
      });

      // Actualizar el texto del botón de la fecha actual
      document.getElementById("current-date").textContent = monthNames[currentMonth] + " " + currentYear;

      // Agregar evento de clic a cada botón de mes
      monthButtons.forEach(button => {
        button.addEventListener("click", function () {
          // Remover la clase 'is-selected' de todos los botones
          monthButtons.forEach(btn => btn.classList.remove("is-selected"));
          // Agregar la clase 'is-selected' al botón clicado
          this.classList.add("is-selected");
          // Actualizar el texto del botón de la fecha actual
          document.getElementById("current-date").textContent = this.textContent + " " + currentYear;
        });
      });
    });

  </script>

@endpush
