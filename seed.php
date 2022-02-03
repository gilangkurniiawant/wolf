<?php
include_once('modul/modul.php');


//error_reporting(0);


function validate_json($str = NULL)
{
    if (is_string($str)) {
        @json_decode($str);
        return (json_last_error() === JSON_ERROR_NONE);
    }
    return false;
}


function inbet(){
    $d['url']= "https://wolf.bet/api/v2/dice/auto/start";
    $d['data'] = '{"currency":"trx","game":"dice","amount":"0.00000001","multiplier":"2.475","rule":"under","bet_value":"40","config":[{"command":[{"name":"resetAmount"}],"when":[{"name":"win","value":1,"type":"every"}]},{"command":[{"name":"increaseAmountPercent","value":100}],"when":[{"name":"lose","value":1,"type":"every"}]}]}';
    $d['header']= 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6
authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiYWQyYmEwZTRhNDBiOTMxMGJhZTg1ZmQ4ODAyNmE0OTUwMjZmNDE0MWRiMDNkMWNmMzMyNTY5ZmZlMDdjMTE3YzJiMDUyMDczMmFmMzg1NzUiLCJpYXQiOjE2NDM2ODY1MTIsIm5iZiI6MTY0MzY4NjUxMiwiZXhwIjoxNjc1MjIyNTEyLCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.hz8_cyB_kemH8kfIXy13RxhMdbiw5YzPXaDh3Q70-W7f7LOas9EjA8Z2vDXraB9gWjrTCUnzpM_RVOxEgozzHGk9QnWvjZTlu7j9TYnxaP80kC8STIT4AVRhRfKR6aNUvhuDYb0IHzdja0xn1n4Wo9bxxAlRaMPFGCM7ceBTs-cZd2gWfFLjtaaDM_AM3CjS_rIOhLyjFk8VclaEjvDnBH5H5Zgtf5FSMLhWNzezHSRoIiY-V4BydD262i5tW2XbqPIdArJQwAxEYrQR67PmfJzQ-s1IGjzyG75sR-F7MrdkR00r_JCRRE6xtBAO4-n4Qbk3fJFt7VfArPz9cGkLcaR0ta5eMRcHPhOJow21i4ck2_Q_odcMgDtIX1Uf11I0Z1ILSyvPOd-nS_tSnrKEUcwPoOaNdwgH6-CCPJeylJeHzRtnv_G2W8Tnn6aiXmSzS_5gxX4I7xdzvM4Y7kVAllK99TqSxTQrW1dbXZinq3pyP9TO0ttLEZOLS07mLBFnRbywI9EN29LGAWu04gg6i9llXHIed3kNiRGVv6OIO5iBs1h-ExbhcDyp7puUVvG7cnTIyfuYt8pCAYquh7lFQvY7f2isEPOShhMy8Eepmx7dtQhMTEXDTwagP_1CkZMNQt0FNJ5cXZbLVJLie76DwPHJHhajmDofm_P5CFgv7bo
content-type: application/json
origin: http://wolf.bet
referer: http://wolf.bet/
user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36
x-client-type: Web-Application
x-hash-api: ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b
x-requested-with: XMLHttpRequest';
$is = curl($d)['result'];
echo $is;
}

function starbet($id)
{
    $d['url'] = "https://wolf.bet/api/v2/dice/auto/play";
    $d['data'] = '{"uuid":"'.$id.'"}';
    $d['header'] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6
authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiYWQyYmEwZTRhNDBiOTMxMGJhZTg1ZmQ4ODAyNmE0OTUwMjZmNDE0MWRiMDNkMWNmMzMyNTY5ZmZlMDdjMTE3YzJiMDUyMDczMmFmMzg1NzUiLCJpYXQiOjE2NDM2ODY1MTIsIm5iZiI6MTY0MzY4NjUxMiwiZXhwIjoxNjc1MjIyNTEyLCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.hz8_cyB_kemH8kfIXy13RxhMdbiw5YzPXaDh3Q70-W7f7LOas9EjA8Z2vDXraB9gWjrTCUnzpM_RVOxEgozzHGk9QnWvjZTlu7j9TYnxaP80kC8STIT4AVRhRfKR6aNUvhuDYb0IHzdja0xn1n4Wo9bxxAlRaMPFGCM7ceBTs-cZd2gWfFLjtaaDM_AM3CjS_rIOhLyjFk8VclaEjvDnBH5H5Zgtf5FSMLhWNzezHSRoIiY-V4BydD262i5tW2XbqPIdArJQwAxEYrQR67PmfJzQ-s1IGjzyG75sR-F7MrdkR00r_JCRRE6xtBAO4-n4Qbk3fJFt7VfArPz9cGkLcaR0ta5eMRcHPhOJow21i4ck2_Q_odcMgDtIX1Uf11I0Z1ILSyvPOd-nS_tSnrKEUcwPoOaNdwgH6-CCPJeylJeHzRtnv_G2W8Tnn6aiXmSzS_5gxX4I7xdzvM4Y7kVAllK99TqSxTQrW1dbXZinq3pyP9TO0ttLEZOLS07mLBFnRbywI9EN29LGAWu04gg6i9llXHIed3kNiRGVv6OIO5iBs1h-ExbhcDyp7puUVvG7cnTIyfuYt8pCAYquh7lFQvY7f2isEPOShhMy8Eepmx7dtQhMTEXDTwagP_1CkZMNQt0FNJ5cXZbLVJLie76DwPHJHhajmDofm_P5CFgv7bo
content-type: application/json
origin: http://wolf.bet
referer: http://wolf.bet/
user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36
x-client-type: Web-Application
x-hash-api: ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b
x-requested-with: XMLHttpRequest';
    batgen:
    $is = curl($d);
    if (validate_json($is['result'])) {
        $res = json_decode($is['result'],true);
        if(@$res['bet']['state']){
            echo $res['bet']['state'] ." - ".$res['bet']['amount'] ." - ".$res['bet']['profit'] ." | ".$res['userBalance']['amount']."\n"; 
        }
    } else {
        goto batgen;
    }
}


