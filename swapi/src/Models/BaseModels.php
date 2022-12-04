<?php

namespace SWApi\Models;

use SWApi\DataObject\BaseDataObject;

abstract class BaseModels
{
    protected $conn;

    public function __construct()
    {
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $user = getenv('DB_USER');
        $pass = getenv('DB_PASS');
        $base = getenv('DB_BASE');

        $this->conn = new \PDO(
            "dblib:host={$host}:{$port};dbname={$base}",
            $user,
            $pass
        );
    }

    public function count(): int
    {
        $sql = "SELECT COUNT(*) AS TOTAL FROM {$this->table}";
        $res = $this->conn->query($sql);

        return $res->fetchObject()->TOTAL;
    }

    public function alreadyExistsId(int $id): bool
    {
        $sth = $this->conn->prepare("SELECT COUNT(*) AS TOTAL FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchObject()->TOTAL > 0;
    }

    public function saveIfNotExists(BaseDataObject $object): void
    {
        if(!$this->alreadyExistsId($object->id)) {
            $list = $object->toArray();

            $sth = $this->conn->prepare(
                $this->buildInsertQuery($object)
            );

            foreach($list as $k => $v) {
                if($v instanceof BaseDataObject) {
                    $v = $v->id;
                }

                $sth->bindValue(":{$k}", $v);
            }

            $sth->execute();
        }
    }

    protected function buildInsertQuery(BaseDataObject $object): string
    {
        $list = $object->toArray();

        $fields = array_keys($list);

        return "INSERT INTO {$this->table} (" . implode(',', $fields) . ") VALUES (:" . implode(',:', $fields) . ")";
    }

    public function getFromId(int $id): \stdClass | BaseDataObject | null | bool
    {
        $sth = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();

        return $sth->fetchObject();
    }
}