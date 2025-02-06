<?php
	
	if(!function_exists('format_number')){
		function format_number(float|null $number):string{
			return \App\Helpers\NumberFormatter::format($number);
		}
	}
	
	if(!function_exists('format_date')){
		function format_date(?string $date):string{
			return \App\Helpers\DateFormatter::format($date);
		}
	}