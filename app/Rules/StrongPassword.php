<?php

  namespace App\Rules;

  use Closure;
  use Illuminate\Contracts\Validation\ValidationRule;

  class StrongPassword implements ValidationRule
  {
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute,mixed $value,Closure $fail):void{

      if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/',$value)){
        $fail('La contraseña debe contener al menos 6 caracteres, incluyendo una mayúscula, un número y un carácter especial.');

      }
    }

  }
