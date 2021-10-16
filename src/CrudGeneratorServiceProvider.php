<?php

namespace CrudGenerator;

use Illuminate\Support\ServiceProvider;
use Form;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {        
        $this->commands(['CrudGenerator\Console\Commands\CrudGeneratorCommand']);
    }

    public function boot()
    {
        \Route::get('/testcrudgenerator', function () { echo 'CrudGeneratorServiceProvider: OK'; });
        $this->loadViewsFrom(__DIR__.'/views', 'crudgenerator');

        $this->publishes([
	        __DIR__.'/Templates' => base_path('resources/templates'),
	    ]);
        
       Form::component('bsText', 'crudgenerator::components.form.text', ['name', 'value' => null, 'attributes' => []]);
       // Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
       // Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
       // Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);

    }


}