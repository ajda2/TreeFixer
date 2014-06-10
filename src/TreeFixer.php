<?php

/**
 * Class TreeFixer
 *
 * @author Michal Tichý [ajda2@seznam.cz]
 */
class TreeFixer {

    const TABLE_NAME_CATEGORY = 'tree';

    /** @var \PDO */
    protected $database;

    /** @var \PDOStatement */
    protected $selectStatement;

    /** @var \PDOStatement */
    protected $updateLeftStatement;

    /** @var \PDOStatement */
    protected $updateRightStatement;

    /**
     * @param PDO $database
     */
    public function __construct(PDO $database) {
        $this->database = $database;
        $this->selectStatement = $this->database->prepare("SELECT id FROM `" . TreeFixer::TABLE_NAME_CATEGORY . "` WHERE `parent_id` = ?");
        $this->updateLeftStatement = $this->database->prepare("UPDATE `" . TreeFixer::TABLE_NAME_CATEGORY . "` SET `left` = ? WHERE `id` = ?");
        $this->updateRightStatement = $this->database->prepare("UPDATE `" . TreeFixer::TABLE_NAME_CATEGORY . "` SET `right` = ? WHERE `id` = ? ");
    }

    /**
     * @param int $categoryId
     * @param int $step
     */
    public function fixTree($categoryId, &$step) {
        // set left value
        $step++;
        $this->updateLeftStatement->execute(array($step, $categoryId));

        // child categories
        $this->selectStatement->execute(array($categoryId));
        $categories = $this->selectStatement->fetchAll();

        foreach ($categories as $categoryRow) {
            $catId = (int)$categoryRow['id'];
            $this->fixTree($catId, $step);
        }

        // After all set right value
        $step++;
        $this->updateRightStatement->execute(array($step, $categoryId));
    }
} 