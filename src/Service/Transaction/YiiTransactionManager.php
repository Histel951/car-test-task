<?php
declare(strict_types = 1);

namespace app\Service\Transaction;

use Yii;

final readonly class YiiTransactionManager implements TransactionManagerInterface
{
    public function transactional(callable $callback): mixed
    {
        $tx = Yii::$app->db->beginTransaction();

        try {
            $result = $callback();

            $tx->commit();

            return $result;
        } catch (\Throwable $e) {
            $tx->rollBack();
            throw $e;
        }
    }
}
