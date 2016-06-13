<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\UserCovoituragePreinscrits
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $covoiturage_id
 * @property integer $user_id
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoituragePreinscrits whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoituragePreinscrits whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoituragePreinscrits whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoituragePreinscrits whereCovoiturageId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\UserCovoituragePreinscrits whereUserId($value)
 * @mixin \Eloquent
 */
class UserCovoituragePreinscrits extends Model {

	protected $table = 'user_covoiturage_preinscrits';
	public $timestamps = true;

}