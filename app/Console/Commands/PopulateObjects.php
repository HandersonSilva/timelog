<?php

namespace App\Console\Commands;

use App\Services\populateAllObjects;
use Illuminate\Console\Command;

class PopulateObjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:objects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Realiza a busca em algumas APIS e popula o banco de dados';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return bool
     */
    public function handle(populateAllObjects $populateAllObjects)
    {
        if($populateAllObjects->execute()){
            $this->info('Comando executado com sucesso');
        }else{
            $this->error('Erro ao executar comando');
        }


        return 0;
    }
}
