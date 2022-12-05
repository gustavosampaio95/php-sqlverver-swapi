<?php

namespace SWApi\Commands;

use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Models\Planet as ModelsPlanet;
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
            $fromDB = (new ModelsPlanet)->getFromId((int) $planet->uid);

            if(!empty($fromDB)) {
                $out[$k] = $fromDB;
            } else {
                $out[$k] = $this->getFromId(
                    $planet->uid
                );
            }
        }

        return $out;
    }

    public function getFromId(int $id): DataObjectPlanet
    {
        $data = SWApi::call("/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;

        unset($data->result->properties->url);

        return (new DataObjectPlanet)->fromObject($data->result->properties);
    }
}