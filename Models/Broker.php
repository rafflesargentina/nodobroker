<?php

namespace Raffles\Modules\Nodobroker\Models;

class Broker extends User
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'broker',
        'email',
        'first_name',
        'last_name',
        'password',
        'slug'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['avatar', 'projects', 'roles'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($model) {
                $model->broker = 1;
            }
        );
    }

    /**
     * Get a new query builder for the model's table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return parent::newQuery()->whereBroker('1');
    }

    /**
     * Brokers can have many roles.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function permissions()
    {
        return $this->belongsToMany(\Caffeinated\Shinobi\Models\Permission::class, 'permission_user', 'permission_id', 'user_id')->withTimestamps();
    }

    /**
     * The projects that belong to the user.
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user', 'user_id');
    }

    /**
     * Brokers can have many roles.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function roles()
    {
        return $this->belongsToMany(\Caffeinated\Shinobi\Models\Role::class, 'role_user', 'role_id', 'user_id')->withTimestamps();
    }
}
