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


$orderItem = $this->orderItem;
$product = $orderItem->getProduct();

$urlSave = $this->pimcoreUrl();
?>
<form action="<?= $urlSave ?>" method="post">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
        <h4 class="modal-title"><?= $orderItem->getProductName() ?> <small><?= $this->translateAdmin('online-shop.back-office.order.item-edit') ?></small></h4>
    </div>
    <div class="modal-body">

        <div class="form-group row col-sm-5">
            <label class="sr-only" for="inputAmount"><?= $this->translateAdmin('online-shop.back-office.order.quantity') ?> (<?= $orderItem->getAmount() ?>)</label>
            <div class="input-group">
                <div class="input-group-addon"><?= $this->translateAdmin('online-shop.back-office.order.quantity') ?> (<?= $orderItem->getAmount() ?>)</div>
                <input type="number" name="quantity" value="<?= $orderItem->getAmount() ?>" id="inputAmount" class="form-control" />
            </div>
        </div>

        <div class="row form-group">
            <label class="col-sm-12" for="message"><?= $this->translateAdmin('online-shop.back-office.order.item-edit.message') ?></label>
            <div class="col-sm-12"><textarea class="form-control" name="message" id="message" rows="8"></textarea></div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="confirmed" value="1"><?= $this->translateAdmin('online-shop.back-office.save') ?></button>
    </div>
</form>