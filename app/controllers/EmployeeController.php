<?php


namespace App\Controllers;


use App\Models\Employee;

class EmployeeController
{
    /**
     * output resource list view with elements
     */
    public function index() {
        $result = Employee::selectAll();

        view('employees/index', compact('result'));
    }

    /**
     * shows view with form to create new resource
     */
    public function create(){
        view('employees/create');
    }

    /**
     * takes input from create view form and adds info to database
     */
    public function store(){
        $employee = new Employee();
        $employee->fname = $_POST['fname'];
        $employee->lname = $_POST['lname'];
        $employee->phone = intval($_POST['phone']);
        $date = new \DateTime($_POST['bday']);
        $employee->bday = $date->format('Y-m-d');
        $employee->save();
        header('Location: /employees');
        die();
    }

    /**
     * shows view with form to edit existing resource
     */
    public function edit(){
        $employee = Employee::find($_GET['id']);
        view('employees/edit', compact('employee'));
    }

    /**
     * takes input from edit view form and updates info in database
     */
    public function update(){
        $employee = Employee::find($_GET['id']);
        $employee->fname = $_POST['fname'];
        $employee->lname = $_POST['lname'];
        $employee->phone = intval($_POST['phone']);
        $date = new \DateTime($_POST['bday']);
        $employee->bday = $date->format('Y-m-d');
        $employee->save();
        header('Location: /employees');
        die();
    }

    /**
     *  shows view for single resource
     */
    public function view(){
        $employee = Employee::find($_GET['id']);
        view('employees/view', compact('employee'));
    }

    /**
     * deletes a resource
     */
    public function delete(){
        $employee = Employee::find($_GET['id']);
        $employee->delete();
        header('Location: /employees');
        die();
    }
}