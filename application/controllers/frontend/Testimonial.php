<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimonial extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('testimonial_model');
    }

    // home slider
    public function index()
    {
        // check access permission
        if (!get_permission('frontend_testimonial', 'is_view')) {
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
                $this->db->update('front_cms_testimonial_seo', $arraySeo);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/testimonial'));
        }
        if ($_POST) {
            if (!get_permission('frontend_testimonial', 'is_add')) {
                access_denied();
            }
            $this->slider_validation();
            if ($this->form_validation->run() == false) {
                $this->data['validation_error'] = true;
            } else {
                // save information in the database
                $data = $this->input->post();
                $this->testimonial_model->save($data);
                set_alert('success', translate('information_has_been_saved_successfully'));
                redirect(base_url('frontend/testimonial'));
            }
        }

        $this->data['testimoniallist'] = $this->testimonial_model->get_list('front_cms_testimonial');
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/testimonial';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }

    // home slider edit
    public function edit($id = '')
    {
        if (!get_permission('frontend_testimonial', 'is_edit')) {
            access_denied();
        }
        if ($_POST) {
            $this->slider_validation();
            if ($this->form_validation->run() == false) {
                $this->data['validation_error'] = true;
            } else {
                // update information in the database
                $data = $this->input->post();
                $this->testimonial_model->save($data);
                set_alert('success', translate('information_has_been_updated_successfully'));
                redirect(base_url('frontend/testimonial'));
            }
        }

        $this->data['testimonial'] = $this->testimonial_model->get_list('front_cms_testimonial', array('id' => $id), true);
        $this->data['title'] = translate('frontend');
        $this->data['sub_page'] = 'frontend/testimonial_edit';
        $this->data['main_menu'] = 'frontend';
        $this->load->view('layout/index', $this->data);
    }

    // home slider delete
    public function delete($id = '')
    {
        if (!get_permission('frontend_testimonial', 'is_delete')) {
            access_denied();
        }
        $image = $this->db->get_where('front_cms_testimonial', array('id' => $id))->row()->image;
        if ($this->db->where(array('id' => $id))->delete("front_cms_testimonial")) {
            // delete testimonial user image
            $destination = './uploads/images/testimonial/';
            if (file_exists($destination . $image)) {
                @unlink($destination . $image);
            }
        }
    }

    private function slider_validation()
    {
        $this->form_validation->set_rules('patient_name', 'Patient Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|required|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rank', 'Rank', 'trim|required|xss_clean');
        $this->form_validation->set_rules('photo', 'Photo', 'trim|xss_clean|callback_check_image');
    }

    public function check_image()
    {
        if ($this->input->post('testimonial_id')) {
            if (!empty($_FILES['photo']['name'])) {
                $name = $_FILES['photo']['name'];
                $arr = explode('.', $name);
                $ext = end($arr);
                if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png') {
                    return true;
                } else {
                    $this->form_validation->set_message('check_image', translate('select_valid_file_format'));
                    return false;
                }
            }
        } else {
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
        }
    }
}
