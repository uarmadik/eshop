<?php

use yii\db\Migration;

/**
 * Class m180124_155323_testAdminMigrat
 */
class m180124_155323_testAdminMigrat extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('testModAdmin', [
            'id' => \yii\db\Schema::TYPE_PK,
            'title' => \yii\db\Schema::TYPE_TEXT,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180124_155323_testAdminMigrat cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('testModAdmin', [
            'id' => \yii\db\Schema::TYPE_PK,
            'title' => \yii\db\Schema::TYPE_TEXT,
        ]);
    }

    public function down()
    {
        $this->dropTable('testModAdmin');
    }

}
