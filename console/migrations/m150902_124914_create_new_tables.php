<?php

use yii\db\Schema;
use yii\db\Migration;

class m150902_124914_create_new_tables extends Migration
{
    public function up()
    {
        $this->createTable('role', [
            'id' => Schema::TYPE_PK,
            'type' => Schema::TYPE_STRING . '(45) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->createTable('main_word', [
            'id' => Schema::TYPE_PK,
            'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'word' => Schema::TYPE_STRING . '(100) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->createTable('category', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(45) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->createTable('gameplay', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'main_word_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'used_letters' => Schema::TYPE_STRING . '(100) NOT NULL',
            'status' => Schema::TYPE_SMALLINT . '(1) NOT NULL',
            'try_number' => Schema::TYPE_INTEGER . ' NOT NULL',
            'remaining_try' => Schema::TYPE_INTEGER . ' NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL'
        ]);

        $this->addForeignKey("fk_user_role_id", "user", "role_id", "role", "id" );
        $this->addForeignKey("fk_main_word_category_id","main_word", "category_id", "category", "id");
        $this->addForeignKey("fk_gameplay_user_id", "gameplay", "user_id", "user", "id");
        $this->addForeignKey("fk_gameplay_main_word_id", "gameplay", "main_word_id", "main_word", "id");
    }

    public function down()
    {
        $this->dropTable('role');
        $this->dropTable('main_word');
        $this->dropTable('category');
        $this->dropTable('gameplay');
    }
}
