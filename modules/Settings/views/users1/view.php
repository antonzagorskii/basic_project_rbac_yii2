<?php
namespace app\modules\Settings\views\user;

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<h3>Управление ролями пользователя <?= $user->getUserName(); ?></h3>
<?php $form = ActiveForm::begin(['action' => ["/{$moduleName}/users/update", 'id' => $user->getId()]]); ?>

<?= Html::checkboxList('roles', $user_permit, $roles, ['separator' => '<br>']); ?>

<div class="form-group">
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

