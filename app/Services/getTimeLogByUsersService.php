<?php


namespace App\Services;


use App\Interfaces\ServicesInterface;
use App\Repositories\TimeLogRepository;
use App\Repositories\UserRepository;

class getTimeLogByUsersService implements ServicesInterface
{
    private $timeLogRepository;
    private $userRepository;

    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * getTimeLogByUsersService constructor.
     * @param TimeLogRepository $timeLogRepository
     * @param UserRepository $userRepository
     */
    public function __construct(
        TimeLogRepository $timeLogRepository,
        UserRepository $userRepository
    )
    {
        $this->timeLogRepository = $timeLogRepository;
        $this->userRepository = $userRepository;
    }

    public function execute()
    {
        $users = $this->userRepository->getAll();

        $objs = $users->map(function ($user){
            $obj = $this->timeLogRepository->getTotalSecondsLoggedByUserId($user->id)[0];
            $obj->seconds_logged = intval($obj->seconds_logged);
            return $obj;
        });

        return $objs->toArray();
    }
}
