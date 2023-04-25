<?php
namespace app\controllers;

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
            $project->otherInformation = $_POST['otherInformation'];
            //TODO: Gather the information for both client to determine their id
            //Client


            $project->insert();

            header('location:/Project/index');
        }
        else {
            $this->view('Project/create');
        }
    }

    public function edit($project_id) {
        $project = new \app\models\Project();
        $project = $project->getByProjectId($project_id);
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
                $project->otherInformation = $_POST['otherInformation'];
                //TODO: Gather the information for both client to determine their id
                //Client


                $project->edit();

                header('location:/Project/index');
            }
            else {
                $this->view('Project/edit/', $project);
            }
        }
        else {
            header('location:/Project/index?error=The chosen project does not exist');
        }
    }

    public function delete($project_id) {
        $project = new \app\models\Project();
        $project = $project->getByProjectId($project_id);
        // might make this into a filter the not null project
        if($project) {
            if(isset($_POST['action'])) {
                $project->delete();
                header('location:/Project/index');
            }
            else {
                $this->view('Project/delete/', $project);
            }
        }
        else {
            header('location:/Project/index?error=The chosen trip does not exist');
        }
    }
}