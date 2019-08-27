<?php

namespace LaravelFrontendPresets\InertiaJsBootstrapVuePreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset;
use Illuminate\Support\Arr;

class InertiaJsBootstrapVuePreset extends Preset
{
    public static function install($withAuth = false)
    {
        static::updatePackages();
        static::updateBootstrapping();
        static::updateWelcomePage();
        static::updateGitignore();
        static::scaffoldComponents();
        static::scaffoldRoutes();
        static::removeNodeModules();

        if ($withAuth) {
            static::scaffoldAuth();
        }
    }

    protected static function updatePackageArray(array $packages)
    {
        return array_merge([
            '@babel/plugin-syntax-dynamic-import' => '^7.2.0',
            '@inertiajs/inertia' => '^0.1.0',
            '@inertiajs/inertia-vue' => '^0.1.0',
            'bootstrap-vue' => '^2.0.0-rc.28',
            'vue-template-compiler' => '^2.6.10',
        ], $packages);
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/inertiajs-bootstrapvue-stubs/webpack.mix.js', base_path('webpack.mix.js'));

        copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/app.js', resource_path('js/app.js'));

        copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/sass/app.scss', resource_path('sass/app.scss'));
        copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/sass/_nprogress.scss', resource_path('sass/_nprogress.scss'));
    }

    protected static function updateWelcomePage()
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));

        copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/views/app.blade.php', resource_path('views/app.blade.php'));
    }

    protected static function updateGitignore()
    {
        file_put_contents(
            base_path('.gitignore'),
            file_get_contents(__DIR__.'/inertiajs-bootstrapvue-stubs/gitignore'),
            FILE_APPEND
        );
    }

    protected static function scaffoldComponents()
    {
        tap(new Filesystem, function (Filesystem $fs) {
            $fs->deleteDirectory(resource_path('js/components'));

            copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/Pages/Welcome.vue', resource_path('js/Pages/Welcome.vue'));
            copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/Shared/Layout.vue', resource_path('js/Shared/Layout.vue'));
            copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/Shared/NavBar.vue', resource_path('js/Shared/NavBar.vue'));
        });
    }

    protected static function scaffoldAuth()
    {
        tap(new Filesystem, function (Filesystem $fs) {
            $fs->copyDirectory(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/Pages/Auth', resource_path('js/Pages/Auth'));

            copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/Shared/NavBarWithAuth.vue', resource_path('js/Shared/NavBar.vue'));
            copy(__DIR__.'/inertiajs-bootstrapvue-stubs/resources/js/mixins/FormMixin.js', resource_path('js/mixins/FormMixin.js'));
        });
    }

    protected static function scaffoldRoutes()
    {
        copy(__DIR__.'/inertiajs-bootstrapvue-stubs/routes/web.php', base_path('routes/web.php'));
    }
}
