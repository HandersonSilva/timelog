<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository extends AbstractRepository
{
    /**
     * Construtor da classe responsável por setar o tipo de objeto herdado pela classe pai
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
