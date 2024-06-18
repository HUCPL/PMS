<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\authController;
use App\Http\Controllers\admin\pagesController;
use App\Http\Controllers\admin\propertyController;
use App\Http\Controllers\admin\usersController;
use App\Http\Controllers\admin\vendorController;
use App\Http\Controllers\admin\siteEngineer;
use App\Http\Controllers\admin\helpDeskController;
use App\Http\Controllers\admin\ownerController;
use App\Http\Controllers\admin\servicesMaster;
use App\Http\Controllers\admin\permissionController;
use App\Http\Controllers\admin\ticketController;
use App\Http\Controllers\admin\superVisorController;
use App\Http\Controllers\admin\cmsController;
use App\Http\Controllers\admin\PackageController;
use App\Http\Controllers\admin\FeaturesController;
//superAdmin Routes
Route::prefix('superadmin')->group(function () {
    Route::middleware(['superAdmin'])->group(function () {
        Route::get('dashboard',[pagesController::class,'dashboard'])->name('dashboard');
        //Master Category Routes
        Route::get('category',[propertyController::class,'masterCategory'])->name('masterCategoryPage');
        Route::post('category',[propertyController::class,'addMasterCategory'])->name('masterCategory');
        Route::post('update-category',[propertyController::class,'updateMasterCategory'])->name('updatemasterCategory');
        Route::get('delete-category/{id}',[propertyController::class,'deleteMasterCategory'])->name('deleteMasterCategory');
        //Property Feature List Routes
        Route::get('featurelist',[propertyController::class,'featureList'])->name('featureList');
        Route::post('featurelist',[propertyController::class,'addFeatureList'])->name('addFeatureList');
        Route::post('update-featurelist',[propertyController::class,'updateFeatureList'])->name('updateFeatureList');
        Route::get('delete-featurelist/{id}',[propertyController::class,'deleteFeatureList'])->name('deleteFeatureList');
        //Property Outdoor List Routes
        Route::get('property-outdoor',[propertyController::class,'propertyOutdoor'])->name('propertyOutdoor');
        Route::post('property-outdoor',[propertyController::class,'addPropertyOutdoor'])->name('addPropertyOutdoor');
        Route::post('update-property-outdoor',[propertyController::class,'updatePropertyOutdoor'])->name('updatePropertyOutdoor');
        Route::get('delete-property-outdoor/{id}',[propertyController::class,'deletePropertyOutdoor'])->name('deletePropertyOutdoor');
        //Property Indoor List Routes
        Route::get('property-indoor',[propertyController::class,'propertyIndoor'])->name('propertyIndoor');
        Route::post('property-indoor',[propertyController::class,'addPropertyIndoor'])->name('addPropertyIndoor');
        Route::post('update-property-indoor',[propertyController::class,'updatePropertyIndoor'])->name('updatePropertyIndoor');
        Route::get('delete-property-indoor/{id}',[propertyController::class,'deletePropertyIndoor'])->name('deletePropertyIndoor');
        //Property Details Routes
        Route::get('property-details',[propertyController::class,'propertyDetails'])->name('propertyDetails');
        Route::post('property-details',[propertyController::class,'addpropertyDetails'])->name('addpropertyDetails');
        Route::post('update-property-details',[propertyController::class,'updatepropertyDetails'])->name('updatepropertyDetails');
        Route::get('delete-property-details/{id}',[propertyController::class,'deletepropertyDetails'])->name('deletepropertyDetails');
        //Owner Details
        Route::get('owner-details',[propertyController::class,'ownerDetails'])->name('ownerDetails');
        Route::post('owner-details',[propertyController::class,'addOwnerDetails'])->name('addOwnerDetails');
        Route::get('delete-owner-details/{id}',[propertyController::class,'deleteOwnerDetails'])->name('deleteOwnerDetails');
        Route::post('update-owner-details',[propertyController::class,'updateOwnerDetails'])->name('updateOwnerDetails');
        //Property OnBoard 
        Route::get('property-onBoard',[propertyController::class,'propertyOnBoard'])->name('propertyOnBoard');
        Route::post('properties-onBoard',[propertyController::class,'addPropertiesOnBoard'])->name('addPropertiesOnBoard');
        Route::get('property-onBoard-list',[propertyController::class,'propertyOnBoardList'])->name('propertyOnBoardList');
        Route::get('update-property-onBoard/{id}',[propertyController::class,'updatePropertyOnBoard'])->name('updatePropertyOnBoard');
        Route::post('update-property-onBoard/{id}',[propertyController::class,'updateOnBoard'])->name('updateOnBoard');
        Route::get('delete-property-onBoard/{id}',[propertyController::class,'deletePropertyOnBoard'])->name('deletePropertyOnBoard');
        //Properties Trash Routes
        Route::get('property-trash',[propertyController::class,'propertyTrash'])->name('propertyTrash');
        Route::get('property-trash-restore/{id}',[propertyController::class,'propertyTrashRestore'])->name('propertyTrashRestore');
        Route::get('property-force-delete/{id}',[propertyController::class,'propertyForceDelete'])->name('propertyForceDelete');
        //===Approved Property List Routes===
        Route::get('approved-properties',[propertyController::class,'approvedPropList'])->name('approvedPropList');
        //===Pms Properties List Routes
        Route::get('pms-properties',[propertyController::class,'pmsPropList'])->name('pmsPropList');
        //===ent Properties List Routes
        Route::get('rent-properties',[propertyController::class,'rentPropList'])->name('rentPropList');
        // Route::post('property-onBoard',[propertyController::class,'addPropertyOnBoard'])->name('addPropertyOnBoard');
        //ajax routes
        Route::get('featuresbycategories/{id}',[propertyController::class,'featuresByCategories'])->name('featuresbycategories');
        Route::get('proputlfeatures/{id}',[propertyController::class,'proputlFeatures'])->name('proputlFeatures');
        Route::get('indoorcatfeatures/{id}',[propertyController::class,'indoorcatFeatures'])->name('indoorcatFeatures');
        //ajax update routes
        Route::get('featuresbycategoriess/{id}',[propertyController::class,'featuresByCategoriess'])->name('featuresbycategoriess');
        Route::get('proputlfeaturess/{id}',[propertyController::class,'proputlFeaturess'])->name('proputlFeaturess');
        Route::get('indoorcatfeaturess/{id}',[propertyController::class,'indoorcatFeaturess'])->name('indoorcatFeaturess');
        //Users Management 
        Route::get('users',[usersController::class,'usersMangement'])->name('usersMangement');
        Route::post('users',[usersController::class,'addUser'])->name('addUser'); 
        Route::post('update-users',[usersController::class,'updateUser'])->name('updateUser');
        Route::get('delete-users/{id}',[usersController::class,'deleteUser'])->name('deleteUser');
        //Trash Routes 
        Route::get('user-trash',[usersController::class,'usersTrash'])->name('usersTrash');
        Route::get('user-trash-restore/{id}',[usersController::class,'usersTrashRestore'])->name('usersTrashRestore');
        Route::get('user-force-delete/{id}',[usersController::class,'usersForceDelete'])->name('usersForceDelete');
        //===All owner List=== 
        Route::get('owner-list',[usersController::class,'ownerList'])->name('ownerList');
        //===All helpdesk List=== 
        Route::get('helpdesk-list',[usersController::class,'helpDeskList'])->name('helpDeskList');
        //===All siteEngineer List=== 
        Route::get('siteEngineer-list',[usersController::class,'siteEngineerList'])->name('siteEngineerList');
        //===All superVisor List=== 
        Route::get('superVisor-list',[usersController::class,'superVisorList'])->name('superVisorList');
        //===All Vendor List=== 
        Route::get('vendor-list',[usersController::class,'vendorList'])->name('vendorList');
        //services master Routes
        //Departments
        Route::get('department',[servicesMaster::class,'department'])->name('department');
        Route::post('department',[servicesMaster::class,'addDepartment'])->name('addDepartment'); 
        Route::get('deletedepartment/{id}',[servicesMaster::class,'deleteDepartment'])->name('deleteDepartment'); 
        Route::post('updatedepartment',[servicesMaster::class,'updateDepartment'])->name('updateDepartment');  
        //Services
        Route::get('services',[servicesMaster::class,'services'])->name('services');
        Route::post('services',[servicesMaster::class,'addServices'])->name('addServices');
        Route::post('updateservices',[servicesMaster::class,'updateServices'])->name('updateServices');
        Route::get('deleteservices/{id}',[servicesMaster::class,'deleteServices'])->name('deleteServices');
        //Assign properies Routes
        Route::get('AssignSDProperites',[servicesMaster::class,'Assign'])->name('assign');
        Route::post('AssignSDProperites',[servicesMaster::class,'addAssign'])->name('addAssign');
        Route::get('deleteAssign/{id}',[servicesMaster::class,'deleteAssign'])->name('deleteAssign');
        Route::post('updateAssign',[servicesMaster::class,'updateAssign'])->name('updateAssign');
        Route::get('servicesbydept/{id}',[servicesMaster::class,'servicebydept'])->name('serviceByDept');
        //permission
        Route::get('permission',[permissionController::class,'permission'])->name('permmission');
        Route::post('permission',[permissionController::class,'addPermission'])->name('addPermission');
        //raised ticket
        Route::get('raise-ticket',[ticketController::class,'raiseTicket'])->name('superAdminraiseTicket');
        Route::post('raise-ticket',[ticketController::class,'addTicket'])->name('superAdminaddTicket');
        Route::post('assign-ticket',[ticketController::class,'assignTicket'])->name('superAdminAssignTicket');
        Route::get('delete-raise-ticket/{id}',[ticketController::class,'deleteTicket'])->name('superAdmindeleteTicket');
        Route::get('filter-ticket-priority',[ticketController::class,'ticketPriority'])->name('ticketPriority');
        // ===CMS-Route===
        Route::get('general',[cmsController::class,'generalSetting'])->name('generalSetting');
        Route::post('general',[cmsController::class,'saveSetting'])->name('saveSetting');
        Route::post('update-general',[cmsController::class,'updateSetting'])->name('updateSetting');
        //Services Packages Routes
        // Route::get('services',[PackageController::class,'services'])->name('services');
        // Route::post('add-services',[PackageController::class,'addServices'])->name('addServices');
        // Route::get('delete-services/{id}',[PackageController::class,'deleteServices'])->name('deleteServices');
        // Route::post('update-services',[PackageController::class,'updateServices'])->name('updateServices');
        //Packages Routes
        Route::get('packages',[PackageController::class,'packages'])->name('packages');
        Route::get('packages-list',[PackageController::class,'packagesList'])->name('packagesList');
        Route::get('packages-update/{id}',[PackageController::class,'packagesUpdate'])->name('packagesUpdate');
        Route::post('add-packages',[PackageController::class,'addPackages'])->name('addPackages');
        Route::post('update-packages',[PackageController::class,'updatePackages'])->name('updatePackages');
        Route::get('delete-packages/{id}',[PackageController::class,'deletepackages'])->name('deletepackages');
        // Features Route 
        Route::get('features',[FeaturesController::class,'features'])->name('features');
        Route::post('features',[FeaturesController::class,'saveFeatures'])->name('saveFeatures');
        Route::post('update-features',[FeaturesController::class,'updateFeatures'])->name('updateFeatures');
        Route::get('features-delete/{id}',[FeaturesController::class,'deleteFeature'])->name('deleteFeature');
        // Features Trash List
        Route::get('features-trash-list',[FeaturesController::class,'featuresTrashList'])->name('featuresTrashList');
        Route::get('features-force-delete/{id}',[FeaturesController::class,'deleteForceFeature'])->name('deleteForceFeature');
        Route::get('features-restore/{id}',[FeaturesController::class,'featuresRestore'])->name('featuresRestore');
        //Featrues List According to filteration
        Route::get('featuresFilter/{key}',[FeaturesController::class,'featuresFilter'])->name('featuresFilter');
    });
    //login
    Route::get('login',[authController::class,'loginPage'])->name('loginPage')->middleware('alreadyLogin');
    Route::post('login',[authController::Class,'login'])->name('superAdminlogin');
    Route::get('logout',[authController::class,'logout'])->name('adminlogout');
    //login routes End here
    
    // ajax location master routes
     Route::get('getstate/{id}',[PackageController::class,'getstate']);
    Route::get('getcity/{id}',[PackageController::class,'getcity']);
    
});

