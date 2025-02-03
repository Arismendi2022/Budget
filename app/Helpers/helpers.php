<?php
	
	if(!function_exists('format_number')){
		function format_number(float|null $number):string{
			return \App\Helpers\NumberFormatter::format($number);
		}
	}
