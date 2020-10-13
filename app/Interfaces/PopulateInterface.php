<?php


namespace App\Interfaces;


interface PopulateInterface extends ServicesInterface
{
    /**
     * Método responsável por realizar os inserts e database
     * @param $json
     * @return mixed
     */
    public function insertInDatabase($json, $reposotitory);
}
