<?php

namespace App;

use Webpatser\Uuid\Uuid;

class Language extends PortalBaseModel
{
    /**
     *  Setup model event hooks.
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */

    /** @noinspection PhpMissingParentCallCommonInspection */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * Get dropdown list for forms.
     *
     * @return mixed
     */
    public static function getDropdown()
    {
        return static::pluck('name', 'id')->all();
    }
}
