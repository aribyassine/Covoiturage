<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\UserCovoiturageInscrits
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $covoiturage_id
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoiturageInscrits whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoiturageInscrits whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoiturageInscrits whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoiturageInscrits whereCovoiturageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoiturageInscrits whereUserId($value)
 * @mixin \Eloquent
 */
class UserCovoiturageInscrits extends Model {

	protected $table = 'user_covoiturage_inscrits';
	public $timestamps = true;
}