<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('ville_id')->references('id')->on('villes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->foreign('covoiturage_id')->references('id')->on('covoiturages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('covoiturages', function(Blueprint $table) {
			$table->foreign('ville_depart_id')->references('id')->on('villes')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('covoiturages', function(Blueprint $table) {
			$table->foreign('ville_arrivee_id')->references('id')->on('villes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('covoiturages', function(Blueprint $table) {
			$table->foreign('conducteur_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_covoiturage_preinscrits', function(Blueprint $table) {
			$table->foreign('covoiturage_id')->references('id')->on('covoiturages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_covoiturage_preinscrits', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_covoiturage_inscrits', function(Blueprint $table) {
			$table->foreign('covoiturage_id')->references('id')->on('covoiturages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_covoiturage_inscrits', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('notes', function(Blueprint $table) {
			$table->foreign('noteur_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('no action');
		});
		Schema::table('notes', function(Blueprint $table) {
			$table->foreign('notee_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('no action');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_ville_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_user_id_foreign');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->dropForeign('commentaires_user_id_foreign');
		});
		Schema::table('commentaires', function(Blueprint $table) {
			$table->dropForeign('commentaires_covoiturage_id_foreign');
		});
		Schema::table('covoiturages', function(Blueprint $table) {
			$table->dropForeign('covoiturages_ville_depart_id_foreign');
		});
		Schema::table('covoiturages', function(Blueprint $table) {
			$table->dropForeign('covoiturages_ville_arrivee_id_foreign');
		});
		Schema::table('covoiturages', function(Blueprint $table) {
			$table->dropForeign('covoiturages_conducteur_id_foreign');
		});
		Schema::table('user_covoiturage_preinscrits', function(Blueprint $table) {
			$table->dropForeign('user_covoiturage_preinscrits_covoiturage_id_foreign');
		});
		Schema::table('user_covoiturage_preinscrits', function(Blueprint $table) {
			$table->dropForeign('user_covoiturage_preinscrits_user_id_foreign');
		});
		Schema::table('user_covoiturage_inscrits', function(Blueprint $table) {
			$table->dropForeign('user_covoiturage_inscrits_covoiturage_id_foreign');
		});
		Schema::table('user_covoiturage_inscrits', function(Blueprint $table) {
			$table->dropForeign('user_covoiturage_inscrits_user_id_foreign');
		});
		Schema::table('notes', function(Blueprint $table) {
			$table->dropForeign('notes_noteur_id_foreign');
		});
		Schema::table('notes', function(Blueprint $table) {
			$table->dropForeign('notes_notee_id_foreign');
		});
	}
}