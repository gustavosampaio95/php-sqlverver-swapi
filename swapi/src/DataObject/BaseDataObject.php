<?php

namespace SWApi\DataObject;

abstract class BaseDataObject
{
    public function __set($prop, $value)
    {
        if (!property_exists($this, $prop)) {
            dump("A propriedade {$prop} não existe");
        } else {
            $func = "set" . ucfirst(strtolower($prop));

            $this->$func($value);
        }
    }

    public function __get($prop)
    {
        if (!property_exists($this, $prop)) {
            dump("A propriedade {$prop} não existe");
        } else {
            return $this->$prop;
        }
    }

    public function fromJson(string $json): BaseDataObject
    {
        $json = str_replace("\n", "", $json);
        $json = stripslashes($json);

        $obj = @json_decode($json, true);

        foreach ($obj as $prop => $value) {
            $this->__set($prop, $value);
        }

        return $this;
    }

    public function fromObject(\stdClass $object): BaseDataObject
    {
        foreach ($object as $prop => $value) {
            $this->__set($prop, $value);
        }

        return $this;
    }

    public function __toString(): string
    {
        $array = $this->toArray();

        return json_encode($array);
    }

    public function toArray(): array
    {
        $data = get_object_vars($this);

        foreach($data as $k => $v) {
            if($v instanceof \DateTime) {
                $data[$k] = $v->format('Y-m-d H:i:s');
            }
        }

        return $data;
    }
}
