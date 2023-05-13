<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement(
            "ALTER TABLE vote ADD FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE CASCADE"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::statement(
            "ALTER TABLE vote DROP FOREIGN KEY order_detail_product_id_foreign"
        );
    }
};
