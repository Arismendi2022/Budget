<?php
	
	namespace App\Helpers;
	
	use App\Models\Budget;
	
	class DateFormatter
	{
		public static function format(?string $date):string{
			if(!$date){
				return '';
			}
			
			// Obtener el presupuesto activo
			$budget = Budget::where('is_active',true)->first();
			
			// Si no hay presupuesto activo o no tiene formato, usar el formato predeterminado
			if(!$budget || !$budget->date_format){
				return date('d/m/Y',strtotime($date)); // Formato por defecto: DD/MM/YYYY
			}
			
			// Aplicar el formato guardado en la base de datos
			return match ($budget->date_format) {
				'YYYY/MM/DD' => date('Y/m/d',strtotime($date)),
				'YYYY-MM-DD' => date('Y-m-d',strtotime($date)),
				'DD-MM-YYYY' => date('d-m-Y',strtotime($date)),
				'DD/MM/YYYY' => date('d/m/Y',strtotime($date)),
				'DD.MM.YYYY' => date('d.m.Y',strtotime($date)),
				'MM/DD/YYYY' => date('m/d/Y',strtotime($date)),
				'YYYY.MM.DD' => date('Y.m.d',strtotime($date)),
				default => date('d/m/Y',strtotime($date)),
			};
		}
	}

