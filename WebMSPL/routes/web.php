<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CompanyMilestoneController as AdminCompanyMilestoneController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PageContentController as AdminPageContentController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/layanan', [PageController::class, 'services'])->name('services');
Route::get('/layanan/{slug}', [PageController::class, 'serviceDetail'])->name('service.detail');
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::post('/berita/langganan', [NewsController::class, 'subscribe'])->name('news.subscribe');
Route::get('/hubungi-kami', [PageController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact.store');
Route::get('/kebijakan-privasi', fn() => view('privacy-policy'))->name('privacy');


Route::get('/admin/login', function () {
    return view('admin.login');
})->middleware(['guest', 'throttle:5,1'])->name('admin.login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', fn() => redirect()->route('admin.dashboard'))->name('index');
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('services', AdminServiceController::class);
    Route::post('services/{service}/reorder', [AdminServiceController::class, 'reorder'])->name('services.reorder');
    Route::resource('team-members', AdminTeamMemberController::class);
    Route::resource('milestones', AdminCompanyMilestoneController::class);
    Route::get('page-content', [AdminPageContentController::class, 'index'])->name('page-content.index');
    Route::get('page-content/{page}/edit', [AdminPageContentController::class, 'edit'])->name('page-content.edit');
    Route::put('page-content/{page}', [AdminPageContentController::class, 'update'])->name('page-content.update');
    Route::resource('messages', AdminContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('messages/{message}/read', [AdminContactMessageController::class, 'markAsRead'])->name('messages.read');
    Route::post('messages/{message}/reply', [AdminContactMessageController::class, 'reply'])->name('messages.reply');
    Route::middleware('admin-only')->group(function () {
        Route::resource('users', AdminUserController::class);
        Route::get('company-settings', [\App\Http\Controllers\Admin\CompanySettingsController::class, 'index'])->name('company-settings.index');
        Route::put('company-settings', [\App\Http\Controllers\Admin\CompanySettingsController::class, 'update'])->name('company-settings.update');
    });
    Route::post('upload-image', function (\Illuminate\Http\Request $request) {
        $request->validate(['file' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:5120']);
        $name = \App\Helpers\ImageHelper::saveAsWebP($request->file('file'), public_path('images'));
        return response()->json(['path' => 'images/' . $name, 'basename' => $name]);
    })->name('upload-image');
});


require __DIR__.'/auth.php';
