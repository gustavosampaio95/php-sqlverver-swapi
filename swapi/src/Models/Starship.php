<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;
use SWApi\DataObject\Starship as DataObjectStarship;

final class Starship extends BaseModels
{
    protected string $table = 'dbo.sw_starship';

    public function saveIfNotExists(BaseDataObject $object): void
    {
        (new Starship)->saveIfNotExists($object->starship);

        parent::saveIfNotExists($object);
    }

    public function getFromId(int $id): ?BaseDataObject
    {
        $data = parent::getFromId($id);

        if(!empty($data)) {
            return (new DataObjectStarship)->fromObject($data);
        }

        return null;
    }
}