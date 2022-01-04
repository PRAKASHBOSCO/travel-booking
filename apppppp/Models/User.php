<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'password', 'address', 'phone', 'request', 'request_date', 'avatar', 'provider', 'gst', 'pan', 'pin_code', 'website_url', 'provider_id', 'payout', 'title_id','last_check_notification', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function RoleUser()
    {
        return $this->hasMany(RoleUser::class, 'user_id', 'id');
    }

    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function getUsers($data)
    {
        $default = [
            'role' => ''
        ];

        $data = gmz_parse_args($data, $default);

        $query = $this->query();

        if (!empty($data['role'])) {
            $query->select(['users.*', 'role_user.role_id'])
                ->where('role_id', $data['role'])
                ->join('role_user', 'role_user.user_id', '=', "users.id", 'inner');
        }

        return $query->orderBy('users.id', 'ASC')->get();
    }
}
