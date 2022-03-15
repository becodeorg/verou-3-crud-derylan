<?php

// This class will manage the connection to the database
// It will be passed on the other classes who need it
class DatabaseManager
{
    // These are private: only this class needs them
    private string $host;
    private string $user;
    private string $password;
    private string $dbname;
    // This one is public, so we can use it outside of this class
    // We could also use a private variable and a getter (but let's not make things too complicated at this point)
    public PDO $connection;

    public function __construct(string $host, string $user, string $password, string $dbname)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect(): void
    {
        // TODO: make the connection to the database
        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Database is connected";
    }
}