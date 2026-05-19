<?php

class Database
{
    private string $host = "localhost";
    private string $db_name = "blog";
    private string $username = "root";
    private string $password = "";
    private string $port = "3307";
    private ?PDO $connection = null;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        try {

            // DSN avec différentes configurations possibles
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8";

            // PDO corrigé
            $this->connection = new PDO(
                $dsn,
                $this->username,
                $this->password
            );

            // Gestion des erreurs
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            // Mode FETCH_ASSOC
            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            // Connexion réussie - message de débogage désactivé pour production

        } catch (PDOException $e) {
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(): ?PDO
{
    return $this->connection;
}
}