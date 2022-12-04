<?php

namespace SWApi\DataObject;

final class Planet extends BaseDataObject
{
    protected int $id;
    protected string $name;
    protected float $diameter;
    protected float $rotation_period;
    protected float $orbital_period;
    protected string $gravity;
    protected int $population;
    protected string $climate;
    protected string $terrain;
    protected string $surface_water;
    protected \DateTime $created;
    protected \DateTime $edited;

    public function setId(int | string $id): void
    {
        $this->id = (int) $id;
    }

    public function setName(string $name): void
    {
        $this->name = trim($name);
    }

    public function setDiameter(int | float | string $diameter): void
    {
        $this->diameter = (float) $diameter;
    }

    public function setRotation_period(int | float | string $rotation_period): void
    {
        $this->rotation_period = (float) $rotation_period;
    }

    public function setOrbital_period(int | float | string $orbital_period): void
    {
        $this->orbital_period = (float) $orbital_period;
    }

    public function setGravity(string $gravity): void
    {
        $this->gravity = trim($gravity);
    }

    public function setPopulation(null | int | string $population): void
    {
        $this->population = (int) $population;
    }

    public function setClimate(string $climate): void
    {
        $this->climate = trim($climate);
    }

    public function setTerrain(string $terrain): void
    {
        $this->terrain = trim($terrain);
    }

    public function setSurface_water(string $surface_water): void
    {
        $this->surface_water = trim($surface_water);
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
