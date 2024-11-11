<?php

  namespace App\Helpers;

  class AccountHelper
  {
    public static function getAccountTypes(){
      return [
        'Budget Accounts' => [
          [
            'type'              => 'Checking',
            'data-account-type' => 'Checking',
          ],
          [
            'type'              => 'Savings',
            'data-account-type' => 'Savings',
          ],
          [
            'type'              => 'Cash',
            'data-account-type' => 'Cash',
          ],
          [
            'type'              => 'Credit Card',
            'data-account-type' => 'CreditCard',
          ],
          [
            'type'              => 'Line of Credit',
            'data-account-type' => 'LineOfCredit',
          ],
        ],

        'Mortgages and Loans' => [
          [
            'type'              => 'Mortgage',
            'data-account-type' => 'Mortgage',
          ],
          [
            'type'              => 'Auto Loan',
            'data-account-type' => 'AutoLoan',
          ],
          [
            'type'              => 'Student Loan',
            'data-account-type' => 'StudentLoan',
          ],
          [
            'type'              => 'Personal Loan',
            'data-account-type' => 'PersonalLoan',
          ],
          [
            'type'              => 'Medical Debt',
            'data-account-type' => 'MedicalDebt',
          ],
          [
            'type'              => 'Other Debt',
            'data-account-type' => 'OtherDebt',
          ],
        ],

        'Tracking Accounts' => [
          [
            'type'              => 'Asset (e.g. Investment)',
            'data-account-type' => 'OtherAsset',
          ],
          [
            'type'              => 'Liability',
            'data-account-type' => 'OtherLiability',
          ],
        ],

      ];
    }

  }

