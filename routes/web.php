<?php

use App\Http\Controllers\ManagerItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\Changepassword;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StoreManagerItem;
use App\Http\Controllers\UserrPasswordchange;
use App\Http\Controllers\ManagerPasswordchange;
use App\Http\Controllers\StoreManagerDashboard;
use App\Http\Controllers\ManagerStaffController;
use App\Http\Controllers\UserWorkorderController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\TechnicianItemController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\ManagerWorkOrderController;
use App\Http\Controllers\ManagerResilienceController;
use App\Http\Controllers\ManagerTechnicianController;
use App\Http\Controllers\TechnicianDashboardController;
use App\Http\Controllers\TechnicianAssignWorkController;
use App\Http\Controllers\TechnicianNotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',[LoginController::class,'index'])->name('user.login');
Route::post('/',[LoginController::class,'userlogin'])->name('user.login');
Route::get('/adminregister',[AdminController::class,'index'])->name('admin.register');
Route::post('/adminregister',[AdminController::class,'registeradmin'])->name('admin.register');
Route::get('/user/register',[LoginController::class,'registerPage'])->name('user.register');
Route::post('/user/register',[LoginController::class,'useRegister'])->name('userRegister');
Route::post('logout',[AdminController::class,'logout'])->name('logout');


//admin page
Route::middleware(['auth', 'user-role:admin'])->group(function () {
Route::get('admin/dashboard',[AdminDashboard::class,'index'])->name('admin.dashboard');
Route::get('admin/account/createaccount',[AdminDashboard::class,'createaccount'])->name('admin.createaccount');
Route::post('admin/account/createaccount',[AdminController::class,'createaccount'])->name('admin.createaccount');
Route::get('admin/account/viewaccount',[AdminController::class,'viewaccount'])->name('admin.viewaccount');
Route::post('admin/resetpassword',[AdminController::class,'resetpassword'])->name('admin.resetpassword');
Route::post('admin/deleteaccount',[AdminController::class,'deleteaccount'])->name('admin.deleteaccount');

});
//manager page
Route::middleware(['auth', 'user-role:facility manager'])->group(function () {
Route::get('manager/dashboard',[ManagerDashboardController::class,'index'])->name('manager.dashboard');
Route::get('manager/user/addstaf',[ManagerStaffController::class,'addstaff'])->name('addstaff');
Route::get('manager/user/newUser',[ManagerStaffController::class,'newUser'])->name('newUser');
Route::post('manager/newUser',[ManagerStaffController::class,'appproveUser'])->name('manager.approveUser');
Route::post("manager/rejectUser",[ManagerStaffController::class,'reject'])->name('manager.rejectUser');
//Route::post('manager/addstaf',[ManagerStaffController::class,'store'])->name('addstaff');
Route::get('manager/user/viewstaff',[ManagerStaffController::class,'viewstaff'])->name('viewstaff');
Route::get('/editstaff/{id}',[ManagerStaffController::class,'show'])->name('editstaff');
Route::put('/editstaff/{id}',[ManagerStaffController::class,'editstaff'])->name('editstaff');
Route::post('/deletestaff',[ManagerStaffController::class,'deletestaff'])->name('deletestaff');
Route::get('manager/resilience',[ManagerResilienceController::class,'viewResilience'])->name('manager.ViewResilience');
Route::post('manager/resilience',[ManagerResilienceController::class,'addResilience'])->name('manager.addResilience');
Route::post('manager/deleteResilience',[ManagerResilienceController::class,'deleteResilience'])->name('deleteResilience');
Route::get('manager/work/view-work-request',[ManagerWorkOrderController::class,'index'])->name('manager.ViewWorkRequest');
Route::post('manager/approve-request-work',[ManagerWorkOrderController::class,'viewApprovePage'])->name('manager.approveWork');
Route::get('manager/technician',[ManagerTechnicianController::class,'index'])->name('manager.technician');
Route::post('manager/add-technician',[ManagerTechnicianController::class,'addTechnician'])->name('manager.addTechnician');
Route::delete('manager/delete-technician',[ManagerDashboardController::class,"deleteT"])->name('manager.deleteTechnician');
Route::post('manager/assign-technician',[ManagerTechnicianController::class,'AssignTechnician'])->name('manager.AssignTechnician');

Route::get('manager/work/view-approved-work',[ManagerWorkOrderController::class,'ViewApprovedWork'])->name('manager.ViewApprovedWork');
Route::get('manager/work/view-completed',[ManagerWorkOrderController::class,'ViewCompleteWork'])->name('manager.ViewCompleteWork');
Route::get('manager/changepassword',[ManagerPasswordchange::class,'index'])->name('manager.changepassword');
Route::post('manager/changepassword',[ManagerPasswordchange::class,'changePassword'])->name("manager.changePss");

Route::get('manager/item-request',[ManagerItem::class,"index"])->name("manager.viewRequestItem");
Route::post("manager/approve-item-request",[ManagerItem::class,"approveItem"])->name("manager.approveItem");
Route::post("manager/approve-reject-item",[ManagerItem::class,"rejectItem"])->name("manager.rejecttItem");
});


//staff page
Route::middleware(['auth', 'user-role:user'])->group(function () {
Route::get('/user/dashboard',[StaffDashboardController::class,'index'])->name('staff.dashboard');
Route::get('/user/requestwork',[UserWorkorderController::class,'index'])->name('user.requestWork');
Route::post('/user/requestwork',[UserWorkorderController::class,'store'])->name("requestWork");
Route::get('user/workorder-status',[UserWorkorderController::class,"workorderStaus"])->name('user.workOrderStatus');
Route::post('users/confirm-work',[UserWorkorderController::class,'confirmWork'])->name('user.confirmWork');
Route::get('users/changepassword',[UserrPasswordchange::class,'index'])->name('user.changePassword');
Route::post('users/changepassword',[UserrPasswordchange::class,"changepassword"])->name("user.changePss");

});


//technician page
Route::middleware(['auth', 'user-role:technician'])->group(function () {
Route::get('/technician/dashboard',[TechnicianDashboardController::class,'index'])->name('technician.dashboard');
Route::get('/technician/request-item',[TechnicianItemController::class,'index'])->name('technician.requestItem');
Route::post('technician/request-item',[TechnicianItemController::class,'requestItme'])->name('technician.request');
Route::get("technician/my-assigned-work",[TechnicianAssignWorkController::class,'index'])->name('technician.assignedWork');
Route::get("technician/notification",[TechnicianNotificationController::class,'index'])->name('technician.notification');
Route::get("tehcnician/change-password",[TechnicianDashboardController::class,'changePpage'])->name('technician.changePassword');
Route::post('technician/change-password',[Changepassword::class,'changepassword'])->name('technician.changePss');
});

Route::middleware(['auth', 'user-role:store manager'])->group(function () {

    Route::get("store-manager/dashboard",[StoreManagerDashboard::class,'index'])->name("storeM.dashboard");
    Route::get("store-manager/items",[StoreManagerItem::class,'index'])->name("storeM.viewItem");
    Route::post("store-manager/items",[StoreManagerItem::class,'addItem'])->name("storeM.addItem");
    Route::post("store-manager/editItem",[StoreManagerItem::class,"editItem"])->name("storeM.editItem");
    Route::post("store-manager/edit",[StoreManagerItem::class,"edit"])->name("storeM.edit");

});


