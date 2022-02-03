var request = require('request');

var url = 'https://wolf.bet/api/v2/dice/auto/play';
var headers = {
    'accept-language': 'id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6',
    'authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiMDE3NjFhZTRmNjNkMGZmMjc0NWEzMTAyMzNhZjczYzQ4ZmI1NTQxYWU0ZTgwMmZlODhlY2Q0MmI4NWRkYzFlOTQzYWZkOGU2NmQ2ODY3OTQiLCJpYXQiOjE2NDM4NzgyNTksIm5iZiI6MTY0Mzg3ODI1OSwiZXhwIjoxNjc1NDE0MjU5LCJzdWIiOiI0MDkwMTMiLCJzY29wZXMiOltdfQ.jzViogy7QKXsLrUE93IvM_KH0ADKKtF1T9wewYqFxhC-Gmc80rTqUYZc_meNVMPYE-m_41sy-2ByEN3zVG-OGdNfvl8TwK2WqVspBcnaUT6ZiqdZLDYKneHdHrAvGQkUKba9Kxg74PPd4S8nV7TkB7MLXYDIDtpRv-ZkLd9dbiSwKH7dJlX_ult4b01m8ph4q1r5kIdSn_KaeZ9Zt_hKwUWIQ0guSF3gS8lHaCyGjrVlczEUWaVllP_YOBS_038HXQwUZ75dG8MMtESYUp3KJmImmgPohYnbgODzj9CvxJfJFHFMW65QfbEUjzbUrFRgp0dp-qQ-IUBUjzITYssgehH5xrDyYBVoHepueOQrzgmw4_wIZ-CCJrAt-aWKGqIks1Z4a0MClnHXuXGPz-lLD3BbAeDRWBn4AMvIikOE3BadvoR_Vks2EQZ73nIkJC8bMVsaB4XRxCPIc2k9eLsnvPCiq5gZtERkGaQU1l66Lbc3zA6YRWDvla8V9vpDf26wW-Ua_fjc0Ba1LW7VGcF46gXOmvcw6uoRBKBomP5M-XiehzTyHRzxAWzlFfqZYJ0uCcZ9RIyBV2M866G90AD2hMknARLEt23uk4FsHQvSDgD3gAK1kKYdvMN8XMH1V7r3XbVmrzE_y8tURqJuG1r135eBZMsm1JwVXwcnfHXVfkg',
    'content-type': 'application/json',
    'origin': 'http://wolf.bet',
    'referer': 'http://wolf.bet/',
    'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36',
    'x-client-type': 'Web-Application',
    'x-hash-api': 'ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b',
    'x-requested-with': 'XMLHttpRequest'
};

//bet = parseFloat(bet).toFixed(8);
//console.log(form);
var x = 0;

function doThing() {
    setTimeout(() => {
        var form = {
            uuid: "cdc32213-9ae7-4a26-af90-82689ae7bf1f"
        };
        x++;
        request.post({
                url: url,
                form: form,
                headers: headers
            },
            function(e, r, body) {
                body = JSON.parse(body);
                try {
                    console.log("[" + body.bet.hash + "] " + body.bet.state + " - " + body.bet.amount + " - " + body.bet.profit + " | " + body.userBalance.amount);
                } catch {
                    console.log(e);
                    console.log(body);
                    process.exit();
                }

            });
        doThing();
    }, 100);


};
doThing();