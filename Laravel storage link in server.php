<?php

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
