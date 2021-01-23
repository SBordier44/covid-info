<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    public function __construct(protected HttpClientInterface $httpClient)
    {
    }

    public function getFranceData(): array
    {
        return $this->getApi('FranceLiveGlobalData');
    }

    public function getAllData(): array
    {
        return $this->getApi('AllLiveData');
    }

    public function getAllDataByDate(string $date): array
    {
        return $this->getApi('AllDataByDate?date=' . $date);
    }

    public function getDepartmentData(string $department): array
    {
        return $this->getApi('LiveDataByDepartement?Departement=' . $department);
    }

    private function getApi(string $var): array
    {
        $response = $this->httpClient->request(
            Request::METHOD_GET,
            'https://coronavirusapi-france.now.sh/' . $var
        );

        return $response->toArray();
    }
}