function kseed()
{
    $rseed = hash('sha256', rand(11111111, 99999999) . '' . rand(11111111, 99999999) . '' . rand(11111111, 99999999) . '' . rand(11111111, 99999999) . '' . rand(11111111, 99999999) . '' . rand(11111111, 99999999) . '' . rand(11111111, 99999999) . '' . rand(11111111, 99999999));
    //$rseed = substr($rseed, 0, 64);
    $d['url'] = "https://wolf.bet/api/v1/user/seed/refresh";
    $d['header'] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6
authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiYWQyYmEwZTRhNDBiOTMxMGJhZTg1ZmQ4ODAyNmE0OTUwMjZmNDE0MWRiMDNkMWNmMzMyNTY5ZmZlMDdjMTE3YzJiMDUyMDczMmFmMzg1NzUiLCJpYXQiOjE2NDM2ODY1MTIsIm5iZiI6MTY0MzY4NjUxMiwiZXhwIjoxNjc1MjIyNTEyLCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.hz8_cyB_kemH8kfIXy13RxhMdbiw5YzPXaDh3Q70-W7f7LOas9EjA8Z2vDXraB9gWjrTCUnzpM_RVOxEgozzHGk9QnWvjZTlu7j9TYnxaP80kC8STIT4AVRhRfKR6aNUvhuDYb0IHzdja0xn1n4Wo9bxxAlRaMPFGCM7ceBTs-cZd2gWfFLjtaaDM_AM3CjS_rIOhLyjFk8VclaEjvDnBH5H5Zgtf5FSMLhWNzezHSRoIiY-V4BydD262i5tW2XbqPIdArJQwAxEYrQR67PmfJzQ-s1IGjzyG75sR-F7MrdkR00r_JCRRE6xtBAO4-n4Qbk3fJFt7VfArPz9cGkLcaR0ta5eMRcHPhOJow21i4ck2_Q_odcMgDtIX1Uf11I0Z1ILSyvPOd-nS_tSnrKEUcwPoOaNdwgH6-CCPJeylJeHzRtnv_G2W8Tnn6aiXmSzS_5gxX4I7xdzvM4Y7kVAllK99TqSxTQrW1dbXZinq3pyP9TO0ttLEZOLS07mLBFnRbywI9EN29LGAWu04gg6i9llXHIed3kNiRGVv6OIO5iBs1h-ExbhcDyp7puUVvG7cnTIyfuYt8pCAYquh7lFQvY7f2isEPOShhMy8Eepmx7dtQhMTEXDTwagP_1CkZMNQt0FNJ5cXZbLVJLie76DwPHJHhajmDofm_P5CFgv7bo
content-type: application/json
origin: http://wolf.bet
referer: http://wolf.bet/
user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36
x-client-type: Web-Application
x-hash-api: ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b
x-requested-with: XMLHttpRequest';
    $d['data'] = '{"client_seed":"' . $rseed . '"}';
    batgen:
    $is = curl($d);
    if (validate_json($is['result'])) {
        $res = json_decode($is['result'], true);
        if (@$res['seed']) {
            echo $res['seed'] . "\n";
        } else {
            print_r($res);
        }
    } else {
        goto batgen;
    }
}




