<?php
namespace app\controllers;

#[\app\filters\Login]
#[\app\filters\twofa]
class Project extends \app\core\Controller{
    public function index() {
        $project = new \app\models\Project();
        $projects = $project->getAll();
        $this->view('Project/index', $projects);
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        if ($output == null) {
            echo "<script>console.log('null');</script>";
        }
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
            // $this->debug_to_console($project->project_id);
            $project->insert();
            // $this->debug_to_console($project->project_id);
            $payment = new \app\models\PaymentInformation();
            // $this->debug_to_console($payment->project_id);
            $payment->project_id = $project->project_id;
            // $this->debug_to_console($payment->project_id);
            $payment->user_id = $_POST['user_id1'];
            $payment->paymentMethod = $_POST['payment1'];
            $payment->amount = $_POST['amount1'];
            $payment->date = $_POST['date1'];
            $payment->insert();
            $payment2 = new \app\models\PaymentInformation();
            $payment2->project_id = $project->project_id;
            $payment2->user_id = $_POST['user_id2'];
            $payment2->paymentMethod = $_POST['payment2'];
            $payment2->amount = $_POST['amount2'];
            $payment2->date = $_POST['date2'];
            $payment2->insert();
            $home = new \app\models\Home();
            $home->project_id = $project->project_id;
            $home->insert();
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