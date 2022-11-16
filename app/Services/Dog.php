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

    public function getAllBreeds()
    {
        $response = $this->getBreeds();

        if (!$response || $response['status'] === 'error') {
            return false;
        }

        $breeds = [];
        foreach ($response['message'] as $breed => $subBreeds) {
            $breeds[] = $breed;

            foreach ($subBreeds as $subBreed) {
                $breeds[] = "{$breed}-{$subBreed}";
            }
        }

        return $breeds;
    }
}
