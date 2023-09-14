<?php

namespace backend\controllers;

use common\models\People;
use yii\web\Controller;

class StatisticsController extends Controller
{


    public function actionPeopleByYear()
    {

        $sql = "select count(*)                                                                                      as count,
       TO_CHAR(TO_TIMESTAMP(birthday), 'YYYY')                                                       AS year,
       (EXTRACT(YEAR FROM NOW() + INTERVAL '1 year') - TO_CHAR(TO_TIMESTAMP(birthday), 'YYYY')::int) as old,
       SUM(CASE WHEN gender = 1 THEN 1 ELSE 0 END)                                                   AS count_male,
       SUM(CASE WHEN gender = 2 THEN 1 ELSE 0 END)                                                   AS count_female
from people
group by TO_CHAR(TO_TIMESTAMP(birthday), 'YYYY')
order by old asc";

        $query = \Yii::$app->db->createCommand($sql);
        $rows = $query->queryAll();

//        echo "<pre>";
//        var_dump($rows);
//        die();
        $data = [];
        $total = 0;
        foreach ($rows as $index => $row) {

            $data[$index][] = $row['count'] ?? "";
            $data[$index][] = $row['year'] ?? "";
            $data[$index][] = $row['count_male'] ?? "";
            $data[$index][] = $row['count_female'] ?? "";
            $total += $row['count'];

        }
        $data[$index + 1][] = "Jami: ";
        $data[$index + 1][] = $total;

        $titles = [
            'Soni',
            'Yili',
            'Erkaklar soni',
            'Ayollar soni',
        ];


        $file = \Yii::createObject([
            'class' => 'codemix\excelexport\ExcelFile',
            'sheets' => [
                'Result per Country' => [   // Name of the excel sheet
                    'data' => $data,
                    // Set to `false` to suppress the title row
                    'titles' => $titles,
                ],

            ],

        ]);
        return $file->send();
    }
}