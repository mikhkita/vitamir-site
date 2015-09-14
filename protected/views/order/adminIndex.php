<h1><?=$this->adminMenu["cur"]->name?></h1>
<?php $form=$this->beginWidget('CActiveForm'); ?>
	<table class="b-table" border="1">
		<tr>
			<th><? echo $labels['id']; ?></th>
			<th><? echo $labels['type']; ?></th>
			<th><? echo $labels['date']; ?></th>
			<th><? echo $labels['user_id']; ?></th>
			<th><? echo $labels['delivery']; ?></th>
			<th><? echo $labels['payment']; ?></th>
			<th><? echo $labels['location']; ?></th>
			<th><? echo $labels['price']; ?></th>
			<th style="width: 150px;">Действия</th>
		</tr>
		<tr class="b-filter">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><a href="#" class="b-clear-filter">Сбросить фильтр</a></td>
		</tr>
		<? if( count($data) ): ?>
			<? foreach ($data as $i => $item): ?>
				<tr>
					<td><?=$item->id?></td>
					<td class="align-left"><?=Order::model()->types[$item->type]?></td>
					<td class="align-left"><? $date = new DateTime($item->date); echo date_format($date, 'd.m.Y H:i:s'); ?></td>
					<td class="align-left"><a class="phone ajax-form ajax-update" href="<?php echo Yii::app()->createUrl('/user/adminUpdate',array('id'=>$item->user_id))?>"><? $m = User::model()->findByPk($item->user_id); echo $m['usr_login']; if($m['usr_name'] && $m['usr_name']!="дорогой клиент") echo "(".$m['usr_name'].")"; ?></a></td>
					<td class="align-left"><?=Order::model()->delivery[$item->delivery]?></td>
					<td class="align-left"><?=Order::model()->payment[$item->payment]?></td>
					<td class="align-left"><?=$item->location?></td>
					<td class="align-left"><?=$item->price?> руб.</td>
					<td class="b-tool-cont">
						<a href="<?php echo Yii::app()->createUrl('/'.$this->adminMenu["cur"]->code.'/adminupdate',array('id'=>$item->id))?>" class="ajax-form ajax-update b-tool b-tool-update" title="Редактировать <?=$this->adminMenu["cur"]->vin_name?>"></a>
						<a href="<?php echo Yii::app()->createUrl('/'.$this->adminMenu["cur"]->code.'/admindelete',array('id'=>$item->id))?>" class="ajax-form ajax-delete b-tool b-tool-delete" title="Удалить <?=$this->adminMenu["cur"]->vin_name?>"></a>
					</td>
				</tr>
			<? endforeach; ?>
		<? else: ?>
			<tr>
				<td colspan=10>Пусто</td>
			</tr>
		<? endif; ?>
	</table>
<?php $this->endWidget(); ?>