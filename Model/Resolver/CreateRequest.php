<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_CallForPriceGraphQl
 * @copyright   Copyright (c) Mageplaza (https://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */

declare(strict_types=1);

namespace Mageplaza\CallForPriceGraphQl\Model\Resolver;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\CallForPrice\Helper\Data;
use Mageplaza\CallForPrice\Model\Api\RequestsManagement;
use Mageplaza\CallForPrice\Model\RequestsFactory;

/**
 * Class CreateRequest
 * @package Mageplaza\CallForPriceGraphQl\Model\Resolver
 */
class CreateRequest implements ResolverInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * @var RequestsManagement
     */
    protected $requestsManagement;

    /**
     * @var RequestsFactory
     */
    protected $requestsFactory;

    /**
     * CreateRequest constructor.
     *
     * @param Data $helperData
     * @param RequestsManagement $requestsManagement
     * @param RequestsFactory $requestsFactory
     */
    public function __construct(
        Data $helperData,
        RequestsManagement $requestsManagement,
        RequestsFactory $requestsFactory
    ) {
        $this->helperData         = $helperData;
        $this->requestsManagement = $requestsManagement;
        $this->requestsFactory    = $requestsFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            throw new LocalizedException(__('Module is disabled.'));
        }

        $request = $this->requestsFactory->create()->setData($args['input']);

        return $this->requestsManagement->save($request);
    }
}
