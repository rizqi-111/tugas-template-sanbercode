<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Indexing tabel profil
        Schema::table('profil',function (Blueprint $table) {
            $table->index('id');
        });

        //Indexing tabel pertanyaan
        Schema::table('pertanyaan',function (Blueprint $table) {
            $table->index('id');
        });

        //Indexing tabel jawaban
        Schema::table('jawaban',function (Blueprint $table) {
            $table->index('id');
        });
        
        //FK tabel pertanyaan
        Schema::table('pertanyaan',function (Blueprint $table) {
            $table->bigInteger('jawaban_tepat_id')->unsigned()->change(); 
            $table->bigInteger('profil_id')->unsigned()->change(); 
            $table->foreign('jawaban_tepat_id')->references('id')->on('jawaban');
            $table->foreign('profil_id')->references('id')->on('profil');
        });

        //FK tabel jawaban
        Schema::table('jawaban',function (Blueprint $table) {
            $table->bigInteger('pertanyaan_id')->unsigned()->change(); 
            $table->bigInteger('profil_id')->unsigned()->change(); 
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('profil_id')->references('id')->on('profil');
        });

        //FK tabel komentar_jawaban
        Schema::table('komentar_jawaban',function (Blueprint $table) {
            $table->bigInteger('jawaban_id')->unsigned()->change(); 
            $table->bigInteger('profil_id')->unsigned()->change(); 
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->foreign('profil_id')->references('id')->on('profil');
        });

        //FK tabel komentar_pertanyaan
        Schema::table('komentar_pertanyaan',function (Blueprint $table) {
            $table->bigInteger('pertanyaan_id')->unsigned()->change(); 
            $table->bigInteger('profil_id')->unsigned()->change(); 
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('profil_id')->references('id')->on('profil');
        });

        //FK tabel like_dislike_pertanyaan
        Schema::table('like_dislike_pertanyaan',function (Blueprint $table) {
            $table->bigInteger('pertanyaan_id')->unsigned()->change(); 
            $table->bigInteger('profil_id')->unsigned()->change(); 
            $table->foreign('pertanyaan_id')->references('id')->on('pertanyaan');
            $table->foreign('profil_id')->references('id')->on('profil');
        });

        //FK tabel like_dislike_jawaban
        Schema::table('like_dislike_jawaban',function (Blueprint $table) {
            $table->bigInteger('jawaban_id')->unsigned()->change(); 
            $table->bigInteger('profil_id')->unsigned()->change(); 
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->foreign('profil_id')->references('id')->on('profil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //dropIndexing tabel profil
        Schema::table('profil',function (Blueprint $table) {
            $table->dropIndex('profil_id_index');
        });

        //dropIndexing tabel pertanyaan
        Schema::table('pertanyaan',function (Blueprint $table) {
            $table->dropIndex('pertanyaan_id_index');
        });

        //dropIndexing tabel jawaban
        Schema::table('jawaban',function (Blueprint $table) {
            $table->dropIndex('jawaban_id_index');
        });
        
        //dropFK tabel pertanyaan
        Schema::table('pertanyaan',function (Blueprint $table) {
            $table->dropForeign('pertanyaan_jawaban_tepat_id_foreign');
            $table->dropForeign('pertanyaan_profil_id_foreign');
        });

        //dropFK tabel jawaban
        Schema::table('jawaban',function (Blueprint $table) {
            $table->dropForeign('jawaban_pertanyaan_id_foreign');
            $table->dropForeign('jawaban_profil_id_foreign');
        });

        //dropFK tabel komentar_pertanyaan
        Schema::table('komentar_pertanyaan',function (Blueprint $table) {
            $table->dropForeign('komentar_pertanyaan_pertanyaan_id_foreign');
            $table->dropForeign('komentar_pertanyaan_profil_id_foreign');
        });

        //dropFK tabel komentar_jawaban
        Schema::table('komentar_jawaban',function (Blueprint $table) {
            $table->dropForeign('komentar_jawaban_jawaban_id_foreign');
            $table->dropForeign('komentar_jawaban_profil_id_foreign');
        });

        //dropFK tabel like_dislike_pertanyaan
        Schema::table('like_dislike_pertanyaan',function (Blueprint $table) {
            $table->dropForeign('like_dislike_pertanyaan_pertanyaan_id_foreign');
            $table->dropForeign('like_dislike_pertanyaan_profil_id_foreign');
        });

        //dropFK tabel like_dislike_jawaban
        Schema::table('like_dislike_jawaban',function (Blueprint $table) {
            $table->dropForeign('like_dislike_jawaban_jawaban_id_foreign');
            $table->dropForeign('like_dislike_jawaban_profil_id_foreign');
        });
    }
}
