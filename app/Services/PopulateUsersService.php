<?php


namespace App\Services;


use App\Repositories\ComponentRepository;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class PopulateUsersService extends PopulateAbstractService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->repositoryInterface = $userRepository;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        try{
            $client = new Client();
            $response = $client->request('GET', env('API_URL')."/users", []);
            if($response->getStatusCode() == 200){
                $jsonResponse = json_decode($response->getBody());
                $this->insertInDatabase($jsonResponse, $this->repositoryInterface);
                return $jsonResponse;
            }else{
                throw new \Exception('Erro no endpoint de component', 500);
            }

        }catch (\Exception $e){
            return $e;
        }
    }

    public function insertInDatabase($json, $repository)
    {
        foreach ($json as $object){
            $object->password = Hash::make('12345678');
            $repository->save((array)$object);
        }
    }
}
