<?php
	if(!function_exists('format_number')){
		/**
		 * Formatea un número según la configuración regional.
		 *
		 * @param float|null $number El número a formatear.
		 * @return string El número formateado.
		 */
		function format_number(float|null $number):string{
			return \App\Helpers\NumberFormatter::format($number ?? 0);
		}
	}
	
	if(!function_exists('format_date')){
		/**
		 * Formatea una fecha según la configuración regional.
		 *
		 * @param string|null $date La fecha a formatear.
		 * @return string La fecha formateada.
		 */
		function format_date(?string $date):string{
			return \App\Helpers\DateFormatter::format($date ?? '');
		}
	}
	
	if(!function_exists('currency')){
		/**
		 * Obtiene el símbolo de la moneda basado en el presupuesto activo.
		 * Si no se encuentra una moneda configurada, devuelve el símbolo de dólar ($) por defecto.
		 *
		 * @return string Símbolo de la moneda.
		 */
		function currency(string $currencyCode = null):string{
			return \App\Helpers\CurrencyHelper::getCurrency($currencyCode);
		}
	}
	
	// Registrar la función global
	if(!function_exists('generateDayOptions')){
		/**
		 * Genera las opciones HTML para un dropdown de días del mes.
		 *
		 * @param string|null $selected Día seleccionado (opcional)
		 * @return string
		 */
		function generateDayOptions($selected = null){
			return App\Helpers\DateHelpers::generateDayOptions($selected);
		}
	}
	
	if(!function_exists('format_currency')){
		/**
		 * Formatea un número como una cantidad monetaria, incluyendo el símbolo de la moneda y su posición.
		 *
		 * @param float|null $amount La cantidad a formatear.
		 * @return string La cantidad formateada con el símbolo de la moneda.
		 * format_currency($budgetTotal) devuelve €1,500.75.
		 */
		function format_currency(float|null $amount):string{
			return \App\Helpers\FormatCurrencyHelper::formatCurrency($amount);
		}
	}
	
	if(!function_exists('years_range')){
		/**
		 * Genera un array de años para usar en selects.
		 *
		 * @param int $startYear Año inicial
		 * @param int $endYear Año final
		 * @return array Array asociativo con los años como clave y valor
		 */
		function years_range($startYear = 2025,$endYear = 2074){
			return \App\Helpers\YearsHelper::getYearsRange($startYear,$endYear);
		}
	}
	

	
