<?php
/**
 * 集成常用公用方法
 * Created by PhpStorm.
 * User: 沈枫山
 * Date: 2018/3/14
 * Time: 22:23
 */

namespace app\common\components;


use yii\web\Controller;
use yii\web\Cookie;

class BaseWebController extends Controller
{
    //关闭csrf
    public $enableCsrfValidation = false;

    /**
     * 获取http get参数
     * @param $key
     * @param string $default_val 默认值
     * @return array|mixed
     */
    public function get($key, $default_val = "")
    {
        return \Yii::$app->request->get($key, $default_val);
    }

    /**
     * 获取http post参数
     * @param $key
     * @param string $default_val
     * @return array|mixed
     */
    public function post($key, $default_val = "")
    {
        return \Yii::$app->request->post($key, $default_val);
    }

    /**
     * 设置cookie
     * @param $name
     * @param $value
     * @param int $expire
     */
    public function setCookie($name, $value, $expire = 0)
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => $name,
            'value' => $value,
            'expire' => $expire
        ]));
    }

    /**
     * 获取cookie
     * @param $name
     * @param string $default_val
     * @return mixed
     */
    public function getCookie($name, $default_val = "")
    {
        $cookies = \Yii::$app->request->cookies;
        return $cookies->getValue($name, $default_val);
    }

    /**
     * 删除cookie
     * @param $name
     */
    public function removeCookie($name)
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->remove($name);
    }

    /**
     * 删除所有Cookie
     */
    public function removeAllCookie()
    {
        $cookies = \Yii::$app->response->cookies;
        $cookies->removeAll();
    }

    /**
     * 设置session
     * @param $name
     * @param $value
     */
    public function setSession($name, $value)
    {
        $session = \Yii::$app->session;
        $session->set($name, $value);
    }

    /**
     * 获取session
     * @param $name
     * @param string $default_val
     * @return mixed
     */
    public function getSession($name, $default_val = "")
    {
        $session = \Yii::$app->session;
        return $session->get($name, $default_val);
    }

    /**
     * 删除 session
     * @param $name
     */
    public function removeSession($name)
    {
        $session = \Yii::$app->session;
        $session->remove($name);
    }

    /**
     * 删除所有session
     */
    public function removeAllSession()
    {
        $session = \Yii::$app->session;
        $session->removeAll();
    }


    /**
     * api统一返回json格式方法
     * @param array $data
     * @param string $msg
     * @param int $code
     */
    public function renderJson($data = [], $msg = "ok", $code = 200)
    {
        header('Content-type: application/json');
        echo json_encode([
            "code" => $code,
            "msg" => $msg,
            "data" => $data,
            "req_id" => uniqid(),
        ]);
    }

    /**
     * web端统一返回js提示
     * @param $msg
     * @param string $url
     * @return string
     */
    protected  function renderJS($msg,$url = "/")
    {
        return $this->renderPartial("@app/views/common/js", ['msg' => $msg, 'location' => $url]);
    }

}