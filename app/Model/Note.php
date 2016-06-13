<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Note
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $note
 * @property string $avis
 * @property integer $noteur_id
 * @property integer $notee_id
 * @property-read \App\Model\User $noteur
 * @property-read \App\Model\User $notee
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereNote($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereAvis($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereNoteurId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Note whereNoteeId($value)
 * @mixin \Eloquent
 */
class Note extends Model {

	protected $table = 'notes';
	public $timestamps = true;
    public $guarded=['id','timestamps'];

	public function noteur()
	{
		return $this->belongsTo('App\Model\User', 'noteur_id');
	}

	public function notee()
	{
		return $this->belongsTo('App\Model\User', 'notee_id');
	}

}