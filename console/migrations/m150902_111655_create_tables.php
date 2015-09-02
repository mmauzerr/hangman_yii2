<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_111655_create_tables extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'role_id', $this->integer()->notNull());
    }

    public function down()
    {
        echo "m150902_111655_create_tables cannot be reverted.\n";

        return false;
    }




}
