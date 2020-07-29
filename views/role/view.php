<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\MMenugroup;


/* @var $this yii\web\View */
/* @var $model app\models\Mwebgroup */

$this->title = "Group Pengguna : ".$model->gusername;
$this->params['breadcrumbs'][] = ['label' => 'Mwebgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mwebgroup-view">


    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->group_user], ['class' => 'btn btn-primary']) ?>
        <?php if(!$used){ echo Html::a('Hapus', ['delete', 'id' => $model->group_user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);} ?>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    //$types = Route::find()->where(['status' => 1])->groupBy('type')->all();
    $types = \app\models\MMenucfg::find()->select('menuname')->distinct()->all();
    echo "<table id='permissionTable' class='table table-striped'>";
    echo "<thead>";
    echo "<tr>";
    echo "<td width='200px'>Type</td>";
    echo "<td>Permision</td>";
    echo "</tr>";
    echo "</thead>";
    $auth = Yii::$app->authManager;
    //$permissions = $auth->getPermissionsByRole($model->group_user);
    foreach ($types as $perm)
    {
        $permissions[] = $perm->menucode;
    }


    echo "<tbody>";
    foreach ($types as $type) {
        echo "<tr>";
        echo "<td>";
        echo $type->menuname;
        echo "</td>";
        echo "<td>";
        $aliass = \app\models\MMenucfg::find()->where([
            'menuname' => $type->menuname,
        ])->all();
        foreach ($aliass as $alias) {
            echo "<label class='label-block'>";
            $can = MMenugroup::find()->where('menucode = :code and group_user = :grp',[':code' => $alias->menucode,':grp' => $model->group_user])->one();
            $checked = false;
            if($can != NULL) $checked = true;
            echo Html::checkbox($type->menutitle.'_'.$alias->menutitle,$checked,[
                    'title' => $alias->menucode,
                    'class' => 'checkboxPermission',
                ]).' '.$alias->menutitle;

            //echo "Test";
            echo "</label>";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    ?>

</div>

<?php
$this->registerJs('
  // $(".checkboxPermission").bind("click", function(){
  //     //setPermission($(this).attr("title"));
  //     alert("Klik");
  // });

    $(".checkboxPermission").change(function() {
        var ischecked= $(this).is(":checked");
        if(!ischecked){
            removePermission($(this).attr("title"));
        }
        else{
            setPermission($(this).attr("title"));
        }
    }); 

  function setPermission(permissionName){
    $.post( "'.Url::to(['setpermission','roleName'=>$model->group_user]).'&permissionName="+permissionName, function( data ) {
        console.log(data.data)
    });
  }

  function removePermission(permissionName){
    $.post( "'.Url::to(['removepermission','roleName'=>$model->group_user]).'&permissionName="+permissionName, function( data ) {
        console.log(data.data)
    });
  }
');

$this->registerCss('
    .label-block{
        display:block;
        width:100px;
        float:left;
        overflow:hidden;
        font-weight: normal;
        font-size:80%;
        border-right:1px solid #ddd;
        margin-right:5px;
    }

    table#permissionTable tbody tr td, table#permissionTable tbody tr th{
        padding: 0px 5px !important;
    }
');

