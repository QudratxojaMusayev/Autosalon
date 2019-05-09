<?php
namespace backend\controllers;

use common\models\LoginJournal;
use Sinergi\BrowserDetector\Browser;
use Sinergi\BrowserDetector\Device;
use Sinergi\BrowserDetector\Os;
use Yii;
use yii\db\Expression;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $loginJournal = new LoginJournal();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $loginJournal->admin_id = Yii::$app->user->id;
            $loginJournal->ip_address = $this->getUserIpAddr();
            $loginJournal->login_time = new Expression('NOW()');

            $browser = new Browser();
            $loginJournal->browser = $browser->getName(). ' ' .$browser->getVersion();

            $os = new Os();
            $loginJournal->os = $os->getName() . ' ' . $os->getVersion();

            $device = new Device();
            $loginJournal->device = $device->getName();

            if ($loginJournal->save()) {
                echo "Success";
            }

            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
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

        $model = new LoginForm();

        return $this->renderPartial('login', [
            'model' => $model,
        ]);
    }

    public function actionLanguage($lang) {
        if ($lang == 'uz') {
            Yii::$app->language = 'uz';
        } elseif ($lang == 'en') {
            Yii::$app->language = 'en';
        }
    }

    protected function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
