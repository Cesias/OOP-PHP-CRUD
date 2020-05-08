<?php

require_once './autoloader.php';

class Employee extends Transaction
{
   protected $table = "employee";



    public function create($data)
    {

      $employee['firstname'] = $data['fname'];
      $employee['lastname'] = $data['lname'];
      $employee['email'] = $data['email'];
      parent::create($employee,$this->table);
    }

    public function read($id)
    {
       $record = parent::read($id);
       return $record;
    }

    public function readAll()
    {
      $records =  parent::readAll();
      return $records;
    }

    public function delete($id)
    {
        parent::delete($id);
    }

    public function update($data,$id)
    {
        parent::update($id);
    }


}