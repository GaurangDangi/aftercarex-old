<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\InstitutionMiddleware;

Route::get('/', function () {
    return redirect('home');
//return redirect('institution/login');
});

Auth::routes();
Route::get('institution/login', [App\Http\Controllers\Auth\InstitutionLoginController::class, 'showLoginForm'])->name('institution/login');
Route::post('institution/login', [App\Http\Controllers\Auth\InstitutionLoginController::class, 'login']);
Route::get('institution/verify_otp', [App\Http\Controllers\Auth\InstitutionLoginController::class, 'showOtpVerificationForm'])->name('institution/verify_otp');
Route::post('institution/verify_otp', [App\Http\Controllers\Auth\InstitutionLoginController::class, 'verifyOTP']);
Route::get('send_activation_mail', [App\Http\Controllers\SendActivationMailCron::class, 'index'])->name('send_activation_mail');
Route::get('send_deactivation_mail', [App\Http\Controllers\SendDeactivationMailCron::class, 'index'])->name('send_deactivation_mail');

Route::get('client/login', [App\Http\Controllers\Auth\ClientLoginController::class, 'clientLoginForm'])->name('client.login');
Route::post('client/login',[App\Http\Controllers\Auth\ClientLoginController::class, 'clientLoginSubmit'])->name('client.loginSubmit');
Route::get('client/verify_otp', [App\Http\Controllers\Auth\ClientLoginController::class, 'clientOtpForm'])->name('client.OtpForm');
Route::post('client/verify_otp',[App\Http\Controllers\Auth\ClientLoginController::class, 'clientOtpVerify'])->name('client.OtpVerify');

Route::middleware('auth:client')->group(function () {
    Route::controller('App\Http\Controllers\ClientDashboardController')->group(function () {
        Route::get('client/dashboard', 'index')->name('client.dashboard');
        Route::get('client/milestone', 'clientMilestone')->name('client.milestone');
        Route::get('client/resource-library', 'clientResourceLibrary')->name('client.ResourceLibrary');
        Route::get('client/live-group-classes', 'liveGroupClasses')->name('client.liveGroupClasses');
        Route::get('client/logout', 'logout')->name('client.logout');
    });
});

Route::get('speaker/login', [App\Http\Controllers\Auth\SpeakerLoginController::class, 'speakerLoginForm'])->name('speaker.login');
Route::post('speaker/login',[App\Http\Controllers\Auth\SpeakerLoginController::class, 'speakerLoginSubmit'])->name('speaker.loginSubmit');
Route::get('speaker/verify_otp', [App\Http\Controllers\Auth\SpeakerLoginController::class, 'speakerOtpForm'])->name('speaker.OtpForm');
Route::post('speaker/verify_otp',[App\Http\Controllers\Auth\SpeakerLoginController::class, 'speakerOtpVerify'])->name('speaker.OtpVerify');

Route::middleware('auth:speaker')->group(function () {
    Route::controller('App\Http\Controllers\speakerDashboardController')->group(function () {
        Route::get('speaker/dashboard', 'index')->name('speaker.dashboard');
        Route::get('speaker/logout', 'logout')->name('speaker.logout');
    });

    Route::controller('App\Http\Controllers\Admin\ClassSetupController')->group(function () {
        Route::get('speaker/class-setup', 'index')->name('speaker.classSetup');
        Route::get('speaker/class-setup/show', 'show')->name('speaker.getAllClassSetup');
        Route::get('speaker/class-setup/create', 'create')->name('speaker.addClassSetup');
        Route::post('speaker/class-setup/store', 'store')->name('speaker.storeClassSetup');
        Route::get('speaker/class-setup/edit/{id}', 'edit')->name('speaker.editClassSetup');
        Route::post('speaker/class-setup/update/{id}', 'update')->name('speaker.updateClassSetup');
        Route::get('speaker/class-setup/destroy/{id}', 'destroy')->name('speaker.destroyClassSetup');
    });
});

