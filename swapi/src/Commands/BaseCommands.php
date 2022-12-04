<?php

namespace SWApi\Commands;

use SWApi\DataObject\BaseDataObject;
use SWApi\Services\SWApi;

abstract class BaseCommands {
    protected string $signature;
    protected string $enpoint;

    public function __get(string $prop): mixed
    {
        $func  = "get" . ucfirst($prop);

        if(method_exists($this, $func)) {
            return $this->$func();
        }

        throw new \Exception("A função '{$func}' não existe.");
    }

    private function getSignature(): string
    {
        $sig = "swapi:{$this->signature}";

        if($sig == 'swapi:')
            throw new \Exception("A assinatura do comando é obrigatória");

        return $sig;
    }

    public function getAll(): array
    {
        $out = [];
        $currentPage = 1;

        do {
            dump("Buscando /{$this->endpoint} página {$currentPage}");

            $data = SWApi::call("/{$this->endpoint}", [
                'page' => $currentPage,
                'limit' => 10
            ]);

            $out = array_merge($out, $data->results);

            $currentPage++;
        }
        while(!empty($data->next));

        return $out;
    }

    abstract public function getFromId(int $id): BaseDataObject;
}