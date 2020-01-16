<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Attribute\Persistence\Dbal\Projector\Attribute;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DBALException;
use Ergonode\Attribute\Domain\Event\AttributeGroupRemovedEvent;

/**
 */
class AttributeGroupRemovedEventProjector
{
    private const TABLE = 'attribute_group_attribute';

    /**
     * @var Connection
     */
    private $connection;

    /**
     * @param Connection $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param AttributeGroupRemovedEvent $event
     *
     * @throws DBALException
     */
    public function __invoke(AttributeGroupRemovedEvent $event): void
    {
        $this->connection->delete(
            self::TABLE,
            [
                'attribute_id' => $event->getAggregateId()->getValue(),
                'attribute_group_id' => $event->getGroupId()->getValue(),
            ]
        );
    }
}
