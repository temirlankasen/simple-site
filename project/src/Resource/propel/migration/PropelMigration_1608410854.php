<?php

use Propel\Generator\Manager\MigrationManager;

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1608410854.
 * Generated on 2020-12-19 20:47:34 by root
 */
class PropelMigration_1608410854
{
    public $comment = '';

    public function preUp(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postUp(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    public function preDown(MigrationManager $manager)
    {
        // add the pre-migration code here
    }

    public function postDown(MigrationManager $manager)
    {
        // add the post-migration code here
    }

    /**
     * Get the SQL statements for the Up migration
     *
     * @return array list of the SQL strings to execute for the Up migration
     *               the keys being the datasources
     */
    public function getUpSQL()
    {
        return array (
  'site' => '
BEGIN;

DROP TABLE IF EXISTS "propel_migration" CASCADE;

CREATE TABLE "ticket"
(
    "id" serial NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "phone" VARCHAR(255) NOT NULL,
    "description" TEXT,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

CREATE TABLE "news"
(
    "id" serial NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "description" TEXT,
    "digest" TEXT,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

CREATE TABLE "service"
(
    "id" serial NOT NULL,
    "name" VARCHAR(255) NOT NULL,
    "description" TEXT,
    "digest" TEXT,
    "created_at" TIMESTAMP,
    PRIMARY KEY ("id")
);

COMMIT;
',
);
    }

    /**
     * Get the SQL statements for the Down migration
     *
     * @return array list of the SQL strings to execute for the Down migration
     *               the keys being the datasources
     */
    public function getDownSQL()
    {
        return array (
  'site' => '
BEGIN;

DROP TABLE IF EXISTS "ticket" CASCADE;

DROP TABLE IF EXISTS "news" CASCADE;

DROP TABLE IF EXISTS "service" CASCADE;

CREATE TABLE "propel_migration"
(
    "version" INTEGER DEFAULT 0
);

COMMIT;
',
);
    }

}