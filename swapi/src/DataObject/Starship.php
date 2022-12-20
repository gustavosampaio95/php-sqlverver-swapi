<?php

namespace SWApi\DataObject;

final class Starship extends BaseDataObject
{
    protected string $name;
    protected string $model;
    protected string $manufacturer;
    protected float $cost_in_credits;
    protected float $lenght;
    protected float $max_atmosphering_speed;
    protected int $crew;
    protected float $passengers;
    protected int $cargo_capacity;
    protected int $consumables;
    protected float $hyperdrive_rating;
    protected int $MGLT;
    protected string $starship_class;
    protected string $pilots;
    protected string $films;
    protected \DateTime $created;
    protected \DateTime $edited;

    public function setName(string $name): void
    {
        $this->name = trim ($name);
    }

    public function setModel(string $model): void
    {
        $this->model = trim($model);
    }

    public function setManufacturer(string $manufacturer): void
    {
        $this->manufacturer = trim ($manufacturer);
    }

    public function setCost_in_credits(float $cost_in_credits): void
    {
        $this->cost_in_credits = (float) $cost_in_credits;
    }

    public function setLenght (float $lenght): void
    {
        $this->lenght = (float) ($lenght);
    }

    public function setMax_atmosphering_speed (float $max_atmosphering_speed): void
    {
        $this->max_atmosphering_speed = (float) ($gravity);
    }

    public function setCrew (null | int $crew): void
    {
        $this->crew = (int) ($crew);
    }

    public function setPassengers (int $passengers): void
    {
        $this->passengers = (int) ($passengers);
    }

    public function setCargo_capacity(float $cargo_capacity): void
    {
        $this->cargo_capacity = (float) ($cargo_capacity);
    }

    public function setConsumables (string $consumables): void
    {
        $this->consumables = trim($consumables);
    }

    public function setHyperdrive_rating(string $hyperdrive_rating): void
    {
        $this->hyperdrive_rating = (float) ($hyperdrive_rating);
    }

    public function setMGLT (float $MGLT): void
    {
        $this->MGLT = (float) ($MGLT);
    }

    public function  setStarship_class (string $starship_class): void
    {
        $this->starship_class (string) ($starship_class);
    }

    public function  setPilots (string $pilots): void
    {
        $this->pilots (string) ($pilots);
    }

    public function  setFilms (string $films): void
    {
        $this->films (string) ($films);
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
