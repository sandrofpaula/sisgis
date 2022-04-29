<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Usuario;
use app\modules\admin\models\usuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete','findModel'],
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete','findModel'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                // 'denyCallback' => function ($rule, $action) {
                //     throw new \Exception('Você não está autorizado a acessar esta página');
                // }
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new usuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
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
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();

        //$model->usuario_nome = mb_strtoupper($model->usuario_nome);
        //$model->usuario_login = mb_strtolower($model->usuario_login);
        //$model->usuario_email = mb_strtolower($model->usuario_email);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usuario_cod_pk]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       // $model->usuario_nome = mb_strtoupper($model->usuario_nome);
        //$model->usuario_login = mb_strtolower($model->usuario_login);
        //$model->usuario_email = mb_strtolower($model->usuario_email);
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usuario_cod_pk]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Usuario model.
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
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
     //function generatePassword($qtyCaraceters = 8)
     public function actionPassword($id, $qtyCaraceters = 8){

        //Letras minúsculas embaralhadas
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');
    
        //Letras maiúsculas embaralhadas
        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
    
        //Números aleatórios
        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;
    
        //Caracteres Especiais
        //$specialCharacters = str_shuffle('!@#$%*-');
    
        //Junta tudo
        $characters = $capitalLetters.$smallLetters.$numbers/*.$specialCharacters*/;
    
        //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);
        //salvar password no banco
        $idUsername=$id;
        $model = $this->findModel($idUsername);
        $model->usuario_senha = md5($password);
        $model->save();
        //salvar password no banco - FIM
        $resetarsenha= '
        <b>Nome:</b> '.$model->usuario_nome.
        '<br /> <b>E-mail:</b> '.$model->usuario_email.
        '<br /> <b>Login:</b> '.$model->usuario_login.
        '<br/><b>Senha:</b> '.$password;
        ////////////////////////////
        $resetarsenhaEmail= '
        -Sistema Mimosa- <br>
        <br>
        Sua senha foi resetada <br>
        <br>
        <b>Nome:</b> '.$model->usuario_nome.
        '<br /> <b>E-mail:</b> '.$model->usuario_email.
        '<br /> <b>Login:</b> '.$model->usuario_login.
        '<br/><b>Senha:</b> '.$password.
        '
        <br>
        <br>
        ATENÇÃO<br>
        Mensagem automática.<br>
        Não retorne essa mensagem.<br>
        '
        ;
       
        //Exemplo
        /*
        Yii::$app->mailer->compose()
        ->setTo($email)
        ->setFrom([$this->email => $this->name])
        ->setSubject($this->subject)
        ->setTextBody($this->body)
        ->send();
        */
        //Fim-Exemplo

        //Enviasr E-mail
  
        Yii::$app->mailer->compose()
        ->setFrom('sandrofpaula@gmail.com')//DE
        ->setTo($model->usuario_email)//Para
        //->setTo('sandrofpaula@gmail.com')//Para
        ->setSubject('Senha Resetada com Sucesso')//Assunto da mensagem
        ->setTextBody('Senha foi resetada com sucesso!')//Conteúdo de texto simples
        ->setHtmlBody($resetarsenhaEmail)//Conteúdo HTML
        ->send();
        

        /////////////////////////////////////
        //Retorna a senha
        Yii::$app->session->setFlash('success' , '<b>Senha resetada com Sucesso.</b><br><br>'. $resetarsenha.'<br />');
        return $this->redirect(['index']);
    }
}
