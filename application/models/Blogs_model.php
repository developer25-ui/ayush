<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

   public function save($data)
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
        $insert_testimonial = array(
            'patient_name' => $data['patient_name'],
            'surname' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['patient_name']))),
             'bannerhead' => $data['bannerhead'],
            'description' => $data['description'],
            'rank' => $data['rank'],
            'author' => $data['author'],
            'speciality' => $data['speciality'],
            'created_by' =>  get_loggedin_user_id(),
            'image' => $this->upload_image(),
            'seo_content' => json_encode($seo_content),
        );

        if (isset($data['testimonial_id']) && !empty($data['testimonial_id'])) {
            $this->db->where('id', $data['testimonial_id']);
            $this->db->update('front_cms_blogs', $insert_testimonial);
        } else {
            $this->db->insert('front_cms_blogs', $insert_testimonial);
        }
    }

    // upload home slider image
    public function upload_image()
    {
        $prev_image = $this->input->post('old_photo');
        $image = $_FILES['photo']['name'];
        $return_image = '';
        if ($image != '') {
            $destination = './uploads/images/blogs/';
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $image_path = 'user-' . time() . '.' . $extension;
            move_uploaded_file($_FILES['photo']['tmp_name'], $destination . $image_path);

            // need to unlink previous testimonial image
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
