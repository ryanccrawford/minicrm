<?php

namespace App;

use App\Employee;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * Company Attributes
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
        'user_id'
    ];

    protected $perPage = 10;

    public function nameLink()
    {
        return link_to_route('companies.show', $this->name, [$this], [
            'title' => trans(
                'app.show_detail_title',
                ['name' => $this->name, 'type' => trans('company.company')]
            ),
        ]);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * The employees that belong to the user.
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Returns the users that belong to the comapany.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
