<?php
	
	namespace App\Helpers;
	
	use App\Models\Budget;
	
	class NumberFormatter
	{
		public static function format(float $number):string{
			// Obtener el presupuesto activo
			$budget = Budget::where('is_active',true)->first();
			
			// Si no hay presupuesto activo o no tiene formato, usar el formato predeterminado
			if(!$budget || !$budget->number_format){
				return number_format($number,2,',','.'); // Formato por defecto: 1.234.567,89
			}
			
			// Aplicar el formato guardado en la base de datos
			return match ($budget->number_format) {
				'123,456.78' => number_format($number,2,'.',','),
				'123.456,78' => number_format($number,2,',','.'),
				'123,456.789' => number_format($number,3,'.',','),
				'123 456.78' => number_format($number,2,'.',' '),
				"123'456.78" => number_format($number,2,'.',"'"),
				'123.456' => number_format($number,0,'','.'),
				'123,456' => number_format($number,0,'',','),
				'123 456-78' => number_format($number,2,'-',' '),
				'123 456,78' => number_format($number,2,',',' '),
				'123,456/78' => number_format($number,2,'/',','),
				'123 456' => number_format($number,0,'',' '),
				'1,23,456.78' => number_format($number,2,'.',','),
				default => number_format($number,2,',','.'),
			};
		}
	}

	