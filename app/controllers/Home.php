<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Home extends \app\core\Controller{
    public function index() {
        $expense = new \app\models\Expense();
        $expenses = $expense->getAllByColumnDesc($timestamp);
        $project = new \app\models\Project();
        $projects = $project->getAllByColumnDesc($endDate);
        $data = [
            'expenses'=>$expenses,
            'projects'=>$projects
        ];
        $this->view('Home/index', $data);
    }
    // TODO:
    public function paySplit() {
        
    }
}