Route::middleware('auth:institution')->group(function () {
    Route::controller('App\Http\Controllers\DashboardController')->group(function () {
        Route::get('institution/dashboard', 'index')->name('institution.dashboard');
        Route::post('institution/stripe/token', 'stripe_token')->name('stripe.token');
    });
    Route::controller('App\Http\Controllers\Admin\ClientController')->group(function () {
        Route::get('institution/client', 'institutionIndex')->name('institution.client.index');
        Route::get('institution/client/show', 'show')->name('getAllInstitutionClient');
        Route::get('institution/client/create', 'create')->name('addInstitutionClient');
        Route::post('institution/client/store', 'store')->name('storeInstitutionClient');
        Route::get('institution/client/edit/{id}', 'edit')->name('editInstitutionClient');
        Route::post('institution/client/update/{id}', 'update')->name('updateInstitutionClient');
        Route::get('institution/client/destroy/{id}', 'destroy')->name('destroyInstitutionClient');
        Route::get('institution/client/renew-client/{id}', 'renew_client')->name('renewClient');
    });
    Route::controller('App\Http\Controllers\Auth\InstitutionLoginController')->group(function () {
        Route::get('institution/logout', 'logout')->name('institutionLogout');
    });
    Route::controller('App\Http\Controllers\Admin\ProfileController')->group(function () {
        Route::get('institution/profile', 'institutionProfile')->name('institutionProfile');
        Route::post('institution/profile/update/{id}', 'update')->name('updateProfile');
    });
    Route::controller('App\Http\Controllers\Admin\ReportsController')->group(function () {
        Route::get('institution/reports', 'index')->name('institution.reports');
        Route::post('institution/reports', 'getData')->name('institution.getData');
    });
});


// Route::middleware('guest')->group(function () {
//     Route::controller('App\Http\Controllers\Admin\Auth\AuthController')->group(function () {
//         Route::get('admin/login', 'index')->name('login');
//         Route::post('admin/login', 'login')->name('login');
//     });
// });

