<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create($values): void
    {
        $query = "INSERT INTO mario_games (`name`, `year`, console) VALUES ($values)";
        $this->databaseManager->connection->query($query);
        return;
    }

    // Get one
    public function find(): array
    {
        
    }

    // Get all
    public function get(): PDOStatement
    {
        // TODO: replace dummy data by real one
        $query = "SELECT * FROM mario_games";
        $result = $this->databaseManager->connection->query($query);
        return $result;
    }

    public function update(): void
    {
        $new = "UPDATE mario_games SET `name` = '{$_GET['newName']}', `year` = {$_GET['newYear']}, `console` = '{$_GET['newConsole']}' WHERE id = {$_SESSION['id']}";
        $updateData = $this->databaseManager->connection->prepare($new); //prepare give a good protection against hacking 
        $updateData->execute();
        header('Location:index.php');
    }

    public function delete(): void
    {
        $delete = "DELETE FROM mario_games WHERE id = '{$_SESSION['id']}'";
        $deleteData = $this->databaseManager->connection->prepare($delete);
        // $deleteData->bindParam(("{$_SESSION['id']}", $id))
        $deleteData->execute();
        header('Location:index.php');
    }

}