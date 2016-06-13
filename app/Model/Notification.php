<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Notification
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $contenu
 * @property integer $user_id
 * @property string $url
 * @property boolean $vu
 * @property-read \App\Model\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereContenu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Notification whereVu($value)
 * @mixin \Eloquent
 */
class Notification extends Model {

	protected $table = 'notifications';
	public $timestamps = true;
	protected $guarded = array('id','timestamps');

	public function user()
	{
		return $this->belongsTo('App\Model\User');
	}

}