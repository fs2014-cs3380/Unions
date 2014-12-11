<?php

class PolicyController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Policy;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Policy'])) {
            $model->attributes = $_POST['Policy'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->policy_id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Policy'])) {
            $model->attributes = $_POST['Policy'];
            if ($model->save())
                $this->redirect(array('/policy'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->layout='//layouts/column1';

        $tag = new Tag('search');
        $criteria=new CDbCriteria;
        $criteria->together = true;
        $criteria->with = array('policies', 'policies.tags', 'policies.tags.tag');
        $criteria->addCondition('policies.active = true');

        if(isset($_POST['Tags'])) {
            $tag->attributes = $_POST['Tags'];
            $criteria->addCondition('LOWER(tag.tag) IN (\''.str_replace(',', '\', \'',strtolower($_POST['Tags'])).'\')');
            $categories = Category::model()->findAll($criteria);
            $this->renderPartial('_policies', array(
                'categories' => $categories,
            ));
        } else {
            $categories = Category::model()->findAll($criteria);
            $this->render('index', array(
                'categories' => $categories,
            ));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $this->layout='//layouts/column1';

        $policies = new Policy('search');
        $tags = new Tag('search');
        $categories = new Category('search');
        if(isset($_GET['Policy']))
            $policies->attributes = $_GET['Policy'];
        if(isset($_GET['Category']))
            $categories->attributes = $_GET['Category'];
        if(isset($_GET['Tag']))
            $tags->attributes = $_GET['Tag'];

        $this->render('admin', array(
            'policies' => $policies,
            'tags' => $tags,
            'categories' => $categories,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Policy::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'policy-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
