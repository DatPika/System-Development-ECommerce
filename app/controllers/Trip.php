<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Trip extends \app\core\Controller{
    public function index() {
        $trip = new \app\models\Trip();
        $trips = $trip->getAll();
        $this->view('Trip/index', $trips);
    }

    public function create($project_id) {
        $project = new \app\models\Project();
        $project = $project->get($project_id);
        if(isset($_POST['action'])) {
            $trip = new \app\models\Trip();
            $trip->distance = $_POST['distance'];
            $trip->project_id = $project->project_id;
            $trip->insert();
            header('location:/Trip/index');
        }
        else {
            $this->view('Trip/create', $project);
        }
    }

    public function edit($trip_id) {
        $trip = new \app\models\Trip();
        $trip = $trip->get($trip_id);
        // might make this into a filter the not null trip
        if($trip) {
            if(isset($_POST['action'])) {
                $trip->distance = $_POST['distance'];
                $trip->project_id = $_POST['project_id'];
                $trip->update();
                header('location:/Trip/index');
            }
            else {
                $this->view('Trip/edit', $trip);
            }
        }
        else {
            header('location:/Trip/index?error=The chosen trip does not exist');
        }
    }

    public function delete($trip_id) {
        $trip = new \app\models\Trip();
        $trip = $trip->get($trip_id);
        // might make this into a filter the not null trip
        if($trip) {
            if(isset($_POST['action'])) {
                $trip->delete();
                header('location:/Trip/index');
            }
            else {
                $this->view('Trip/delete', $trip);
            }
        }
        else {
            header('location:/Trip/index?error=The chosen trip does not exist');
        }
    }

    public function selectProject() {
        if(isset($_POST['action'])) {
            $project = new \app\models\Project();
            $project = $project->get($_POST['project_id']);
            header('location:/Trip/create/'. $project->project_id);
        }else{
            $project = new \app\models\Project();
            $projects = $project->getAll();
            $this->view('Trip/selectProject', $projects);
        }
    }
}