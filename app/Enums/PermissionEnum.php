<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case MANAGE_USERS = 'manage_users';
    case DELETE_PROJECT = 'delete_project';
    case DELETE_CLIENT = 'delete_client';
    case DELETE_TASK = 'delete_task';
}
