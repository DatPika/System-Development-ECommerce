<?php
namespace app\controllers;

#[\app\filters\Login]
class Project extends \app\core\Controller{
    public function index() {
        $project = new \app\models\Project();
        $projects = $project->getAll();
        $this->view('Project/index', $projects);
    }

    public function create() {
        if(isset($_POST['action'])) {
            $project = new \app\models\Project();
            $project->job = $_POST['job'];
            $project->startDate = $_POST['startDate'];
            $project->endDate = $_POST['endDate'];
            $project->done = $_POST['done'];
            $project->surfaceArea = $_POST['surfaceArea'];
            $project->lights = $_POST['lights'];
            $project->spots = $_POST['spots'];
            $project->vents = $_POST['vents'];
            $project->works = $_POST['works'];
            $project->projectCost = $_POST['projectCost'];
            $project->otherInformation = $_POST['otherInformation'];
            $client = new \app\models\Client();
            $client->clientName = $_POST['client'];
            $client->address = $_POST['address'];
            $client->insert();
            $project->client_id = $client->client_id;
            $payment = new \app\models\PaymentInformation();
            $payment->project_id = $project->project_id;
            $payment->paymentMethod = $_POST['deposit'];
            $payment->date = $_POST['date'];
            $payment->amount = $_POST['amount'];
            //TODO: 
            // user_id dropdown list to fetch user for profit/payment
            $payment->insert();
            $project->payment_id = $payment->payment_id;
            $project->insert();

            header('location:/Project/index');
        }
        else {
            $this->view('Project/create');
        }
    }

    public function edit($project_id) {
        $project = new \app\models\Project();
        $project = $project->get($project_id);
        // might make this into a filter the not null project
        if($project) {
            if(isset($_POST['action'])) {
                $project = new \app\models\Project();
                $project->job = $_POST['job'];
                $project->startDate = $_POST['startDate'];
                $project->endDate = $_POST['endDate'];
                $project->done = $_POST['done'];
                $project->surfaceArea = $_POST['surfaceArea'];
                $project->lights = $_POST['lights'];
                $project->spots = $_POST['spots'];
                $project->vents = $_POST['vents'];
                $project->works = $_POST['works'];
                $project->projectCost = $_POST['projectCost'];
                $project->otherInformation = $_POST['otherInformation'];
                $client = new \app\models\Client();
                $client->clientName = $_POST['client'];
                $client->address = $_POST['address'];
                $client->insert();
                $project->client_id = $client->client_id;
                $payment = new \app\models\PaymentInformation();
                $payment->project_id = $project->project_id;
                $payment->paymentMethod = $_POST['deposit'];
                $payment->date = $_POST['date'];
                $payment->amount = $_POST['amount'];
                // TODO: update or insert Payment Information by implementing user drop down
                // user_id dropdown list to fetch user for profit/payment

                $payment->insert();
                $project->payment_id = $payment->payment_id;
                $project->update();

                header('location:/Project/index');
            }
            else {
                $this->view('Project/edit', $project);
            }
        }
        else {
            header('location:/Project/index?error=The chosen project does not exist');
        }
    }

    public function delete($project_id) {
        $project = new \app\models\Project();
        $project = $project->get($project_id);
        // might make this into a filter the not null project
        if($project) {
            if(isset($_POST['action'])) {
                $project->delete();
                header('location:/Project/index');
            }
            else {
                $this->view('Project/delete', $project);
            }
        }
        else {
            header('location:/Project/index?error=The chosen trip does not exist');
        }
    }
}