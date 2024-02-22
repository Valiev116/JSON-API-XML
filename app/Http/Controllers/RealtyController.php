<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RealtyStoreRequest;

class RealtyController extends Controller
{
    private string $xmlFilePath;

    public function __construct()
    {
        $this->xmlFilePath = public_path('fid.xml');

        if (!file_exists($this->xmlFilePath) || !is_readable($this->xmlFilePath)) {
            throw new \Exception('Убедитесь, что XML файл находится в директории public и XML файл имеет имя fid');
        }
    }

    public function index()
    {
        $xmlData = simplexml_load_file($this->xmlFilePath);
        $dataArray = json_decode(json_encode($xmlData), true);
        return response()->json(['offer' => $dataArray['offer']]);
    }

    public function show($id)
    {
        $xmlData = simplexml_load_file($this->xmlFilePath);
        $foundOffer = null;
        foreach ($xmlData->offer as $offer) {
            if ((string)$offer['internal-id'] === (string)$id) {
                $foundOffer = $offer;
                break;
            }
        }

        if ($foundOffer !== null) {
            $offerArray = json_decode(json_encode($foundOffer), true);
            return response()->json(['offer' => $offerArray]);
        }
        return response()->json(['error' => 'Offer not found'], 404);
    }

    public function store(RealtyStoreRequest $request)
    {
        $validatedData = $request->validated();
        $xmlData = simplexml_load_file($this->xmlFilePath);
        $newOffer = $xmlData->addChild('offer');
        $internalId = $this->generateInternalId($xmlData);
        $newOffer->addAttribute('internal-id', $internalId);
        $this->fillOfferFromRequest($newOffer, $validatedData);
        $xmlData->asXML($this->xmlFilePath);
        $foundOffer = null;
        foreach ($xmlData->offer as $offer) {
            if ((string)$offer['internal-id'] === (string)$internalId) {
                $foundOffer = $offer;
                break;
            }
        }
        $offerArray = json_decode(json_encode($foundOffer), true);
        return response()->json(['offer' => $offerArray]);
    }

    private function generateInternalId($xmlData)
    {
        $maxInternalId = 0;
        foreach ($xmlData->offer as $offer) {
            $currentInternalId = (int)$offer['internal-id'];
            $maxInternalId = max($maxInternalId, $currentInternalId);
        }
        return $maxInternalId + 1;
    }

    private function fillOfferFromRequest($offer, $request)
    {
        foreach ($request as $key => $value) {
            $lowercaseKey = strtolower($key);
            $keys = explode('->', $lowercaseKey);
            $currentLevel = &$offer;
            $lastKey = array_pop($keys);
            foreach ($keys as $nestedKey) {
                $currentLevel = &$currentLevel->{$nestedKey};
            }
            $currentLevel->{$lastKey} = $value;
        }
    }

    public function update(RealtyStoreRequest $request, $id)
    {
        $validatedData = $request->validated();
        $xmlData = simplexml_load_file($this->xmlFilePath);
        $foundOffer = null;
        foreach ($xmlData->offer as $offer) {
            if ((string)$offer['internal-id'] === (string)$id) {
                $foundOffer = $offer;
                break;
            }
        }
        if ($foundOffer !== null) {
            // Обновляем данные оффера, только если в запросе переданы непустые значения
            foreach ($validatedData as $key => $value) {
                $lowercaseKey = strtolower($key);
                $keys = explode('->', $lowercaseKey);
                $currentLevel = &$foundOffer;
                $lastKey = array_pop($keys);
                foreach ($keys as $nestedKey) {
                    $currentLevel = &$currentLevel->{$nestedKey};
                }
                $currentLevel->{$lastKey} = $value;
            }
            if ($xmlData->asXML($this->xmlFilePath)) {
                $offerArray = json_decode(json_encode($foundOffer), true);
                return response()->json(['offer' => $offerArray]);
            } else {
                return response()->json(['error' => 'Failed to write to XML file'], 500);
            }
        }
        return response()->json(['error' => 'Data not found'], 404);
    }

    public function destroy($id)
    {
        $xmlData = simplexml_load_file($this->xmlFilePath);
        $foundOffer = null;
        foreach ($xmlData->offer as $offer) {
            if ((string)$offer['internal-id'] === (string)$id) {
                $foundOffer = $offer;
                break;
            }
        }
        if ($foundOffer !== null) {
            $dom = dom_import_simplexml($foundOffer);
            $dom->parentNode->removeChild($dom);
            if ($xmlData->asXML($this->xmlFilePath)) {
                return response()->json(['message' => 'Data deleted successfully']);
            } else {
                return response()->json(['error' => 'Failed to write to XML file'], 500);
            }
        }
        return response()->json(['error' => 'Data not found'], 404);
    }
}
