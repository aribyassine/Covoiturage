<?php

namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * App\Model\User
 *
 * @property integer $id
 * @property string $email
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $nom
 * @property string $prenom
 * @property string $password
 * @property string $genre
 * @property string $date_nais
 * @property string $num_tel
 * @property boolean $pref_musique
 * @property boolean $pref_animeaux
 * @property boolean $pref_discussion
 * @property boolean $pref_fumeur
 * @property integer $ville_id
 * @property string $description
 * @property-read \App\Model\Ville $pathPhoto
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Covoiturage[] $moyenneAvis
 * @property-read \App\Model\Ville $ville
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Notification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Commentaire[] $commentaires
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Covoiturage[] $preinscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Covoiturage[] $inscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Covoiturage[] $conducteurCovoiturages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Note[] $notesRecu
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Note[] $notesAttribuer
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereNom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePrenom($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereGenre($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereDateNais($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereNumTel($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePrefMusique($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePrefAnimeaux($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePrefDiscussion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePrefFumeur($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereVilleId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereDescription($value)
 * @mixin \Eloquent
 */
class User extends Model implements AuthenticatableContract, CanResetPasswordContract{

    use Authenticatable, CanResetPassword;

	protected $table = 'users';
	public $timestamps = true;
	protected $guarded = array('id', 'remember_token', 'timestamps');

	public function ville()
	{
		return $this->belongsTo('App\Model\Ville');
	}

	public function notifications()
	{
		return $this->hasMany('App\Model\Notification');
	}

	public function commentaires()
	{
		return $this->hasMany('App\Model\Commentaire');
	}

	public function preinscriptions()
	{
		return $this->belongsToMany('App\Model\Covoiturage','user_covoiturage_preinscrits')->withTimestamps();
	}

	public function inscriptions()
	{
		return $this->belongsToMany('App\Model\Covoiturage','user_covoiturage_inscrits')->withTimestamps();
	}

	public function conducteurCovoiturages()
	{
		return $this->hasMany('App\Model\Covoiturage', 'conducteur_id');
	}

    public function notesRecu()
    {
        return $this->hasMany('App\Model\Note', 'notee_id');
    }

    public function notesAttribuer()
    {
        return $this->hasMany('App\Model\Note', 'noteur_id');
    }


    public function pathPhoto($prefix = '')
    {
        $file = 'photos/' . $this->id . '.jpg';
        if (file_exists($file)) {
            $pathPhoto = 'photos/' . $prefix . $this->id . '.jpg';
        } elseif ($this->genre == 'Homme') {
            $pathPhoto = 'photos/'. $prefix .'Homme.jpg';
        } else {
            $pathPhoto = 'photos/'. $prefix .'Femme.jpg';
        }
        return $pathPhoto;
    }

    public function moyenneAvis(){
        $somme=0;
        $nb_notes=$this->notesRecu->count();
        foreach($this->notesRecu as $note)
        {
            $somme = $somme + $note->note;
        }
        if($nb_notes==0)
            return null;
        else
            return ['moyenne' => number_format($somme/$nb_notes,1),'nb_note'=>$nb_notes];
    }
}