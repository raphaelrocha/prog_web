<?php

namespace app\controllers;

use Yii;
use app\models\Aluno;
use app\models\AlunoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper; 
use app\models\CursoSearch;

/**
 * AlunoController implements the CRUD actions for Aluno model.
 */
class AlunoController extends Controller
{
    public function behaviors()
    {
        return [
		
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Aluno models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoSearch();
        
       
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aluno model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id=null)
    {
        if($id==NULL){
            $id='1342';
        }
        $sql = 'SELECT ano_ingresso FROM aluno WHERE id='.$id;
        $valor = Aluno::findBySql($sql)->one();
        $ano = $valor->ano_ingresso;
        $model = $this->findModel($id);
        $alunosAno = Aluno::find()->where('ano_ingresso='.$ano)->count();

        return $this->render('view', [
            'model' => $model,
            'alunosAno' => $alunosAno,
            'ano' => $ano,
        ]);
    }

    /**
     * Creates a new Aluno model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Aluno();
        //$cursos = Curso::find()->all();
       $arrayCursos=ArrayHelper::map(CursoSearch::find()->all(),'id','nome');
       // $modeloCurso = CursoSearch::findAll($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'arrayCursos'=>$arrayCursos,
            ]);
        }
    }

    /**
     * Updates an existing Aluno model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $arrayCursos=ArrayHelper::map(CursoSearch::find()->all(),'id','nome');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'arrayCursos'=>$arrayCursos,
            ]);
        }
    }

    /**
     * Deletes an existing Aluno model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTurma($ano){
        $searchModel = new AlunoSearch();
        $queryParams["AlunoSearch"]["ano_ingresso"] = $ano ;
        $dataProvider = $searchModel->search($queryParams);

        return $this->render('turma_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ano' => $ano,
        ]);
    }

    /**
     * Finds the Aluno model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aluno the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aluno::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
