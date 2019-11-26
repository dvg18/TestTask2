<?php

/**
 * Class Logic
 */
class Logic
{
    /** @var int id of used row */
//    const ID = 1;

    /**
     * @param string $line
     * @return bool|string
     */
    public static function process($line = '')
    {
        // URL скрипта авторизации на стороннем сайте
        $login_url = 'https://www.streamatemodels.com/smm/login.php';

        // параметры для отправки запроса - логин и пароль
        $post_data = array(
            'submitted' => '1',
            'g' => '',
            'sausr' => 'comfy0508182012298@camwork.club',
            'sapwd' => 'Web8295Work',
            'login-form-submit' => 'login'
        );

        // создание объекта curl
        $ch = curl_init();

        // используем User Agent браузера
        $agent = $_SERVER["HTTP_USER_AGENT"];
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        // задаем URL
        curl_setopt($ch, CURLOPT_URL, $login_url);

        // указываем что это POST запрос
        curl_setopt($ch, CURLOPT_POST, 1);

        // задаем параметры запроса
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        // указываем, чтобы нам вернулось содержимое после запроса
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // в случае необходимости, следовать по перенаправлениям
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        /*
            Задаем параметры сохранени¤ cookie
            как правило Cookie необходимы для дальнейшей работы с авторизацией
        */

        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');


        // выполняем запрос для авторизации
        $postResult = curl_exec($ch);

        curl_close($ch);

        // Если выводим результат работы curl на страницу через Echo,
        // то показывает страницу с авторизованным пользователем (всё работает)
        return $postResult;
    }
}
