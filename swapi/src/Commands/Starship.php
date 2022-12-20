<?php

namespace SWApi\Commands;

use SWApi\DataObject\Starship as DataObjectStarships;
use SWApi\Models\Planet as ModelsStarships;
use SWApi\Services\SWApi;

final class Starship extends BaseCommands {

    public function __construct()
    {
        $this->endpoint = $this->signature = 'starships';
    }

    public function getAll(): array
    {
        $out = parent::getAll();

        dump("Naves encontradas (". sizeof($out) . "), buscando detalhes de cada uma...");

        foreach($out as $k => $starships) {
            $fromDB = (new ModelsStarships)->getFromId((int) $starships->uid);

            if(!empty($fromDB)) {
                $out[$k] = $fromDB;
            } else {
                $out[$k] = $this->getFromId(
                    $starships->uid
                );
            }
        }

        return $out;
    }

    public function getFromId(int $id): DataObjectStarships
    {
        $data = SWApi::call("/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;

        unset($data->result->properties->url);

        return (new DataObjectStarships)->fromObject($data->result->properties);
    }
}