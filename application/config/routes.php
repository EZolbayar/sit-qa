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

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'user';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['modifyUser'] = "user/modifyUser";
$route['modifyUser/(:num)'] = "user/modifyUser/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

//Servers Module

$route['serverListing'] = 'servers/serverListing';
$route['serverListing/(:num)'] = "servers/serverListing/$1";
$route['addNewServer'] = "servers/addNewServer";
$route['modifyServer'] = "servers/modifyServer";
$route['viewServer/(:num)'] = "servers/viewServer/$1";
$route['modifyServer/(:num)'] = "servers/modifyServer/$1";
$route['editServer'] = "servers/editServer";
$route['deleteServer'] = "servers/deleteServer";
$route['addNewServ'] = "servers/addNewServ";

//Database Module

$route['databaseListing'] = 'databases/databaseListing';
$route['databaseListing/(:num)'] = "databases/DatabaseListing/$1";
$route['addNewDatabase'] = "databases/addNewDatabase";
$route['modifyDatabase'] = "databases/modifyDatabase";
$route['viewDatabase/(:num)'] = "databases/viewDatabase/$1";
$route['modifyDatabase/(:num)'] = "databases/modifyDatabase/$1";
$route['editDatabase'] = "databases/editDatabase";
$route['deleteDatabase'] = "databases/deleteDatabase";
$route['addNewDb'] = "databases/addNewDb";

//SubSystems Module

$route['subsystemListing'] = 'subsystems/subsystemListing';
$route['subsystemListing/(:num)'] = "subsystems/SubSystemListing/$1";
$route['addNewSubSystem'] = "subsystems/addNewSubSystem";
$route['modifySubSystem'] = "subsystems/modifySubSystem";
$route['viewSubSystem/(:num)'] = "subsystems/viewSubSystem/$1";
$route['modifySubSystem/(:num)'] = "subsystems/modifySubSystem/$1";
$route['editSubSystem'] = "subsystems/editSubSystem";
$route['deleteSubSystem'] = "subsystems/deleteSubSystem";
$route['addNewSub'] = "subsystems/addNewSub";

//SSH Access Module

$route['sshAccessListing'] = 'sshAccess/sshAccessListing';
$route['sshAccessListing/(:num)'] = "sshAccess/SshAccessListing/$1";
$route['addNewSshAccess'] = "sshAccess/addNewSshAccess";
$route['modifySshAccess'] = "sshAccess/modifySshAccess";
$route['viewSshAccess/(:num)'] = "sshAccess/viewSshAccess/$1";
$route['modifySshAccess/(:num)'] = "sshAccess/modifySshAccess/$1";
$route['editSshAccess'] = "sshAccess/editSshAccess";
$route['deleteSshAccess'] = "sshAccess/deleteSshAccess";
$route['addNewSsh'] = "sshAccess/addNewSsh";

//-------------------

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

/* End of file routes.php */
/* Location: ./application/config/routes.php */
