<?php

use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->as('admin.')


    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        
        Route::prefix('Catalogues')
            ->as('catalogues.')
            ->group(function () {
                Route::get('/',               [CatalogueController::class, 'index'])->name('index'); // khi đã đặt name thì đừng dẫn dừng như không còn quan tọng nữa mà phải phụ thuộc vào name
                Route::get('create',          [CatalogueController::class, 'create'])->name('create');
                Route::post('store',          [CatalogueController::class, 'store'])->name('store');
                Route::get('show/{id}',       [CatalogueController::class, 'show'])->name('show');
                Route::get('{id}/edit',       [CatalogueController::class, 'edit'])->name('edit');
                Route::put('{id}/update',     [CatalogueController::class, 'update'])->name('update');
                Route::get('{id}/destroy',    [CatalogueController::class, 'destroy'])->name('destroy');
            });

            Route::resource('products', ProductController::class);
    });