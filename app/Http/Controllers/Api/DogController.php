<?php

namespace App\Http\Controllers\Api;

use App\Services\Dog;
use App\Http\Controllers\Controller;

class DogController extends Controller
{
    /** @var Dog $service */
    protected $service;

    public function __construct()
    {
        $this->service = new Dog();
    }

    public function list()
    {
        $breeds = $this->service->getAllBreeds();

        if (!$breeds) {
            return [
                'success' => false,
                'data' => 'Sorry something went wrong',
            ];
        }

        return [
            'success' => true,
            'data' => $breeds,
        ];
    }

    public function show(string $breed)
    {
        $searchBreed = str_replace('-', '/', $breed);

        $breed = $this->service->getBreed($searchBreed);
        if (!$breed) {
            return [
                'success' => false,
                'data' => 'Sorry, something went wrong',
            ];
        }

        return [
            'success' => true,
            'data' => $breed['message'],
        ];
    }

    public function showRandom()
    {
        $breeds = $this->service->getAllBreeds();
        $index = rand(0, count($breeds));

        return $this->show($breeds[$index]);
    }

    public function showImage(string $breed)
    {
        $response = $this->show($breed);
        if (!$response['success']) {
            return $response;
        }

        if (!is_array($response['data']) || count($response['data']) === 0) {
            return [
                'success' => false,
                'data' => 'Sorry, something went wrong',
            ];
        }

        $response['data'] = $response['data'][0];
        return $response;
    }
}
