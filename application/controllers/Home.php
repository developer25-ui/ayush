<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend_Controller
{

    public function __construct()
    {
        parent::__construct();
    
        $this->load->model('home_model');
        $this->load->model('frontend_model');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        $seo_content = $this->home_model->get_list('front_cms_home_seo', array('id' => 1), true);
        $data['seo_content'] = json_decode($seo_content['seo_content']); 
        
        $data['page'] = 'ayush/index';
        $this->load->view('ayush/template', $data);
    }
     
//   public function leadership()
//     {
       
//         $data['page'] = 'ayush/leadership';
//         $this->load->view('ayush/template', $data);
//     }

 public function leadership($slug=""){
        
        if($slug){
            $data['page'] = 'ayush/leadership-detail';
            $data['leadership'] = $this->db->get_where('leadership',array('slug'=>$slug))->row();
        }else{
            $seo_content = $this->home_model->get_list('front_cms_leadership_seo', array('id' => 1), true);
        $data['seo_content'] = json_decode($seo_content['seo_content']);
            $data['page'] = 'ayush/leadership';
        }
        $this->load->view('ayush/template', $data);
    }
    public function awards_accreditation()
    {
       
        $data['page'] = 'ayush/awards-accreditation';
        $this->load->view('ayush/template', $data);
    }
  public function ourspeciality()
    {
        $seo_content = $this->home_model->get_list('front_cms_speciality_seo', array('id' => 1), true);
        $data['seo_content'] = json_decode($seo_content['seo_content']);
        $data['page'] = 'ayush/ourspeciality';
        $this->load->view('ayush/template', $data);
    }
    public function subspecialtydetail()
    {
        $seo_content = $this->home_model->get_list('front_cms_speciality_seo', array('id' => 1), true);
        $data['seo_content'] = json_decode($seo_content['seo_content']);
        $data['page'] = 'ayush/subspecialtydetail';
        $this->load->view('ayush/template', $data);
    }
    

       public function sub_speciality($slug)
    {
        // redirect(base_url('home'));
        if (empty($slug)) {
            redirect(base_url('home'));
        }
        
       $data['sub_speciality'] = $this->db->get_where('procedure',array('slug'=>$slug))->row();
        $data['seo_content'] = json_decode($data['sub_speciality']->seo_content); 
        $data['page'] = 'ayush/sub-speciality';
        $this->load->view('ayush/template', $data);
    }
   public function speciality_details($slug)
    {
        if (empty($slug)) {
            redirect(base_url('home'));
        }
        $speciality = $this->db->get_where('front_cms_services_list',array('slug'=>$slug))->row();
        $id = $speciality->id;
        $data['speciality'] = $this->db->get_where('front_cms_services_list',array('id'=>$id))->row();
       $data['sub_speciality'] = $this->db->get_where('procedure',array('speciality_id'=>$id))->result();
        // $data['procedures'] = $this->db->get_where('procedure',array('speciality_id'=>$id))->result();
     
        // $this->data['main_contents'] = $this->load->view('home/doctors', $this->data, true);
        // $this->load->view('home/layout/index', $this->data);
        // echo "<pre>";
        // print_r($data);
        // die;
        $data['page'] = 'ayush/speciality_details';
        $this->load->view('ayush/template', $data);
    }

    public function schemes()
    {
       
        $data['page'] = 'ayush/schemes';
        $this->load->view('ayush/template', $data);
    }
    public function doctor_list()
    {
        // $this->data['page_data'] = $this->home_model->get_list('front_cms_doctors', array('id' => 1), true);
        // $this->data['departments'] = $this->home_model->get_doctor_departments();
        // $this->data['main_contents'] = $this->load->view('home/doctors', $this->data, true);
        // $this->load->view('home/layout/index', $this->data);
        // echo "<pre>";
        // print_r($data);
        // die;
        $speciality_id = $this->input->get('speciality');
        if($speciality_id){
            $speciality = $this->db->get_where('front_cms_services_list',array('id'=>$speciality_id))->row();
            $doctors = json_decode($speciality->doctors);
        //     echo "<pre>";
        // print_r($doctors);
        // die;
            $data['speciality_id'] = $speciality_id;        
            $data['doctors'] = $this->home_model->get_doctor_speciality_list($doctors);
        }else{
            $data['speciality_id'] = "";  
            $data['doctors'] = $this->home_model->get_doctor_list();
        }
        $data['page'] = 'ayush/doctor_list';
        $this->load->view('ayush/template', $data);
    }
  
  public function doctorss()
    {
     
         $location_id = $this->input->get('location');
        if($location_id){
            $location = $this->db->get_where('location',array('id'=>$location_id))->row();
            $doctors = json_decode($location->doctors);
        //     echo "<pre>";
        // print_r($doctors);
        // die;
            $data['location_id'] = $location_id;        
            $data['doctors'] = $this->home_model->get_doctor_location_list($doctors);
        }else{
            $data['location_id'] = "";  
            $data['doctors'] = $this->home_model->get_doctors_list();
        }
        if($_GET['type'] == "alpha"){
            $data['doctors'] = $this->home_model->get_doctor_list_alphabetically();
        $result = array();
            foreach ($data['doctors'] as $item) {
                $firstLetter = substr($item['new_name'], 0, 1);
                if (ctype_alpha($firstLetter)) {
                    $result[$firstLetter][] = $item;
                }else{
                    // $result["0-9"][] = $item;
                }
            }
        
        // echo "<pre>";
        
        // print_r($result);
        // die;
        $data['doctors'] = $result;
        $data['page'] = 'ayush/doctorss';
        }else{
            $data['page'] = 'ayush/doctorss';
        }
        $this->load->view('ayush/template', $data);
    }
  public function doctors()
    {
       
        $speciality_id = $this->input->get('speciality');
        if($speciality_id){
            $speciality = $this->db->get_where('front_cms_services_list',array('id'=>$speciality_id))->row();
            $doctors = json_decode($speciality->doctors);
        //     echo "<pre>";
        // print_r($doctors);
        // die;
            $data['speciality_id'] = $speciality_id;        
            $data['doctors'] = $this->home_model->get_doctor_speciality_list($doctors);
        }else{
            $data['speciality_id'] = "";  
            $data['doctors'] = $this->home_model->get_doctor_list();
        }
         
        if($_GET['type'] == "alpha"){
            $data['doctors'] = $this->home_model->get_doctor_list_alphabetically();
        $result = array();
            foreach ($data['doctors'] as $item) {
                $firstLetter = substr($item['new_name'], 0, 1);
                if (ctype_alpha($firstLetter)) {
                    $result[$firstLetter][] = $item;
                }else{
                    // $result["0-9"][] = $item;
                }
            }
        
        // echo "<pre>";
        
        // print_r($result);
        // die;
        $data['doctors'] = $result;
        $data['page'] = 'ayush/doctor';
        }else{
            $data['page'] = 'ayush/doctor';
        }
        $this->load->view('ayush/template', $data);
    }

 public function doctor_profile($id = '')
    {
        if (empty($id)) {
            redirect(base_url('home'));
        }
     
       $data['doctor'] = $this->home_model->get_doctor_profile_by_slug($id);
       $doctor = $this->db->get_where('staff',array('slug'=>$id))->row();
      
       $id = $doctor->id;
       $data['doctortalk'] = $this->db->get_where('doctors_talk',array('show_id'=>$id))->result();

    // $data['doctorstalks'] = $this->home_model->get_doctor_talk($id);
        $data['seo_content'] = json_decode($data['doctor']['seo_content']);
        $data['page'] = 'ayush/doctor-detail';
        $this->load->view('ayush/template', $data);
    }
     public function checkup_details($slug){
        $data['list'] = $this->db->get_where('health_checkup',array('slug'=>$slug))->row();
        $data['page'] = 'ayush/checkup-details';
        $this->load->view('ayush/template', $data);
    }
     public function health_checkup(){
        $data['list'] = $this->db->get('health_checkup')->result();
        $data['page'] = 'ayush/health-checkup';
        $this->load->view('ayush/template', $data);
    }
    
    public function health_packages($id=""){
        
        if($id){
            $data['page'] = 'ayush/health_package_details';
            $data['health'] = $this->db->get_where('health_packages',array('id'=>$id))->row();
        }else{
            $data['list'] = $this->db->get('health_packages')->result();
            $data['health_content'] = $this->db->get_where('health_package_content',array('id'=>1))->row();
            $seo_content = $this->home_model->get_list('front_cms_health_seo', array('id' => 1), true);
            $data['seo_content'] = json_decode($seo_content['seo_content']);
            $data['page'] = 'ayush/health_packages';
        }
        $this->load->view('ayush/template', $data);
    }
    
 
    public function tpa(){
       
        $data['seo_content'] = json_decode($seo_content['seo_content']);
        $data['mic'] = $this->db->get_where('insurance_tpa',array('type'=>1))->result_array();
        $data['tpa'] = $this->db->get_where('insurance_tpa',array('type'=>2))->result_array();
        $data['page'] = 'ayush/tpa';
        $this->load->view('ayush/template', $data);
    }

    public function patientsrights_responsibilities(){
        $data['page'] = 'ayush/patientsrights-responsibilities';
        $this->load->view('ayush/template', $data);
    }

    public function estimate_request(){
        $data['page'] = 'ayush/estimate-request';
        $this->load->view('ayush/template', $data);
    }

    public function feedback(){
        $data['page'] = 'ayush/feedback';
        $this->load->view('ayush/template', $data);
    }

    public function success_stories(){
        $data['page'] = 'ayush/success-stories';
        $this->load->view('ayush/template', $data);
    }

     public function client_review(){
       
        $data['page'] = 'ayush/client-review';
        $this->load->view('ayush/template', $data);
    }

    public function doctor_talks(){
       
        $data['page'] = 'ayush/doctor-talks';
        $this->load->view('ayush/template', $data);
    }
    public function pr(){
       
        $data['page'] = 'ayush/pr';
        $this->load->view('ayush/template', $data);
    }
      public function contact()
    {
        $data['contact'] = $this->db->get_where('contact_us',array('id'=>1))->row();
        $data['seo_content'] = json_decode($data['contact']->seo_content); 
  
        $data['page'] = 'ayush/contact';
        $this->load->view('ayush/template', $data);
    }

     public function blogs($slug=""){
        
        if($slug){
            $data['page'] = 'ayush/blog-details';
            $data['blog'] = $this->db->get_where('front_cms_blogs',array('surname'=>$slug))->row();
        }else{
            $seo_content = $this->home_model->get_list('front_cms_blogs_seo', array('id' => 1), true);
        $data['seo_content'] = json_decode($seo_content['seo_content']);
            $data['page'] = 'ayush/blogs';
        }
        $this->load->view('ayush/template', $data);
    }

    public function event_gallery(){
       
        $data['page'] = 'ayush/event-gallery';
        $this->load->view('ayush/template', $data);
    }
      public function unit_directors(){
       
        $data['page'] = 'ayush/unit-directors';
        $this->load->view('ayush/template', $data);
    }
  public function careers(){
        $data['page'] = 'ayush/careers';
        $this->load->view('ayush/template', $data);
    } 
     public function directors(){
        $data['page'] = 'ayush/directors';
        $this->load->view('ayush/template', $data);
    } 
    
   public function about()
    {
        // $this->data['page_data'] = $this->home_model->get_list('front_cms_about', array('id' => 1), true);
        // $this->data['main_contents'] = $this->load->view('home/about', $this->data, true);
        // $this->load->view('home/layout/index', $this->data);
        $data['about'] = $this->db->get_where('about_us',array('id'=>1))->row();
          $data['seo_content'] = json_decode($data['about']->seo_content); 
        $data['page'] = 'ayush/about-us';
        $this->load->view('ayush/template', $data);
    }
public function search_doctor(){
	    $str = "Dr. ".$this->input->get('term');
        $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name, staff.name as value');
        $this->db->from('staff');
        $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != 7', 'inner');
        $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
        $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
        $this->db->where('login_credential.role', 3);
        $this->db->where('login_credential.active', 1);
        $this->db->like('staff.name', $str);
        $this->db->order_by('staff.id', 'asc');
        
        $result = $this->db->get()->result_array();
        
		echo json_encode($result);
	}
	
	public function doctor_search()
    {
        $doctor_name = $this->input->get('name');
       
        // $this->data['page_data'] = $this->home_model->get_list('front_cms_doctors', array('id' => 2), true);
        $data['doctor'] = $this->home_model->get_doctor_profile_by_name($doctor_name);
        // $this->data['main_contents'] = $this->load->view('home/doctor_profile', $this->data, true);
        // $this->load->view('home/layout/index', $this->data);
        // echo "<pre>";
        // print_r($data);
        // die;
        $data['page'] = 'ayush/doctor-details';
        $this->load->view('ayush/template', $data);
    }

   
   
	
	public function show_404()
	{
		$this->load->view('errors/error_404_message');
	}

    // unique valid username verification is done here
    public function unique_username($username)
    {
        redirect(base_url('home'));
        if ($this->input->post('patient_id')) {
            $patient_id = $this->input->post('patient_id');
            $login_id = $this->app_lib->get_credential_id($patient_id, false);
            $this->db->where_not_in('id', $login_id);
        }
        $this->db->where('username', $username);
        $query = $this->db->get('login_credential');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message("unique_username", translate('username_has_already_been_used'));
            return false;
        } else {
            return true;
        }
    }

   
}
