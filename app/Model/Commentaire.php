<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Commentaire
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $contenu
 * @property integer $user_id
 * @property integer $covoiturage_id
 * @property-read \App\Model\User $user
 * @property-read \App\Model\Covoiturage $covoiturage
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Commentaire whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Commentaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Commentaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Commentaire whereContenu($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Commentaire whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Commentaire whereCovoiturageId($value)
 * @mixin \Eloquent
 */
class Commentaire extends Model {

	protected $table = 'commentaires';
	public $timestamps = true;
    protected  $guarded = array('id', 'timestamps');

	public function user()
	{
		return $this->belongsTo('App\Model\User');
	}

	public function covoiturage()
	{
		return $this->belongsTo('App\Model\Covoiturage');
	}

}