<?php

use App\Http\Action;

/** @var \Framework\Http\Application $app */


$app->get('task_index', '/task', Action\Task\IndexAction::class);
$app->get('task_show', '/task/show/{id}', Action\Task\ShowAction::class, ['tokens' => ['id' => '\d+']]);
$app->get('task_create', '/task/create', Action\Task\CreateAction::class);
$app->post('task_store', '/task/create', Action\Task\CreateAction::class);
$app->get('task_edit', '/task/edit/{id}', Action\Task\EditAction::class, ['tokens' => ['id' => '\d+']]);
$app->post('task_editing', '/task/edit', Action\Task\EditAction::class);
$app->post('task_delete', '/task/delete', Action\Task\DeleteAction::class, ['tokens' => ['id' => '\d+']]);

$app->get('user_register', '/user_register', Action\RegisterAction::class);
$app->post('registring', '/registring', Action\RegisterAction::class);


$app->get('cabinet', '/cabinet', Action\CabinetAction::class);