Route::middleware('auth')->group(function () {
    Route::controller('App\Http\Controllers\Admin\AdminController')->group(function () {
        Route::get('admin/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller('App\Http\Controllers\Admin\TemplateController')->group(function () {
        Route::get('admin/template', 'index')->name('template');
        Route::get('admin/template/show', 'show')->name('getAllTemplates');
        Route::get('admin/template/create', 'create')->name('addTemplate');
        Route::post('admin/template/store', 'store')->name('storeTemplate');
        Route::get('admin/template/edit/{id}', 'edit')->name('editTemplate');
        Route::post('admin/template/update/{id}', 'update')->name('updateTemplate');
        Route::get('admin/template/destroy/{id}', 'destroy')->name('destroyTemplate');
        Route::get('admin/template/getInactiveSequences/{type}', 'getInactiveSequences')->name('getInactiveSequences');
    });
    Route::controller('App\Http\Controllers\Admin\InstitutionController')->group(function () {
        Route::get('admin/institution', 'index')->name('institution');
        Route::get('admin/institution/show', 'show')->name('getAllInstitution');
        Route::get('admin/institution/create', 'create')->name('addInstitution');
        Route::post('admin/institution/store', 'store')->name('storeInstitution');
        Route::get('admin/institution/edit/{id}', 'edit')->name('editInstitution');
        Route::post('admin/institution/update/{id}', 'update')->name('updateInstitution');
        Route::get('admin/institution/destroy/{id}', 'destroy')->name('destroyInstitution');
    });
    Route::controller('App\Http\Controllers\Admin\ClientController')->group(function () {
        Route::get('admin/client', 'index')->name('client');
        Route::get('admin/client/show', 'show')->name('getAllClient');
        Route::get('admin/client/create', 'create')->name('addClient');
        Route::post('admin/client/store', 'store')->name('storeClient');
        Route::get('admin/client/edit/{id}', 'edit')->name('editClient');
        Route::post('admin/client/update/{id}', 'update')->name('updateClient');
        Route::get('admin/client/destroy/{id}', 'destroy')->name('destroyClient');
        Route::get('admin/client/renew-client/{id}', 'renew_client')->name('renewClient');
        Route::post('admin/client/progress-bar', 'progressBar')->name('client.progressBar');
    });
    Route::controller('App\Http\Controllers\Admin\ResourceLibraryController')->group(function () {
        Route::get('admin/resource-library', 'index')->name('resourceLibrary');
        Route::get('admin/resource-library/show', 'show')->name('getAllResourceLibrary');
        Route::get('admin/resource-library/create', 'create')->name('addResourceLibrary');
        Route::post('admin/resource-library/store', 'store')->name('storeResourceLibrary');
        Route::get('admin/resource-library/edit/{id}', 'edit')->name('editResourceLibrary');
        Route::post('admin/resource-library/update/{id}', 'update')->name('updateResourceLibrary');
        Route::get('admin/resource-library/destroy/{id}', 'destroy')->name('destroyResourceLibrary');
    });
    Route::controller('App\Http\Controllers\Admin\SpeakerController')->group(function () {
        Route::get('admin/speaker', 'index')->name('speaker');
        Route::get('admin/speaker/show', 'show')->name('getAllSpeaker');
        Route::get('admin/speaker/create', 'create')->name('addSpeaker');
        Route::post('admin/speaker/store', 'store')->name('storeSpeaker');
        Route::get('admin/speaker/edit/{id}', 'edit')->name('editSpeaker');
        Route::post('admin/speaker/update/{id}', 'update')->name('updateSpeaker');
        Route::get('admin/speaker/destroy/{id}', 'destroy')->name('destroySpeaker');
    });
    Route::controller('App\Http\Controllers\Admin\ClassSetupController')->group(function () {
        Route::get('admin/class-setup', 'index')->name('classSetup');
        Route::get('admin/class-setup/show', 'show')->name('getAllClassSetup');
        Route::get('admin/class-setup/create', 'create')->name('addClassSetup');
        Route::post('admin/class-setup/store', 'store')->name('storeClassSetup');
        Route::get('admin/class-setup/edit/{id}', 'edit')->name('editClassSetup');
        Route::post('admin/class-setup/update/{id}', 'update')->name('updateClassSetup');
        Route::get('admin/class-setup/destroy/{id}', 'destroy')->name('destroyClassSetup');
    });
    Route::controller('App\Http\Controllers\Admin\MilestoneController')->group(function () {
        Route::get('admin/milestone', 'index')->name('milestone');
        Route::get('admin/milestone/show', 'show')->name('getAllMilestone');
        Route::get('admin/milestone/create', 'create')->name('addMilestone');
        Route::post('admin/milestone/store', 'store')->name('storeMilestone');
        Route::get('admin/milestone/edit/{id}', 'edit')->name('editMilestone');
        Route::post('admin/milestone/update/{id}', 'update')->name('updateMilestone');
        Route::get('admin/milestone/destroy/{id}', 'destroy')->name('destroyMilestone');
    });
    Route::controller('App\Http\Controllers\Admin\SobrietyController')->group(function () {
        Route::get('admin/sobriety', 'index')->name('sobriety');
        Route::get('admin/sobriety/show', 'show')->name('getAllSobriety');
        Route::get('admin/sobriety/create', 'create')->name('addSobriety');
        Route::post('admin/sobriety/store', 'store')->name('storeSobriety');
        Route::get('admin/sobriety/edit/{id}', 'edit')->name('editSobriety');
        Route::post('admin/sobriety/update/{id}', 'update')->name('updateSobriety');
        Route::get('admin/sobriety/destroy/{id}', 'destroy')->name('destroySobriety');
        Route::get('admin/sobriety/view/{id}', 'showLists')->name('showListsSobriety');
    });
    Route::controller('App\Http\Controllers\Admin\ProfileController')->group(function () {
        Route::get('admin/profile', 'adminProfile')->name('adminProfile');
        Route::post('admin/profile/update/{id}', 'updateAdminProfile')->name('updateAdminProfile');
        Route::get('admin/password', 'password')->name('password');
        Route::post('admin/changePassword/{id}', 'changePassword')->name('changePassword');
    });

    Route::controller('App\Http\Controllers\Admin\ReportsController')->group(function () {
        Route::get('admin/reports', 'index')->name('admin.reports');
        Route::post('admin/reports', 'getData')->name('admin.getData');
    });
    Route::controller('App\Http\Controllers\Auth\LoginController')->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });
});


Route::controller('App\Http\Controllers\PageController')->group(function () {
    Route::get('/{any}', 'static_pages');
});

Route::fallback(function () {
    return view('frontend.pages.404');
});
