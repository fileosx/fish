<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtrafieldsToLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leads', function (Blueprint $table) {
	        $table->dropColumn('body');
	        $table->dropColumn('username');
	        $table->dropColumn('address');
	        $table->dropColumn('country');
	        $table->dropColumn('postal_code');
	        $table->integer('type')->after('phone');
	        $table->integer('segment')->after('type');
	        $table->integer('owner_qty')->nullable()->after('segment');
	        $table->integer('capacity')->nullable()->after('owner_qty');
	        $table->integer('external_pos')->nullable()->after('capacity');
	        $table->integer('pos_type')->nullable()->after('external_pos');
	        $table->integer('screens')->nullable()->after('pos_type');
	        $table->integer('screens_qty')->nullable()->after('screens');
	        $table->integer('critical')->nullable()->after('screens_qty');
	        $table->integer('cash_register')->nullable()->after('critical');
	        $table->integer('printers')->nullable()->after('cash_register');
	        $table->integer('type_general')->nullable()->after('printers');
	        $table->integer('type_specific')->nullable()->after('type_general');
	        $table->integer('franchise')->nullable()->after('type_specific');
	        $table->integer('xef_soft_stock')->nullable()->after('franchise');
	        $table->string('xef_soft_stock_other')->nullable()->after('xef_soft_stock');
	        $table->integer('xef_soft_staff')->nullable()->after('xef_soft_stock_other');
	        $table->string('xef_soft_staff_other')->nullable()->after('xef_soft_staff');
	        $table->integer('xef_soft_book')->nullable()->after('xef_soft_staff_other');
	        $table->string('xef_soft_book_other')->nullable()->after('xef_soft_book');
	        $table->integer('xef_soft_erp')->nullable()->after('xef_soft_book_other');
	        $table->string('xef_soft_erp_other')->nullable()->after('xef_soft_erp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('leads', function (Blueprint $table) {
		    $table->text('body')->nullable();
		    $table->string('username')->nullable();
		    $table->string('address')->nullable();
		    $table->string('country')->nullable();
		    $table->string('postal_code')->nullable();


	    });
    }
}
