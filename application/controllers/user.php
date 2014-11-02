<?php
class User extends CI_Controller{
	//Construct function
	function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	//Index function
	public function index(){

		$data['user_data'] = $this->User_model->get();
		
		$this->load->view('user_list_view',$data);
	}

	public function edit($id = NULL){

		//Check country $id set or not
		if($id)
		{
			$data['user'] = $this->User_model->get_by(array('user_id'=>trim($id)),TRUE);
			count($data['user']) || $data['errors'] = "Country could not find";
		}
		else
		{
			//Reset form data
			$data['user'] = $this->User_model->get_new();
		}

		$config = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'required|trim|max_length[100]'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'required|trim|max_length[100]'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Address',
                     'rules'   => 'required|trim|max_length[200]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'required|trim|valid_email|max_length[100]'
                  ),
               array(
                     'field'   => 'phone_number',
                     'label'   => 'Phone Number',
                     'rules'   => 'required|trim|numeric|max_length[15]'
                  )
            );

		$this->form_validation->set_rules($config);

		if($this->form_validation->run()==TRUE){

			$data = $this->User_model->array_from_post(array('first_name','last_name','address','email','phone_number'));

			//echo $id;exit();
			$this->User_model->save($data,$id);
			
			redirect('user');
		}

		$this->load->view('user_edit_view',$data);

	}


	public function delete($id){

		$this->User_model->delete($id);
		
		redirect('user');


	}

	
	
}
?>