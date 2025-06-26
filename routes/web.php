    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\BukuController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AuthorController;
    use App\Http\Controllers\YearsController;
    use App\Http\Controllers\PublisherController;
    use App\Http\Controllers\GenreController;
    use App\Http\Controllers\DashboardController;

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/test',function(){
        return view('test');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/daftarBuku', [BukuController::class,'index'])->name('daftar.buku');
        Route::get('/buku/{id}/edit',[BukuController::class,'edit'])->name('edit.buku');
        Route::delete('/buku/{id}',[BukuController::class,'destroy'])->name('hapus.buku');
        Route::get('/buku/create',[BukuController::class,'create'])->name('create.buku');
        Route::post('/buku/store',[BukuController::class,'store'])->name('store.buku');
        Route::put('/buku/{id}/update',[BukuController::class,'update'])->name('update.buku');

        Route::get('/daftarPenulis', [AuthorController::class,'index'])->name('daftar.author');
        Route::get('/author/{id}/edit', [AuthorController::class,'edit'])->name('edit.author');
        Route::delete('/author/{id}',[AuthorController::class,'destroy'])->name('hapus.author');
        Route::get('/author/create', [AuthorController::class,'create'])->name('create.author');
        Route::post('/author/store',[AuthorController::class,'store'])->name('store.author');
        Route::put('/author/{id}/update',[AuthorController::class,'update'])->name('update.author');

        Route::get('/daftarTahun',[YearsController::class,'index'])->name('daftar.years');
        Route::get('/tahun/{id}/edit',[YearsController::class,'edit'])->name('edit.years');
        Route::delete('/tahun/{id}',[YearsController::class,'destroy'])->name('hapus.years');
        Route::get('/tahun/create',[YearsController::class,'create'])->name('create.years');
        Route::post('/tahun/post',[YearsController::class,'store'])->name('store.years');
        Route::put('/tahun/{id}/update',[YearsController::class,'update'])->name('update.years');

        Route::get('/daftarPenerbit',[PublisherController::class,'index'])->name('daftar.penerbit');
        Route::get('/penerbit/{id}/edit',[PublisherController::class,'edit'])->name('edit.penerbit');
        Route::delete('/penerbit/{id}',[PublisherController::class,'destroy'])->name('hapus.penerbit');
        Route::get('/penerbit/create',[PublisherController::class,'create'])->name('create.penerbit');
        Route::post('/penerbit/post',[PublisherController::class,'store'])->name('store.penerbit');
        Route::put('/penerbit/{id}/update',[PublisherController::class,'update'])->name('update.penerbit');

        Route::get('/daftarGenre',[GenreController::class,'index'])->name('daftar.genre');
        Route::get('/genre/{id}/edit',[GenreController::class,'edit'])->name('edit.genre');
        Route::delete('/genre/{id}',[GenreController::class,'destroy'])->name('hapus.genre');
        Route::get('/genre/create',[GenreController::class,'create'])->name('create.genre');
        Route::post('/genre/post',[GenreController::class,'store'])->name('store.genre');
        Route::put('/genre/{id}/update',[GenreController::class,'update'])->name('update.genre');

        Route::get('/dashboard',[DashboardController::class,'statistik'])->name('statistik.dashboard');
    });



    Route::get('/regisPage',[AuthController::class,'halamanRegis'])->name('register.page');
    Route::post('/regis',[AuthController::class,'register'])->name('register');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::get('/loginPage',[AuthController::class,'halamanLogin'])->name('login.page');

