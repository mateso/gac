    <?php
    $entitySubSectorData = [];
    $entityListData = [];
    $entityCodeLabel = '';
    if (!$model->isNewRecord) {
        $model->entity_sector_id = $model::getEntitySectorIdByUserId($model->id);
        $model->entity_sub_sector_id = $model::getEntitySubSectorIdByUserId($model->id);
        $entitySubSectorData = ArrayHelper::map(GacEntitySubsectorU::find()
                                ->where(['SectorID' => $model->entity_sector_id])
                                ->all(), 'SubSectorID', 'SubSectorDescription');
        $entityListData = ArrayHelper::map(GacEntityListV::find()
                                ->where(['SectorID' => $model->entity_sector_id, 'SubSectorID' => $model->entity_sub_sector_id])
                                ->all(), 'InstitutionalCode', 'EntityDescription');
        //$gfsCodeLabel = $model->gacGfsListU->getGFSCodeDesc($model->GFSCode);
    }
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput() ?>

    <?= $form->field($model, 'lastname')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'entity_sector_id')->dropDownList(
            ArrayHelper::map(GacEntitySectorU::find()->all(), 'SectorID', 'SectorDescription'), [
        'prompt' => 'Select Sector',
        'onchange' => '
                $.get("index.php?r=gac-entity-sector-u/load-entity-sub-sector-items&id=' . '"+$(this).val(), function(data){
                $("select#user-entity_sub_sector_id").html(data);
                    })'
    ]);
    ?>

    <?=
    $form->field($model, 'entity_sub_sector_id')->dropDownList(
            $entitySubSectorData, [
        'prompt' => 'Select Sub Sector',
        'onchange' => '
                $.get("index.php?r=gac-entity-sub-sector-u/load-entity-list-items&id=' . '"+$(this).val()+"&sid="+$("#user-entity_sector_id").val(), function(data){
                $("select#user-institutional_code").html(data);
                    })'
    ]);
    ?>

    <?=
    $form->field($model, 'institutional_code')->dropDownList(
            $entityListData, [
        'prompt' => 'Select Institution',
//        'onchange' => '
//                $.get("index.php?r=gac-gfs-list-u/get-gfs-code-desc&id=' . '"+$(this).val(), function(data){
//                $("label#entityCodeLabel").html(data);
//                    })'
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>