<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Gruz
    Route::apiResource('gruzs', 'GruzApiController');

    // Typekuzova
    Route::apiResource('typekuzovas', 'TypekuzovaApiController');
});
