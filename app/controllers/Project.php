<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Project extends \app\core\Controller{
    const $maxPayments = 10;
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
            $project->insert();
            for(var $i = 1; $i <= $maxPayments; $i++) {
                (isset($_POST['date']))
            }
            header('location:/Project/index');
        }
        else {
            $user = new \app\models\User();
            $users = $user->getAll();
            $this->view('Project/create', $users);
        }
    }

    public function edit($project_id) {
        $project = new \app\models\Project();
        $project = $project->get($project_id);
        // might make this into a filter the not null project
        if($project) {
            if(isset($_POST['action'])) {
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
                $client = $client->get($project->client_id);
                $client->clientName = $_POST['client'];
                $client->address = $_POST['address'];
                $client->update();
                $project->client_id = $client->client_id;
                $project->update();
                header('location:/Project/index');
            }
            else {
                $payments = $project->getAll();
                $user = new \app\models\User();
                $users = $user->getAll();
                $this->view('Project/edit', [$project, $payments, $users]);
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