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
	
	if(!function_exists('format_currency')){
		/**
		 * Formatea un número como una cantidad monetaria, incluyendo el símbolo de la moneda.
		 *
		 * @param float|null $amount La cantidad a formatear.
		 * @return string La cantidad formateada con el símbolo de la moneda.
		 * format_currency($budgetTotal) devuelve €1,500.75.
		 */
		function format_currency(float|null $amount):string{
			// Obtener el símbolo de la moneda
			$symbol = currency();
			
			// Formatear el número
			$formattedNumber = format_number($amount);
			
			// Combinar el símbolo y el número formateado
			return $symbol.$formattedNumber;
		}
	}


