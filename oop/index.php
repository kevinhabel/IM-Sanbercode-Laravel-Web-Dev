<?php
require_once("animal.php");
require_once("Frog.php");
require_once("Ape.php");

$sheep = new Animal("shaun");
echo "Name : " . $sheep->name . "<br>";
echo "Legs : " . $sheep->legs . "<br>";
echo "Cold Blooded : " . $sheep->cold_blooded . "<br>";

echo "-------------------------------------<br>";

$frog = new Frog("Buduk");
echo "Name : " . $frog->name . "<br>";
echo "Legs : " . $frog->legs . "<br>";
echo "Cold Blooded : " . $frog->cold_blooded . "<br>";
echo "Jump : " . $frog->jump() . "<br>";

echo "-------------------------------------<br>";

$ape = new Ape("kera sakti");
echo "Name : " . $ape->name . "<br>";
echo "Legs : " . $ape->legs . "<br>";
echo "Cold Blooded : " . $ape->cold_blooded . "<br>";
echo "Jump : " . $ape->yell() . "<br>";
?>