<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;
use SWApi\DataObject\Planet as DataObjectPlanet;

final class Planet extends BaseModels
{
    protected string $table = 'dbo.sw_planet';

    public function getFromId(int $id): ?BaseDataObject
    {
        $data = parent::getFromId($id);

        if(!empty($data)) {
            return (new DataObjectPlanet)->fromObject($data);
        }

        return null;
    }
}