<?php

class m171016_145731_createWithdrawMoneyTable extends CDbMigration
{
    /**
     * @var string
     */
    protected $tableName = 'withdraw_money';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'amount' => 'integer NOT NULL',
        ]);

        $this->addForeignKey('fk-withdraw_money-user_id-user-id', $this->tableName, 'user_id', 'users', 'id', 'CASCADE',
            'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}