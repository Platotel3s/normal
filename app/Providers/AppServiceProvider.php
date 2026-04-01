<?php

namespace App\Providers;

use App\Models\Buku;
use App\Models\Genre;
use App\Models\Penerbit;
use App\Models\Tahun;
use App\Policies\PolicyBuku;
use App\Policies\PolicyGenre;
use App\Policies\PublisherPolicy;
use App\Policies\YearsPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }
    public function boot(): void
    {
        Gate::policy(Buku::class,PolicyBuku::class);
        Gate::policy(Genre::class,PolicyGenre::class);
        Gate::policy(Penerbit::class,PublisherPolicy::class);
        Gate::policy(Tahun::class,YearsPolicy::class);
    }
}
