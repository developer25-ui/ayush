<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // MODERATOR EMPLOYEE ALL INFORMATION
    public function save($data)
    {
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
                 
        $inser_data1 = array(
            'name' => $data["name"],
            'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['name']))),
            'department' => $data["department_id"],
            'qualification' => $data["qualification"],
            'designation' => $data["designation_id"],
           'location' => $data["location"],
           'speciality' => $data["speciality"],
            'blogs' => $data["blogs"],
            'address' => $data["address"],
            'mobileno' => $data["mobile_no"],
            'email' => $data["email"],
            'photo' => $this->app_lib->upload_image('staff'),
            'description' => $data["description"],
            'education' => $data["education"],
            'education_heading' => $data["education_heading"],
            'awards_publications' => $data["awards_publications"],
            'awards_publications_heading' => $data["awards_publications_heading"],
            'Interest' => $data["Interest"],
            'Interest_heading' => $data["Interest_heading"],
              'experiences' => $data["experiences"],
            'experiences_heading' => $data["experiences_heading"],
            'rank' => $data["rank"],
            'skills' => $data["skills"],
            'publication' => $data["publication"],
            'seo_content' => json_encode($seo_content),            
        );

        $inser_data2 = array(
            'username' => $data["username"],
            // 'role' => $data["user_role"],
            'role' => 3,
        );

        if (!isset($data['staff_id']) && empty($data['staff_id'])) {
            $inser_data1['staff_id'] = substr(app_generate_hash(), 3, 7);
            // SAVE EMPLOYEE INFORMATION IN THE DATABASE
            $this->db->insert('staff', $inser_data1);
            $staff_id = $this->db->insert_id();

            // SAVE EMPLOYEE LOGIN CREDENTIAL INFORMATION IN THE DATABASE
            $inser_data2['active'] = 1;
            $inser_data2['user_id'] = $staff_id;
            $inser_data2['password'] = $this->app_lib->pass_hashed($data["password"]);
            $this->db->insert('login_credential', $inser_data2);

            $inser_data3 = array(
                'staff_id' => $staff_id,
                'amount' => 0,
            );
            $this->db->insert('staff_balance', $inser_data3);

            // save user bank information in the database
            if (!isset($data["cbbank_skip"])) {
                $inser_data4 = array(
                    'staff_id' => $staff_id,
                    'bank_name' => $data["bank_name"],
                    'holder_name' => $data["holder_name"],
                    'bank_branch' => $data["bank_branch"],
                    'bank_address' => $data["bank_address"],
                    'ifsc_code' => $data["ifsc_code"],
                    'account_no' => $data["account_no"],
                );
                $this->db->insert('staff_bank_account', $inser_data4);
            }
            return $staff_id;
        } else {
            // UPDATE ALL INFORMATION IN THE DATABASE
            $this->db->where('id', $data['staff_id']);
            $this->db->update('staff', $inser_data1);

            // UPDATE LOGIN CREDENTIAL INFORMATION IN THE DATABASE
            $this->db->where('user_id', $data['staff_id']);
            $this->db->where('role !=', 7);
            $this->db->update('login_credential', $inser_data2);
        }
    }

    // GET STAFF ALL DETAILS
    public function get_employee_list($role_id, $active = 1)
    {
        $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id, roles.name as role');
        $this->db->from('staff');
        $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
        $this->db->join('roles', 'roles.id = login_credential.role', 'left');
        $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
        $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
        $this->db->where('login_credential.role', $role_id);
        $this->db->where('login_credential.active', $active);
        $this->db->order_by('staff.id', 'ASC');
        return $this->db->get()->result();
    }

    // GET SINGLE EMPLOYEE DETAILS
    public function get_single_employee($id = null)
    {
        $this->db->select('staff.*,staff_designation.name as designation_name,staff_department.name as department_name,login_credential.role as role_id,login_credential.active,login_credential.username, roles.name as role');
        $this->db->from('staff');
        $this->db->join('login_credential', 'login_credential.user_id = staff.id and login_credential.role != "7"', 'inner');
        $this->db->join('roles', 'roles.id = login_credential.role', 'left');
        $this->db->join('staff_designation', 'staff_designation.id = staff.designation', 'left');
        $this->db->join('staff_department', 'staff_department.id = staff.department', 'left');
        $this->db->where('staff.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
