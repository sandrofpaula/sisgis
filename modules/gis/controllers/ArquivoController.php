<?php

namespace app\modules\gis\controllers;

use Yii;
use app\modules\gis\models\Arquivo;
use app\modules\gis\models\arquivoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArquivoController implements the CRUD actions for Arquivo model.
 */
class ArquivoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Arquivo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new arquivoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Arquivo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Arquivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Arquivo();
        //$arquivo = UploadedFile::getInstance($model,'arquivo_conteudo');// não estado
       // $model->uploadedFile=CUploadedFile::getInstance($model,'arquivo_conteudo');// não estado
       
            
        // $model->arquivo_conteudo = $file->name;
        //$model->arquivo_conteudo = $file;
       // $model->arquivo_conteudo = file_get_contents($file);
        
       $file = UploadedFile::getInstance($model, 'arquivo_conteudo');

       
       

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // $model->uploadedFile->saveAs("pdfs/".$model->uploadedFile,true); // não estado
           //$anexo = UploadedFile::getInstance($model,'ANEXO');
           
           
                // echo '<br>';
                // echo  '<br>$file: '.$file;
                // echo  '<br>$file->name: '.$file->name;
                // echo  '<br>$file->extension: '.$file->extension;
                // echo ' <br>$file->type: '. $file->type;
                // echo ' <br>$file->tempName: '. $file->tempName;
                // echo ' <br>$file->size: '. $file->size.' bytes';
                // echo '<br>';
                //die;
                //$model->saveAs();
               // $this->arquivo_conteudo = file_get_contents($file->tempName);
                $tamanho = $file->size.' bytes';
                $model->arquivo_conteudo_nome = $file->name;
                $model->arquivo_conteudo_tipo = $file->type;
                $model->arquivo_conteudo_size = $tamanho;
                //$model->arquivo_conteudo_size = $file->size;
                $model->arquivo_conteudo = file_get_contents($file->tempName);
                //$model->arquivo_conteudo = file_get_contents($file->name);
                $model->save();

            return $this->redirect(['view', 'id' => $model->arquivo_cod_pk]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Arquivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $file = UploadedFile::getInstance($model, 'arquivo_conteudo');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // $model->uploadedFile->saveAs("pdfs/".$model->uploadedFile,true); // não estado
           //$anexo = UploadedFile::getInstance($model,'ANEXO');
           
                // echo '<br>';
                // echo  '<br>$file: '.$file;
                // echo  '<br>$file->name: '.$file->name;
                // echo  '<br>$file->extension: '.$file->extension;
                // echo ' <br>$file->type: '. $file->type;
                // echo ' <br>$file->tempName: '. $file->tempName;
                // echo ' <br>$file->size: '. $file->size.' bytes';
                // echo '<br>';
                // die;
                //$model->saveAs();
               // $this->arquivo_conteudo = file_get_contents($file->tempName);
               $tamanho = $file->size.' bytes';
               $model->arquivo_conteudo_nome = $file->name;
               $model->arquivo_conteudo_tipo = $file->type;
               $model->arquivo_conteudo_size = $tamanho; 
               //$model->arquivo_conteudo_size = $file->size;
               //$model->arquivo_conteudo_size = $file->size;
               $model->arquivo_conteudo = file_get_contents($file->tempName);
               $model->save();
            return $this->redirect(['view', 'id' => $model->arquivo_cod_pk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDownload($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->arquivo_cod_pk]);
        // }

        return $this->render('download', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Arquivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Arquivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Arquivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Arquivo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDownloads()
	{
		/*
			* Dica: Sempre mantenha os arquivos de download em uma mesma pasta, separada dos arquivos do site.
			* Neste script usaremos a pasta download para esta fun��o.
			*/
		    // $id=$_GET['id'];
             $Arquivo = Arquivo::find()->where(['arquivo_cod_pk' => $id])->one();
	 
			// header('Cache-control: private');
			// header('Content-Type: application/octet-stream');
			// header('Content-Length: ' . filesize($Arquivo->arquivo_conteudo_nome));
			// header('Content-Disposition: filename=' . $Arquivo->arquivo_conteudo_tipo);
			// header("Content-Disposition: attachment; filename=" . basename(base64_encode($model->arquivo_conteudo)));

			// // Envia o arquivo Download
			// readfile($Arquivo->arquivo_conteudo);
            /////
           // $model = $this->loadModel($id);
           // $arquivo = Yii::app()->basePath."/../uploads/anexoDemandas/".$model->ANEXO_COD_PK.".".$model->ANEXO_FORMATO;
            
            header('Content-Description: File Transfer');
            header('Content-Disposition: attachment; filename="'.$Arquivo->arquivo_conteudo_nome.'"'); 
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Expires: 0');
            readfile(base64_encode($model->arquivo_conteudo));
	}
}
