<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Product;

use backend\modules\staff\models\Staff;
use common\models\User;
use common\models\UserToken;
use backend\models\StaffData;

use yii\db\Expression;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'test', 'jeb-web'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        return $this->render('index', [
			'user' => User::findOne(Yii::$app->user->identity->id),
		]);
    }
	
	public function actionRundata(){
		/* $data = StaffData::find()->all();
		echo time();
		foreach($data as $u){
			$user = new User;
			$user->username = $u->staff_no;
			$user->fullname = $u->fullname;
			$user->email = $u->email;
			$user->created_at = time();
			$user->confirmed_at = time();
			$user->password_hash = $u->password;
			$user->status = 10;
			$user->blocked_at = 0;
			if($user->save(false)){
				$staff = new Staff;
				$staff->staff_title = $u->title;
				$staff->user_id = $user->id;
				$staff->staff_no = $u->staff_no;
				$staff->is_academic = $u->is_academic;
				$staff->updated_at = new Expression('NOW()');
				if(!$staff->save(false)){
					break;
				}
			}else{
				break;
			}
		} */
	}
	

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
			
            return $this->goBack();
        } else {
            $this->layout = "//main-login";
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionJebWeb()
    {
		$id = Yii::$app->user->identity->id;
       $token = new UserToken;
		$token->user_id = $id;
		$token->token = Yii::$app->security->generateRandomString();
		$token->created_at = time();
		
		if(YII_ENV == 'prod'){
			$url = 'https://jeb.umk.edu.my/admin/';
		}else{
			$url = '/projects/jeb/pro02/backend/web/';
		}
		
		$url = $url . 'site/login-portal?u='.$id.'&t='.$token->token;
		
		if($token->save()){
			return $this->redirect($url);
		}

    }
	

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
