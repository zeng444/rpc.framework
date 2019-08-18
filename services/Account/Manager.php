<?php

namespace Services\Account;

use Services\Base as ServiceBase;

/**
 * Author:Robert
 *
 * Class Manager
 * @package Services\Account
 */
class Manager extends ServiceBase
{


    /**
     * Author:Robert
     *
     * @param int $companyId
     * @param string $account
     * @return bool
     */
    public function hasAccount(int $companyId, string $account): bool
    {
        $db = $this->db;
        $sql = "SELECT `id` FROM  `callCenter`.`account` WHERE `companyId` = :companyId AND `account`=:account LIMIT 1";
        $result = $db->query($sql, ['companyId' => $companyId, 'account' => $account]);
        return !!$result->fetch();
    }

}
