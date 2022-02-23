<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\base\Model;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

//use app\models\Usuario;
use app\modules\admin\models\Usuario;
use app\modules\admin\models\usuarioSearch;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    /**
     * Displays alterarsenha page.
     *
     * @return Response|string
     */
    public function actionAlterarsenha()
    {
        $usuario = Usuario::findOne(Yii::$app->user->id); 
        $model = User::findOne(Yii::$app->user->id);
        //$model = $this->findModel(Yii::$app->user->id);
            
        if ($model->load(Yii::$app->request->post()) && $model->save()) { 

		//$senhaBanco = Yii::$app->user->identity->usuario_senha;
        $senhaBanco = $usuario->usuario_senha;
		$senhaForm = $_POST['User']['senhaAtual'];
		$novaSenha = $_POST['User']['novaSenha'];
		$confirmForm = $_POST['User']['confirm'];

        //echo '<br>senhaBanco: '.$senhaBanco;  //erro:campos vazios.
        //echo '<br>senhaForm: '.$senhaForm;  //erro:campos vazios.
        //echo '<br>novaSenha: '.$novaSenha;  //erro:campos vazios.
        //echo '<br>confirmForm: '.$confirmForm;  //erro:campos vazios.
        //die;
		if($senhaForm == "" || $novaSenha == "" || $confirmForm == ""){
			echo 0;  //erro:campos vazios.
		}
		
		if(($senhaBanco == md5($senhaForm)) 
		    && ($confirmForm == $novaSenha) 
		    && ($senhaForm != "" && $novaSenha != "" && $confirmForm != "") 
		    && (strlen($confirmForm) >=6) && (strlen($novaSenha) >= 6)){
			$model->usuario_senha = md5($confirmForm);
			
			if($model->save(false)){
                echo 1;  //ok,salvo.
                Yii::$app->session->setFlash('success' ,  '<b>Senha alterada com sucesso <font size="4"> <span class="glyphicon glyphicon-floppy-saved" style="color:green;"></b></font>');
                return $this->redirect(['/site/index']);
			}
			else{ 
                echo 2; //erro ao salvar
                Yii::$app->session->setFlash('error' ,  '<b>Erro ao alterada a senha <font size="4"><span class="glyphicon glyphicon-floppy-remove" style="color:red;"></span></b></font>');	
			}	
		}
		else{
            if($senhaBanco == md5($senhaForm)){
                $text01='<b>Senha do Banco OK <font size="4"><span class="glyphicon glyphicon-floppy-saved" style="color:green;"></span></b></font>';
            }else{ 	
                $text01='<b>Senha do Banco Invalida <font size="4"><span class="glyphicon glyphicon-floppy-remove" style="color:red;"></span></b></font>';
            }

           if($novaSenha != "" && $confirmForm != "" &&$novaSenha != " " && $confirmForm != " "){
                if($confirmForm == $novaSenha){
                        $text02='<b>Nova Senha e Confirmação Senha OK <font size="4"><span class="glyphicon glyphicon-floppy-saved" style="color:green;"></span></b></font>';
                }else{
                    $text02='<b>Nova Senha e Confirmação Senha Invalida <font size="4"><span class="glyphicon glyphicon-floppy-remove" style="color:red;"></span></b></font>';
                }
            }else{
                $text02='<b>Nova Senha e Confirmação Senha não pode ser em branco <font size="4"><span class="glyphicon glyphicon-floppy-remove" style="color:red;"></span></b></font>';
            }
            if((strlen($confirmForm) <6) && (strlen($novaSenha) < 6)){
                $text03='<b>É obrigatório que a Nova Senha e Confirmação Senha tenham no minimo 6 caracteres <font size="4"><span class="glyphicon glyphicon-floppy-remove" style="color:red;"></span></b></font>';
            }
           $text=$text01.'<br />'.$text02.'<br />'.$text03;
            echo 0; //erro senha nao confere
            Yii::$app->session->setFlash('error' , '<b>Senha não confere. </b><br><br>'. $text.'<br />');
            //return false;
        }

        $model->save();
        //return $this->redirect(['update', 'id' => $model->id]);
       
        ////////
           // return $this->redirect(['/site/index']);
            return $this->redirect(['alterarsenha']);
        } else {
            return $this->render('alterarsenha', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
