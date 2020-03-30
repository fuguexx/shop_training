<?php

namespace App\Providers;

use App\Models\admin\AdminUser;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Policies\AdminUserPolicy;
use App\Policies\ProductCategoryPolicy;
use App\Policies\ProductReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        AdminUser::class => AdminUserPolicy::class,
        ProductCategory::class => ProductCategoryPolicy::class,
        ProductReview::class => ProductReviewPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
