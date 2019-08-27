<?php

namespace LaravelFrontendPresets\InertiaJsBootstrapVuePreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class InertiaJsBootstrapVuePresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('inertiajs-bootstrapvue', function ($command) {
            $withAuth = $command->option('auth');

            InertiaJsBootstrapVuePreset::install($withAuth);

            $command->info('Inertia.js with BoostrapVue scaffolding installed successfully.');
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
