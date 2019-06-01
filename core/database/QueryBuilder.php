<?php

class QueryBuilder
{

    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return  $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $param)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($param)),
            ':' . implode(', :', array_keys($param))
        );

        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute($param);
        } catch (Exception $e) {
            die('something went wrong');
        }
    }
}
