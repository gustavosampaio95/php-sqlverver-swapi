<?php

namespace SWApi\DataObject;

use SWApi\Commands\Planet;
use SWApi\DataObject\Planet as DataObjectPlanet;
use SWApi\Models\Planet as ModelsPlanet;

final class People extends BaseDataObject
{
    protected string $id;
    protected string $name;
    protected float $height;
    protected float $mass;
    protected string $hair_color;
    protected string $skin_color;
    protected string $eye_color;
    protected int $birth_year;
    protected string $gender;
    protected \DateTime $created;
    protected \DateTime $edited;
    protected DataObjectPlanet $homeworld;

    public function setId(int | string $id): void
    {
        $this->id = (int) $id;
    }

    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    public function setHeight(int | float | string $height): void
    {
        $this->height = (float) $height;
    }

    public function setMass(int | float | string $mass): void
    {
        $this->mass = (float) $mass;
    }

    public function setHair_color(string $hair_color): void
    {
        $this->hair_color = (float) $hair_color;
    }

    public function setSkin_color(string $skin_color): void
    {
        $this->skin_color = trim($skin_color);
    }

    public function setEye_color(string $eye_color): void
    {
        $this->eye_color = trim($eye_color);
    }

    public function setBirth_year(int | string $birth_year): void
    {
        $this->birth_year = (int) $birth_year;
    }

    public function setGender(string $gender): void
    {
        $this->gender = trim($gender);
    }

    public function setHomeworld(int | string $homeworldId): void
    {
        $fromDB = (new ModelsPlanet)->getFromId((int) $homeworldId);

        if(!empty($fromDB)) {
            $this->homeworld = $fromDB;
            return ;
        }
    
        $this->homeworld = (new Planet)->getFromId((int) $homeworldId);
    }

    public function setCreated(string $created): void
    {
        $this->created = new \DateTime($created);
    }

    public function setEdited(string $edited): void
    {
        $this->edited = new \DateTime($edited);
    }
}
