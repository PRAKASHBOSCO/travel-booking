<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 5/12/2020
 * Time: 11:33 PM
 */
$namespace = 'App\Plugins\PageBuilder\Controllers';

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web', 'auth', 'locale'],
], function () {
    Route::get('builder', 'BuilderController@getBuilderPage')->name('builder');
    Route::post('builder-get-blocks', 'BuilderController@getBuilderBlocksAction');
    Route::post('builder-select-block', 'BuilderController@getBuilderSelectBlockAction');
    Route::post('builder-edit-block', 'BuilderController@getBuilderEditBlockAction');
    Route::post('builder-render-preview', 'BuilderController@getBuilderRenderPreviewAction');
    Route::post('builder-save-page', 'BuilderController@getBuilderSaveAction');
    Route::post('builder-get-row-settings', 'BuilderController@getBuilderRowSettingsAction');
});

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web', 'locale'],
], function () {
    Route::get('page/{slug}', 'PageController@singleView')->name('page-single');
});