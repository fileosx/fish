<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{

    use Taggable;

    const STATUS_NEW           = 1;
    const STATUS_FIRST_CONTACT = 2;
    const STATUS_VISITED       = 3;
    const STATUS_COMPLETED     = 4;
    const STATUS_FAILED        = 5;

	protected $fillable = array(
		'user_id',
		'company',
		'name',
		'email',
		'phone',
		'city',
		'type',
		'segment',
		'owner_qty',
		'capacity',
		'external_pos',
		'pos_type',
		'screens',
		'screens_qty',
		'critical',
		'cash_register',
		'printers',
		'type_general',
		'type_specific',
		'franchise',
		'xef_soft_stock',
		'xef_soft_stock_other',
		'xef_soft_staff',
		'xef_soft_staff_other',
		'xef_soft_book',
		'xef_soft_book_other',
		'xef_soft_erp',
		'xef_soft_erp_other',
	);


    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function statusName()
    {
        return static::getStatusText($this->status);
    }

    public static function getStatusText($status)
    {
        return static::availableStatus()[$status];
    }

    public static function availableStatus()
    {
        return [
            static::STATUS_NEW           => 'new',
            static::STATUS_FIRST_CONTACT => 'first-contact',
            static::STATUS_VISITED       => 'visited',
            static::STATUS_COMPLETED     => 'completed',
            static::STATUS_FAILED        => 'failed',
        ];
    }

}
