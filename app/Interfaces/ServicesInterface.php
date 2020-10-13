<?php


namespace App\Interfaces;


interface ServicesInterface
{
    /**
     * Método responsável por executar o serviço proposto pelas services
     * @return mixed
     */
    public function execute();
}