//routes for site vendor
Route::get('/login',[authController::class,'loginPage'])->middleware('alreadyLogin')->name('vendorLogin');
Route::get('/register',[authController::class,'Register'])->middleware('alreadyLogin')->name('registerPage');
Route::post('/register',[usersController::class,'addUser'])->middleware('alreadyLogin')->name('register');
Route::prefix('vendor')->middleware(['vendorAuth'])->group(function (){
    Route::get('vendor',[vendorController::class,'vendor'])->name('vendor');   
    Route::get('dashboard',[pagesController::class,'dashboard'])->name('vendorDashboard'); 
    // Brand Products
    Route::get('vendor-products-brand',[vendorController::class,'productsBrand'])->name('productsBrand');
    Route::post('vendor-products-brand',[vendorController::class,'addProductsBrand'])->name('addProductsBrand');
    Route::post('update-vendor-products-brand',[vendorController::class,'updateProductsBrand'])->name('updateProductsBrand');
    Route::get('delete-vendor-products-brand/{id}',[vendorController::class,'deleteProductsBrand'])->name('deleteProductsBrand');
    //category Routes
    Route::get('vendor-category',[vendorController::class,'vendorCategory'])->name('vendorCategory');
    Route::post('add-vendor-category',[vendorController::class,'addVendorCategory'])->name('addVendorCategory');
    Route::post('update-vendor-category',[vendorController::class,'updateVendorCategory'])->name('updateVendorCategory');
    Route::get('delete-vendor-category/{id}',[vendorController::class,'deleteVendorCategory'])->name('deleteVendorCategory');
    //Sub Category Routes
    Route::get('vendor-subcategory',[vendorController::class,'vendorSubCategory'])->name('vendorSubCategory');  
    Route::post('add-vendor-subcategory',[vendorController::class,'addVendorsubCategory'])->name('addVendorSubCategory'); 
    //Vendor Products
    Route::get('vendor-products',[vendorController::class,'vendorProducts'])->name('vendorProducts');
    Route::post('vendor-products',[vendorController::class,'addVendorProducts'])->name('addVendorProducts'); 
});
//routes for site Engineer
// Route::get('/login',[authController::class,'loginPage'])->middleware('alreadyLogin')->name('siteengineerLogin');
Route::prefix('siteEngineer')->middleware(['siteEngineerAuth'])->group(function (){
    Route::get('dashboard',[pagesController::class,'dashboard'])->name('siteEngineerDashboard');
    Route::get('siteEngineer',[siteEngineer::class,'siteEngineer'])->name('siteEngineer');
    Route::get('se-onBoard-list',[siteEngineer::class,'seOnBoardList'])->name('seOnBoardList'); 
    Route::post('se-update-onBoard-list',[siteEngineer::class,'updateStatus'])->name('seUpdateStatus'); 
    //onBoardList  
});
//routes for supportAuth 
// Route::get('/login',[authController::class,'loginPage'])->middleware('alreadyLogin')->name('helpDeskLogin');
Route::prefix('helpdesk')->middleware(['supportAuth'])->group(function(){
    Route::get('dashboard',[pagesController::class,'dashboard'])->name('helpDeskDashboard');
    Route::get('support',[helpDeskController::class,'helpDesk'])->name('helpDesk'); 
    // raisedticket
    Route::get('raise-ticket',[ticketController::class,'raiseTicket'])->name('hepldeskraiseTicket');
    Route::get('assigned-tickets',[ticketController::class,'assignedTickets'])->name('hepldeskrassignedTickets');
    Route::post('raise-ticket',[ticketController::class,'addTicket'])->name('hepldeskaddTicket');
    Route::post('assign-ticket',[ticketController::class,'assignTicket'])->name('hepldeskAssignTicket');
    Route::get('delete-raise-ticket/{id}',[ticketController::class,'deleteTicket'])->name('hepldeskdeleteTicket');  
    Route::get('filter-ticket-priority',[ticketController::class,'ticketPriority'])->name('helpDeskticketPriority'); 
});
//Routes for Owner
// Route::get('/login',[authController::class,'loginPage'])->middleware('alreadyLogin')->name('ownerLogin');
// ticket Ajax routes
//this fetchservices routes fetch departements i changed this according to requirments
Route::get('fetch-services/{id}',[ticketController::class,'fetchDepartMents'])->name('fetchDepartMents');
//fetch serviices routes end here
Route::get('verify-ownerID/{id}',[ticketController::class,'verifyOwnerID'])->name('VerifycustomberID');
Route::get('v-ownerID/{id}',[ticketController::class,'vOwnerID'])->name('VcustomberID');
Route::get('vv-ownerID/{id}',[ticketController::class,'vvOwnerID'])->name('VvcustomberID');
Route::get('aj-unit/{id}',[ticketController::class,'ajUnitID']);
Route::get('paj-unit/{id}',[ticketController::class,'pajUnitID']);
Route::get('sub-paj-unit/{id}',[ticketController::class,'subPajUnitID']);
Route::get('sub-suervices/{id}',[ticketController::class,'subServices']);
//ticket End Here
Route::prefix('owner')->middleware(['ownerAuth'])->group(function () {
    Route::get('dashboard',[pagesController::class,'dashboard'])->name('ownerDashboard');
    Route::get('propertylist',[ownerController::class,'propertyList'])->name('propertyList');
    Route::get('addpropertylist',[ownerController::class,'addproperty'])->name('addProperty');
    Route::post('addpropertylist',[propertyController::class,'addPropertiesOnBoard'])->name('saveProperty');
    Route::get('updateproperty/{id}',[ownerController::class,'updateproperty'])->name('updateProperty');
    Route::post('updateproperty/{id}',[propertyController::class,'updateOnBoard'])->name('updatePropertyDetails');
    Route::get('deleteproperty/{id}',[propertyController::class,'deletePropertyOnBoard'])->name('deleteProperty');
    //ajax routes
    Route::get('featuresbycategories/{id}',[propertyController::class,'featuresByCategories']);
    Route::get('proputlfeatures/{id}',[propertyController::class,'proputlFeatures']);
    Route::get('indoorcatfeatures/{id}',[propertyController::class,'indoorcatFeatures']);
    //ajax update routes
    Route::get('featuresbycategoriess/{id}',[propertyController::class,'featuresByCategoriess']);
    Route::get('proputlfeaturess/{id}',[propertyController::class,'proputlFeaturess']);
    Route::get('indoorcatfeaturess/{id}',[propertyController::class,'indoorcatFeaturess']);
    //Property Feature List Routes
    Route::post('featurelist',[propertyController::class,'addFeatureList'])->name('owneraddFeatureList');
    //Property Outdoor List Routes
    Route::post('property-outdoor',[propertyController::class,'addPropertyOutdoor'])->name('owneraddPropertyOutdoor');
    //Property Indoor List Routes
    Route::post('property-indoor',[propertyController::class,'addPropertyIndoor'])->name('owneraddPropertyIndoor');
    //Expenses Routes
    Route::get('expenses',[ownerController::class,'expenses'])->name('ownerExpenses');
    Route::post('expenses',[ownerController::class,'addExpenses'])->name('addExpenses');
    Route::get('view-pdf/{id}',[ownerController::class,'viewPdf'])->name('viewPdf');
    Route::get('delete-expenses/{id}',[ownerController::class,'deleteExpenses'])->name('deleteExpenses');
    Route::post('update-expenses',[ownerController::class,'updateExpenses'])->name('updateExpenses');
    Route::get('filter-expenses',[ownerController::class,'filterExpenses'])->name('filterExpenses');
    // raised ticket
    Route::get('raise-ticket',[ticketController::class,'raiseTicket'])->name('raiseTicket');
    Route::post('raise-ticket',[ticketController::class,'addTicket'])->name('addTicket');
    Route::get('delete-raise-ticket/{id}',[ticketController::class,'deleteTicket'])->name('deleteTicket');
    Route::get('filter-ticket-priority',[ticketController::class,'ticketPriority'])->name('OwnerticketPriority');
    //Unit On Board
    Route::get('property-unit/{prop}',[propertyController::class,'propertyUnit'])->name('propertyUnit');
    Route::get('units',[propertyController::class,'unitOnBoard'])->name('unitOnBoard');
    Route::post('property-unit',[propertyController::class,'addPropertyUnit'])->name('addPropertyUnit');
    Route::get('update-property-unit/{id}',[propertyController::class,'updatePropertyUnit'])->name('updatePropertyUnit');
    Route::post('update-property-unit',[propertyController::class,'editPropertyUnit'])->name('editPropertyUnit');
    Route::get('delete-property-unit/{id}',[propertyController::class,'deletePropertyUnit'])->name('deletePropertyUnit');
    Route::get('sub-units',[propertyController::class,'subUnitOnBoard'])->name('subUnitOnBoard');
    Route::get('sub-unit/{ppid}',[propertyController::class,'subUnitsOnBoard'])->name('subUnitsOnBoard');
    Route::post('sub-units',[propertyController::class,'addSubUnitOnBoard'])->name('addSubUnitOnBoard');
    Route::get('delete-sub-unit/{id}',[propertyController::class,'deleteSubUnitsOnBoard'])->name('deleteSubUnitsOnBoard');
    //update Sub Units
    Route::get('update-sub-units/{id}/{ppid}',[propertyController::class,'updateSubUnitOnBoard'])->name('updateSubUnitOnBoard');
    Route::post('update-sub-units/',[propertyController::class,'editSubUnitOnBoard'])->name('editSubUnitOnBoard');
    // Unit on board end here
    // Assign to units & property to user
    Route::get('assign-property',[ownerController::class,'assignProperty'])->name('assignProperty');
});
//superVisor  Routes
// Route::get('/login',[authController::class,'loginPage'])->middleware('alreadyLogin')->name('superVisorLogin');
Route::prefix('superVisor')->middleware(['superVisorAuth'])->group(function(){
    Route::get('dashboard',[pagesController::class,'dashboard'])->name('superVisorDashboard');
    Route::get('assigned-tickets',[superVisorController::class,'assignedTicket'])->name('assignedTicket');
    Route::post('accept-tickets',[superVisorController::class,'acceptTicket'])->name('acceptTicket');
});
//Routes for housekeeper
// Route::get('/login',[authController::class,'loginPage'])->middleware('alreadyLogin')->name('housekeeperLogin');
Route::prefix('housekeeper')->middleware(['housekeeperAuth'])->group(function () {
    Route::get('dashboard',[pagesController::class,'dashboard'])->name('housekeeperDashboard');
});
Route::get('check-status',[authController::class,'checkStatus']);

 