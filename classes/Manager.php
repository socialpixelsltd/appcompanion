<?php namespace Pixels\OrderManager\Classes;

use Exception;
use Igniter\Flame\Exception\ApplicationException;
use Igniter\Flame\Traits\Singleton;
use Illuminate\Support\Facades\Http;

class Manager 
{
    use Singleton;
    public $endpoint = 'https://ti-ext-appcompanion-server.vercel.app';

    public function syncWithAppServer()
    {        
        $appName = env('APP_NAME', 'Igniter');
        $response = $this->sendRequest('POST', '/api/v1/app', [
            'domain' => url(''),
            'name' => $appName,
        ]);
        return $response;
    }

    protected function sendRequest($method, $uri, array $payload = [])
    {
        $headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $response = Http::withHeaders($headers)->withBody(json_encode($payload), 'application/json')->send($method, $this->endpoint.$uri);

        if (!($response->ok())) {
            throw new ApplicationException('Error while communicating with the AppCompanion Server '.json_encode($response->json()));
        }        

        return $response->json();
    }

}

?>