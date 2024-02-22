<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealtyStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return array(
            'type' => 'string|max:255|in:продажа,аренда',
            'property-type' => 'string|max:255|in:жилая,living',
            'category' => 'string|max:255',
            'garage-type' => 'string|max:255',
            'lot-number' => 'string|max:255',
            'cadastral-number' => 'string|max:255',
            'url' => 'string|max:255',
            'creation-date' => 'string|max:255',
            'vas' => 'string|max:255',
            'location->country' => 'string|max:255',
            'location->region' => 'string|max:255',
            'district' => 'string|max:255',
            'location->locality-name' => 'string|max:255',
            'location->sub-locality-name' => 'string|max:255',
            'location->address' => 'string|max:255',
            'location->apartment' => 'string|max:255',
            'location->direction' => 'string|max:255',
            'location->distance' => 'string|max:255',
            'location->latitude' => 'string|max:255',
            'location->longitude' => 'string|max:255',
            'location->railway-station' => 'string|max:255',
            'location->metro->name' => 'string|max:255',
            'location->metro->time-on-transport' => 'string|max:255',
            'location->metro->time-on-foot' => 'string|max:255',
            'village-name' => 'string|max:255',
            'yandex-village-id' => 'string|max:255',
            'sales-agent->name' => 'string|max:255',
            'sales-agent->phone' => 'string|max:255',
            'sales-agent->whatsapp-phone' => 'string|max:255',
            'sales-agent->category' => 'string|max:255',
            'sales-agent->organization' => 'string|max:255',
            'sales-agent->url' => 'string|max:255',
            'sales-agent->email' => 'string|max:255',
            'photo' => 'string|max:255',
            'price' => 'string|max:255',
            'value' => 'string|max:255',
            'currency' => 'string|max:255',
            'period' => 'string|max:255',
            'unit' => 'string|max:255',
            'rent-pledge' => 'string|max:255',
            'deal-status' => 'string|max:255',
            'haggle' => 'string|max:255',
            'mortgage' => 'string|max:255',
            'prepayment' => 'string|max:255',
            'agent-fee' => 'string|max:255',
            'not-for-agents' => 'string|max:255',
            'utilities-included' => 'string|max:255',
            'area->value' => 'string|max:255',
            'area->unit' => 'string|max:255',
            'room-space->value' => 'string|max:255',
            'room-space->unit' => 'string|max:255',
            'living-space->value' => 'string|max:255',
            'living-space->unit' => 'string|max:255',
            'kitchen-space->value' => 'string|max:255',
            'kitchen-space->unit' => 'string|max:255',
            'lot-area->value' => 'string|max:255',
            'lot-area->unit' => 'string|max:255',
            'lot-type' => 'string|max:255',
            'image' => 'string|max:255',
            'is-image-order-change-allowed' => 'string|max:255',
            'renovation' => 'string|max:255',
            'description' => 'string|max:255',
            'disable-flat-plan-guess' => 'string|max:255',
            'video-review' => 'string|max:255',
            'rooms' => 'string|max:255',
            'rooms-offered' => 'string|max:255',
            'floor' => 'string|max:255',
            'apartments' => 'string|max:255',
            'studio' => 'string|max:255',
            'open-plan' => 'string|max:255',
            'rooms-type' => 'string|max:255',
            'window-view' => 'string|max:255',
            'balcony' => 'string|max:255',
            'bathroom-unit' => 'string|max:255',
            'air-conditioner' => 'string|max:255',
            'phone' => 'string|max:255',
            'internet' => 'string|max:255',
            'room-furniture' => 'string|max:255',
            'kitchen-furniture' => 'string|max:255',
            'television' => 'string|max:255',
            'washing-machine' => 'string|max:255',
            'dishwasher' => 'string|max:255',
            'refrigerator' => 'string|max:255',
            'built-in-tech' => 'string|max:255',
            'floor-covering' => 'string|max:255',
            'with-children' => 'string|max:255',
            'with-pets' => 'string|max:255',
            'floors-total' => 'string|max:255',
            'building-name' => 'string|max:255',
            'yandex-building-id' => 'string|max:255',
            'yandex-house-id' => 'string|max:255',
            'building-type' => 'string|max:255',
            'built-year' => 'string|max:255',
            'building-section' => 'string|max:255',
            'ceiling-height' => 'string|max:255',
            'guarded-building' => 'string|max:255 ',
            'pmg' => 'string|max:255',
            'access-control-system' => 'string|max:255',
            'lift' => 'string|max:255',
            'rubbish-chute' => 'string|max:255',
            'electricity-supply' => 'string|max:255',
            'water-supply' => 'string|max:255',
            'gas-supply' => 'string|max:255',
            'sewerage-supply' => 'string|max:255',
            'heating-supply' => 'string|max:255',
            'toilet' => 'string|max:255',
            'shower' => 'string|max:255',
            'pool' => 'string|max:255',
            'billiard' => 'string|max:255',
            'sauna' => 'string|max:255',
            'parking' => 'string|max:255',
            'parking-places' => 'string|max:255',
            'parking-place-price' => 'string|max:255',
            'parking-guest' => 'string|max:255',
            'parking-guest-places' => 'string|max:255',
            'alarm' => 'string|max:255',
            'flat-alarm' => 'string|max:255',
            'security' => 'string|max:255',
            'is-elite' => 'string|max:255',
            'ownership-type' => 'string|max:255',
            'garage-name' => 'string|max:255',
            'parking-type' => 'string|max:255',
            'automatic-gates' => 'string|max:255',
            'cctv' => 'string|max:255',
            'fire-alarm' => 'string|max:255',
            'inspection-pit' => 'string|max:255',
            'cellar' => 'string|max:255',
            'car-wash' => 'string|max:255',
            'auto-repair' => 'string|max:255',
            'new-parking' => 'string|max:255',
        );
    }
}
