<?php

namespace SWApi\Commands;

use SWApi\DataObject\People as DataObjectPeople;
<<<<<<< HEAD
=======
use SWApi\Models\People as ModelsPeople;
>>>>>>> main
use SWApi\Services\SWApi;

final class People extends BaseCommands {

    public function __construct()
    {
        $this->endpoint = $this->signature = 'people';
    }

    public function getAll(): array
    {
        $out = parent::getAll();

        dump("Pessoas encontradas (". sizeof($out) . "), buscando detalhes de cada um...");

        foreach($out as $k => $people) {
<<<<<<< HEAD
            $out[$k] = $this->getFromId(
                $people->uid
            );
=======
            $fromDB = (new ModelsPeople)->getFromId((int) $people->uid);

            if(!empty($fromDB)) {
                $out[$k] = $fromDB;
            } else {
                $out[$k] = $this->getFromId(
                    $people->uid
                );
            }
>>>>>>> main
        }

        return $out;
    }

    public function getFromId(int $id): DataObjectPeople
    {
        $data = SWApi::call("/{$this->endpoint}/{$id}");
        $data->result->properties->id = $id;
        $data->result->properties->homeworld = preg_replace('/[^0-9]/', '', $data->result->properties->homeworld);

        unset($data->result->properties->url);

<<<<<<< HEAD
        return (new DataObjectPeople)->fromJson(json_encode($data->result->properties));
=======
        return (new DataObjectPeople)->fromObject($data->result->properties);
>>>>>>> main
    }
}