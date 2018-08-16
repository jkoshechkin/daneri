<div class="admin-default-index container">
    <h1>ВАЖНАЯ ИНФОРМАЦИЯ!!!!!!!</h1>
    <p>
        Для того чтобы текст на сайте не сползал смотрите за содержанием блоков "Краткое содержание".
    </p>
    <p>
        В разделе Our offer делайте "Краткое содержание меньше чем в разделе Trips. И объем краткого содержания должен занимать одинаковое количество строек на главной странице чтобы глаз не резало:)
    </p>
    <p>
        Размер главного изображения для раздела Trips должен быть: <strong>1600x780</strong>
    </p>
    <p>
        Размер главного изображения для раздела Our offer должен быть: <strong>700x518</strong>
    </p>

    <h1 style="margin-top: 40px">Записи на сегодня</h1>
    <table width="100%" class="table table-bordered" style="margin-top: 10px">
        <tr>
            <td><strong>ФИО</strong></td>
            <td><strong>Контакты</strong></td>
            <td><strong>Кол-во чел</strong></td>
            <td><strong>Кто бронировал</strong></td>
            <td></td>
        </tr>
        <?php foreach ($ttrips as $trip): ?>
            <tr>
                <td colspan="5"><strong><?=$trip->articleEn->title?> at <?=$trip->start?></strong></td>
            </tr>
            <?php foreach ($appointments as $appointment): if($trip->id==$appointment->trip_id):?>
                <tr>
                    <td><?=$appointment->fio?></td>
                    <td><?=$appointment->contacts?></td>
                    <td><?=$appointment->count?></td>
                    <td><?php if($appointment->hotel->name): echo $appointment->hotel->name; else: echo $appointment->code; endif;?></td>
                    <td><?=\yii\helpers\Html::a('Подробнее...',['appointment/view', 'id' => $appointment->id], ['class' => 'btn btn-primary', 'target' => '_blank'])?></td>
                </tr>
            <?php endif; endforeach; endforeach;?>
    </table>


</div>


<?php //debug($appointments);?>
