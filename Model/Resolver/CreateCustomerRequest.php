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

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\CallForPrice\Model\Api\RequestsManagement;
use Mageplaza\CallForPrice\Model\RequestsFactory;
use Magento\CustomerGraphQl\Model\Customer\GetCustomer;
use Mageplaza\CallForPrice\Helper\Data;

/**
 * Class CreateCustomerRequest
 * @package Mageplaza\CallForPriceGraphQl\Model\Resolver
 */
class CreateCustomerRequest implements ResolverInterface
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * @var GetCustomer
     */
    protected $getCustomer;

    /**
     * @var RequestsManagement
     */
    protected $requestsManagement;

    /**
     * @var RequestsFactory
     */
    protected $requestsFactory;

    /**
     * CreateCustomerRequest constructor.
     *
     * @param Data $helperData
     * @param GetCustomer $getCustomer
     * @param RequestsManagement $requestsManagement
     * @param RequestsFactory $requestsFactory
     */
    public function __construct(
        Data $helperData,
        GetCustomer $getCustomer,
        RequestsManagement $requestsManagement,
        RequestsFactory $requestsFactory
    ) {
        $this->helperData         = $helperData;
        $this->getCustomer        = $getCustomer;
        $this->requestsManagement = $requestsManagement;
        $this->requestsFactory    = $requestsFactory;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            return [];
        }

        $request = $this->requestsFactory->create()->setData($args['input']);

        if ($this->helperData->versionCompare('2.3.3')) {
            if ($context->getExtensionAttributes()->getIsCustomer() === false) {
                throw new GraphQlAuthorizationException(__('The current customer isn\'t authorized.'));
            }
        }

        $customer = $this->getCustomer->execute($context);

        return $this->requestsManagement->saveMine($customer->getId(), $request);
    }
}
