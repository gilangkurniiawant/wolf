let request = require('request');

let headers = {
    'accept-language': 'id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ru;q=0.6',
    'authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiZWNlMmE5ZGMzMjIwMjhmYmY5OWNjOWU0MjA3MzFjMTg5MmUwMjYzMjMxY2VkZThkZGIwZTRmMzg0ZDExMGYwNzIyNThjYTkzMDM1MmJjMWYiLCJpYXQiOjE3NDI4NDExMjAuNTgyODksIm5iZiI6MTc0Mjg0MTEyMC41ODI4OTQsImV4cCI6MTc3NDM3NzEyMC41NzE5MTksInN1YiI6IjQ3MjY3NyIsInNjb3BlcyI6W119.d1R2nlfnA1cQ7zfnkG2Te7KETZGhJ97M57ZJitKIDLp26qJOFbeSE3uWHfE2eP6Rat3ery_bTOCAmPkIlgosoqH1JS2q0ZOjoCgzj1tLxHKnDhVMqCNjJzO9bmXgVcku_HJabIAasaR3lK1LNXxeQhWvoo1jhEk41lN2pQC1fqRIQXBIo0KEb5JOEeR54tPxpwp8MU5_JcvNYveju-uw6hR5j_KQxWe3_WChXA1vaFKwhqwt63snHFJP1rLGd6EVrBnJCzmIy1Ll2Mxba1cPnnbj6AIMvqHdKMrBxwUlAIyo2LnmhHxshKWKRhD-Yh8RC1jEueJz5z7pzq4Pc4apsOyD41cQZigwv2JP_Xo04ukY3_tXmKrxyUOC4S7lIOlxO5cJjEtftr1eonRZ8xnGydLTNm2XqyxXmDihgnlr5VMZFg_F1ykrL-4bO-NoOXjCCCrb4ihl6dxCytmSlP9U_yBmQSL1BksaTHmZWK0ZsUv1vId6pCBPCJhLv6oI7nZeHG8YkbceDHqnFH8l3cYPNkqqAKHvSr7vKJ_TguhV6cdKKCSTLW07cOVoOqTCvrJyagn5SWuNdcTHsOmKxorfgCLIVdekvFRNQ8mSqWk0acWODLHH2yFNT6XDNJreebRtiAJvg-6-AZYf_PtZ_uyZrYYzcnQo6QJ5qmCHWg7E-AI',
    'content-type': 'application/json',
    'origin': 'http://wolf.bet',
    'referer': 'http://wolf.bet/',
    'user-agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)...',
    'x-client-type': 'Web-Application',
    'x-hash-api': 'ba6c4afbf4e7264f12097838641d1e9684d2de9840a88581c952afc9a6ee036b',
    'x-requested-with': 'XMLHttpRequest'
};



function playBet(id) {
    let url = 'https://wolfbet.com/api/v2/range-dice/auto/play';
    let form = { uuid: id };

    request.post({ url, form, headers }, function (e, r, body) {
        try {
            body = JSON.parse(body);
            console.log(`[${id}] ${body.bet.state} - ${body.bet.amount} - ${body.bet.profit} | Balance: ${body.userBalance.amount}`);
            playBet(id);
        } catch (error) {
            console.error("Error parsing response or bet failed.");
            console.error("Raw response:", body);
            console.error("Re-attempting new startBet session...");
            setTimeout(() => startBet(), 1000); // Retry after 1s
        }
    });
}
async function startBet() {
    let url = 'https://wolfbet.com/api/v2/range-dice/flash/play';
    let form = {
        "currency": "trx",
        "game": "dice",
        "amount": "0.0085",
        "multiplier": "1.9808",
        "rule": "two_ranges",
        "flash": true,
        "config": [{
            "command": [{
                "name": "resetAmount"
            }],
            "when": [{
                "name": "win",
                "value": 1,
                "type": "every"
            }]
        }, {
            "command": [{
                "name": "resetAmount"
            }],
            "when": [{
                "name": "lose",
                "value": 1,
                "type": "every"
            }]
        }],
        "rolls": 100,
        "auto": 1
    };

    form = { ...form, ...generateBetValues() };


    return new Promise((resolve, reject) => {
        request.post({ url, form, headers }, async (error, response, body) => {
            if (error) {
                console.error("startBet error:", error);
                console.log("Retrying startBet...");
                setTimeout(async () => {
                    try {
                        const retryResult = await startBet();
                        resolve(retryResult);
                    } catch (err) {
                        reject(err);
                    }
                }, 2000);
                return;
            }

            try {
                const data = JSON.parse(body);
                console.log(data)
                if (data && data.flashBetResult) {
                    resolve(data);
                } else {
                    throw new Error("Invalid response");
                }
            } catch (aserr) {
                try {
                    const retryResult = await startBet();
                    resolve(retryResult);
                } catch (err) {
                    reject(err);
                }
            }
        });
    });
}

function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function generateBetValues() {
    const min = 1;
    const max = 100;
    const gap = 25;

    // bet_value_first harus cukup kecil agar ada ruang sampai bet_value_fourth
    const bet_value_first = Math.floor(Math.random() * (max - 2 * gap - 1)) + min;

    const bet_value_second = bet_value_first + gap;

    // bet_value_third harus lebih besar dari bet_value_second dan cukup kecil agar +gap masih <= max
    const thirdMin = bet_value_second + 1;
    const thirdMax = max - gap;
    const bet_value_third = Math.floor(Math.random() * (thirdMax - thirdMin + 1)) + thirdMin;

    const bet_value_fourth = bet_value_third + gap;

    return {
        bet_value_first,
        bet_value_second,
        bet_value_third,
        bet_value_fourth
    };
}



(async () => {
    console.log(await startBet())
})();
