<?php


Interface Model
{
 public function create($data);
 public function read($id);
 public function readAll();
 public function delete($id);
 public function update($data,$id);
 
}