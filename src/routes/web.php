<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExpenceController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\Caster\LinkStub;


/* Auth Routes */
Route::controller(AuthController::class, )->middleware('guest')->group(function () {

    Route::get('/', "index")->name("login");
    Route::get('/login', "index")->name("loginView");
    Route::get('/signe', "signeView")->name("signeView");
    Route::post('/signe', "signe")->name("signe");
    Route::post('/login', "login")->name("loginCon");
    Route::post('/logout', "logout")->name("logout")->withoutMiddleware('guest')->middleware(['auth', 'is_banned']);


});


/* Admin Routes */
Route::prefix('/admin')->controller(AdminController::class)->as("admin.")->middleware(['auth' , 'is_banned', 'role:admin'])->group(function () {
    Route::get('/', 'index')->name("index");
    Route::put('/banne/{user}', 'banne')->name("banne");
    Route::put('/unbanne/{user}', 'unbanne')->name("unbanne");
});


/* Colocation Routes */
Route::prefix('/colocation')->controller(ColocationController::class)->as("colocation.")->middleware(['auth', 'is_banned'])->group(function () {

    Route::get('/', "index")->name("index");
    Route::post("/", "add")->name("add");

    Route::prefix("/{colocation}")->group(function () {
        Route::put("/anuller", "anuller")->name("anuller")->middleware('member_ship_role:owner');
        Route::get('/', 'show')->name("show");
        Route::resource('category', CategoryController::class)->middleware('member_ship_role:owner');
        Route::get("/invite", [InvitationController::class, 'index'])->name('invitation.invite')->middleware('member_ship_role:owner');
        Route::post("/envoyer", [InvitationController::class, 'envoyer'])->name('invitation.envoyer')->middleware('member_ship_role:owner');
        Route::get("/invitation/valid", [InvitationController::class, 'valid'])->name('invitation.valid');
        Route::get("/invitation/accepter", [InvitationController::class, 'accepter'])->name('invitation.accepter');
        Route::get("/invitation/refuser", [InvitationController::class, 'refuser'])->name('invitation.refuser');

        Route::get("/member", 'members')->name('members.index');
        Route::get("/member/quitter", 'quitter')->name('members.quitter')->middleware('member_ship_role:member');
        Route::get("/member/{member}/retirer", 'retirer')->name('members.retirer')->middleware('member_ship_role:owner');

        Route::post('/expence', [ExpenceController::class, "store"])->name("expence.store");
        Route::get('/expence/{expence}', [ExpenceController::class, "show"])->name("expence.show");
        Route::get('/expence/{expence}/edit', [ExpenceController::class, "edit"])->name("expence.edit");
        Route::put('/expence/{expence}', [ExpenceController::class, "update"])->name("expence.update");
    });

    Route::delete('/expence/{expence}', [ExpenceController::class, "destroy"])->name("expence.destroy");
    Route::put("/balance/{balance}", [BalanceController::class, "payed"])->name("balance.mark-payed");

});


Route::get("/invitation/invalid", [InvitationController::class, 'invalid'])->name('invitation.invalid');
Route::get("/invitation/{token}", [InvitationController::class, 'verify'])->name('invitation.verify');



