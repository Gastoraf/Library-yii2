<?php

use yii\db\Migration;

/**
* Handles adding columns to table `{{%lostbooks2}}`.
*/
class m210521_090014_add_date_reimbursed_column_to_lostbooks2_table extends Migration
{
  /**
  * {@inheritdoc}
  */
  public function safeUp()
  {
    $this->addColumn('lostbooks2', 'date_reimbursed',
    $this->date(4));
  }

  /**
  * {@inheritdoc}
  */
  public function safeDown()
  {
    $this->dropColumn('lostbooks2', 'date_reimbursed');
  }
}
