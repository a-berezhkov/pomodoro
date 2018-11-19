<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 14.04.2018
 * Time: 11:21
 */

namespace app\admin\controllers;


use app\admin\models\aOrders;
use app\front\models\Orders;
use app\front\models\User;
use yii\base\UserException;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\httpclient\Client;


class ExportController extends Controller
{

    public function actionIndex($type = null, $mode = null)
    {

        $myfile = fopen("web/testfile.txt", "a");
        if ($mode == 'checkauth') {


            $txt = date(" Y-m-d H:i:s")." mode checkauth = on  \n";
            fwrite($myfile, $txt);

            \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
            $headers = \Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/plain; charset=utf-8');
            $data = "success\nCookie\nCookie\n";
               return $this->renderPartial('abc',['data'=>$data]);
        } elseif ($mode == 'init') {
            $txt =  date(" Y-m-d H:i:s")."mode init = on \n";
            fwrite($myfile, $txt);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
            $headers = \Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/plain; charset=utf-8');
            $data = "zip=no\nfile_limit=10485760\n";
            return $this->renderPartial('abc',['data'=>$data]);
        }
        else{

            $txt = date(" Y-m-d H:i:s")." mode query = begin  \n";
            fwrite($myfile, $txt);
            \Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;

            $headers = \Yii::$app->response->headers;
            $headers->add('Content-Type', 'text/xml');


            $dom = new \DOMDocument('1.0', 'windows-1251');
            $orders = aOrders::find()->all();
            /**
             * КоммерческаяИнформация
             * <КоммерческаяИнформация ВерсияСхемы="2.03" ДатаФормирования="2007-10-30">
             */
            $commercialInfoElement = $dom->createElement('КоммерческаяИнформация');
            $commercialVersionAttribute = $dom->createAttribute('ВерсияСхемы');
            $commercialVersionAttribute->value = '2.03';
            $commercialDateAttribute = $dom->createAttribute('ДатаФормирования');
            $commercialDateAttribute->value = date('Y-m-d');
            $commercialInfoElement->appendChild($commercialVersionAttribute);
            $commercialInfoElement->appendChild($commercialDateAttribute);
            $dom->appendChild($commercialInfoElement);
            /**
             * <Документ> </Документ>
             */
            foreach ($orders as $order) {
                $documentElement = $commercialInfoElement->appendChild($dom->createElement('Документ'));
                /**
                 * <Ид>36</Ид>
                 */
                $id = $documentElement->appendChild($dom->createElement('Ид'));
                $id->appendChild($dom->createTextNode($order->id));

                $number = $documentElement->appendChild($dom->createElement('Номер'));
                $number->appendChild($dom->createTextNode($order->id));

                $date = $documentElement->appendChild($dom->createElement('Дата'));
                $date->appendChild($dom->createTextNode(date('Y-m-d', strtotime($order->created_at))));

                $operation = $documentElement->appendChild($dom->createElement('ХозОперация'));
                $operation->appendChild($dom->createTextNode('Заказ товара'));

                $role = $documentElement->appendChild($dom->createElement('Роль'));
                $role->appendChild($dom->createTextNode('Продавец'));

                $money = $documentElement->appendChild($dom->createElement('Валюта'));
                $money->appendChild($dom->createTextNode('руб'));

                $curse = $documentElement->appendChild($dom->createElement('Курс'));
                $curse->appendChild($dom->createTextNode('1'));

                $sum = $documentElement->appendChild($dom->createElement('Сумма'));
                $sum->appendChild($dom->createTextNode($order->sum_order));
                /**
                 * <Контрагенты></Контрагенты>
                 */
                $kontragentsElement = $documentElement->appendChild($dom->createElement('Контрагенты'));
                $kontragentElement = $kontragentsElement->appendChild($dom->createElement('Контрагент'));

                $kId = $kontragentElement->appendChild($dom->createElement('Ид'));
                $kId->appendChild($dom->createTextNode($order->profile->user_id));

                $kName = $kontragentElement->appendChild($dom->createElement('Наименование'));
                $kName->appendChild($dom->createTextNode($order->profile->company_name));

                $kRole = $kontragentElement->appendChild($dom->createElement('Роль'));
                $kRole->appendChild($dom->createTextNode('Покупатель'));

                $kFullName = $kontragentElement->appendChild($dom->createElement('ПолноеНаименование'));
                $kFullName->appendChild($dom->createTextNode($order->profile->company_name));


                $inn= $kontragentElement->appendChild($dom->createElement('ИНН'));
                $inn->appendChild($dom->createTextNode($order->profile->inn));

                $inn= $kontragentElement->appendChild($dom->createElement('ОфициальноеНаименование'));
                $inn->appendChild($dom->createTextNode($order->profile->company_name));

                $inn= $kontragentElement->appendChild($dom->createElement('КПП'));
                $inn->appendChild($dom->createTextNode($order->profile->kpp));

                $kUserSurname = $kontragentElement->appendChild($dom->createElement('Фамилия'));
                $kUserSurname->appendChild($dom->createTextNode($order->profile->surname));


                $kUserName = $kontragentElement->appendChild($dom->createElement('Имя'));
                $kUserName->appendChild($dom->createTextNode($order->profile->name));
                //РеквизитыЮрЛица
                /**
                 * Адрес контрагента
                 */
                $adressKontragentElements = $kontragentElement->appendChild($dom->createElement('АдресРегистрации'));

                $adressKontragentElement = $adressKontragentElements->appendChild($dom->createElement('АдресноеПоле'));
                $city = $adressKontragentElement->appendChild($dom->createElement('Город'));
                $city->appendChild($dom->createTextNode($order->profile->address_city));

                $adressKontragentElement = $adressKontragentElements->appendChild($dom->createElement('АдресноеПоле'));
                $addressStreet = $adressKontragentElement->appendChild($dom->createElement('Улица'));
                $addressStreet->appendChild($dom->createTextNode($order->profile->address_street));

                $adressKontragentElement = $adressKontragentElements->appendChild($dom->createElement('АдресноеПоле'));
                $addressStreet = $adressKontragentElement->appendChild($dom->createElement('Улица'));
                $addressStreet->appendChild($dom->createTextNode($order->profile->address_street));

                $adressKontragentElement = $adressKontragentElements->appendChild($dom->createElement('АдресноеПоле'));
                $addressHouse = $adressKontragentElement->appendChild($dom->createElement('Дом'));
                $addressHouse->appendChild($dom->createTextNode($order->profile->address_house));

                $adressKontragentElement = $adressKontragentElements->appendChild($dom->createElement('АдресноеПоле'));
                $addressHousing = $adressKontragentElement->appendChild($dom->createElement('Корпус'));
                $addressHousing->appendChild($dom->createTextNode($order->profile->address_housing));

                $adressKontragentElement = $adressKontragentElements->appendChild($dom->createElement('АдресноеПоле'));
                $addressOffice = $adressKontragentElement->appendChild($dom->createElement('Квартира'));
                $addressOffice->appendChild($dom->createTextNode($order->profile->address_office));


                /**
                 * Контакты
                 */
                $contactKontragentElements = $kontragentElement->appendChild($dom->createElement('Контакты'));

                $contactField = $contactKontragentElements->appendChild($dom->createElement('Контакт'));
                $typeAddressField = $contactField->appendChild($dom->createElement('Тип'));
                $typeAddressField->appendChild($dom->createTextNode('Телефон рабочий'));

                $typeAddressField = $contactField->appendChild($dom->createElement('Значение'));
                $typeAddressField->appendChild($dom->createTextNode($order->profile->phone));

                $contactField = $contactKontragentElements->appendChild($dom->createElement('Контакт'));
                $emailAddressField = $contactField->appendChild($dom->createElement('Тип'));
                $emailAddressField->appendChild($dom->createTextNode('Почта'));

                $emailAddressField = $contactField->appendChild($dom->createElement('Значение'));
                $emailAddressField->appendChild($dom->createTextNode($order->profile->user->email));





                /**
                 * ВремяЗаказа
                 */
                $time = $documentElement->appendChild($dom->createElement('Время'));
                $time->appendChild($dom->createTextNode(date('h:i:s', strtotime($order->created_at))));

                /**
                 *    <Товары></Товары>
                 */

                $itemsElement = $documentElement->appendChild($dom->createElement('Товары'));
                foreach ($order->carts as $cart) {
                    $itemElement = $itemsElement->appendChild($dom->createElement('Товар'));

                    $itemId = $itemElement->appendChild($dom->createElement('Ид'));
                    $itemId->appendChild($dom->createTextNode($cart->store->id)); //WTF????

                    $itemName = $itemElement->appendChild($dom->createElement('Наименование'));
                    $itemName->appendChild($dom->createTextNode($cart->store->name));

                    $itemBase = $itemElement->appendChild($dom->createElement('БазоваяЕдиница'));
                    //Код по ОКЕИ
                    $itemBaseVersion = $dom->createAttribute('Код');
                    $itemBaseVersion->value = '166';
                    $itemBase->appendChild($itemBaseVersion);
                    //Полное наименование
                    $itemBaseFullName = $dom->createAttribute('НаименованиеПолное');
                    $itemBaseFullName->value = 'Килограмм';
                    $itemBase->appendChild($itemBaseFullName);
                    // И так понятно
                    $itemBaseShortWorld = $dom->createAttribute('МеждународноеСокращение');
                    $itemBaseShortWorld->value = 'KGM';
                    $itemBase->appendChild($itemBaseShortWorld);

                    $itemBase->appendChild($dom->createTextNode('кг'));

                    $itemPriceOne = $itemElement->appendChild($dom->createElement('ЦенаЗаЕдиницу'));
                    $itemPriceOne->appendChild($dom->createTextNode(
                        ($cart->store->is_sale == true) ? $cart->store->discount_box_price : $cart->store->box_price
                    ));

                    $itemCount = $itemElement->appendChild($dom->createElement('Количество'));
                    $itemCount->appendChild($dom->createTextNode($cart->count));

                    $itemCount = $itemElement->appendChild($dom->createElement('Сумма'));
                    $itemCount->appendChild($dom->createTextNode($cart->sum));

                    $requisites = $itemElement->appendChild($dom->createElement('ЗначенияРеквизитов'));

                    $requisites_1 = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $r_1Name = $requisites_1->appendChild($dom->createElement('Наименование'));
                    $r_1Name->appendChild($dom->createTextNode('ВидНоменклатуры'));

                    $r_1Name = $requisites_1->appendChild($dom->createElement('Значение'));
                    $r_1Name->appendChild($dom->createTextNode('Товар'));

                    $requisites_2 = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $r_2Name = $requisites_2->appendChild($dom->createElement('Наименование'));
                    $r_2Name->appendChild($dom->createTextNode('ТипНоменклатуры'));

                    $r_2Name = $requisites_2->appendChild($dom->createElement('Значение'));
                    $r_2Name->appendChild($dom->createTextNode('Товар'));
                }
                    // Значения рекизитов НЕ товаров, а ЗАКАЗА!!!!
                    $requisites = $documentElement->appendChild($dom->createElement('ЗначенияРеквизитов'));
                    /**
                     * Реквизит №1 Метод оплаты
                     */
                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Метод оплаты'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode($order->payment));
                    /**
                     * Реквизит №2  Дата разрешения доставки
                     */
                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Дата разрешения доставки'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode(
                        (date('Y-m-d', strtotime($order->delivery_date))).' '.
                        (($order->delivery_interval == '8-13') ? '08:00:00' : '14:00:00')
                    ));
                    /**
                     * Реквизит №3 Заказ оплачен
                     */
                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Заказ оплачен'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode('false'));
                    /**
                     * Реквизит №4 Доставка разрешена
                     */
                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Доставка разрешена'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode('false'));

                /**
                 * Реквизит №5 Отменен
                 */
                $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                $name = $requis->appendChild($dom->createElement('Наименование'));
                $name->appendChild($dom->createTextNode('Отменен'));

                $value = $requis->appendChild($dom->createElement('Значение'));
                $value->appendChild($dom->createTextNode(($order->dropping == 1) ?  'true' : 'false'));


                /**
                     * Реквизит №6 Финальный статус
                     */
                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Финальный статус'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode('false'));

                    /**
                     * Реквизит №5 Статус заказа
                     */
                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Статус заказа'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode('[N] Принят'));

                    $requis = $requisites->appendChild($dom->createElement('ЗначениеРеквизита'));

                    $name = $requis->appendChild($dom->createElement('Наименование'));
                    $name->appendChild($dom->createTextNode('Адрес доставки'));

                    $value = $requis->appendChild($dom->createElement('Значение'));
                    $value->appendChild($dom->createTextNode($order->fullAddress));



            }

            $dom->formatOutput = true; // установка атрибута formatOutput

            //  return $dom->saveXML();
            $data = $dom->saveXML();
        $txt  =  date(" Y-m-d H:i:s")."mode query = end \n";
        fwrite($myfile, $txt);

        fclose($myfile);
            return $this->renderPartial('test', ['data' => $data]);
            // print ($dom->saveXML());
            // $dom->save('test1.xml');
        }
    }

}