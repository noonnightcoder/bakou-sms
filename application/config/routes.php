<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = 'user/index';
$route['404_override'] = 'user/error';

/*admin*/
$route['admin'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/index';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';
$route['admin/dashboard'] = 'user/dashboard';

/* monoci auto crud */
$route['admin/monoci'] = 'monoci/index';
                                        
$route['admin/school'] = 'admin_school/index';
$route['admin/school/add'] = 'admin_school/add';
$route['admin/school/update'] = 'admin_school/update';
$route['admin/school/update/(:any)'] = 'admin_school/update/$1';
$route['admin/school/delete/(:any)'] = 'admin_school/delete/$1';
$route['admin/school/(:any)'] = 'admin_school/index/$1'; //$1 = page number

$route['admin/buildings'] = 'admin_buildings/index';
$route['admin/buildings/add'] = 'admin_buildings/add';
$route['admin/buildings/update'] = 'admin_buildings/update';
$route['admin/buildings/update/(:any)'] = 'admin_buildings/update/$1';
$route['admin/buildings/delete/(:any)'] = 'admin_buildings/delete/$1';
$route['admin/buildings/(:any)'] = 'admin_buildings/index/$1'; //$1 = page number
                    
$route['admin/classroom_types'] = 'admin_classroom_types/index';
$route['admin/classroom_types/add'] = 'admin_classroom_types/add';
$route['admin/classroom_types/update'] = 'admin_classroom_types/update';
$route['admin/classroom_types/update/(:any)'] = 'admin_classroom_types/update/$1';
$route['admin/classroom_types/delete/(:any)'] = 'admin_classroom_types/delete/$1';
$route['admin/classroom_types/(:any)'] = 'admin_classroom_types/index/$1'; //$1 = page number
                    
$route['admin/classrooms'] = 'admin_classrooms/index';
$route['admin/classrooms/add'] = 'admin_classrooms/add';
$route['admin/classrooms/add/(:any)'] = 'admin_classrooms/add/$1';
$route['admin/classrooms/update'] = 'admin_classrooms/update';
$route['admin/classrooms/update/(:any)'] = 'admin_classrooms/update/$1';
$route['admin/classrooms/delete/(:any)'] = 'admin_classrooms/delete/$1';
$route['admin/classrooms/(:any)'] = 'admin_classrooms/index/$1'; //$1 = page number
                    
$route['admin/positions'] = 'admin_positions/index';
$route['admin/positions/add'] = 'admin_positions/add';
$route['admin/positions/update'] = 'admin_positions/update';
$route['admin/positions/update/(:any)'] = 'admin_positions/update/$1';
$route['admin/positions/delete/(:any)'] = 'admin_positions/delete/$1';
$route['admin/positions/(:any)'] = 'admin_positions/index/$1'; //$1 = page number

$route['admin/staffs'] = 'admin_staffs/index';
$route['admin/staffs/add'] = 'admin_staffs/add';
$route['admin/staffs/update'] = 'admin_staffs/update';
$route['admin/staffs/update/(:any)'] = 'admin_staffs/update/$1';
$route['admin/staffs/delete/(:any)'] = 'admin_staffs/delete/$1';
$route['admin/staffs/(:any)'] = 'admin_staffs/index/$1'; //$1 = page number
                    
$route['admin/faculties'] = 'admin_faculties/index';
$route['admin/faculties/add'] = 'admin_faculties/add';
$route['admin/faculties/update'] = 'admin_faculties/update';
$route['admin/faculties/update/(:any)'] = 'admin_faculties/update/$1';
$route['admin/faculties/delete/(:any)'] = 'admin_faculties/delete/$1';
$route['admin/faculties/(:any)'] = 'admin_faculties/index/$1'; //$1 = page number
                    
$route['admin/departments'] = 'admin_departments/index';
$route['admin/departments/add'] = 'admin_departments/add';
$route['admin/departments/add/(:any)'] = 'admin_departments/add/$1';
$route['admin/departments/update'] = 'admin_departments/update';
$route['admin/departments/update/(:any)'] = 'admin_departments/update/$1';
$route['admin/departments/delete/(:any)'] = 'admin_departments/delete/$1';
$route['admin/departments/(:any)'] = 'admin_departments/index/$1'; //$1 = page number
                    
$route['admin/classes'] = 'admin_classes/index';
$route['admin/classes/add'] = 'admin_classes/add';
$route['admin/classes/add/(:any)'] = 'admin_classes/add/$1';
$route['admin/classes/update'] = 'admin_classes/update';
$route['admin/classes/update/(:any)'] = 'admin_classes/update/$1';
$route['admin/classes/delete/(:any)'] = 'admin_classes/delete/$1';
$route['admin/classes/(:any)'] = 'admin_classes/index/$1'; //$1 = page number
                    
$route['admin/subjects'] = 'admin_subjects/index';
$route['admin/subjects/add'] = 'admin_subjects/add';
$route['admin/subjects/add/(:any)'] = 'admin_subjects/add/$1';
$route['admin/subjects/update'] = 'admin_subjects/update';
$route['admin/subjects/update/(:any)'] = 'admin_subjects/update/$1';
$route['admin/subjects/delete/(:any)'] = 'admin_subjects/delete/$1';
$route['admin/subjects/(:any)'] = 'admin_subjects/index/$1'; //$1 = page number
                    
$route['admin/books'] = 'admin_books/index';
$route['admin/books/add'] = 'admin_books/add';
$route['admin/books/add/(:any)'] = 'admin_books/add/$1';
$route['admin/books/update'] = 'admin_books/update';
$route['admin/books/update/(:any)'] = 'admin_books/update/$1';
$route['admin/books/detail'] = 'admin_books/detail';
$route['admin/books/detail/(:any)'] = 'admin_books/detail/$1';
$route['admin/books/delete/(:any)'] = 'admin_books/delete/$1';
$route['admin/books/(:any)'] = 'admin_books/index/$1'; //$1 = page number

// library
$route['admin/library'] = 'admin_books/library';
$route['admin/library/add'] = 'admin_books/add_book';
$route['admin/library/update'] = 'admin_books/update_book';
$route['admin/library/update/(:any)'] = 'admin_books/update_book/$1';
$route['admin/library/delete/(:any)'] = 'admin_books/delete_book/$1';
$route['admin/library/(:any)'] = 'admin_books/library/$1'; //$1 = page number
                    
$route['admin/transports'] = 'admin_transports/index';
$route['admin/transports/add'] = 'admin_transports/add';
$route['admin/transports/update'] = 'admin_transports/update';
$route['admin/transports/update/(:any)'] = 'admin_transports/update/$1';
$route['admin/transports/delete/(:any)'] = 'admin_transports/delete/$1';
$route['admin/transports/(:any)'] = 'admin_transports/index/$1'; //$1 = page number
                    
$route['admin/vehicles'] = 'admin_vehicles/index';
$route['admin/vehicles/add'] = 'admin_vehicles/add';
$route['admin/vehicles/add/(:any)'] = 'admin_vehicles/add/$1';
$route['admin/vehicles/update'] = 'admin_vehicles/update';
$route['admin/vehicles/update/(:any)'] = 'admin_vehicles/update/$1';
$route['admin/vehicles/delete/(:any)'] = 'admin_vehicles/delete/$1';
$route['admin/vehicles/(:any)'] = 'admin_vehicles/index/$1'; //$1 = page number
                    
$route['admin/academics'] = 'admin_academics/index';
$route['admin/academics/add'] = 'admin_academics/add';
$route['admin/academics/update'] = 'admin_academics/update';
$route['admin/academics/update/(:any)'] = 'admin_academics/update/$1';
$route['admin/academics/delete/(:any)'] = 'admin_academics/delete/$1';
$route['admin/academics/(:any)'] = 'admin_academics/index/$1'; //$1 = page number
                    
$route['admin/academic_programs'] = 'admin_academic_programs/index';
$route['admin/academic_programs/add'] = 'admin_academic_programs/add';
$route['admin/academic_programs/add/(:any)'] = 'admin_academic_programs/add/$1';
$route['admin/academic_programs/update'] = 'admin_academic_programs/update';
$route['admin/academic_programs/update/(:any)'] = 'admin_academic_programs/update/$1';
$route['admin/academic_programs/detail'] = 'admin_academic_programs/detail';
$route['admin/academic_programs/detail/(:any)'] = 'admin_academic_programs/detail/$1';
$route['admin/academic_programs/delete/(:any)'] = 'admin_academic_programs/delete/$1';
$route['admin/academic_programs/delete_subject/(:any)'] = 'admin_academic_programs/delete_subject/$1';
$route['admin/academic_programs/(:any)'] = 'admin_academic_programs/index/$1'; //$1 = page number
                    
$route['admin/students'] = 'admin_students/index';
$route['admin/students/add'] = 'admin_students/add';
$route['admin/students/update'] = 'admin_students/update';
$route['admin/students/update/(:any)'] = 'admin_students/update/$1';
$route['admin/students/delete/(:any)'] = 'admin_students/delete/$1';
$route['admin/students/(:any)'] = 'admin_students/index/$1'; //$1 = page number
                    
$route['admin/parents'] = 'admin_parents/index';
$route['admin/parents/add'] = 'admin_parents/add';
$route['admin/parents/add/(:any)'] = 'admin_parents/add/$1';
$route['admin/parents/update'] = 'admin_parents/update';
$route['admin/parents/update/(:any)'] = 'admin_parents/update/$1';
$route['admin/parents/detail'] = 'admin_parents/detail';
$route['admin/parents/detail/(:any)'] = 'admin_parents/detail/$1';
$route['admin/parents/delete/(:any)'] = 'admin_parents/delete/$1';
$route['admin/parents/(:any)'] = 'admin_parents/index/$1'; //$1 = page number
                    
$route['admin/services'] = 'admin_services/index';
$route['admin/services/add'] = 'admin_services/add';
$route['admin/services/update'] = 'admin_services/update';
$route['admin/services/update/(:any)'] = 'admin_services/update/$1';
$route['admin/services/delete/(:any)'] = 'admin_services/delete/$1';
$route['admin/services/(:any)'] = 'admin_services/index/$1'; //$1 = page number
                    
$route['admin/noticeboards'] = 'admin_noticeboards/index';
$route['admin/noticeboards/add'] = 'admin_noticeboards/add';
$route['admin/noticeboards/update'] = 'admin_noticeboards/update';
$route['admin/noticeboards/update/(:any)'] = 'admin_noticeboards/update/$1';
$route['admin/noticeboards/detail'] = 'admin_noticeboards/detail';
$route['admin/noticeboards/detail/(:any)'] = 'admin_noticeboards/detail/$1';
$route['admin/noticeboards/delete/(:any)'] = 'admin_noticeboards/delete/$1';
$route['admin/noticeboards/(:any)'] = 'admin_noticeboards/index/$1'; //$1 = page number
                    
                    