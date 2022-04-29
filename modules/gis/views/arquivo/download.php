<?php
namespace app\modules\gis\controllers;

use Yii;
use app\modules\gis\models\Arquivo;
use app\modules\gis\models\arquivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

$id=$_GET['id'];
$Arquivo = Arquivo::find()->where(['arquivo_cod_pk' => $id])->one();
echo $Arquivo->arquivo_conteudo_tipo;
echo '<br><br><br><br><br><br>';


// header("Content-type:$Arquivo->arquivo_conteudo_tipo");  
// echo $Arquivo->arquivo_conteudo;

header('Cache-control: private');
			header('Content-Type: application/octet-stream');
			header('Content-Length: ' . filesize($Arquivo->arquivo_conteudo_nome));
			header('Content-Disposition: filename=' . $Arquivo->arquivo_conteudo_tipo);
			header("Content-Disposition: attachment; filename=" . basename($Arquivo->arquivo_conteudo));

			// Envia o arquivo Download
			readfile(base64_encode($model->arquivo_conteudo));

?>

