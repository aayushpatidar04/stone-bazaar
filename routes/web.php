<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use App\Models\Architect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Broadcast;

Route::get('/', [BasicController::class, 'index'])->name('index');
Route::get('/error-404', [BasicController::class, 'error404'])->name('error.404');
Route::get('test-view', function(){
    return view('emails.admin_seller_registered');
});


Route::get('sellers', [BasicController::class, 'sellers'])->name('sellers');
Route::get('seller-details/{id}', [BasicController::class, 'seller'])->name('seller');
Route::get('seller-gallery/{id}', [BasicController::class, 'sellerGallery'])->name('seller-gallery');
Route::get('seller/{id}/products', [BasicController::class, 'sellerProducts'])->name('seller-products');
Route::get('download-catalogue/{id}', [BasicController::class, 'downloadCatalogue'])->name('download-product-catalogue');
Route::post('save-seller-enquiry', [BasicController::class, 'saveSellerEnquiry'])->name('save-seller-enquiry');
Route::get('product-details/{id}', [BasicController::class, 'productDetails'])->name('product-details');
Route::post('save-product-enquiry', [BasicController::class, 'saveProductEnquiry'])->name('save-product-enquiry');

Route::get('architects', [BasicController::class, 'architects'])->name('architects');
Route::get('architect-details/{id}', [BasicController::class, 'architect'])->name('architect');
Route::get('architect-gallery/{id}', [BasicController::class, 'architectGallery'])->name('architect-gallery');
Route::get('architect-catalogue/{id}', [BasicController::class, 'architectCatalogue'])->name('architect-catalogue');
Route::post('save-architect-enquiry', [BasicController::class, 'saveArchitectEnquiry'])->name('save-architect-enquiry');

Route::get('contact', [BasicController::class, 'contact'])->name('contact');
Route::post('submit-contact-form', [BasicController::class, 'submitContactForm'])->name('submit-contact-form');

Route::get('pricing', [BasicController::class, 'plans'])->name('plans');

Auth::routes();
Route::group(['middleware' => ['auth']], function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/enquiries', [HomeController::class, 'enquiries'])->name('enquiries');
});


// ADMIN -------------------------------

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/sellers', [AdminController::class, 'sellers'])->name('admin.sellers');
    Route::get('/admin/sellers/{id}', [AdminController::class, 'showSeller'])->name('admin.seller.show');
    Route::post('/admin/sellers/{id}/verification', [AdminController::class, 'sellerVerification'])->name('admin.seller.verification');

    Route::get('/admin/architects', [AdminController::class, 'architects'])->name('admin.architects');
    Route::get('/admin/architects/{id}', [AdminController::class, 'showArchitect'])->name('admin.architect.show');
    Route::post('/admin/architects/{id}/verification', [AdminController::class, 'architectVerification'])->name('admin.architect.verification');

    Route::post('/admin/forward-seller-enquiry/{id}', [AdminController::class, 'forwardSellerEnquiry'])->name('admin.forward-seller-enquiry');
    Route::post('/admin/forward-product-enquiry/{id}', [AdminController::class, 'forwardProductEnquiry'])->name('admin.forward-product-enquiry');
    Route::post('/admin/forward-architect-enquiry/{id}', [AdminController::class, 'forwardArchitectEnquiry'])->name('admin.forward-architect-enquiry');
    
    Route::get('/admin/queries', [AdminController::class, 'queries'])->name('admin.queries');
    Route::post('/admin/close-query/{id}', [AdminController::class, 'closeQuery'])->name('admin.close-query');
    Route::post('/admin/delete-query/{id}', [AdminController::class, 'deleteQuery'])->name('admin.delete-query');

    Route::get('/admin/plans', [AdminController::class, 'plans'])->name('admin.plans');
    Route::post('/admin/add-plan', [AdminController::class, 'addPlan'])->name('admin.addPlan');
});










