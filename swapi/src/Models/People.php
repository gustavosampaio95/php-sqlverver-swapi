<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;
use SWApi\DataObject\People as DataObjectPeople;

final class People extends BaseModels
{
    protected string $table = 'dbo.sw_people';

    public function saveIfNotExists(BaseDataObject $object): void
    {
        (new Planet)->saveIfNotExists($object->homeworld);

        parent::saveIfNotExists($object);
    }

    public function getFromId(int $id): ?BaseDataObject
    {
        $data = parent::getFromId($id);

        if(!empty($data)) {
            return (new DataObjectPeople)->fromObject($data);
        }

        return null;
    }
}