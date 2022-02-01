var request = require('request');

var url = 'https://wolf.bet/api/v2/dice/auto/play';
var headers = {
    'accept-language': 'id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6',
    'authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiYWQyYmEwZTRhNDBiOTMxMGJhZTg1ZmQ4ODAyNmE0OTUwMjZmNDE0MWRiMDNkMWNmMzMyNTY5ZmZlMDdjMTE3YzJiMDUyMDczMmFmMzg1NzUiLCJpYXQiOjE2NDM2ODY1MTIsIm5iZiI6MTY0MzY4NjUxMiwiZXhwIjoxNjc1MjIyNTEyLCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.hz8_cyB_kemH8kfIXy13RxhMdbiw5YzPXaDh3Q70-W7f7LOas9EjA8Z2vDXraB9gWjrTCUnzpM_RVOxEgozzHGk9QnWvjZTlu7j9TYnxaP80kC8STIT4AVRhRfKR6aNUvhuDYb0IHzdja0xn1n4Wo9bxxAlRaMPFGCM7ceBTs-cZd2gWfFLjtaaDM_AM3CjS_rIOhLyjFk8VclaEjvDnBH5H5Zgtf5FSMLhWNzezHSRoIiY-V4BydD262i5tW2XbqPIdArJQwAxEYrQR67PmfJzQ-s1IGjzyG75sR-F7MrdkR00r_JCRRE6xtBAO4-n4Qbk3fJFt7VfArPz9cGkLcaR0ta5eMRcHPhOJow21i4ck2_Q_odcMgDtIX1Uf11I0Z1ILSyvPOd-nS_tSnrKEUcwPoOaNdwgH6-CCPJeylJeHzRtnv_G2W8Tnn6aiXmSzS_5gxX4I7xdzvM4Y7kVAllK99TqSxTQrW1dbXZinq3pyP9TO0ttLEZOLS07mLBFnRbywI9EN29LGAWu04gg6i9llXHIed3kNiRGVv6OIO5iBs1h-ExbhcDyp7puUVvG7cnTIyfuYt8pCAYquh7lFQvY7f2isEPOShhMy8Eepmx7dtQhMTEXDTwagP_1CkZMNQt0FNJ5cXZbLVJLie76DwPHJHhajmDofm_P5CFgv7bo',
    'content-type': 'application/json',
    'origin': 'http://wolf.bet',
    'referer': 'http://wolf.bet/',
    'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36',
    'x-client-type': 'Web-Application',
    'x-hash-api': 'ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b',
    'x-requested-with': 'XMLHttpRequest'
};
var form = {
    uuid: '92b71c76-ec70-433b-9587-5426d9a542b1'
};
var x = 0;

function doThing() {

    setTimeout(() => {

        x++;
        request.post({
            url: url,
            form: form,
            headers: headers
        }, function(e, r, body) {
            body = JSON.parse(body);
            try {
                var data = body.bet.state;
                console.log("[" + x + "] " + body.bet.state + " - " + body.bet.amount + " - " + body.bet.profit + " | " + body.userBalance.amount);
            } catch {
                console.log(e);
            }

        });
        doThing();
    }, 45);

};
doThing();