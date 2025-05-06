<?php
	
	namespace App\Helpers;
	
	use App\Models\Budget;
	
	class FormatCurrencyHelper
	{
		public static function formatCurrency(?float $amount):string{
			// Obtener el presupuesto activo (asumimos que siempre existe)
			$budget = Budget::where('is_active',true)->first();
			
			// Usar 0 si el monto es null
			$value = $amount ?? 0;
			
			// Formatear el número usando NumberFormatter
			$formattedNumber = NumberFormatter::format($value);
			
			// Obtener el símbolo de la moneda usando CurrencyHelper
			$currencySymbol = CurrencyHelper::getCurrency();
			
			// Obtener la posición del símbolo desde la tabla Budget
			$position = $budget->currency_placement;
			
			// Combinar el símbolo y el número según la posición
			$result = match (strtolower($position)) {
				'after' => $formattedNumber.$currencySymbol,
				'before' => $currencySymbol.$formattedNumber,
				'dont' => $formattedNumber,
			};
			
			return $result;
		}
	}