<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Interested extends CI_Controller {
	
	/*------------------------------*/
	/*------------------------------*/	
	public function index()
	{
                $data = array();
                $load = array();

                $this->load->library('form_validation');
                $this->form_validation->set_rules('name','Name','required');
                if($this->form_validation->run())
                {
                    $JSON = json_encode(array(
                        'name' => $this->input->post('name'),
                    ));

                    $data['response'] = APICall(API_URL.'api/admin/add-interested',$JSON); /* call API and get response */         
                    if($data['response']['status'] == 1){
                        $this->session->set_flashdata('msgtype', 'success');                        
                        $this->session->set_flashdata('message', 'Interested Added Successfully !');                        
                        redirect('interested');
                    }else{
                       $this->custom_lib->show_response($data['response']);
                    }      

                }
                    $JSON = json_encode(array(
                        'limit' => PAGE_LIMIT,
                    ));

                $data['response'] = APICall(API_URL.'api/admin/get-interesteds',$JSON); /* call API and get response */         
		$this->load->view('includes/header',$load);
		$this->load->view('includes/menu');
		$this->load->view('interested/interested_list',$data);
		$this->load->view('includes/footer');
	}
        
	public function update($id)
	{
                $data = array();
                $load = array();
                // Get Single Question
                $JSON = json_encode(array(
                    'interestedId' => $id,
                ));
                $data['response'] = APICall(API_URL.'api/admin/get-interested-details',$JSON); /* call API and get response */         
                $data['interested'] = $data['response']['data'][0];

                if($data['response']['status'] != 1){
                    redirect('interested');    
                }
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('name','Name','required');
                if($this->form_validation->run())
                {
                    $JSON = json_encode(array(
                        'interestedId' => $id,
                        'name' => $this->input->post('name'),
                    ));

                    // Update Question API
                    $data['response'] = APICall(API_URL.'api/admin/update-interested',$JSON); /* call API and get response */         
                    if($data['response']['status'] == 1){
                        $this->session->set_flashdata('msgtype', 'success');                        
                        $this->session->set_flashdata('message', 'Interested Updated Successfully !');                        
                        redirect('interested');
                    }else{
                       $this->custom_lib->show_response($data['response']);
                    }      

                }
		$this->load->view('includes/header',$load);
		$this->load->view('includes/menu');
		$this->load->view('interested/update_interested',$data);
		$this->load->view('includes/footer');
	}

}
