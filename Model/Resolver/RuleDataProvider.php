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

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Mageplaza\CallForPrice\Helper\Data as HelperData;
use Mageplaza\CallForPrice\Helper\Rule as HelperRule;

/**
 * Class LabelDataProvider
 * @package Mageplaza\ProductLabelsGraphQl\Model\Resolver
 */
class RuleDataProvider implements ResolverInterface
{
    /**
     * @var HelperData
     */
    protected $helperData;

    /**
     * @var HelperRule
     */
    protected $helperRule;

    /**
     * RuleDataProvider constructor.
     *
     * @param HelperData $helperData
     * @param HelperRule $helperRule
     */
    public function __construct(
        HelperData $helperData,
        HelperRule $helperRule
    ) {
        $this->helperData = $helperData;
        $this->helperRule = $helperRule;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!$this->helperData->isEnabled()) {
            return [];
        }

        if (!array_key_exists('model', $value) || !$value['model'] instanceof ProductInterface) {
            throw new LocalizedException(__('"model" value should be specified'));
        }

        /* @var $product ProductInterface */
        $product               = $value['model'];
        $ruleData              = [];
        $validateProductInRule = $this->helperRule->validateProductInRuleAvailable($product->getId());

        if ($validateProductInRule) {
            return $validateProductInRule;
        }

        return $ruleData;
    }
}
