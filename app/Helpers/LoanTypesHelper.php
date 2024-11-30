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
          'type'              => 'Mortgage',
          'data-account-type' => 'Mortgage',
        ],
        [
          'type'              => 'AutoLoan',
          'data-account-type' => 'Auto Loan',
        ],
        [
          'type'              => 'StudentLoan',
          'data-account-type' => 'Student Loan',
        ],
        [
          'type'              => 'PersonalLoan',
          'data-account-type' => 'Personal Loan',
        ],
        [
          'type'              => 'MedicalDebt',
          'data-account-type' => 'Medical Debt',
        ],
        [
          'type'              => 'OtherDebt',
          'data-account-type' => 'Other Debt',
        ],
      ];
    }
  }
