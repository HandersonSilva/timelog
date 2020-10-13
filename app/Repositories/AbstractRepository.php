<?php


namespace App\Repositories;


use App\Interfaces\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{
    /**
     * Objeto que será setado pelos repositórios filhos
     * @var
     */
    protected $model;

    /**
     * Método responsável por salvar os objetos no banco de dados
     * @param $array
     * @return mixed
     */
    public function save($array)
    {
        if(array_key_exists('id', $array))
        {
            $obj = $this->model::find($array['id']);
            if($obj)
                $obj->update($array);
            else
                $obj = $this->model::create($array);
            return $obj;
        }
        else
            return $this->model::create($array);
    }

    /**
     * Métodos responsável por buscar todos os objetos de determinado tipo
     * @return mixed
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * Buscar um objeto especifico a partir de um id passado
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model::find($id);
    }

    /**
     * Setar um objeto especifico a partir de uma id
     * @param $id
     * @param $array
     * @return mixed
     */
    public function update($id, $array)
    {
        return $this->model::where('id', $id)->update($array);

    }

    /**
     * Deletar um objeto especifico
     * @param $id
     * @return mixed|void
     */
    public function delete($id)
    {
        $obj = $this->model::find(1);
        $obj->delete();
    }
}
