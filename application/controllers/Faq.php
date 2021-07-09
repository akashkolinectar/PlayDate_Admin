<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller {
	
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

                $data['response'] = APICall(API_URL.'api/admin/get-faqs'); /* call API and get response */         
		$this->load->view('includes/header',$load);
		$this->load->view('includes/menu');
		$this->load->view('faqs/faq_list',$data);
		$this->load->view('includes/footer');
	}
        
	public function update($id)
	{
                $data = array();
                $load = array();
                // Get Single Question
                $JSON = json_encode(array(
                    'faqId' => $id,
                ));
                $data['response'] = APICall(API_URL.'api/admin/get-faq-details',$JSON); /* call API and get response */         
                $data['faq'] = $data['response']['data'][0];

                if($data['response']['status'] != 1){
                    redirect('interested');    
                }
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('question','Question','required');
                $this->form_validation->set_rules('answer','answer','required');
                if($this->form_validation->run())
                {
                    $JSON = json_encode(array(
                        'faqid' => $id,
                        'question' => $this->input->post('question'),
                        'answer' => $this->input->post('answer'),
                    ));

                    // Update Question API
                    $data['response'] = APICall(API_URL.'api/admin/update-faq',$JSON); /* call API and get response */         
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
		$this->load->view('faqs/update_faq',$data);
		$this->load->view('includes/footer');
	}

}
