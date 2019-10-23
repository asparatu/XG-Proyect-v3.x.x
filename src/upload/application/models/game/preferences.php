<?php

declare(strict_types=1);

/**
 * Preferences Model
 *
 * PHP Version 7.1+
 *
 * @category Model
 * @package  Application
 * @author   XG Proyect Team
 * @license  http://www.xgproyect.org XG Proyect
 * @link     http://www.xgproyect.org
 * @version  3.1.0
 */
namespace application\models\game;

/**
 * Preferences Class
 *
 * @category Classes
 * @package  Application
 * @author   XG Proyect Team
 * @license  http://www.xgproyect.org XG Proyect
 * @link     http://www.xgproyect.org
 * @version  3.1.0
 */
class Preferences
{

    private $db = null;

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct($db)
    {
        // use this to make queries
        $this->db = $db;
    }

    /**
     * __destruct
     * 
     * @return void
     */
    public function __destruct()
    {
        $this->db->closeConnection();
    }

    /**
     * Get all preferences by a certain user
     * 
     * @param int $user_id
     * 
     * @return array
     */
    public function getAllPreferencesByUserId(int $user_id): array
    {
        return $this->db->queryFetchAll(
            "SELECT
                p.*
            FROM `" . PREFERENCES . "` p
            WHERE p.`preference_user_id` = '" . $user_id . "';"
        ) ?? [];
    }
}

/* end of preferences.php */