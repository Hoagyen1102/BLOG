<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
class vendor_api_controller extends vendor_crud_controller
{
    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            die();
        }

        parent::__construct();
    }

    public function arrayToString($array) {
        $result = '';
        foreach ($array as $k => $v) {
            if (gettype($k) == 'string') {
                $result .= $k . ':' . $v . '|';
            } else {
                $result .= $v . '|';
            }
        }
        return $result;
    }

    public function decodeApi($api) {
        $categories = category_model::getInstance();
        $data = [];
        $json = json_decode($api, true);
        foreach ($json as $key => $value) {
            $data[$key] = json_decode($value, true);
            foreach ($data[$key] as $k => $v) {
                if (gettype($v) == 'array') {
                    $data[$key][$k] = $this->arrayToString($v);
                }
                if ($k == 'category') {
                    $category = $categories->getDetailRecord('id', ['conditions' => 'name = "' . $data[$key][$k] . '"']);
                    $data[$key]['category_id'] = $category['id'];
                }
            }
        }
        return $data;
    }

    public function Api($model, $get) {
        $arrayKey = array_keys($get);
        if (isset($get['p']) && $arrayKey[count($arrayKey) - 1] != 'p') {
            echo '{ "message" : "url incorrect" }';
            exit;
        }
        $c = 0;
        unset($get['p']);
        $id = '(';
        $options =['conditions' => null];
        if (isset($get['category_id'])) {
            $category = category_model::getInstance();
            $idArray = $category->getRecordsArray('id', ['conditions' => 'path REGEXP "' . $get['category_id'] . '"']);
            unset($get['category_id']);
            $i = 0;
            foreach ($idArray['data'] as $key => $value) {
                if ($i) {
                    $id .= ',';
                }

                $id .= $value['id'];
                $i++;
            }
            $id .= ")";
            $options = ['conditions' => 'category_id in ' . $id];
            $c++;
        }
        if (isset($get['id'])) {
            $options = ['conditions' => 'id ="' . $get['id'] . '"'];
            $c++;
            unset($get['id']);
        }
        foreach($get as $k => $v) {
            if($c) $options.=',';
            isset($options['conditions']) ? $options['conditions'] .= $k.' LIKE "%'.$v.'%"' : $options['conditions'] = $k.' LIKE "%'.$v.'%"';
        }
        $options['order'] = 'id ASC';
        $this->records = $model->allp('*', $options);
        $response = json_encode($this->records['data'], JSON_UNESCAPED_UNICODE);
        echo '<pre>';
        print_r(strip_tags($response));
    }
}
