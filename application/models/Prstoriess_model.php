<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prstoriess_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // test save and update function
    public function save($data)
    {
        $insert_testimonial = array(
            'patient_name' => $data['patient_name'],
            'surname' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['patient_name']))),
            'description' => $data['description'],
            'readmore' => $data['readmore'],
           
            'created_by' =>  get_loggedin_user_id(),
            'image' => $this->upload_image(),
        );

        if (isset($data['testimonial_id']) && !empty($data['testimonial_id'])) {
            $this->db->where('id', $data['testimonial_id']);
            $this->db->update('front_cms_prstoriess', $insert_testimonial);
        } else {
            $this->db->insert('front_cms_prstoriess', $insert_testimonial);
        }
    }

    // upload home slider image
    public function upload_image()
    {
        $prev_image = $this->input->post('old_photo');
        $image = $_FILES['photo']['name'];
        $return_image = '';
        if ($image != '') {
            $destination = './uploads/images/prstoriess/';
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
