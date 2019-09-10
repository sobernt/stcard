<?php

use yii\db\Migration;
use yii\web\User;

/**
 * Class m190910_062948_addDefaultAdmin
 */
class m190910_062948_addDefaultAdmin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}',[
            'username'=>'admin',
            'email' => 'admin@stcard.loc',
            'password_hash'=>\Yii::$app->getSecurity()->generatePasswordHash('admin12345'),
            'status'=>10,
            'created_at'=>time(),
            'updated_at'=>time(),
            'auth_key'=>\Yii::$app->security->generateRandomString()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->delete('{{%user}}',['username'=>'admin']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190910_062948_addDefaultAdmin cannot be reverted.\n";

        return false;
    }
    */
}
