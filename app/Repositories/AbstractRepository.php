<?php


namespace App\Repositories;


use App\Interfaces\RepositoryInterface;

class AbstractRepository implements RepositoryInterface
{
    protected $model;

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

    public function getAll()
    {
        return $this->model::all();
    }

    public function getById($id)
    {
        return $this->model::find($id);
    }


    public function update($id, $array)
    {
        return $this->model::where('id', $id)->update($array);

    }

    public function delete($id)
    {
        $obj = $this->model::find(1);
        $obj->delete();
    }
}
