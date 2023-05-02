<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Home extends \app\core\Controller{
    public function index() {
        var_dump($_SESSION);
        $expense = new \app\models\Expense();
        $expenses = $expense->getAll();
        $project = new \app\models\Project();
        $projects = $project->getAll();
        $data = [
            $expenses,$projects
        ];
        $this->view('Home/index', $data);
    }
    // TODO:
    public function paySplit() {
        
    }
}