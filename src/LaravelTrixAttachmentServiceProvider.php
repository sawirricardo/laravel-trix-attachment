<?php

namespace Sawirricardo\LaravelTrixAttachment;

use Illuminate\Support\Facades\Route;
use Sawirricardo\LaravelTrixAttachment\Http\Controllers\LaravelTrixAttachmentController;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelTrixAttachmentServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-trix-attachment')
            ->hasConfigFile();
    }

    public function bootingPackage()
    {
        Route::prefix(config('trix-attachment.url'))
            ->name('trix-attachment.')
            ->middleware(config('trix-attachment.middleware'))
            ->group(function () {
                Route::post('/', [LaravelTrixAttachmentController::class, 'store'])
                    ->name('store');
                Route::delete('/', [LaravelTrixAttachmentController::class, 'destroy'])
                    ->name('destroy');
            });
    }
}
