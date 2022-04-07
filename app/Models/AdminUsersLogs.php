<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUsersLogs extends Model
{
    use HasFactory;
    protected $table = "admin_users_logs";

    const TYPE_USERS_CREATE = 0;
    const TYPE_USERS_UPDATE = 1;
    const TYPE_USERS_DELETE = 2;
    const TYPE_USERS_LOGIN = 3;
    const TYPE_USERS_LOGOUT = 4;

    protected $fillable = [
        'user_id',
        'type',
        'meta',
    ];

    protected $appends = [
        'description', 'type_desc'
    ];

    public function getMetaAttribute($value)
    {
        return json_decode($value);
    }

    public function setMetaAttribute($value)
    {
        $this->attributes['meta'] = json_encode($value);
    }

    public function getTypeDescAttribute($value)
    {
        switch ($this->attributes['type']) {
            case 0:
                $result = 'Create';
                break;
            case 1:
                $result = 'Update';
                break;
            case 2:
                $result = 'Delete';
                break;
            case 3:
                $result = 'Login';
                break;
            case 4:
                $result = 'Logout';
                break;
        }
        return $result;
    }

    public function getDescriptionAttribute()
    {
        switch ($this->attributes['type']) {
            case 0:
                $result = __('adminuUsersLogs.users.create', json_decode($this->attributes['meta'], true));
                break;
            case 1:
                $result = __('adminuUsersLogs.users.update', json_decode($this->attributes['meta'], true));
                break;
            case 2:
                $result = __('adminuUsersLogs.users.delete', json_decode($this->attributes['meta'], true));
                break;
            case 3:
                $result = __('adminuUsersLogs.users.login', json_decode($this->attributes['meta'], true));
                break;
            case 4:
                $result = __('adminuUsersLogs.users.logout', json_decode($this->attributes['meta'], true));
                break;
        }

        return $result;
    }
}
