<?php
	
	namespace App\Helpers;
	
	use App\Models\Budget;
	
	class CurrencyHelper
	{
		// Array de monedas como atributo estático
		private static $currencies = [
			"ALL" => "Lek",               // Albanian Lek
			"DZD" => "د.ج",              // Algerian Dinar
			"AOA" => "Kz",               // Angolan Kwanza
			"ARS" => "$",                // Argentine Peso
			"AMD" => "֏",                // Armenian Dram
			"AWG" => "ƒ",                // Aruban Florin
			"AUD" => "$",                // Australian Dollar
			"AZN" => "₼",                // Azerbaijanian Manat
			"BSD" => "$",                // Bahamian Dollar
			"BHD" => ".د.ب",             // Bahraini Dinar
			"BDT" => "৳",                // Bangladeshi Taka
			"BBD" => "$",                // Barbadian Dollar
			"BYN" => "Br",               // Belarusian Ruble
			"BZD" => "$",                // Belize Dollar
			"BOB" => "Bs.",              // Boliviano
			"BWP" => "P",                // Botswana Pula
			"BRL" => "R$",               // Brazilian Real
			"BND" => "$",                // Brunei Dollar
			"BGN" => "лв",               // Bulgarian Lev
			"KHR" => "៛",                // Cambodian Riel
			"CAD" => "$",                // Canadian Dollar
			"CVE" => "$",                // Cape Verdean Escudo
			"KYD" => "$",                // Cayman Islands Dollar
			"XAF" => "FCFA",             // Central African CFA Franc
			"XPF" => "₣",                // CFP Franc
			"CLP" => "$",                // Chilean Peso
			"CNY" => "¥",                // Chinese Yuan
			"COP" => "$",                // Colombian Peso
			"BAM" => "KM",               // Convertible Mark
			"CRC" => "₡",                // Costa Rican Colón
			"HRK" => "kn",               // Croatian Kuna
			"CZK" => "Kč",               // Czech Koruna
			"DKK" => "kr",               // Danish Krone
			"DJF" => "Fdj",              // Djiboutian Franc
			"DOP" => "RD$",              // Dominican Peso
			"XCD" => "$",                // East Caribbean Dollar
			"EGP" => "£",                // Egyptian Pound
			"ETB" => "Br",               // Ethiopian Birr
			"EUR" => "€",                // Euro
			"FJD" => "$",                // Fijian Dollar
			"GMD" => "D",                // Gambian Dalasi
			"GEL" => "₾",                // Georgian Lari
			"GHS" => "₵",                // Ghanaian Cedi
			"GTQ" => "Q",                // Guatemalan Quetzal
			"HTG" => "G",                // Haitian Gourde
			"HNL" => "L",                // Honduran Lempira
			"HKD" => "$",                // Hong Kong Dollar
			"HUF" => "Ft",               // Hungarian Forint
			"ISK" => "kr",               // Icelandic Króna
			"INR" => "₹",                // Indian Rupee
			"IDR" => "Rp",               // Indonesian Rupiah
			"IRR" => "﷼",                // Iranian Rial
			"IQD" => "ع.د",              // Iraqi Dinar
			"ILS" => "₪",                // Israeli New Shekel
			"JMD" => "$",                // Jamaican Dollar
			"JPY" => "¥",                // Japanese Yen
			"JOD" => "د.ا",              // Jordanian Dinar
			"KZT" => "₸",                // Kazakhstani Tenge
			"KES" => "KSh",              // Kenyan Shilling
			"KRW" => "₩",                // South Korean Won
			"KWD" => "د.ك",              // Kuwaiti Dinar
			"KGS" => "с",                // Kyrgystani Som
			"LAK" => "₭",                // Lao Kip
			"LBP" => "ل.ل",              // Lebanese Pound
			"LRD" => "$",                // Liberian Dollar
			"LYD" => "ل.د",              // Libyan Dinar
			"MOP" => "MOP$",             // Macanese Pataca
			"MKD" => "ден",              // Macedonian Denar
			"MGA" => "Ar",               // Malagasy Ariary
			"MWK" => "MK",               // Malawian Kwacha
			"MYR" => "RM",               // Malaysian Ringgit
			"MVR" => "Rf",               // Maldivian Rufiyaa
			"MUR" => "₨",                // Mauritian Rupee
			"MXN" => "$",                // Mexican Peso
			"MDL" => "L",                // Moldovan Leu
			"MNT" => "₮",                // Mongolian Tugrik
			"MAD" => "د.م.",             // Moroccan Dirham
			"MZN" => "MT",               // Mozambican Metical
			"NPR" => "₨",                // Nepalese Rupee
			"ANG" => "ƒ",                // Netherlands Antillean Guilder
			"TWD" => "NT$",              // New Taiwan Dollar
			"NZD" => "$",                // New Zealand Dollar
			"NIO" => "C$",               // Nicaraguan Córdoba
			"NGN" => "₦",                // Nigerian Naira
			"NOK" => "kr",               // Norwegian Krone
			"OMR" => "ر.ع.",             // Omani Rial
			"PKR" => "₨",                // Pakistani Rupee
			"PAB" => "B/.",              // Panamanian Balboa
			"PGK" => "K",                // Papua New Guinean Kina
			"PYG" => "₲",                // Paraguayan Guaraní
			"PEN" => "S/",               // Peruvian Sol
			"PHP" => "₱",                // Philippine Peso
			"PLN" => "zł",               // Polish Złoty
			"QAR" => "ر.ق",              // Qatari Riyal
			"RON" => "lei",              // Romanian Leu
			"RUB" => "₽",                // Russian Ruble
			"RWF" => "FRw",              // Rwandan Franc
			"SAR" => "ر.س",              // Saudi Riyal
			"RSD" => "дин.",             // Serbian Dinar
			"SLL" => "Le",               // Sierra Leonean Leone
			"SGD" => "$",                // Singapore Dollar
			"ZAR" => "R",                // South African Rand
			"LKR" => "₨",                // Sri Lankan Rupee
			"SDG" => "ج.س.",             // Sudanese Pound
			"SEK" => "kr",               // Swedish Krona
			"CHF" => "CHF",              // Swiss Franc
			"SYP" => "£",                // Syrian Pound
			"TZS" => "TSh",              // Tanzanian Shilling
			"THB" => "฿",                // Thai Baht
			"TOP" => "T$",               // Tongan Paʻanga
			"TTD" => "$",                // Trinidad and Tobago Dollar
			"TND" => "د.ت",              // Tunisian Dinar
			"TRY" => "₺",                // Turkish Lira
			"AED" => "د.إ",              // United Arab Emirates Dirham
			"UGX" => "USh",              // Ugandan Shilling
			"GBP" => "£",                // British Pound Sterling
			"UAH" => "₴",                // Ukrainian Hryvnia
			"UYU" => "$",                // Uruguayan Peso
			"USD" => "$",                // United States Dollar
			"UZS" => "лв",               // Uzbekistani Som
			"VND" => "₫",                // Vietnamese Dong
			"XOF" => "CFA",              // West African CFA Franc
			"YER" => "﷼",                // Yemeni Rial
			"ZMW" => "ZK",               // Zambian Kwacha
			"ZWD" => "Z$"                // Zimbabwean Dollar
		];
		
		
		/**
		 * Obtiene el símbolo de la moneda basado en el presupuesto activo.
		 * Si no se encuentra una moneda configurada, devuelve el símbolo de dólar ($) por defecto.
		 *
		 * @return string
		 */
		public static function getCurrency():string{
			// Obtener el presupuesto activo (siempre existe)
			$budget = Budget::where('is_active',true)->first();
			
			// Obtener el código de la moneda
			$currencyCode = $budget->currency;
			
			// Devolver el símbolo correspondiente o el símbolo de dólar si no se encuentra
			return self::$currencies[$currencyCode] ?? '$';
		}
	}
