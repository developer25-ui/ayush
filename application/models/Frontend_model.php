<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_faq($data)
    {
        $faq_data = array(
            'title' => $data['title'],
            'description' => $data['description'],
        );
        if (isset($data['faq_id']) && !empty($data['faq_id'])) {
            $this->db->where('id', $data['faq_id']);
            $this->db->update('front_cms_faq_list', $faq_data);
        } else {
            $this->db->insert('front_cms_faq_list', $faq_data);
        }
    }
  public function save_procedures($data)
    {
        $procedures_data = array(
            'title' => $data['title'],
            'description' => $data['description'],
        );
        if (isset($data['procedures_id']) && !empty($data['procedures_id'])) {
            $this->db->where('id', $data['procedures_id']);
            $this->db->update('front_cms_procedures_list', $procedures_data);
        } else {
            $this->db->insert('front_cms_procedures_list', $procedures_data);
        }
    }

    public function save_slider($data)
    {
        $elements_data = array(
            'position' => $data['position'],
            'button_text1' => $data['button_text_1'],
            'button_url1' => $data['button_url_1'],
            'button_text2' => $data['button_text_2'],
            'button_url2' => $data['button_url_2'],
            'image' => $this->upload_image(),
        );

        $slider_data = array(
            'title' => $data['title'],
            'description' => $data['description'],
            'item_type' => 'slider',
            'elements' => json_encode($elements_data),
        );
        if (isset($data['slider_id']) && !empty($data['slider_id'])) {
            $this->db->where('id', $data['slider_id']);
            $this->db->update('front_cms_home', $slider_data);
        } else {
            $this->db->insert('front_cms_home', $slider_data);
        }
    }

    public function save_menus($data)
    {
        $title = $data['title'];
        $slug = strtolower(str_replace(' ', '-', $title));
        $publish = isset($data['publish']) ? 1 : 0;
        $new_tab = isset($data['new_tab']) ? 1 : 0;
        $external_url = isset($data['external_url']) ? 1 : 0;
        $menu_data = array(
            'title' => $title,
            'alias' => $slug,
            'ordering' => $data['position'],
            'open_new_tab' => $new_tab,
            'ext_url' => $external_url,
            'ext_url_address' => $data['external_link'],
            'publish' => $publish,
            'system' => 0,
        );
        if (isset($data['menu_id']) && !empty($data['menu_id'])) {
            $isSystem = $this->db->get_where('front_cms_menu', array('id' => $data['menu_id']))->row()->system;
            if ($isSystem == 1) {
                unset($menu_data['alias']);
                unset($menu_data['ext_url']);
                unset($menu_data['ext_url_address']);
                unset($menu_data['system']);
            }
            $this->db->where('id', $data['menu_id']);
            $this->db->update('front_cms_menu', $menu_data);
        } else {
            $this->db->insert('front_cms_menu', $menu_data);
        }
    }

    public function save_features($data)
    {
        $elements_data = array(
            'button_text' => $data['button_text'],
            'button_url' => $data['button_url'],
            'icon' => $data['icon'],
        );

        $slider_data = array(
            'title' => $data['title'],
            'item_type' => 'features',
            'description' => $data['description'],
            'elements' => json_encode($elements_data),
        );
        if (isset($data['features_id']) && !empty($data['features_id'])) {
            $this->db->where('id', $data['features_id']);
            $this->db->update('front_cms_home', $slider_data);
        } else {
            $this->db->insert('front_cms_home', $slider_data);
        }
    }

    // testimonial save and update function
    public function save_testimonial($data)
    {
        $insert_testimonial = array(
            'patient_name' => $data['patient_name'],
            'surname' => $data['surname'],
            'description' => $data['description'],
            'rank' => $data['rank'],
            'image' => $this->upload_image(),
            'created_by' => get_loggedin_user_id(),
        );

        if (isset($data['testimonial_id']) && !empty($data['testimonial_id'])) {
            $this->db->where('id', $data['testimonial_id']);
            $this->db->update('front_cms_testimonial', $insert_testimonial);
        } else {
            $this->db->insert('front_cms_testimonial', $insert_testimonial);
        }
    }

   
    public function save_services($data)
    {
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
        $services_data = array(
            'title' => $data['title'],
       'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title']))),
            'description' => $data['description'],
            'bannerhead' => $data['bannerhead'],
            'heading' => $data['heading'],
             'tab1' => $data['tab1'],
            'tab1content' => $data['tab1content'],
             'tab2' => $data['tab2'],
            'tab2content' => $data['tab2content'],
              'tab3' => $data['tab3'],
            'tab3content' => $data['tab3content'],
              'tab4' => $data['tab4'],
            'tab4content' => $data['tab4content'],
            'doctors' => json_encode($data['doctors']),
         'rank' => $data['rank'],
        
            'seo_content' => json_encode($seo_content),
        );
        if (isset($_FILES['differentiate_image']) && $_FILES['differentiate_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["differentiate_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['differentiate_image']['tmp_name'], 'uploads/images/'.$filename);
                    $services_data['differentiate_image'] = 'uploads/images/'.$filename;
                }
                
                if (isset($_FILES['key_technologies_image']) && $_FILES['key_technologies_image']['name'] != "") {
                    $path_parts = pathinfo($_FILES["key_technologies_image"]["name"]);
                    $extension = '.'.$path_parts['extension'];
                    $filename = time().uniqid().$extension;
                    move_uploaded_file($_FILES['key_technologies_image']['tmp_name'], 'uploads/images/'.$filename);
                    $services_data['key_technologies_image'] = 'uploads/images/'.$filename;
                }
        if (isset($data['services_id']) && !empty($data['services_id'])) {
            $this->db->where('id', $data['services_id']);
            $this->db->update('front_cms_services_list', $services_data);
        } else {
            $this->db->insert('front_cms_services_list', $services_data);
        }
    }

    // upload home slider image
    public function upload_image()
    {
        $prev_image = $this->input->post('old_photo');
        $image = $_FILES['photo']['name'];
        $return_image = '';
        if ($image != '') {
            $destination = './uploads/frontend/slider/';
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_path = 'home-slider-' . time() . '.' . $extension;
            move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $image_path);

            // need to unlink previous slider
            if ($prev_image != '') {
                if (file_exists($destination . $prev_image)) {
                    @unlink($destination . $prev_image);
                }
            }
            $return_image = $image_path;
        } else {
            $return_image = $prev_image;
        }
        return $return_image;
    }

}
