<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Events_model extends MY_Model
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
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            // 'rank' => $data['rank'],
            // 'author' => $data['author'],
            // 'speciality' => $data['speciality'],
            'created_by' =>  get_loggedin_user_id(),
            // 'image' => $this->upload_image(),
        );

        if (isset($data['testimonial_id']) && !empty($data['testimonial_id'])) {
            $this->db->where('id', $data['testimonial_id']);
            $this->db->update('front_cms_events', $insert_testimonial);
             if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
        	             $filesCount = count($_FILES['photo']['name']); 
        	             $data2 = array();
        	             for($i = 0; $i < $filesCount; $i++){ 
            	            $path_parts = pathinfo($_FILES["photo"]["name"][$i]);
            	            if($path_parts['extension']){
                                $extension = '.'.$path_parts['extension'];
                                $filename = time().uniqid().$extension;
                                move_uploaded_file($_FILES['photo']['tmp_name'][$i], 'uploads/images/events/'.$filename);
                                // $data1['files'][] = 'uploads/images/events/'.$filename;
                                $data2[$i]['event_id'] = $data['testimonial_id'];
            	                $data2[$i]['image'] = 'uploads/images/events/'.$filename;
            	            }
        	             }
        	             $this->db->insert_batch('event_images',$data2);
                 }
        } else {
            $this->db->insert('front_cms_events', $insert_testimonial);
            $insert_id = $this->db->insert_id();
           if (isset($_FILES['photo']) && $_FILES['photo']['name'] != "") {
        	             $filesCount = count($_FILES['photo']['name']); 
        	             $data2 = array();
        	             for($i = 0; $i < $filesCount; $i++){ 
            	            $path_parts = pathinfo($_FILES["photo"]["name"][$i]);
                            $extension = '.'.$path_parts['extension'];
                            $filename = time().uniqid().$extension;
                            move_uploaded_file($_FILES['photo']['tmp_name'][$i], 'uploads/images/events/'.$filename);
                            // $data1['files'][] = 'uploads/images/events/'.$filename;
                            $data2[$i]['event_id'] = $insert_id;
        	                $data2[$i]['image'] = 'uploads/images/events/'.$filename;
        	             }
        	             $this->db->insert_batch('event_images',$data2);
                 }
            
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
