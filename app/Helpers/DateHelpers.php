<?php
	
	namespace App\Helpers;
	
	class DateHelpers
	{
		/**
		 * Genera las opciones HTML para un dropdown de días del mes.
		 *
		 * @param string|null $selected Día seleccionado (opcional)
		 * @return string
		 */
		public static function generateDayOptions($selected = null):string{
			$html = '';
			
			// Opción por defecto: Último día del mes
			$html .= '<option value=""'.(empty($selected) ? ' selected' : '').'>'.PHP_EOL;
			$html .= '  Last Day of Month'.PHP_EOL;
			$html .= '</option>'.PHP_EOL;
			
			// Generar opciones del 31 al 1
			for($day = 31;$day >= 1;$day--){
				$suffix     = ($day == 1) ? 'st' : (($day == 2) ? 'nd' : (($day == 3) ? 'rd' : 'th'));
				$isSelected = ($selected == $day) ? ' selected' : '';
				$html       .= '<option value="'.$day.'"'.$isSelected.'>'.PHP_EOL;
				$html       .= '  '.$day.$suffix.PHP_EOL;
				$html       .= '</option>'.PHP_EOL;
			}
			
			return $html;
		}
	}