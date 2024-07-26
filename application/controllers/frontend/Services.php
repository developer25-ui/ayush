<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend_model');
    }

    // home features
    public function index()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if($this->input->post('options')){
            $seo_content['page_title'] = $this->input->post('page_title');
                $seo_content['meta_keyword'] = $this->input->post('meta_keyword');
                $seo_content['meta_description'] = $this->input->post('meta_description');
                $seo_content['news_keywords'] = $this->input->post('news_keywords');
                $seo_content['meta_abstract'] = $this->input->post('abstract');
                $seo_content['dc_source'] = $this->input->post('dc_source');
                $seo_content['dc_title'] = $this->input->post('dc_title');
                $seo_content['dc_keywords'] = $this->input->post('dc_keywords');
                $seo_content['dc_description'] = $this->input->post('dc_description');
                $seo_content['canonical'] = $this->input->post('canonical');
                $seo_content['alternate'] = $this->input->post('alternate');
                $seo_content['robot'] = $this->input->post('robot');
                $seo_content['copyright'] = $this->input->post('copyright');
                $seo_content['author'] = $this->input->post('author');
                $seo_content['og_locale'] = $this->input->post('og_locale');
                $seo_content['og_type'] = $this->input->post('og_type');
                $seo_content['og_title'] = $this->input->post('og_title');
                $seo_content['og_description'] = $this->input->post('og_description');
                $seo_content['og_url'] = $this->input->post('og_url');
                $seo_content['og_site_name'] = $this->input->post('og_site_name');
                $seo_content['og_image'] = $this->input->post('og_image');
                $seo_content['fb_admins'] = $this->input->post('fb_admins');
                $seo_content['twitter_card'] = $this->input->post('twitter_card');
                $seo_content['twitter_site'] = $this->input->post('twitter_site');
                $seo_content['twitter_creator'] = $this->input->post('twitter_creator');
                $seo_content['twitter_title'] = $this->input->post('twitter_title');
                $seo_content['twitter_description'] = $this->input->post('twitter_description');
                $seo_content['twitter_image_src'] = $this->input->post('twitter_image_src');
                $seo_content['twitter_canonical'] = $this->input->post('twitter_canonical');
                $seo_content['item_type'] = $this->input->post('item_type');
                $seo_content['item_name'] = $this->input->post('item_name');
                $seo_content['item_description'] = $this->input->post('item_description');
                $seo_content['item_url'] = $this->input->post('item_url');
                $seo_content['item_image'] = $this->input->post('item_image');
                $seo_content['item_author'] = $this->input->post('item_author');
                $seo_content['item_organization'] = $this->input->post('item_organization');
                $arraySeo = array(
                    'page_title' => $this->input->post('page_title'),
                    'meta_keyword' => $this->input->post('meta_keyword', true),
                    'meta_description' => $this->input->post('meta_description', true),
                    'seo_content' => json_encode($seo_content),
                );
                $this->db->where('id', 1);
                $this->db->update('front_cms_speciality_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services'));
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            $this->services_validation();
            if ($this->form_validation->run() == false) {
                $this->data['validation_error'] = true;
            } else {
                // save information in the database
                $data = $this->input->post();
                $this->frontend_model->save_services($data);
                $insert_id = $this->db->insert_id();
                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/services/image/'.$insert_id.'.jpg');
                }
                if (isset($_FILES['services']) && $_FILES['services']['name'] != "") {
                    move_uploaded_file($_FILES['services']['tmp_name'], 'uploads/images/services/'.$insert_id.'.jpg');
                }
                if (isset($_FILES['white_services']) && $_FILES['white_services']['name'] != "") {
                    move_uploaded_file($_FILES['white_services']['tmp_name'], 'uploads/images/services/'.$insert_id.'white.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services'));
            }
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['serviceslist'] = $this->frontend_model->get_list('front_cms_services_list');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }

    // home features edit
    public function edit($id = '')
    {
        if (!get_permission('frontend_services', 'is_edit')) {
            access_denied();
        }
        if ($_POST) {
            $this->services_validation();
            if ($this->form_validation->run() == false) {
                $this->data['validation_error'] = true;
            } else {
                // update information in the database
                $data = $this->input->post();
                $services_id = $this->input->post('services_id');
                
                $this->frontend_model->save_services($data);
                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/services/image/'.$services_id.'.jpg');
                }
                if (isset($_FILES['services']) && $_FILES['services']['name'] != "") {
                    move_uploaded_file($_FILES['services']['tmp_name'], 'uploads/images/services/'.$services_id.'.jpg');
                }
                if (isset($_FILES['white_services']) && $_FILES['white_services']['name'] != "") {
                    move_uploaded_file($_FILES['white_services']['tmp_name'], 'uploads/images/services/'.$services_id.'white.jpg');
                }
                set_alert('success', translate('information_has_been_updated_successfully'));
                redirect(base_url('frontend/services'));
            }
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['validation'] = 1;
        $this->data['services'] = $this->frontend_model->get_list('front_cms_services_list', array('id' => $id), true);
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/services_edit';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }

    // home features delete
    public function delete($id = '')
    {
        if (!get_permission('frontend_services', 'is_delete')) {
            access_denied();
        }
        $this->db->where(array('id' => $id))->delete("front_cms_services_list");
    }

    private function services_validation()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('icon', 'Icon', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
    }
    
  
    
    public function procedure_add()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            $seo_content['page_title'] = $this->input->post('page_title');
                $seo_content['meta_keyword'] = $this->input->post('meta_keyword');
                $seo_content['meta_description'] = $this->input->post('meta_description');
                $seo_content['news_keywords'] = $this->input->post('news_keywords');
                $seo_content['meta_abstract'] = $this->input->post('abstract');
                $seo_content['dc_source'] = $this->input->post('dc_source');
                $seo_content['dc_title'] = $this->input->post('dc_title');
                $seo_content['dc_keywords'] = $this->input->post('dc_keywords');
                $seo_content['dc_description'] = $this->input->post('dc_description');
                $seo_content['canonical'] = $this->input->post('canonical');
                $seo_content['alternate'] = $this->input->post('alternate');
                $seo_content['robot'] = $this->input->post('robot');
                $seo_content['copyright'] = $this->input->post('copyright');
                $seo_content['author'] = $this->input->post('author');
                $seo_content['og_locale'] = $this->input->post('og_locale');
                $seo_content['og_type'] = $this->input->post('og_type');
                $seo_content['og_title'] = $this->input->post('og_title');
                $seo_content['og_description'] = $this->input->post('og_description');
                $seo_content['og_url'] = $this->input->post('og_url');
                $seo_content['og_site_name'] = $this->input->post('og_site_name');
                $seo_content['og_image'] = $this->input->post('og_image');
                $seo_content['fb_admins'] = $this->input->post('fb_admins');
                $seo_content['twitter_card'] = $this->input->post('twitter_card');
                $seo_content['twitter_site'] = $this->input->post('twitter_site');
                $seo_content['twitter_creator'] = $this->input->post('twitter_creator');
                $seo_content['twitter_title'] = $this->input->post('twitter_title');
                $seo_content['twitter_description'] = $this->input->post('twitter_description');
                $seo_content['twitter_image_src'] = $this->input->post('twitter_image_src');
                $seo_content['twitter_canonical'] = $this->input->post('twitter_canonical');
                $seo_content['item_type'] = $this->input->post('item_type');
                $seo_content['item_name'] = $this->input->post('item_name');
                $seo_content['item_description'] = $this->input->post('item_description');
                $seo_content['item_url'] = $this->input->post('item_url');
                $seo_content['item_image'] = $this->input->post('item_image');
                $seo_content['item_author'] = $this->input->post('item_author');
                $seo_content['item_organization'] = $this->input->post('item_organization');
                $data['seo_content'] = json_encode($seo_content);
                // save information in the database
                $speciality_id = $this->input->post('services_id');
                $data['speciality_id'] = $this->input->post('services_id');
                $data['title'] = $this->input->post('title');
                 
                $data['slug'] = $this->format_uri($this->input->post('title'));
                $data['description'] = $this->input->post('description');
                $data['blogs'] = json_encode($this->input->post('blogs'));
                $data['testimonials'] = json_encode($this->input->post('testimonials'));
               if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/procedure/'.$filename);
                    $data['image'] = 'uploads/images/procedure/'.$filename;
                }
                $this->db->insert('procedure',$data);
                $insert_id = $this->db->insert_id();
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/procedure/image/'.$insert_id.'.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services/edit/'.$speciality_id));
            
        }

        $this->data['serviceslist'] = $this->frontend_model->get_list('front_cms_services_list');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function sub_speciality($speciality_id)
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        

        $this->data['serviceslist'] = $this->db->get_where('sub_speciality',array('speciality_id'=>$speciality_id))->result_array();
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/sub_speciality';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function sub_add()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            // echo "<pre>";
            // print_r($_POST);
            // die;
                // save information in the database
                // $id = $this->input->post('services_id');
                $seo_content['page_title'] = $this->input->post('page_title');
                $seo_content['meta_keyword'] = $this->input->post('meta_keyword');
                $seo_content['meta_description'] = $this->input->post('meta_description');
                $seo_content['news_keywords'] = $this->input->post('news_keywords');
                $seo_content['meta_abstract'] = $this->input->post('abstract');
                $seo_content['dc_source'] = $this->input->post('dc_source');
                $seo_content['dc_title'] = $this->input->post('dc_title');
                $seo_content['dc_keywords'] = $this->input->post('dc_keywords');
                $seo_content['dc_description'] = $this->input->post('dc_description');
                $seo_content['canonical'] = $this->input->post('canonical');
                $seo_content['alternate'] = $this->input->post('alternate');
                $seo_content['robot'] = $this->input->post('robot');
                $seo_content['copyright'] = $this->input->post('copyright');
                $seo_content['author'] = $this->input->post('author');
                $seo_content['og_locale'] = $this->input->post('og_locale');
                $seo_content['og_type'] = $this->input->post('og_type');
                $seo_content['og_title'] = $this->input->post('og_title');
                $seo_content['og_description'] = $this->input->post('og_description');
                $seo_content['og_url'] = $this->input->post('og_url');
                $seo_content['og_site_name'] = $this->input->post('og_site_name');
                $seo_content['og_image'] = $this->input->post('og_image');
                $seo_content['fb_admins'] = $this->input->post('fb_admins');
                $seo_content['twitter_card'] = $this->input->post('twitter_card');
                $seo_content['twitter_site'] = $this->input->post('twitter_site');
                $seo_content['twitter_creator'] = $this->input->post('twitter_creator');
                $seo_content['twitter_title'] = $this->input->post('twitter_title');
                $seo_content['twitter_description'] = $this->input->post('twitter_description');
                $seo_content['twitter_image_src'] = $this->input->post('twitter_image_src');
                $seo_content['twitter_canonical'] = $this->input->post('twitter_canonical');
                $seo_content['item_type'] = $this->input->post('item_type');
                $seo_content['item_name'] = $this->input->post('item_name');
                $seo_content['item_description'] = $this->input->post('item_description');
                $seo_content['item_url'] = $this->input->post('item_url');
                $seo_content['item_image'] = $this->input->post('item_image');
                $seo_content['item_author'] = $this->input->post('item_author');
                $seo_content['item_organization'] = $this->input->post('item_organization');
                
                $speciality_id = $this->input->post('services_id');
                $data['speciality_id'] = $this->input->post('services_id');
                $data['title'] = $this->input->post('title');
                $data['slug'] = $this->format_uri($this->input->post('title'));
                $data['description'] = $this->input->post('description');
                $data['blogs'] = json_encode($this->input->post('blogs'));
                $data['faqs'] = json_encode($this->input->post('faqs'));
                $data['testimonials'] = json_encode($this->input->post('testimonials'));
                $data['seo_content'] = json_encode($seo_content);
               if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/sub_speciality/'.$filename);
                    $data['image'] = 'uploads/images/sub_speciality/'.$filename;
                }
                // $this->db->where('id',$id);
                $this->db->insert('sub_speciality',$data);
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/sub_speciality/image/'.$id.'.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services/sub_speciality/'.$speciality_id));
            
        }

        $this->data['serviceslist'] = $this->frontend_model->get_list('sub_speciality');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function sub_edit($speciality_id)
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        
$this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['services'] = $this->db->get_where('sub_speciality',array('id'=>$speciality_id))->row_array();
        // echo "<pre>";
        // print_r($this->data);
        // die;
        $this->data['title'] = translate('sub_speciality');
        $this->data['sub_page'] = 'frontend/sub_speciality_edit';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function sub_edit_save()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            $seo_content['page_title'] = $this->input->post('page_title');
                $seo_content['meta_keyword'] = $this->input->post('meta_keyword');
                $seo_content['meta_description'] = $this->input->post('meta_description');
                $seo_content['news_keywords'] = $this->input->post('news_keywords');
                $seo_content['meta_abstract'] = $this->input->post('abstract');
                $seo_content['dc_source'] = $this->input->post('dc_source');
                $seo_content['dc_title'] = $this->input->post('dc_title');
                $seo_content['dc_keywords'] = $this->input->post('dc_keywords');
                $seo_content['dc_description'] = $this->input->post('dc_description');
                $seo_content['canonical'] = $this->input->post('canonical');
                $seo_content['alternate'] = $this->input->post('alternate');
                $seo_content['robot'] = $this->input->post('robot');
                $seo_content['copyright'] = $this->input->post('copyright');
                $seo_content['author'] = $this->input->post('author');
                $seo_content['og_locale'] = $this->input->post('og_locale');
                $seo_content['og_type'] = $this->input->post('og_type');
                $seo_content['og_title'] = $this->input->post('og_title');
                $seo_content['og_description'] = $this->input->post('og_description');
                $seo_content['og_url'] = $this->input->post('og_url');
                $seo_content['og_site_name'] = $this->input->post('og_site_name');
                $seo_content['og_image'] = $this->input->post('og_image');
                $seo_content['fb_admins'] = $this->input->post('fb_admins');
                $seo_content['twitter_card'] = $this->input->post('twitter_card');
                $seo_content['twitter_site'] = $this->input->post('twitter_site');
                $seo_content['twitter_creator'] = $this->input->post('twitter_creator');
                $seo_content['twitter_title'] = $this->input->post('twitter_title');
                $seo_content['twitter_description'] = $this->input->post('twitter_description');
                $seo_content['twitter_image_src'] = $this->input->post('twitter_image_src');
                $seo_content['twitter_canonical'] = $this->input->post('twitter_canonical');
                $seo_content['item_type'] = $this->input->post('item_type');
                $seo_content['item_name'] = $this->input->post('item_name');
                $seo_content['item_description'] = $this->input->post('item_description');
                $seo_content['item_url'] = $this->input->post('item_url');
                $seo_content['item_image'] = $this->input->post('item_image');
                $seo_content['item_author'] = $this->input->post('item_author');
                $seo_content['item_organization'] = $this->input->post('item_organization');
                // save information in the database
                $id = $this->input->post('services_id');
                $speciality_id = $this->input->post('speciality_id');
                $data['title'] = $this->input->post('title');
                $data['slug'] = $this->format_uri($this->input->post('title'));
                $data['description'] = $this->input->post('description');
                $data['blogs'] = json_encode($this->input->post('blogs'));
                 $data['faqs'] = json_encode($this->input->post('faqs'));
                $data['seo_content'] = json_encode($seo_content);
                $data['testimonials'] = json_encode($this->input->post('testimonials'));
               if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/sub_speciality/'.$filename);
                    $data['image'] = 'uploads/images/sub_speciality/'.$filename;
                }
                $this->db->where('id',$id);
                $this->db->update('sub_speciality',$data);
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/sub_speciality/image/'.$id.'.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services/sub_speciality/'.$speciality_id));
            
        }

        $this->data['serviceslist'] = $this->frontend_model->get_list('sub_speciality');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function sub_delete($id = '')
    {
        if (!get_permission('frontend_services', 'is_delete')) {
            access_denied();
        }
        $this->db->where(array('id' => $id))->delete("sub_speciality");
    }
    
 public function procedure($speciality_id)
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        

        $this->data['serviceslist'] = $this->db->get_where('procedure',array('speciality_id'=>$speciality_id))->result_array();
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/procedure';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function procedure_edit($speciality_id)
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        
$this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['services'] = $this->db->get_where('procedure',array('id'=>$speciality_id))->row_array();
        // echo "<pre>";
        // print_r($this->data);
        // die;
        $this->data['title'] = translate('procedure');
        $this->data['sub_page'] = 'frontend/procedure_edit';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function procedure_edit_save()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            $seo_content['page_title'] = $this->input->post('page_title');
                $seo_content['meta_keyword'] = $this->input->post('meta_keyword');
                $seo_content['meta_description'] = $this->input->post('meta_description');
                $seo_content['news_keywords'] = $this->input->post('news_keywords');
                $seo_content['meta_abstract'] = $this->input->post('abstract');
                $seo_content['dc_source'] = $this->input->post('dc_source');
                $seo_content['dc_title'] = $this->input->post('dc_title');
                $seo_content['dc_keywords'] = $this->input->post('dc_keywords');
                $seo_content['dc_description'] = $this->input->post('dc_description');
                $seo_content['canonical'] = $this->input->post('canonical');
                $seo_content['alternate'] = $this->input->post('alternate');
                $seo_content['robot'] = $this->input->post('robot');
                $seo_content['copyright'] = $this->input->post('copyright');
                $seo_content['author'] = $this->input->post('author');
                $seo_content['og_locale'] = $this->input->post('og_locale');
                $seo_content['og_type'] = $this->input->post('og_type');
                $seo_content['og_title'] = $this->input->post('og_title');
                $seo_content['og_description'] = $this->input->post('og_description');
                $seo_content['og_url'] = $this->input->post('og_url');
                $seo_content['og_site_name'] = $this->input->post('og_site_name');
                $seo_content['og_image'] = $this->input->post('og_image');
                $seo_content['fb_admins'] = $this->input->post('fb_admins');
                $seo_content['twitter_card'] = $this->input->post('twitter_card');
                $seo_content['twitter_site'] = $this->input->post('twitter_site');
                $seo_content['twitter_creator'] = $this->input->post('twitter_creator');
                $seo_content['twitter_title'] = $this->input->post('twitter_title');
                $seo_content['twitter_description'] = $this->input->post('twitter_description');
                $seo_content['twitter_image_src'] = $this->input->post('twitter_image_src');
                $seo_content['twitter_canonical'] = $this->input->post('twitter_canonical');
                $seo_content['item_type'] = $this->input->post('item_type');
                $seo_content['item_name'] = $this->input->post('item_name');
                $seo_content['item_description'] = $this->input->post('item_description');
                $seo_content['item_url'] = $this->input->post('item_url');
                $seo_content['item_image'] = $this->input->post('item_image');
                $seo_content['item_author'] = $this->input->post('item_author');
                $seo_content['item_organization'] = $this->input->post('item_organization');
                // save information in the database
                $id = $this->input->post('services_id');
                $speciality_id = $this->input->post('speciality_id');
                $data['title'] = $this->input->post('title');
                 
                $data['slug'] = $this->format_uri($this->input->post('title'));
                $data['show_url'] = $this->input->post('show_url');
                $data['description'] = $this->input->post('description');
                $data['blogs'] = json_encode($this->input->post('blogs'));
                $data['testimonials'] = json_encode($this->input->post('testimonials'));
                $data['seo_content'] = json_encode($seo_content);
               if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/procedure/'.$filename);
                    $data['image'] = 'uploads/images/procedure/'.$filename;
                }
                $this->db->where('id',$id);
                $this->db->update('procedure',$data);
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/procedure/image/'.$id.'.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services/procedure/'.$speciality_id));
            
        }

        $this->data['serviceslist'] = $this->frontend_model->get_list('sub_speciality');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function procedure_delete($id = '')
    {
        if (!get_permission('frontend_services', 'is_delete')) {
            access_denied();
        }
        $this->db->where(array('id' => $id))->delete("procedure");
    }
    
    public function speciality_services($speciality_id)
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        

        $this->data['serviceslist'] = $this->db->get_where('speciality_services',array('speciality_id'=>$speciality_id))->result_array();
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/speciality_services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function speciality_services_add()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            // echo "<pre>";
            // print_r($_POST);
            // die;
                // save information in the database
                // $id = $this->input->post('services_id');
                $speciality_id = $this->input->post('services_id');
                $data['speciality_id'] = $this->input->post('services_id');
                $data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
                $data['blogs'] = json_encode($this->input->post('blogs'));
                $data['faqs'] = json_encode($this->input->post('faqs'));
                $data['testimonials'] = json_encode($this->input->post('testimonials'));
               if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/speciality_services/'.$filename);
                    $data['image'] = 'uploads/images/speciality_services/'.$filename;
                }
                // $this->db->where('id',$id);
                $this->db->insert('speciality_services',$data);
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/speciality_services/image/'.$id.'.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services/speciality_services/'.$speciality_id));
            
        }

        $this->data['serviceslist'] = $this->frontend_model->get_list('speciality_services');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function speciality_services_edit($speciality_id)
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        
$this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['services'] = $this->db->get_where('speciality_services',array('id'=>$speciality_id))->row_array();
        // echo "<pre>";
        // print_r($this->data);
        // die;
        $this->data['title'] = translate('speciality_services');
        $this->data['sub_page'] = 'frontend/speciality_services_edit';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function speciality_services_edit_save()
    {
        // check access permission
        if (!get_permission('frontend_services', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('frontend_services', 'is_add')) {
                access_denied();
            }
            
                // save information in the database
                $id = $this->input->post('services_id');
                $speciality_id = $this->input->post('speciality_id');
                $data['title'] = $this->input->post('title');
                $data['description'] = $this->input->post('description');
                $data['blogs'] = json_encode($this->input->post('blogs'));
                $data['faqs'] = json_encode($this->input->post('faqs'));
                $data['testimonials'] = json_encode($this->input->post('testimonials'));
               if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/speciality_services/'.$filename);
                    $data['image'] = 'uploads/images/speciality_services/'.$filename;
                }
                $this->db->where('id',$id);
                $this->db->update('speciality_services',$data);
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/speciality_services/image/'.$id.'.jpg');
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/services/speciality_services/'.$speciality_id));
            
        }

        $this->data['serviceslist'] = $this->frontend_model->get_list('speciality_services');
        $this->data['title'] = translate('service');
        $this->data['sub_page'] = 'frontend/services';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function speciality_services_delete($id = '')
    {
        if (!get_permission('frontend_services', 'is_delete')) {
            access_denied();
        }
        $this->db->where(array('id' => $id))->delete("speciality_services");
    }
       function format_uri( $string, $separator = '-' ){
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array( '&' => 'and', "'" => '');
        $string = mb_strtolower( trim( $string ), 'UTF-8' );
        $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
        $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        return $string;
    }
}
