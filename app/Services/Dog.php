<?php

namespace App\Services;

class Dog
{
    use Traits\SendsRequests;

    public function __construct()
    {
        $this->baseUri = 'https://dog.ceo/api/';
    }

    /**
     * Gets all breeds returned from the dog api
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function getBreeds()
    {
        return $this->sendRequest('GET', 'breeds/list/all');
    }    

    /**
     *
     */
    public function getBreed(string $breed)
    {
        return $this->sendRequest('GET', "breed/{$breed}/images");
    }
}
