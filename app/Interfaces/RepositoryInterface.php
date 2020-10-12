<?php


namespace App\Interfaces;


interface RepositoryInterface
{
    public function save($array);
    public function getAll();
    public function getById($id);
    public function update($id, $array);
    public function delete($id);
}
