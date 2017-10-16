<?php

class m171016_091307_addBalanceColumn extends CDbMigration
{
	/**
     * @var string
     */
    protected $tableName = 'users';
    /**
     * @var string
     */
    protected $columnName = 'balance';

    /**
     * {@inheritdoc}
     */
	public function up()
	{
        $this->addColumn($this->tableName, $this->columnName, 'integer NOT NULL');
	}

    /**
     * {@inheritdoc}
     */
	public function down()
	{
		$this->dropColumn($this->tableName, $this->columnName);
	}
}