function seed()
{
    $d['url'] = "https://wolf.bet/api/v1/game/seed/refresh";
        $d['header'] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6
authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiYWQyYmEwZTRhNDBiOTMxMGJhZTg1ZmQ4ODAyNmE0OTUwMjZmNDE0MWRiMDNkMWNmMzMyNTY5ZmZlMDdjMTE3YzJiMDUyMDczMmFmMzg1NzUiLCJpYXQiOjE2NDM2ODY1MTIsIm5iZiI6MTY0MzY4NjUxMiwiZXhwIjoxNjc1MjIyNTEyLCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.hz8_cyB_kemH8kfIXy13RxhMdbiw5YzPXaDh3Q70-W7f7LOas9EjA8Z2vDXraB9gWjrTCUnzpM_RVOxEgozzHGk9QnWvjZTlu7j9TYnxaP80kC8STIT4AVRhRfKR6aNUvhuDYb0IHzdja0xn1n4Wo9bxxAlRaMPFGCM7ceBTs-cZd2gWfFLjtaaDM_AM3CjS_rIOhLyjFk8VclaEjvDnBH5H5Zgtf5FSMLhWNzezHSRoIiY-V4BydD262i5tW2XbqPIdArJQwAxEYrQR67PmfJzQ-s1IGjzyG75sR-F7MrdkR00r_JCRRE6xtBAO4-n4Qbk3fJFt7VfArPz9cGkLcaR0ta5eMRcHPhOJow21i4ck2_Q_odcMgDtIX1Uf11I0Z1ILSyvPOd-nS_tSnrKEUcwPoOaNdwgH6-CCPJeylJeHzRtnv_G2W8Tnn6aiXmSzS_5gxX4I7xdzvM4Y7kVAllK99TqSxTQrW1dbXZinq3pyP9TO0ttLEZOLS07mLBFnRbywI9EN29LGAWu04gg6i9llXHIed3kNiRGVv6OIO5iBs1h-ExbhcDyp7puUVvG7cnTIyfuYt8pCAYquh7lFQvY7f2isEPOShhMy8Eepmx7dtQhMTEXDTwagP_1CkZMNQt0FNJ5cXZbLVJLie76DwPHJHhajmDofm_P5CFgv7bo
content-type: application/json
origin: http://wolf.bet
referer: http://wolf.bet/
user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36
x-client-type: Web-Application
x-hash-api: ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b
x-requested-with: XMLHttpRequest';
    batgen:
    $is = curl($d);
    if (validate_json($is['result'])) {
        $res = json_decode($is['result'], true);
        if (@$res['server_seed_hashed']) {
            echo $res['server_seed_hashed']. "\n";
        } else {
            print_r($res);
        }
    } else {
        goto batgen;
    }
}


function saldo()
{
    $d['url'] = "https://wolf.bet/api/v1/user/balances";
    $d['header'] = 'accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6
authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiYWQyYmEwZTRhNDBiOTMxMGJhZTg1ZmQ4ODAyNmE0OTUwMjZmNDE0MWRiMDNkMWNmMzMyNTY5ZmZlMDdjMTE3YzJiMDUyMDczMmFmMzg1NzUiLCJpYXQiOjE2NDM2ODY1MTIsIm5iZiI6MTY0MzY4NjUxMiwiZXhwIjoxNjc1MjIyNTEyLCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.hz8_cyB_kemH8kfIXy13RxhMdbiw5YzPXaDh3Q70-W7f7LOas9EjA8Z2vDXraB9gWjrTCUnzpM_RVOxEgozzHGk9QnWvjZTlu7j9TYnxaP80kC8STIT4AVRhRfKR6aNUvhuDYb0IHzdja0xn1n4Wo9bxxAlRaMPFGCM7ceBTs-cZd2gWfFLjtaaDM_AM3CjS_rIOhLyjFk8VclaEjvDnBH5H5Zgtf5FSMLhWNzezHSRoIiY-V4BydD262i5tW2XbqPIdArJQwAxEYrQR67PmfJzQ-s1IGjzyG75sR-F7MrdkR00r_JCRRE6xtBAO4-n4Qbk3fJFt7VfArPz9cGkLcaR0ta5eMRcHPhOJow21i4ck2_Q_odcMgDtIX1Uf11I0Z1ILSyvPOd-nS_tSnrKEUcwPoOaNdwgH6-CCPJeylJeHzRtnv_G2W8Tnn6aiXmSzS_5gxX4I7xdzvM4Y7kVAllK99TqSxTQrW1dbXZinq3pyP9TO0ttLEZOLS07mLBFnRbywI9EN29LGAWu04gg6i9llXHIed3kNiRGVv6OIO5iBs1h-ExbhcDyp7puUVvG7cnTIyfuYt8pCAYquh7lFQvY7f2isEPOShhMy8Eepmx7dtQhMTEXDTwagP_1CkZMNQt0FNJ5cXZbLVJLie76DwPHJHhajmDofm_P5CFgv7bo
content-type: application/json
origin: http://wolf.bet
referer: http://wolf.bet/
user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36
x-client-type: Web-Application
x-hash-api: ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b
x-requested-with: XMLHttpRequest';
    batgen:
    $is = curl($d);

    if (validate_json($is['result'])) {
        $res = json_decode($is['result'], true);
        if (@$res['balances']) {
            foreach ($res['balances'] as $sal) {
                if ($sal['currency'] == "trx") {
                    return $sal['amount'];
                }
            }
        } else {
            print_r($res);
        }
    } else {
        goto batgen;
    }
}

function tele($data)
{
    $data  = urlencode($data);

    $d['url'] = "https://api.telegram.org/bot1356149887:AAFOD2v7emP9b1AcfhdEQXuRz3hjddvW624/sendMessage?chat_id=@caridolarcair&text=$data";
    $is = curl($d);
}



//inbet();
$x = 0;
lagi:
seed();
kseed();
sleep(3);
$x++;
if ($x > 5) {
    tele(saldo());
    $x = 0;
}


//starbet("");
goto lagi;