<?php


namespace App\Services;


use App\Repositories\ComponentRepository;
use App\Repositories\UserRepository;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class PopulateUsersService extends PopulateAbstractService
{
    /**
     * Construtor da classe, responsável por fazer as injeções de dependencia
     * PopulateUsersService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->repositoryInterface = $userRepository;
    }

    /**
     * Método responsável por executar a responsabilidade da classe
     * @return \Exception|mixed|void
     * @throws \GuzzleHttp\Exception\GuzzleException
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
                throw new \Exception('Erro no service de users', 500);
            }

        }catch (\Exception $e){
            return $e;
        }
    }

    /**
     * Override do método insertInDatabase da classe pai
     * @param $json
     * @param $repository
     * @return mixed|void
     */
    public function insertInDatabase($json, $repository)
    {
        foreach ($json as $object){
            $object->password = Hash::make('12345678');
            $repository->save((array)$object);
        }
    }
}
