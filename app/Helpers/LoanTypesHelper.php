<?php

  namespace App\Helpers;

  class LoanTypesHelper
  {
    /**
     * Obtiene una lista de tipos de préstamos disponibles.
     *
     * @return array Un array asociativo donde las claves y los valores son los nombres de los tipos de préstamos.
     */
    public static function getLoanOptions(){
      return [
        [
          'data-account-type' => 'Mortgage',
          'type'              => 'Mortgage',
        ],
        [
          'data-account-type' => 'AutoLoan',
          'type'              => 'Auto Loan',
        ],
        [
          'data-account-type' => 'StudentLoan',
          'type'              => 'Student Loan',
        ],
        [
          'data-account-type' => 'PersonalLoan',
          'type'              => 'Personal Loan',
        ],
        [
          'data-account-type' => 'MedicalDebt',
          'type'              => 'Medical Debt',
        ],
        [
          'data-account-type' => 'OtherDebt',
          'type'              => 'Other Debt',
        ],
      ];
    }
  }
