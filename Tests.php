<?php

require_once './autoloader.php';

$connection_test = new Connection;
$employee_test = new Employee;

$data['lname'] = "Chirebvu";
$data['fname'] = "Zviko";
$data['email'] = "zvikocesy@gmail.com";

//$employee_test->create($data);
$employees = $employee_test->readAll();



