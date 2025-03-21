<?php
	
	namespace App\Console\Commands;
	
	use Illuminate\Console\Command;
	use Illuminate\Support\Facades\File;
	
	class ClearLogs extends Command
	{
		protected $signature   = 'logs:clear';
		protected $description = 'Borra todos los logs de Laravel';
		
		public function handle(){
			File::cleanDirectory(storage_path('logs'));
			$this->info('Logs eliminados correctamente.');
		}
	}
