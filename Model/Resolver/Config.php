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
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\CallForPrice\Model\Api\ConfigManagement;
use Mageplaza\CallForPrice\Helper\Data as HelperData;
use Magento\Framework\App\RequestInterface;

/**
 * Class Config
 * @package Mageplaza\CallForPriceGraphQl\Model\Resolver
 */
class Config implements ResolverInterface
{
    /**
     * @var HelperData
     */
    protected $helperData;

    /**
     * @var ConfigManagement
     */
    protected $configManagement;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * Config constructor.
     *
     * @param HelperData $helperData
     * @param ConfigManagement $configManagement
     * @param RequestInterface $request
     */
    public function __construct(
        HelperData $helperData,
        ConfigManagement $configManagement,
        RequestInterface $request
    ) {
        $this->helperData       = $helperData;
        $this->configManagement = $configManagement;
        $this->request          = $request;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            throw new GraphQlNoSuchEntityException(__('Module is disabled.'));
        }

        $params = $this->request->getParams();
        $params = array_merge($params, $args);
        $this->request->setParams($params);

        return $this->configManagement->getConfig();
    }
}
