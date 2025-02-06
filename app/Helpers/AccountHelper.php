<?php
	
	namespace App\Helpers;
	
	class AccountHelper
	{
		public static function getAccountTypes(){
			return [
				'Cash Accounts' => [
					'description' => "Accounts that you'll spend from in the near future (usually within the next year or two).",
					'accounts'    => [
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
					],
				],
				'Credit Accounts' => [
					'description' => "A credit account lets you spend borrowed money that you'll need to repay later, often with interest.",
					'accounts'    => [
						[
							'type'              => 'Credit Card',
							'data-account-type' => 'CreditCard',
						],
						[
							'type'              => 'Line of Credit',
							'data-account-type' => 'LineOfCredit',
						],
					],
				],
				
				'Mortgages and Loans' => [
					'description' => "Accounts that have an outstanding balance you're currently paying off, and aren't spending from.",
					'accounts'    => [
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
				],
				'Tracking Accounts'   => [
					'description' => "Accounts that hold money you don't plan to spend soon, such as investments or loans.",
					'accounts'    => [
						[
							'type'              => 'Asset (e.g. Investment)',
							'data-account-type' => 'OtherAsset',
						],
						[
							'type'              => 'Liability',
							'data-account-type' => 'OtherLiability',
						],
					],
				],
			];
		}
		
	}

