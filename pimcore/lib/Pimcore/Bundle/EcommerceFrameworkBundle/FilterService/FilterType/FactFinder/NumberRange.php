<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\FactFinder;

use Pimcore\Bundle\EcommerceFrameworkBundle\IndexService\ProductList\IProductList;
use Pimcore\Bundle\EcommerceFrameworkBundle\Model\AbstractFilterDefinitionType;

class NumberRange extends \Pimcore\Bundle\EcommerceFrameworkBundle\FilterService\FilterType\NumberRange
{
    /**
     * @param AbstractFilterDefinitionType $filterDefinition
     * @param IProductList                 $productList
     */
    public function prepareGroupByValues(AbstractFilterDefinitionType $filterDefinition, IProductList $productList)
    {
    }


    /**
     * @param AbstractFilterDefinitionType $filterDefinition
     * @param IProductList                 $productList
     * @param                                                   $currentFilter
     * @param                                                   $params
     * @param bool                                              $isPrecondition
     *
     * @return mixed
     */
    public function addCondition(AbstractFilterDefinitionType $filterDefinition, IProductList $productList, $currentFilter, $params, $isPrecondition = false)
    {
        // init
        $field = $this->getField($filterDefinition);
        $value = $params[$field];


        // set default preselect
        if (empty($value)) {
            $value['from'] = $filterDefinition->getPreSelectFrom();
            $value['to'] = $filterDefinition->getPreSelectTo();

            $currentFilter[$field] = $value;
        }


        // add condition
        if (!empty($value)) {
            $productList->addPriceCondition($value['from'], $value['to']);
        }

        return $currentFilter;
    }
}
