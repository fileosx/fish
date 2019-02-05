<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtrafieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
	        $table->string('surname1')->after('name');
            $table->string('surname2')->after('surname1');
	        $table->string('enterprise')->after('surname2');
	        $table->string('territory')->after('enterprise');
	        $table->string('department')->after('territory');
	        $table->string('position')->after('department');
	        $table->string('phone')->after('position');
	        $table->integer('active')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
	        $table->dropColumn('surname1');
            $table->dropColumn('surname2');
	        $table->dropColumn('enterprise');
	        $table->dropColumn('territory');
	        $table->dropColumn('department');
	        $table->dropColumn('position');
	        $table->dropColumn('phone');
	        $table->dropColumn('active');
        });
    }
}
