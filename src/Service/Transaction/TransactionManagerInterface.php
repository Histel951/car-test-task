<?php

namespace app\Service\Transaction;

interface TransactionManagerInterface
{
    public function transactional(callable $callback): mixed;
}
