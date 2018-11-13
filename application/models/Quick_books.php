<?php
require_once(APPPATH.'third_party/quickbooks/auth2/OAuth_2/Client.php');
require_once(APPPATH.'third_party/quickbooks/vendor/autoload.php');


use QuickBooksOnline\API\DataService\DataService;
use QuickBooksOnline\API\Core\Http\Serialization\XmlObjectSerializer;
use QuickBooksOnline\API\Facades\Customer;
use QuickBooksOnline\API\Facades\Invoice;
use QuickBooksOnline\API\Facades\Item;
use QuickBooksOnline\API\Facades\Vendor;
use QuickBooksOnline\API\Facades\Employee;



class Quick_books extends Settings_model{

	private $dataService;
	private $qb_client_id;
	private $qb_client_secret;
	private $qb_access_token;
	private $qb_refresh_token;
	private $qb_realmId;


	public function __construct() {

		parent::__construct();

		$this->qb_client_id = $this->get_value('qb_client_id');
		$this->qb_client_secret = $this->get_value('qb_client_secret');
		$this->qb_refresh_token = $this->get_value('qb_refresh_token');
		$this->qb_realmId = $this->get_value('qb_realmId');

		
	}



	public function add_customer($data){
		$this->refresh_token();

		$theResourceObj = Customer::create([
			"BillAddr" => [
				"Line1" => $data['u_address'],
				"City" => $data['u_city'],
				"Country" => $data['u_country'],
				"PostalCode" => $data['u_postal_code']
			],
			"GivenName" => $data['u_fullname'],
			"FamilyName" => $data['u_fullname'],
			"DisplayName" => $data['u_fullname'],
			"CompanyName" => 'goholo',
			"PrimaryPhone" => [
				"FreeFormNumber" => $data['u_phone']
			],
			"PrimaryEmailAddr" => [
				"Address" => $data['u_email']
			],
		]);

		$resultingObj = $this->dataService->Add($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}
	public function update_customer($data){

		$this->refresh_token();

		$customer = $this->dataService->FindbyId('customer', $data['user_qb_id']);

		$theResourceObj = Customer::update($customer  , [
			"BillAddr" => [
				"Line1" => $data['u_address'],
				"City" => $data['u_city'],
				"Country" => $data['u_country'],
				"PostalCode" => $data['u_postal_code']
			],
			"GivenName" => $data['u_fullname'],
			"FamilyName" => $data['u_fullname'],
			"DisplayName" => $data['u_fullname'],
			"PrimaryPhone" => [
				"FreeFormNumber" => $data['u_phone']
			],
			"PrimaryEmailAddr" => [
				"Address" => $data['u_email']
			]
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function inactive_customer($id){

		$this->refresh_token();

		$customer = $this->dataService->FindbyId('customer', $id);

		$theResourceObj = Customer::update($customer  , [
			"Active" => false
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function add_vendor($data){

		$this->refresh_token();

		$BillAddr = array();

		if (!isset($data['street'])) {
			
			$data['street'] = "";
			$data['city'] = "";
			$data['post_code'] = ""; 
		}

		$theResourceObj = Vendor::create([
			"BillAddr" => [
				"Line1" => $data['street'],
				"City" => $data['city'],
				"PostalCode" => $data['post_code']
			],
			"GivenName" => $data['first_name'],
			"FamilyName" => $data['last_name'],
			"DisplayName" => $data['first_name'].' '.$data['last_name'],
			"PrimaryPhone" => [
				"FreeFormNumber" => $data['phone_number']
			],
			"PrimaryEmailAddr" => [
				"Address" => $data['email']
			]
		]);

		$resultingObj = $this->dataService->Add($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function update_vendor($data){

		$this->refresh_token();

		$vendor = $this->dataService->FindbyId('vendor', $data['user_qb_id']);

		$theResourceObj = Vendor::update($vendor  , [
			"BillAddr" => [
				"Line1" => $data['street'],
				"City" => $data['city'],
				"PostalCode" => $data['post_code']
			],
			"GivenName" => $data['first_name'],
			"FamilyName" => $data['last_name'],
			"DisplayName" => $data['first_name'].' '.$data['last_name'],
			"PrimaryPhone" => [
				"FreeFormNumber" => $data['phone_number']
			],
			"PrimaryEmailAddr" => [
				"Address" => $data['email']
			]
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function inactive_vendor($id){

		$this->refresh_token();

		$vendor = $this->dataService->FindbyId('vendor', $id);

		$theResourceObj = Vendor::update($vendor  , [
			"Active" => false
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}



	public function add_item($data){

		$this->refresh_token();

		$theResourceObj = Item::create([
			"Name" => $data['dvl_name'],
			"UnitPrice" => $data['dvl_charges'],
			"IncomeAccountRef" => [
				"value" => "79",
				"name" => "Sales of Product Income"
			],
			"ExpenseAccountRef" => [
				"value" => "80",
				"name" => "Cost of Goods Sold"
			],
			"Type" => "Service",
			"QtyOnHand" => 1,
		]);
		$resultingObj = $this->dataService->Add($theResourceObj);
		$error = $this->dataService->getLastError();
		
		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;
	}



	public function update_item($data){

		$this->refresh_token();

		$item = $this->dataService->FindbyId('item', $data['qb_delivery_id']);

		$theResourceObj = Item::update($item  , [
			"Name" => $data['dvl_name'],
			"UnitPrice" => $data['dvl_charges'],
			"IncomeAccountRef" => [
				"value" => "79",
				"name" => "Sales of Product Income"
			],
			"ExpenseAccountRef" => [
				"value" => "80",
				"name" => "Cost of Goods Sold"
			],
			"Type" => "Service",
			"QtyOnHand" => 1,
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function inactive_item($id){

		$this->refresh_token();

		$item = $this->dataService->FindbyId('item', $id);

		$theResourceObj = Item::update($item  , [
			"Active" => false
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function add_employee($data){

		$this->refresh_token();
		

		$theResourceObj = Employee::create([
			"PrimaryAddr" => [
				"Line1" => $data['d_address'],
				"City" => $data['d_city'],
				"PostalCode" => $data['d_postalCode']
			],
			"GivenName" => $data['d_name'],
			"FamilyName" => $data['d_name'],
			"DisplayName" => $data['d_name'],
			"PrimaryPhone" => [
				"FreeFormNumber" => $data['d_phone']
			],
			"PrimaryEmailAddr" => [
				"Address" => $data['d_email']
			]
		]);

		$resultingObj = $this->dataService->Add($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}


	public function update_employee($data){

		$this->refresh_token();

		$employee = $this->dataService->FindbyId('employee', $data['qb_driver_id']);

		$theResourceObj = Employee::update($employee  , [
			"PrimaryAddr" => [
				"Line1" => $data['d_address'],
				"City" => $data['d_city'],
				"PostalCode" => $data['d_postalCode']
			],
			"GivenName" => $data['d_name'],
			"FamilyName" => $data['d_name'],
			"DisplayName" => $data['d_name'],
			"PrimaryPhone" => [
				"FreeFormNumber" => $data['d_phone']
			],
			"PrimaryEmailAddr" => [
				"Address" => $data['d_email']
			]
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}


	

	public function inactive_employee($id){

		$this->refresh_token();

		$employee = $this->dataService->FindbyId('employee', $id);

		$theResourceObj = Employee::update($employee  , [
			"Active" => false
		]);


		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;

	}

	public function create_invoice($data){

		$this->refresh_token();

		$theResourceObj = Invoice::create([
			"Line" => [
				[
					"Amount" => $data['dvl_charges'],
					"DetailType" => "SalesItemLineDetail",
					"SalesItemLineDetail" => [
						"ItemRef" => [
							"value" => $data['qb_delivery_id'],
						],
						"UnitPrice" =>"",
						"Qty" =>1,
					]
				]
			],
			"CustomerRef"=> [
				"value"=> $data['user_qb_id']
			],
			"EmailStatus" => "EmailSent",
			"PrintStatus" => "NeedToPrint",
			"BillEmail" => [
				"Address" => $data['u_email']
			],
		]);

		$resultingObj = $this->dataService->Add($theResourceObj);

		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;


	}

	public function update_invoice($data){

		$this->refresh_token();
		$invoice = $this->dataService->FindbyId('invoice', $data['qb_invoice_id']);

		$theResourceObj = Invoice::update($invoice,[
			"Line" => [
				[
					"Amount" => $data['dvl_charges'],
					"DetailType" => "SalesItemLineDetail",
					"SalesItemLineDetail" => [
						"ItemRef" => [
							"value" => $data['qb_delivery_id'],
						],
					]
				]
			],
			"CustomerRef"=> [
				"value"=> $data['user_qb_id']
			],
			"EmailStatus" => "EmailSent",
			"PrintStatus" => "NeedToPrint",
			"BillEmail" => [
				"Address" => $data['u_email']
			],
		]);

		$resultingObj = $this->dataService->Update($theResourceObj);

		$error = $this->dataService->getLastError();



		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;


	}

	public function delete_invoice($id){

		$this->refresh_token();

		$invoice = $this->dataService->FindbyId('invoice', $id);
		$resultingObj = $this->dataService->Delete($invoice);

		
		$error = $this->dataService->getLastError();

		$response = array();

		if ($error) {
			$response['error'] = true;
			$response['msg'] = "The Response message is: " . $error->getResponseBody();
		}
		else {
			$response['error'] = false;
			$response['msg'] = $resultingObj->Id;
		}

		return $response;
	}


	public function refresh_token(){

		$tokenEndPointUrl = $this->config->item('qb_tokenEndPointUrl');
		$grant_type= 'refresh_token';

		$certFilePath = APPPATH.'third_party/quickbooks/auth2/OAuth_2/Certificate/cacert.pem';

		$client = new Client($this->qb_client_id, $this->qb_client_secret, $certFilePath);

		$result = $client->refreshAccessToken($tokenEndPointUrl, $grant_type, $this->qb_refresh_token);

		$this->set_value('qb_access_token',$result['access_token']);
		$this->set_value('qb_refresh_token',$result['refresh_token']);

		$this->qb_access_token = $result['access_token'];
		$this->qb_refresh_token = $result['refresh_token'];

		$this->dataService = DataService::Configure(array(
			'auth_mode' => 'oauth2',
			'ClientID' => $this->qb_client_id,
			'ClientSecret' => $this->qb_client_secret,
			'accessTokenKey' =>$this->qb_access_token,
			'refreshTokenKey' => $this->qb_refresh_token,
			'QBORealmID' => $this->qb_realmId,
			'baseUrl' => "Development"
		));

	}

}