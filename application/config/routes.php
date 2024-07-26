<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';

$route['bookappointment'] = 'home/bookappointment';


$route['sidebar'] = 'home/sidebar';
$route['camps-events'] = 'home/camps_events';
$route['camps-events/(:any)'] = 'home/camps_events/$1';

$route['register'] = 'home/register';
$route['procedure/(:any)'] = 'home/procedure/$1';

$route['careers'] = 'home/careers';
 $route['unit-directors'] = 'home/unit_directors';
 $route['patient_guidelines'] = 'home/patient_guidelines';

$route['about-us'] = 'home/about';

$route['awards-accreditation'] = 'home/awards_accreditation';
$route['sub-speciality/(:any)'] = 'home/sub_speciality/$1';
$route['ourspeciality'] = 'home/ourspeciality';
$route['subspecialtydetail'] = 'home/subspecialtydetail';

$route['speciality_details'] = 'home/speciality_details';
$route['speciality-details/(:any)'] = 'home/speciality_details/$1';
$route['schemes'] = 'home/schemes';
$route['doctors'] = 'home/doctors';

$route['directors'] = 'home/directors';
$route['doctorss'] = 'home/doctorss';
$route['location_specialty'] = 'home/location_specialty';

$route['doctor_list'] = 'home/doctor_list';
$route['doctor-details/(:num)'] = 'home/doctor_details/$1';
$route['doctor-profile/(:any)'] = 'home/doctor_profile/$1';
$route['health-checkup'] = 'home/health_checkup';
$route['checkup-details/(:any)'] = 'home/checkup_details/$1';
$route['tpa'] = 'home/tpa';
$route['patientsrights-responsibilities'] = 'home/patientsrights_responsibilities';
$route['estimate-request'] = 'home/estimate_request';
$route['feedback'] = 'home/feedback';
$route['success-stories'] = 'home/success_stories';
$route['client-review'] = 'home/client_review';
$route['doctor-talks'] = 'home/doctor_talks';
$route['pr'] = 'home/pr';
$route['blogs'] = 'home/blogs';
$route['leadership'] = 'home/leadership';

$route['leadership/(:any)'] = 'home/leadership/$1';
$route['blogs/(:any)'] = 'home/blogs/$1';
// $route['blog-details'] = 'home/blog_details';
$route['event-gallery'] = 'home/event_gallery';
$route['contact'] = 'home/contact';



$route['404_override'] = 'home/show_404';
$route['translate_uri_dashes'] = FALSE;