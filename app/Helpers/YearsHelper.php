<?php
	
	namespace App\Helpers;
	
	use Carbon\Carbon;
	
	class YearsHelper
	{
		/**
		 * Genera un array de años para usar en selects.
		 *
		 * @param int $startYear Año inicial
		 * @param int $endYear Año final
		 * @return array Array asociativo con los años como clave y valor
		 */
		public static function getYearsRange($startYear = null,$endYear = 2074){
			// Usar el año actual si no se proporciona $startYear
			$startYear = $startYear ?? Carbon::now()->year;
			
			$years = [];
			for($year = $startYear;$year <= $endYear;$year++){
				$years[$year] = $year;
			}
			return $years;
		}
	}