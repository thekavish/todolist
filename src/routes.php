<?php

Route::resource('/task', 'Thekavish\Todolist\Controllers\TaskController');
Route::post('task/toggle','Thekavish\Todolist\Controllers\TaskController@toggleComplete')->name('task.toggle');