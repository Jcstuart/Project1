<?php

// include the class that handles database connections
require "database.php";

// include the class containing functions/methods for "customer" table
// Note: this application uses "customer" table, not "cusotmers" table
require "event.class.php";
$event = new Event();
 
// set active record field values, if any 
// (field values not set for display_list and display_create_form)
if(isset($_GET["id"]))          $id = $_GET["id"]; 
if(isset($_POST["event_date"]))       $event->date = $_POST["event_date"];
if(isset($_POST["event_time"]))      $event->time = $_POST["event_time"];
if(isset($_POST["event_location"]))     $event->location = $_POST["event_location"];
if(isset($_POST["event_description"]))     $event->description = $_POST["event_description"];

// "fun" is short for "function" to be invoked 
if(isset($_GET["fun"])) $fun = $_GET["fun"];
else $fun = "display_list"; 

switch ($fun) {
    case "display_list":        $event->list_records();
        break;
    case "display_create_form": $event->create_record(); 
        break;
    case "display_read_form":   $event->read_record($id); 
        break;
    case "display_update_form": $event->update_record($id);
        break;
    case "display_delete_form": $event->delete_record($id); 
        break;
    case "insert_db_record":    $event->insert_db_record(); 
        break;
    case "update_db_record":    $event->update_db_record($id);
        break;
    case "delete_db_record":    $event->delete_db_record($id);
        break;
    default: 
        echo "Error: Invalid function call (events.php)";
        exit();
        break;
}