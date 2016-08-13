<?php

/**
 *
 * @author Ivan Teleshun <teleshun.ivan@gmail.com>
 * @link http://molotoksoftware.com/
 * @copyright 2016 MolotokSoftware
 * @license GNU General Public License, version 3
 */

/**
 * 
 * This file is part of MolotokSoftware.
 *
 * MolotokSoftware is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * MolotokSoftware is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with MolotokSoftware.  If not, see <http://www.gnu.org/licenses/>.
 */

?>
<h3>Выставление отзыва(ов). Шаг 2</h3>

<?php if ($count >= 1): ?>

    <?php if ($count > 1): ?>
    Вы собираетесь оставить отзывы по следующим лотам
    <?php else: ?>
    Вы собираетесь оставить отзыв по следующему лоту
    <?php endif; ?>

    <?php $form = $this->beginWidget('CActiveForm',['id' => 'reviews-create','action' => '/user/reviews/create']); ?>
    <input type="hidden" name="role" value="<?=$role;?>">
    <table class="table table-hover margint_top_30">
        <thead>
            <tr>
                <th>ID Лота</th>
                <th>Название</th>
                <th><?=($role==2)?'Продавец':'Покупатель';?></th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($lots as $lot): ?>
        <tr>
            <td>
                <input type="hidden" name="sale[]" value="<?=$lot["sale_id"]?>">
                <?=$lot['item_id']?></td>
            <td><?=$lot['name']?></td>
            <td><?=$lot['login']?></td>
        </tr>
    <?php endforeach; ?>
        </tbody> 

    </table>
    <div class="form-group">
        <label class="radio-inline">
            Тип отзыва: 
        </label>
        <label class="radio-inline">
            <input type="radio" name="value" value="5" checked>
            Положительный
        </label>
        <label class="radio-inline">
            <input type="radio" name="value" value="1">
            Отрицательный
        </label>
    </div>
    <div class="form-group">
        <textarea class="form-control" name="text" rows="3"></textarea>
    </div>
      <div class="form-group">
          <button id="btn-delete-fav" class="btn btn-info">Подтвердить</button>
      </div>
    <?php $this->endWidget(); ?>

<?php else: ?>
    <p>Нет лотов по которым не оставленны отзывы</p>
    
<?php endif; ?>
