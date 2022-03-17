<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//Create session to keep the id for the update function
session_start();
if(!empty ($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create($cardRepository);
    require 'overview.php';
        break;
    case 'modify':
        update($cardRepository, $databaseManager);
        break;
    case 'delete';
        delete($databaseManager, $cardRepository);
        break;
    default:
        overview($cards);
        break;
}

function overview($cards)
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create($cardRepository)
{
    if (!empty($_GET['name']) && !empty($_GET['year']) && !empty($_GET['console'])){
    $values = "'{$_GET['name']}', '{$_GET['year']}', '{$_GET['console']}'";
    $cardRepository->create($values);
    }
}

function update($cardRepository, $databaseManager)
{
    $query = "SELECT * FROM mario_games WHERE id ='{$_SESSION['id']}'";
    $result = $databaseManager->connection->query($query);
    $fetch = $result->fetch(PDO::FETCH_ASSOC);
    require 'edit.php';

    if (!empty($_GET['newName']) && !empty($_GET['newYear']) && !empty($_GET['newConsole'])){
    $cardRepository->update();
    }
}

function delete($databaseManager, $cardRepository)
{
    $cardRepository->delete();
    require 'overview.php';
}