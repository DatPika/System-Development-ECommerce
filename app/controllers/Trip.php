<?php
namespace app\controllers;

#[\app\filters\Login]
class Trip extends \app\core\Controller{
    public function index() {
        $trip = new \app\models\Trip();
        $trips = $trip->getAll();
        $this->view('Trip/index', $trips);
    }

    public function create() {
        if(isset($_POST['action'])) {
            $trip = new \app\models\Trip();
            $trip->distance = $_POST['distance'];
            $trip->project_id = $_POST['project'];
            $trip->client_id = $_POST['client'];
            $trip->insert();
            header('location:/Trip/index');
        }
        else {
            $this->view('Trip/create');
        }
    }

    public function edit($trip_id) {
        $trip = new \app\models\Trip();
        $trip = $trip->get($trip_id);
        // might make this into a filter the not null trip
        if($trip) {
            if(isset($_POST['action'])) {
                $trip->distance = $_POST['distance'];
                $trip->project_id = $_POST['project'];
                $trip->client_id = $_POST['client'];
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
}