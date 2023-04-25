<?php
namespace app\controllers;

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
            //TODO: Gather the information for both client and project to determine their id
            //Client

            //Project


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
                //TODO: Gather the information for both client and project to determine their id
                //Client

                //Project


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