// SELLER ------------------------------
Route::group(['middleware' => ['auth', 'role:Seller', 'seller.verified']], function () {
    Route::get('/seller/dashboard', [SellerController::class, 'index'])->name('seller.dashboard');

    Route::post('/seller/update-banner', [SellerController::class, 'updateBanner'])->name('seller.updateBanner');
    Route::post('/seller/update-logo', [SellerController::class, 'updateLogo'])->name('seller.updateLogo');
    Route::post('/seller/update-office-image', [SellerController::class, 'updateOfficeImage'])->name('seller.updateOfficeImage');
    Route::post('/seller/update-warehouse-image', [SellerController::class, 'updateWarehouseImage'])->name('seller.updateWarehouseImage');
    Route::post('/seller/update-about', [SellerController::class, 'updateAbout'])->name('seller.updateAbout');
    Route::post('/seller/update-description', [SellerController::class, 'updateDescription'])->name('seller.updateDescription');
    Route::post('/seller/add-awards', [SellerController::class, 'addAwards'])->name('seller.addAwards');
    Route::post('/seller/delete-award', [SellerController::class, 'deleteAward'])->name('seller.deleteAward');
    Route::post('/seller/add-certificates', [SellerController::class, 'addCertificates'])->name('seller.addCertificates');
    Route::post('/seller/delete-certificate', [SellerController::class, 'deleteCertificate'])->name('seller.deleteCertificate');
    Route::post('/seller/upload-gallery', [SellerController::class, 'uploadGallery'])->name('seller.uploadGallery');
    Route::get('/seller/gallery', [SellerController::class, 'gallery'])->name('seller.gallery');
    Route::post('seller/delete-gallery/{id}', [SellerController::class, 'deleteGallery'])->name('seller.deleteGallery');


    Route::get('/seller/products', [SellerController::class, 'products'])->name('seller.products');
    Route::get('/seller/products/{domain}', [SellerController::class, 'products'])->name('seller.products.domain'); 
    Route::get('/seller/products/{domain}/{subcategory}', [SellerController::class, 'products'])->name('seller.products.subcategory');
    Route::post('/seller/update-domain', [SellerController::class, 'updateDomain'])->name('seller.update-domain');
    Route::post('/seller/add-subcategory', [SellerController::class, 'addSubCategory'])->name('seller.addSubcategory');
    Route::post('/seller/add-product', [SellerController::class, 'addProduct'])->name('seller.addProduct');
    // other seller routes...

    Route::post('/seller/close-seller-enquiry/{id}', [SellerController::class, 'closeSellerEnquiry'])->name('seller.close-seller-enquiry');
    Route::post('/seller/close-product-enquiry/{id}', [SellerController::class, 'closeProductEnquiry'])->name('seller.close-product-enquiry');
});

Route::get('/seller/verification-status', [SellerController::class, 'verificationStatus'])->name('seller.verification-status')->middleware('auth', 'role:Seller');

// ARCHITECT ------------------------------
Route::group(['middleware' => ['auth', 'role:Architect', 'architect.verified']], function () {
    Route::get('/architect/dashboard', [ArchitectController::class, 'index'])->name('architect.dashboard');

    Route::post('/architect/update-banner', [ArchitectController::class, 'updateBanner'])->name('architect.updateBanner');
    Route::post('/architect/update-logo', [ArchitectController::class, 'updateLogo'])->name('architect.updateLogo');
    Route::post('/architect/update-about-image', [ArchitectController::class, 'updateAboutImage'])->name('architect.updateAboutImage');
    Route::post('/architect/update-about', [ArchitectController::class, 'updateAbout'])->name('architect.updateAbout');
    Route::post('/architect/update-description', [ArchitectController::class, 'updateDescription'])->name('architect.updateDescription');
    Route::post('/architect/add-awards', [ArchitectController::class, 'addAwards'])->name('architect.addAwards');
    Route::post('/architect/delete-award', [ArchitectController::class, 'deleteAward'])->name('architect.deleteAward');
    Route::post('/architect/add-certificates', [ArchitectController::class, 'addCertificates'])->name('architect.addCertificates');
    Route::post('/architect/delete-certificate', [ArchitectController::class, 'deleteCertificate'])->name('architect.deleteCertificate');
    Route::post('/architect/upload-gallery', [ArchitectController::class, 'uploadGallery'])->name('architect.uploadGallery');
    Route::get('/architect/gallery', [ArchitectController::class, 'gallery'])->name('architect.gallery');
    Route::post('architect/delete-gallery/{id}', [ArchitectController::class, 'deleteGallery'])->name('architect.deleteGallery');

    Route::post('/architect/close-architect-enquiry/{id}', [ArchitectController::class, 'closeArchitectEnquiry'])->name('architect.close-architect-enquiry');
});

Route::get('/architect/verification-status', [ArchitectController::class, 'verificationStatus'])->name('architect.verification-status')->middleware('auth', 'role:Architect');