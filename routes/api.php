<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\FundingEntitiesController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(AppLanguageMiddelware::class)
    ->group(function () {
        Route::apiResource('opportunities', OpportunityController::class)->only(['index', 'show']);
        Route::get('opportunities_list', [OpportunityController::class, 'opportunitiesList']);
        Route::middleware('auth:api')
            ->group(function () {
                Route::apiResource('opportunities.activities', ActivityController::class)->only(['index']);
            });
        Route::get(
            'opportunity-attachments/{id}',
            [AttachmentController::class, 'opportunityAttachment']
        )->name('opportunityAttachment');
        Route::get(
            'opportunity-funding-entites/{opportunity}',
            [FundingEntitiesController::class, 'show']
        )->name('opportunityFundingEntites');

        Route::get(
            'main-hero',
            [HomePageController::class, 'show']
        )->name('main-hero');
        Route::get('footer', [HomePageController::class, 'footer'])->name('footer');
        Route::get('social-media', [HomePageController::class, 'socialMedia'])->name('social-media');
        Route::get('policies', [HomePageController::class, 'policies'])->name('policies');
        Route::get('terms', [HomePageController::class, 'terms'])->name('terms');

        Route::prefix('users')->group(function () {
            Route::post('register', [AuthController::class, 'store'])->middleware('throttle:3,1');
            Route::post('login', [AuthController::class, 'login'])->middleware('throttle:3,1');
            Route::post('forget-password', [PasswordController::class, 'forgetPassword'])->middleware('throttle:3,1');
            Route::post('send-opt', [PasswordController::class, 'verify']);
            Route::middleware('auth:sanctum')
                ->group(function () {
                    Route::post('verify', [OTPController::class, 'verify']);
                    Route::post('resend', [OTPController::class, 'resend'])->middleware('throttle:1,1');;
                    Route::put('complete-register', [AuthController::class, 'completeRegister']);
                    Route::put('reset-password', [PasswordController::class, 'resetPassword']);
                    Route::put('change-password', [PasswordController::class, 'changePassword']);
                    Route::post('logout', [AuthController::class, 'logout']);
                    Route::get('me', [ProfileController::class, 'show']);
                    Route::put('me', [ProfileController::class, 'update']);
                });
        });
        Route::get('countries', [CountryController::class, 'index']);
    });



