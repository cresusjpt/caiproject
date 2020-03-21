<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BienImmobilier;

/**
 * BienImmobilierSearch represents the model behind the search form of `app\models\BienImmobilier`.
 */
class BienImmobilierSearch extends BienImmobilier
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bien', 'id_client'], 'integer'],
            [['nom', 'lieu', 'categorie'], 'safe'],
            [['prix'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function searchIndexData($params){
        $query = BienImmobilier::find();

        $this->load($params);

        $query->limit(5);

        return $query->all();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BienImmobilier::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_bien' => $this->id_bien,
            'prix' => $this->prix,
            'id_client' => $this->id_client,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'lieu', $this->lieu])
            ->andFilterWhere(['like', 'categorie', $this->categorie]);

        return $dataProvider;
    }
}
