<?php
namespace app\controllers;
use app\core\TimeHelper;

class Service extends \app\core\Controller{
	public function index($client_id){
		$client = new \app\models\Client();
		$client = $client->get($client_id);
		$this->view('Service/index', $client);
	}

	public function create($client_id){
		if(isset($_POST['action'])){
			$service = new \app\models\Service();
			$service->description = $_POST['description'];
			$service->datetime = $_POST['datetime'];
			$service->client_id = $client_id;
			$service->branch_id = $_POST['branch_id'];
			$service->insert();
			header('location:/Service/index/' . $client_id);
		}else{
            $client = new \app\models\Client();
    		$client = $client->get($client_id);
			$branch = new \app\models\Branch();
			$branches = $branch->getAll();
			$this->view('Service/create', ['client' => $client,'branches' => $branches]);
		}
	}

	public function delete($service_id){
		$service = new \app\models\Service();
        $service = $service->get($service_id);
        // $client = $service->getClient(); //do this in the view
        if(isset($_POST['action'])) {
            $client_id = $service->client_id;
            $service->delete();
            header('location:/Service/index/'. $client_id);
        }
        else {
            $this->view('Service/delete', $service);
        }
	}
	public function edit($service_id){
		$service = new \app\models\Service();
		$service = $service->get($service_id);

		if(isset($_POST['action'])) {
			$service->description = $_POST['description'];
			$service->datetime = $_POST['datetime'];
			$service->branch_id = $_POST['branch_id'];
			$service->update();
            $client_id = $service->client_id;
			header('location:/Service/index/'.$client_id);
		}
		else {
			$branch = new \app\models\Branch();
			$branches = $branch->getAll();
			$this->view('Service/edit', ['service' => $service,'branches' => $branches]);
		}
	}
}