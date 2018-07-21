<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    	$this->load->helper('url');
		$this->load->model('admin_model');
    }
    
    function index()
    {
		$this->go_detector();
    }
	
	function go_detector($error = '')
	{
		$result = $this->admin_model->get_history($array);
		$data = array('error' => $error, 'data' => $array);
		$this->load->view('detector', $data);
	}

	function finish()
	{
		$flag = $_POST['finish'];
		echo $this->admin_model->check_history();

	}

	function clear_history()
	{
		$flag = $_POST['clear'];
		echo $this->admin_model->clear_history();

	}
	
	// function delete_history()
	// {
	// 	if(strpos($_REQUEST['photo'], '001') !== false) {
	// 		$photo = FCPATH.'uploadImages/admin/'.$_REQUEST['photo'];
	// 		if (!copy($photo, FCPATH.'uploadImages/admin/000.png')) {
	// 		    $error = 'Photo update failed!';
	// 			$this->go_edit($error);		
	// 			return;
	// 		}
	// 	}
	// 	$error = 'Admin has been changed successfully!';
	// 	$username = $_REQUEST['username'];
	// 	$password = $_REQUEST['password'];
	// 	$email = $_REQUEST['email'];
	// 	$this->load->model('admin_model');
	// 	$this->admin_model->update_admin($username, $password, $email);
	// 	$_SESSION['mystage']['username'] = $username;
	// 	$_SESSION['mystage']['email'] = $email;
	// 	$_SESSION['mystage']['password'] = $password;
	// 	$this->go_edit($error);		
	// }

	function upload_blob()
	{
		if (isset($_FILES["blob"])) {
			date_default_timezone_set("Asia/Shanghai");
			$timestamp = time();
			$fileName = $timestamp.'.'.$_POST['fileType'];
			$filePath = './uploads/'.$fileName;
			$status = "400";
			$time = date('m/d/Y h:i a', $timestamp);
			if (move_uploaded_file($_FILES["blob"]["tmp_name"], $filePath)) {
				$result = $this->admin_model->add_history($filePath, $time);
			}
			echo json_encode(['status' => $status, 'name' => $fileName, 'url' => $filePath, 'time' => $time]);
		}	
	}  	
}
?>