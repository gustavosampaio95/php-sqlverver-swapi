<?php

namespace SWApi\Commands;

use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Services\SWApi;

final class Planet extends BaseCommands {

    public function __construct()
    {
        $this->endpoint = $this->signature = 'planets';
    }

    public function getAll(): array
    {
        $out = parent::getAll();

        dump("Planetas encontrados (". sizeof($out) . "), buscando detalhes de cada um...");

        foreach($out as $k => $planet) {
            $out[$k] = $this->getFromId(
                $planet->uid
            );
        }

        return $out;
    }

    public function getFromId(int $id): DataObjectPlanet
    {
        $data = SWApi::call("/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;

        unset($data->result->properties->url);

        return (new DataObjectPlanet)->fromJson(json_encode($data->result->properties));
    }
}