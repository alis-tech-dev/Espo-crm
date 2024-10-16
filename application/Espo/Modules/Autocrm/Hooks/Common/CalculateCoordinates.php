<?php

namespace Espo\Modules\Autocrm\Hooks\Common;

use Espo\Core\Utils\Config;
use Espo\Core\Utils\Metadata;
use Espo\ORM\Entity;
use Espo\Core\Utils\Json;

class CalculateCoordinates
{
    protected const FIELDS = ['Street', 'City', 'State', 'PostalCode', 'Country'];

    protected const URL = 'https://maps.google.com/maps/api/geocode/json?';

    public function __construct(
        private readonly Metadata $metadata,
        private readonly Config $config
    ) {
    }

    public function beforeSave(Entity $entity, array $options): void
    {
        $addressFieldList = $this->getFieldList($entity->getEntityType());

        foreach ($addressFieldList as $addressField) {
            foreach (self::FIELDS as $field) {
                if (
                    is_null($entity->get($addressField . $field . 'Lat')) || is_null($entity->get($addressField . $field . 'Lng'))
                    || $entity->getFetched($addressField . $field) !== $entity->get($addressField . $field)
                ) {
                    $this->adjustCoordinates($entity, $addressField);
                    break;
                }
            }
        }
    }

    private function getFieldList(string $entityType): array
    {
        $all = $this->metadata->get(['entityDefs', $entityType, 'fields'], []);

        $filtered = array_filter(
            $all,
            static fn($fieldDef) => $fieldDef['type'] === 'address' && !empty($fieldDef['saveCoordinates'])
        );

        return array_keys($filtered);
    }

    private function adjustCoordinates(Entity $entity, string $addressField): void
    {
        $apiKey = $this->config->get('googleMapsApiKey');

        if (!$apiKey) {
            return;
        }

        $address = $this->composeAddress($entity, $addressField);

        if (empty(trim($address))) {
            return;
        }

        $params = [
            'key' => $apiKey,
            'address' => $address,
            'sensor' => false,
        ];

        $result = file_get_contents(self::URL . http_build_query($params));

        if (!$result) {
            return;
        }

        $result = file_get_contents(self::URL . http_build_query($params));
        $json = Json::decode($result);
        $location = $json?->results[0]?->geometry?->location;

        $latitude = $location?->lat;
        $longitude = $location?->lng;

        if ($latitude && $longitude) {
            $entity->set($addressField . 'Lat', $latitude);
            $entity->set($addressField . 'Lng', $longitude);
        }
    }

    private function composeAddress(Entity $entity, string $addressField): string
    {
        $address = '';

        if ($entity->get($addressField . 'Street')) {
            $address .= $entity->get($addressField . 'Street') ?? '';
        }

        if ($entity->get($addressField . 'City')) {
            if ($address === '') {
                $address .= ', ';
            }
            $address .= $entity->get($addressField . 'City') ?? '';
        }

        if ($entity->get($addressField . 'State')) {
            if ($address === '') {
                $address .= ', ';
            }
            $address .= $entity->get($addressField . 'State') ?? '';
        }

        if ($entity->get($addressField . 'PostalCode')) {
            if ($entity->get($addressField . 'City') || $entity->get($addressField . 'State')) {
                $address .= ' ';
            }
            $address .= $entity->get($addressField . 'PostalCode') ?? '';
        }

        if ($entity->get($addressField . 'Country')) {
            if ($address === '') {
                $address .= ', ';
            }
            $address .= $entity->get($addressField . 'Country') ?? '';
        }

        return $address;
    }
}
