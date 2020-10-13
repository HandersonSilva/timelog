<?php


namespace App\Repositories;


use App\Models\Timelog;
use Illuminate\Support\Facades\DB;

class TimeLogRepository extends AbstractRepository
{
    /**
     * Construtor da classe responsável por setar o tipo de objeto herdado pela classe pai
     * TimeLogRepository constructor.
     * @param Timelog $timelog
     */
    public function __construct(Timelog $timelog)
    {
        $this->model = $timelog;
    }

    /**
     * Método responsável por retornar o total de segundos por usuários
     * @param $userId
     * @return mixed
     */
    public function getTotalSecondsLoggedByUserId($userId){
        return $this->model::select(DB::raw('sum(seconds_logged) as seconds_logged, user_id'))
            ->where('user_id', $userId)
            ->groupBy('user_id')
            ->get();
    }

    /**
     * Método responsável por retornar a quantidade de segundos por issue
     * @param $issueId
     * @return mixed
     */
    public function getTotalSecondsLoggedByIssueId($issueId){
        return $this->model::select(DB::raw('sum(seconds_logged) as seconds_logged'))
            ->where('issue_id', $issueId)
            ->get();
    }
}
