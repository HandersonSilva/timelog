<?php


namespace App\Interfaces;


interface PopulateInterface extends ServicesInterface
{
    /**
     * Método responsável por realizar os inserts e database
     * @param $json
     * @return mixed
     */
    function insertInDatabase($json, $reposotitory);
}
