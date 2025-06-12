<?php
	
	namespace App\Helpers;
	
	class SanitizeHelper
	{
		/**
		 * Sanitiza un valor flotante de forma segura.
		 *
		 * @param mixed $value
		 * @param float $default Valor por defecto si la sanitización falla
		 * @return float
		 */
		public static function sanitizeFloat($value,float $default = 0.0):float{
			// Si ya es un número, devolverlo
			if(is_numeric($value)){
				return (float)$value;
			}
			
			// Si es string, intentar limpiar
			if(is_string($value)){
				// Remover espacios
				$cleaned = trim($value);
				
				// Aplicar filtro de sanitización
				$sanitized = filter_var($cleaned,FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
				
				// Validar que el resultado sea un número válido
				if($sanitized !== false && is_numeric($sanitized)){
					return (float)$sanitized;
				}
			}
			
			return $default;
		}
	}
