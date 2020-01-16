<?php

/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types = 1);

namespace Ergonode\Product\Tests\Domain\Event;

use Ergonode\Category\Domain\ValueObject\CategoryCode;
use Ergonode\Product\Domain\Event\ProductAddedToCategoryEvent;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Ergonode\Product\Domain\Entity\ProductId;

/**
 */
class ProductAddedToCategoryEventTest extends TestCase
{
    /**
     */
    public function testEventCreation(): void
    {
        /** @var ProductId|MockObject $id */
        $id = $this->createMock(ProductId::class);
        /** @var CategoryCode|MockObject $categoryCode */
        $categoryCode = $this->createMock(CategoryCode::class);
        $event = new ProductAddedToCategoryEvent($id, $categoryCode);
        $this->assertEquals($id, $event->getAggregateId());
        $this->assertEquals($categoryCode, $event->getCategoryCode());
    }
}
