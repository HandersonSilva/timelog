<?php


namespace App\Repositories;


use App\Models\Timelog;
use Illuminate\Support\Facades\DB;

class TimeLogRepository extends AbstractRepository
{
    public function __construct(Timelog $timelog)
    {
        $this->model = $timelog;
    }

    public function getTotalSecondsLoggedByUserId($userId){
        return $this->model::select(DB::raw('sum(seconds_logged) as seconds_logged, user_id'))
            ->where('user_id', $userId)
            ->groupBy('user_id')
            ->get();
    }

    public function getTotalSecondsLoggedByIssueId($issueId){
        return $this->model::select(DB::raw('sum(seconds_logged) as seconds_logged'))
            ->where('issue_id', $issueId)
            ->get();
    }
}
