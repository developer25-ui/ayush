<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Content extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
    }

    public function index()
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
            if (!get_permission('manage_page', 'is_add')) {
                access_denied();
            }
            $this->content_validation();
            if ($this->form_validation->run() == false) {
                $this->data['validation_error'] = true;
            } else {
                // save information in the database
                $arrayData = array(
                    'page_title' => $this->input->post('title'),
                    'menu_id' => $this->input->post('menu_id'),
                    'content' => $this->input->post('content', false),
                    'banner_image' => $this->content_model->uploadBanner('page_' . $this->input->post('menu_id'), 'banners'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                $this->content_model->save_content($arrayData);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            }
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->content_model->get_page_list();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/content';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }

    public function edit($id = '')
    {
        if (!get_permission('manage_page', 'is_edit')) {
            access_denied();
        }
        if ($this->input->post()) {
            $this->content_validation();
            if ($this->form_validation->run() == false) {
                $this->data['validation_error'] = true;
            } else {
                // update information in the database
                $page_id = $this->input->post('page_id');
                $arrayData = array(
                    'page_title' => $this->input->post('title'),
                    'menu_id' => $this->input->post('menu_id'),
                    'content' => $this->input->post('content', false),
                    'banner_image' => $this->content_model->uploadBanner('page_' . $this->input->post('menu_id'), 'banners'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                $this->content_model->save_content($arrayData, $page_id);
                set_alert('success', translate('information_has_been_updated_successfully'));
                redirect(base_url('frontend/content'));
            }
        }
        
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['content'] = $this->content_model->get_list('front_cms_pages', array('id' => $id), true);
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/content_edit';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }

    public function delete($id = '')
    {
        if (!get_permission('manage_page', 'is_delete')) {
            access_denied();
        }
        $this->db->where(array('id' => $id))->delete("front_cms_pages");
    }

    private function content_validation()
    {
        $this->form_validation->set_rules('title', 'Page Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('menu_id', 'Select Menu', 'trim|required|xss_clean|callback_unique_menu');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'xss_clean');
        $this->form_validation->set_rules('photo', 'Photo', 'trim|xss_clean|callback_check_image');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'xss_clean');
    }

    public function check_image()
    {
        $prev_image = $this->input->post('old_photo');
        if ($prev_image == "") {
            if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {
                $name = $_FILES['photo']['name'];
                $arr = explode('.', $name);
                $ext = end($arr);
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    return true;
                } else {
                    $this->form_validation->set_message('check_image', translate('select_valid_file_format'));
                    return false;
                }
            } else {
                $this->form_validation->set_message('check_image', 'The Photo is required.');
                return false;
            }
        } else {
            return true;
        }
    }

    // unique valid menu verification is done here
    public function unique_menu($id)
    {
        if ($this->input->post('page_id')) {
            $page_id = $this->input->post('page_id');
            $this->db->where_not_in('id', $page_id);
        }
        $this->db->where('menu_id', $id);
        $query = $this->db->get('front_cms_pages');
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message("unique_menu", "This menu has already been allocated.");
            return false;
        } else {
            return true;
        }
    }
     public function leadership($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_leadership_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/leadership'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
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
                $data1 = array(
                    'page_title' => $this->input->post('title'),
                     'location' => $this->input->post('location'),
                    'slug' => $this->format_uri($this->input->post('title')),
                    'content' => $this->input->post('description'),
                    'qualification' => $this->input->post('qualification'),
                    'profile' => $this->input->post('profile'),
                    'designation' => $this->input->post('designation'),
               
                    'seo_content' => json_encode($seo_content),
                   
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('leadership',$data1);
                }else{
                    $this->db->insert('leadership',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/leadership'));
            
        }
       
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_leadership';
            $this->data['list'] = $this->db->get_where('leadership',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("leadership");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/leadership'));
            
        }else{
            $this->data['list'] = $this->db->get('leadership')->result_array();
            $this->data['sub_page'] = 'frontend/leadership';
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    
    
    public function award($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_award_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/award'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
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
                $data1 = array(
                    'page_title' => $this->input->post('title'),
                    
                    'slug' => $this->format_uri($this->input->post('title')),
                    'content' => $this->input->post('description'),
                  
                    'seo_content' => json_encode($seo_content),
                   
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('award',$data1);
                }else{
                    $this->db->insert('award',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/award'));
            
        }
       
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_award';
            $this->data['list'] = $this->db->get_where('award',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("award");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/award'));
            
        }else{
            $this->data['list'] = $this->db->get('award')->result_array();
            $this->data['sub_page'] = 'frontend/award';
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function insurance_tpa($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        
       
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
                $data1 = array(
                    'page_title' => $this->input->post('page_title'),
                    'content' => $this->input->post('content'),
                    'type' => $this->input->post('type'),
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('insurance_tpa',$data1);
                }else{
                    $this->db->insert('insurance_tpa',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/insurance_tpa'));
            
        }
        
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_insurance_tpa';
            $this->data['list'] = $this->db->get_where('insurance_tpa',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("insurance_tpa");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/insurance_tpa'));
            
        }else{
            $this->data['list'] = $this->db->get('insurance_tpa')->result_array();
            $this->data['sub_page'] = 'frontend/insurance_tpa';
        }
      
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function about_us()
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
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
                $data = array(
                    'page_title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'vision' => $this->input->post('vision'),
                    'mission' => $this->input->post('mission'),
                    'about_values' => $this->input->post('about_values'),
                    
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'seo_content' => json_encode($seo_content),
                );
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['banner_image'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['vision_mission_photo']) && $_FILES['vision_mission_photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["vision_mission_photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['vision_mission_photo']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['vision_mission_photo'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['hospital_facilities_image']) && $_FILES['hospital_facilities_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["hospital_facilities_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['hospital_facilities_image']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['hospital_facilities_image'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['certification_image1']) && $_FILES['certification_image1']['name'] != "") {
                    $path_parts = pathinfo($_FILES["certification_image1"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['certification_image1']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['certification_image1'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['certification_image2']) && $_FILES['certification_image2']['name'] != "") {
                    $path_parts = pathinfo($_FILES["certification_image2"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['certification_image2']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['certification_image2'] = 'uploads/images/about_us/'.$filename;
                }
                
                
                if (isset($_FILES['chairman_image']) && $_FILES['chairman_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["chairman_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['chairman_image']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['chairman_image'] = 'uploads/images/about_us/'.$filename;
                }
                $this->db->where('id',1);
                $this->db->update('about_us',$data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->db->get_where('about_us',array('id'=>1))->row();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/about_us';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function patientrights()
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
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
                $data = array(
                    'page_title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                   
                    
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'seo_content' => json_encode($seo_content),
                );
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['banner_image'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['vision_mission_photo']) && $_FILES['vision_mission_photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["vision_mission_photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['vision_mission_photo']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['vision_mission_photo'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['hospital_facilities_image']) && $_FILES['hospital_facilities_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["hospital_facilities_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['hospital_facilities_image']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['hospital_facilities_image'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['certification_image1']) && $_FILES['certification_image1']['name'] != "") {
                    $path_parts = pathinfo($_FILES["certification_image1"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['certification_image1']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['certification_image1'] = 'uploads/images/about_us/'.$filename;
                }
                
                if (isset($_FILES['certification_image2']) && $_FILES['certification_image2']['name'] != "") {
                    $path_parts = pathinfo($_FILES["certification_image2"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['certification_image2']['tmp_name'], 'uploads/images/about_us/'.$filename);
                    $data['certification_image2'] = 'uploads/images/about_us/'.$filename;
                }
                
                
               
                $this->db->where('id',1);
                $this->db->update('patientrights',$data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->db->get_where('patientrights',array('id'=>1))->row();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/patientrights';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    
    
    public function contact_us()
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
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
                $data = array(
                    'page_title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'vision' => $this->input->post('vision'),
                    'mission' => $this->input->post('mission'),
                    'about_values' => $this->input->post('about_values'),
                    
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'seo_content' => json_encode($seo_content),
                );
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/contactus/'.$filename);
                    $data['banner_image'] = 'uploads/images/contactus/'.$filename;
                }
                
                if (isset($_FILES['vision_mission_photo']) && $_FILES['vision_mission_photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["vision_mission_photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['vision_mission_photo']['tmp_name'], 'uploads/images/contactus/'.$filename);
                    $data['vision_mission_photo'] = 'uploads/images/contactus/'.$filename;
                }
                
                if (isset($_FILES['hospital_facilities_image']) && $_FILES['hospital_facilities_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["hospital_facilities_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['hospital_facilities_image']['tmp_name'], 'uploads/images/contactus/'.$filename);
                    $data['hospital_facilities_image'] = 'uploads/images/contactus/'.$filename;
                }
                
                if (isset($_FILES['certification_image1']) && $_FILES['certification_image1']['name'] != "") {
                    $path_parts = pathinfo($_FILES["certification_image1"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['certification_image1']['tmp_name'], 'uploads/images/contactus/'.$filename);
                    $data['certification_image1'] = 'uploads/images/contactus/'.$filename;
                }
                
                if (isset($_FILES['certification_image2']) && $_FILES['certification_image2']['name'] != "") {
                    $path_parts = pathinfo($_FILES["certification_image2"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['certification_image2']['tmp_name'], 'uploads/images/contactus/'.$filename);
                    $data['certification_image2'] = 'uploads/images/contactus/'.$filename;
                }
                
                
                if (isset($_FILES['chairman_image']) && $_FILES['chairman_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["chairman_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['chairman_image']['tmp_name'], 'uploads/images/contactus/'.$filename);
                    $data['chairman_image'] = 'uploads/images/contactus/'.$filename;
                }
                $this->db->where('id',1);
                $this->db->update('contact_us',$data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->db->get_where('contact_us',array('id'=>1))->row();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/contact_us';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    public function research()
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   print_r($_FILES['icon_photo']);
        //   die;
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
                $data1 = array(
                    'page_title' => $this->input->post('title'),
                    'content' => $this->input->post('content'),
                    'publication' => $this->input->post('publication'),
                    'message_title' => $this->input->post('message_title'),
                    'chairman_message' => $this->input->post('chairman_message'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                    'seo_content' => json_encode($seo_content),
                );
                
                if (isset($_FILES['chairman_image']) && $_FILES['chairman_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["chairman_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['chairman_image']['tmp_name'], 'uploads/images/research/'.$filename);
                    $data1['chairman_image'] = 'uploads/images/research/'.$filename;
                }
                $this->db->where('id',1);
                $this->db->update('research',$data1);
                
                if (isset($_FILES['icon_photo']) && $_FILES['icon_photo']['name'] != "") {
        	            
        	             $filesCount = count($_FILES['icon_photo']['name']); 
        	             for($i = 0; $i < $filesCount; $i++){ 
            	            $path_parts = pathinfo($_FILES["icon_photo"]["name"][$i]);
                            $extension = '.'.$path_parts['extension'];
                            $filename = time().uniqid().$extension;
                            move_uploaded_file($_FILES['icon_photo']['tmp_name'][$i], 'uploads/images/research/'.$filename);
                            
                            $data2[$i]['icon_name'] = $_POST['icon_name'][$i];
                            $data2[$i]['research_id'] = 1;
        	                $data2[$i]['icon_photo'] = 'uploads/images/research/'.$filename;
        	             }
        	             
                        $this->db->insert_batch('research_icons', $data2); 
                }
                
                $data3['clinical_research_scientist'] = json_encode($this->input->post('clinical_research_scientist'));
                $data3['research_personnel'] = json_encode($this->input->post('research_personnel'));
                $data3['technical_personnel'] = json_encode($this->input->post('technical_personnel'));
                $data3['office_staff'] = json_encode($this->input->post('office_staff'));
                $data3['volunteers'] = json_encode($this->input->post('volunteers'));
                $this->db->where('id',1);
                $this->db->update('research_team',$data3); 
                
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->db->get_where('research',array('id'=>1))->row();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/research';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function remove_icon($id){
        
        $this->db->where(array('id' => $id))->delete("research_icons");
        set_alert('success', translate('information_has_been_saved_successfully'));
        redirect(base_url('frontend/content/research'));
    }
    
    public function media($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_media_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/media'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
                $data1 = array(
                    'page_title' => $this->input->post('page_title'),
                    'content' => $this->input->post('description'),
                    'read_more_link' => $this->input->post('read_more_link'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('media',$data1);
                }else{
                    $this->db->insert('media',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/media'));
            
        }
        
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_media';
            $this->data['list'] = $this->db->get_where('media',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("media");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/media'));
            
        }else{
            $this->data['list'] = $this->db->get('media')->result_array();
            $this->data['sub_page'] = 'frontend/media';
        }
      
        
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function upcoming_events($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_upcoming_events_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/upcoming_events'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
                $data1 = array(
                    'page_title' => $this->input->post('title'),
                    'eventdate' => $this->input->post('eventdate'),
                    'content' => $this->input->post('description'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                
                if (isset($_FILES['education_file']) && $_FILES['education_file']['name'] != "") {
                    $path_parts = pathinfo($_FILES["education_file"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['education_file']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['education_file'] = 'uploads/images/'.$filename;
                }
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('upcoming_events',$data1);
                }else{
                    $this->db->insert('upcoming_events',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/upcoming_events'));
            
        }
        
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_upcoming_events';
            $this->data['list'] = $this->db->get_where('upcoming_events',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("upcoming_events");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/upcoming_events'));
            
        }else{
            $this->data['list'] = $this->db->get('upcoming_events')->result_array();
            $this->data['sub_page'] = 'frontend/upcoming_events';
        }
      
        
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function career($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_career_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/career'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
                $data1 = array(
                    'page_title' => $this->input->post('page_title'),
                    'content' => $this->input->post('description'),
                    'department' => $this->input->post('department'),
                    'experience' => $this->input->post('experience'),
                    'qualification' => $this->input->post('qualification'),
                    'positions' => $this->input->post('positions'),
                    'location' => $this->input->post('location'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('career',$data1);
                }else{
                    $this->db->insert('career',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/career'));
            
        }
        
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_career';
            $this->data['list'] = $this->db->get_where('career',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("career");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/career'));
            
        }else{
            $this->data['list'] = $this->db->get('career')->result_array();
            $this->data['sub_page'] = 'frontend/career';
        }
      
        
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function conference_workshop($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_conference_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/conference_workshop'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
                $data1 = array(
                    // 'page_title' => $this->input->post('page_title'),
                    'date_added' => $this->input->post('date_added'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                
                if (isset($_FILES['education_file']) && $_FILES['education_file']['name'] != "") {
                    $path_parts = pathinfo($_FILES["education_file"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['education_file']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['education_file'] = 'uploads/images/'.$filename;
                }
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('conference_workshop',$data1);
                }else{
                    $this->db->insert('conference_workshop',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/conference_workshop'));
            
        }
        
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_conference_workshop';
            $this->data['list'] = $this->db->get_where('conference_workshop',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("conference_workshop");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/conference_workshop'));
            
        }else{
            $this->data['list'] = $this->db->get('conference_workshop')->result_array();
            $this->data['sub_page'] = 'frontend/conference_workshop';
        }
      
        
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function health_packages($type="",$id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
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
                $this->db->update('front_cms_health_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/health_packages'));
        }
        if ($_POST) {
        //   echo "<pre>";
        //   print_r($_POST);
        //   die;
                $data1 = array(
                    'page_title' => $this->input->post('page_title'),
                     'slug' => $this->format_uri($this->input->post('page_title')),
                    'content' => $this->input->post('content'),
                    'tax_benefits' => $this->input->post('tax_benefits'),
                    'instructions' => $this->input->post('instructions'),
                    'meta_description' => $this->input->post('meta_description'),
                    'meta_keyword' => $this->input->post('meta_keyword'),
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('health_packages',$data1);
                }else{
                    $this->db->insert('health_packages',$data1);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/health_packages'));
            
        }
        
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_health_packages';
            $this->data['list'] = $this->db->get_where('health_packages',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("health_packages");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/health_packages'));
            
        }else{
            $this->data['list'] = $this->db->get('health_packages')->result_array();
            $this->data['sub_page'] = 'frontend/health_packages';
        }
      
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function health_packages_content($id="")
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
         
                $data1 = array(
                    'page_title' => $this->input->post('page_title'),
                    'content' => $this->input->post('content'),
                    'sub_heading' => $this->input->post('sub_heading'),
                );
                
                if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
                    $path_parts = pathinfo($_FILES["photo"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/images/'.$filename);
                    $data1['banner_image'] = 'uploads/images/'.$filename;
                }
                
                
                
                    $this->db->where('id',1);
                    $this->db->update('health_package_content',$data1);
                
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/health_packages'));
            
        }
        
        
            $this->data['list'] = $this->db->get('health_packages')->result_array();
            $this->data['sub_page'] = 'frontend/health_packages';
        
      
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function scope_of_services_add()
    {
        
        if ($_POST) {
                
                $data = array(
                    'title' => $this->input->post('title'),
                    'type' => $this->input->post('type'),
                );
                
                $this->db->insert('scope_of_services',$data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/about_us'));
            
        }
        
    }
    
    
    
    public function facilities($type="",$id="")
    {
        
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
                $this->db->update('facilities_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/facilities'));
        }
        
        if ($_POST) {
                
                $data = array(
                    'title' => $this->input->post('title'),
                    'type' => $this->input->post('type'),
                );
                if (isset($_FILES['icon']) && $_FILES['icon']['name'] != "") {
                    $path_parts = pathinfo($_FILES["icon"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['icon']['tmp_name'], 'uploads/images/'.$filename);
                    $data['icon'] = 'uploads/images/'.$filename;
                }
                
                if (isset($_FILES['icon_white']) && $_FILES['icon_white']['name'] != "") {
                    $path_parts = pathinfo($_FILES["icon_white"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['icon_white']['tmp_name'], 'uploads/images/'.$filename);
                    $data['icon_white'] = 'uploads/images/'.$filename;
                }
                
           
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('facilities',$data);
                }else{
                    $this->db->insert('facilities',$data);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/facilities'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_facilities';
            $this->data['list'] = $this->db->get_where('facilities',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("facilities");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/facilities'));
            
        }else{
            $this->data['list'] = $this->db->get('facilities')->result_array();
            $this->data['sub_page'] = 'frontend/facilities';
        }
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
     public function lac_approval()
    {
        
        if ($_POST) {
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
                $data = array(
                    'seo_content' => json_encode($seo_content),
                );
                
                
                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/'.$filename);
                    $data['image'] = 'uploads/images/'.$filename;
                }
                
           
                $this->db->where('id',1);
                $this->db->update('lac_approval',$data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->db->get_where('lac_approval',array('id'=>1))->row();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/lac_approval';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function dnb_program($type="",$id="")
    {
        
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
                $this->db->update('dnb_program_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/dnb_program'));
        }
        
        if ($_POST) {
                
                $data = array(
                    'department' => $this->input->post('department'),
                    'name_of_faculty' => $this->input->post('name_of_faculty'),
                    'status_of_faculty' => $this->input->post('status_of_faculty'),
                    'opd_timings' => $this->input->post('opd_timings'),
                );
                
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('dnb_program',$data);
                }else{
                    $this->db->insert('dnb_program',$data);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/dnb_program'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_dnb_program';
            $this->data['list'] = $this->db->get_where('dnb_program',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("dnb_program");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/dnb_program'));
            
        }else{
            $this->data['list'] = $this->db->get('dnb_program')->result_array();
            $this->data['sub_page'] = 'frontend/dnb_program';
        }
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function muhs($type="",$id="")
    {
        
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
                $this->db->update('muhs_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/muhs'));
        }
        
        if ($_POST) {
                
                $data = array(
                    'title' => $this->input->post('title'),
                    'file' => $this->input->post('file'),
                    'type' => $this->input->post('type'),
                );
                if (isset($_FILES['muhs_file']) && $_FILES['muhs_file']['name'] != "") {
                    $path_parts = pathinfo($_FILES["muhs_file"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['muhs_file']['tmp_name'], 'uploads/images/'.$filename);
                    $data['file'] = 'uploads/images/'.$filename;
                }
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('muhs',$data);
                }else{
                    $this->db->insert('muhs',$data);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/muhs'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_muhs';
            $this->data['list'] = $this->db->get_where('muhs',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("muhs");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/muhs'));
            
        }else{
            $this->data['list'] = $this->db->get('muhs')->result_array();
            $this->data['sub_page'] = 'frontend/muhs';
        }
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function fellowship()
    {
        // check access permission
        if (!get_permission('manage_page', 'is_view')) {
            access_denied();
        }
        if ($_POST) {
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
                $data = array(
                    'invites' => $this->input->post('invites'),
                    'eligibility' => $this->input->post('eligibility'),
                    'selection' => $this->input->post('selection'),
                    'duration' => $this->input->post('duration'),
                    'stipend' => $this->input->post('stipend'),
                    'deduction' => $this->input->post('deduction'),
                    'lodging' => $this->input->post('lodging'),
                    'start_date' => $this->input->post('start_date'),
                    'assesment' => $this->input->post('assesment'),
                    'contact' => $this->input->post('contact'),
                    'seo_content' => json_encode($seo_content),
                );
                
                $this->db->where('id',1);
                $this->db->update('fellowship',$data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        $this->data['pagelist'] = $this->db->get_where('fellowship',array('id'=>1))->row();
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/fellowship';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    public function health_checkup($type="",$id="")
    {
        
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
                $this->db->update('health_checkup_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/health_checkup'));
        }
        
        if ($_POST) {
                
                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $this->format_uri($this->input->post('title')),
                    'price' => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'inclusion' => $this->input->post('inclusion'),
                    'guidelines' => $this->input->post('guidelines'),
                );
                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/'.$filename);
                    $data['image'] = 'uploads/images/'.$filename;
                }
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('health_checkup',$data);
                }else{
                    $this->db->insert('health_checkup',$data);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/health_checkup'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_health_checkup';
            $this->data['list'] = $this->db->get_where('health_checkup',array('id'=>$id))->row_array();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("health_checkup");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/health_checkup'));
            
        }else{
            $this->data['list'] = $this->db->get('health_checkup')->result_array();
            $this->data['sub_page'] = 'frontend/health_checkup';
        }
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }
    
    
    public function speciality_clinic($type="",$id="")
    {
        
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
                $this->db->update('speciality_clinic_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/specilaity_clinic'));
        }
        
        if ($_POST) {
                
                $data = array(
                    'title' => $this->input->post('title'),
                    'slug' => $this->format_uri($this->input->post('title')),
                    'doctors' => json_encode($this->input->post('doctors')),
                    'description' => $this->input->post('description'),
                    'about' => $this->input->post('about'),
                    'facilities' => $this->input->post('facilities'),
                );
                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/'.$filename);
                    $data['image'] = 'uploads/images/'.$filename;
                }
                
                if($type == "update"){
                    $this->db->where('id',$id);
                    $this->db->update('speciality_clinic',$data);
                }else{
                    $this->db->insert('speciality_clinic',$data);
                }
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/content/speciality_clinic'));
            
        }
        $this->data['headerelements'] = array(
            'js' => array(
                'vendor/ckeditor/ckeditor.js',
            ),
        );
        if($type == "edit"){
            $this->data['sub_page'] = 'frontend/edit_speciality_clinic';
            $this->data['list'] = $this->db->get_where('speciality_clinic',array('id'=>$id))->row();
        }elseif($type == "delete"){
            $this->db->where(array('id' => $id))->delete("speciality_clinic");
            set_alert('success', translate('information_has_been_saved_successfully'));
            redirect(base_url('frontend/content/speciality_clinic'));
            
        }else{
            $this->data['list'] = $this->db->get('speciality_clinic')->result_array();
            $this->data['sub_page'] = 'frontend/speciality_clinic';
        }
        $this->data['title'] = translate('frontend');
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
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
