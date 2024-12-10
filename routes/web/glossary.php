<?php

use App\Http\Controllers\web\Glossary\BankController;
use App\Http\Controllers\web\Glossary\CalendarGeneratorRuleController;
use App\Http\Controllers\web\Glossary\ContractController;
use App\Http\Controllers\web\Glossary\DivisionController;
use App\Http\Controllers\web\Glossary\EventController;
use App\Http\Controllers\web\Glossary\PaymentController;
use App\Http\Controllers\web\GlossaryController;
use Illuminate\Support\Facades\Route;

Route::prefix('/glossary')->middleware(['auth', 'administration'])->group(function () {
    Route::get('/index', [GlossaryController::class, 'index'])->name('glossary.index');

    Route::prefix('/bank')->controller(BankController::class)->group(function () {
        Route::get('/index', 'index')->name('glossary.bank.index');
        Route::get('/create', 'create')->name('glossary.bank.create');
        Route::post('/store', 'store')->name('glossary.bank.store');
        Route::prefix('/{bank}')->group(function () {
            Route::get('/edit', 'edit')->name('glossary.bank.edit');
            Route::put('/update', 'update')->name('glossary.bank.update');
            Route::get('/delete', 'delete')->name('glossary.bank.delete');
        });
    });

    Route::prefix('bank/{bank}/contract')->controller(ContractController::class)->group(function () {
        Route::get('/index', 'index')->name('glossary.contract.index');
        Route::get('/create', 'create')->name('glossary.contract.create');
        Route::post('/store', 'store')->name('glossary.contract.store');
        Route::prefix('/{contract}')->group(function () {
            Route::get('/edit', 'edit')->name('glossary.contract.edit');
            Route::put('/update', 'update')->name('glossary.contract.update');
            Route::get('/delete', 'delete')->name('glossary.contract.delete');
        });
    });

    Route::prefix('/division')->controller(DivisionController::class)->group(function () {
        Route::get('/index', 'index')->name('glossary.division.index');
        Route::get('/create', 'create')->name('glossary.division.create');
        Route::post('/store', 'store')->name('glossary.division.store');
        Route::prefix('/{division}')->group(function () {
            Route::get('/edit', 'edit')->name('glossary.division.edit');
            Route::put('/update', 'update')->name('glossary.division.update');
            Route::get('/delete', 'delete')->name('glossary.division.delete');
        });
    });

    Route::prefix('/payment')->controller(PaymentController::class)->group(function () {
        Route::get('/index', 'index')->name('glossary.payment.index');
        Route::get('/create', 'create')->name('glossary.payment.create');
        Route::post('/store', 'store')->name('glossary.payment.store');
        Route::prefix('/{payment}')->group(function () {
            Route::get('/edit', 'edit')->name('glossary.payment.edit');
            Route::put('/update', 'update')->name('glossary.payment.update');
            Route::get('/delete', 'delete')->name('glossary.payment.delete');
        });
    });

    Route::prefix('generator/rule')->controller(CalendarGeneratorRuleController::class)->group(function () {
        Route::get('/index', 'index')->name('glossary.generator.rule.index');
        Route::get('/create', 'create')->name('glossary.generator.rule.create');
        Route::post('/store', 'store')->name('glossary.generator.rule.store');
        Route::prefix('/{rule}')->group(function () {
            Route::get('/edit', 'edit')->name('glossary.generator.rule.edit');
            Route::put('/update', 'update')->name('glossary.generator.rule.update');
            Route::get('/delete', 'delete')->name('glossary.generator.rule.delete');
        });
    });

    Route::prefix('/event')->controller(EventController::class)->group(function () {
        Route::get('/index', 'index')->name('glossary.event.index');
        Route::get('/create', 'create')->name('glossary.event.create');
        Route::post('/store', 'store')->name('glossary.event.store');
        Route::prefix('/{event}')->group(function () {
            Route::get('/open', 'open')->name('glossary.event.open');
            Route::get('/close', 'close')->name('glossary.event.close');
            Route::get('/edit', 'edit')->name('glossary.event.edit');
            Route::put('/update', 'update')->name('glossary.event.update');
            Route::get('/delete', 'delete')->name('glossary.event.delete');
        });
    });
});
