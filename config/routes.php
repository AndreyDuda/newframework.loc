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




$app->get('auth_logout', '/auth_logout', Action\LogOutAction::class);
$app->post('auth_signup', '/auth_signup', Action\SignupAction::class);
$app->get('signup_view', '/auth_signup', Action\SignupAction::class);
$app->get('login_view', '/auth_login', Action\LoginAction::class);
$app->post('auth_login', '/auth_login', Action\LoginAction::class);