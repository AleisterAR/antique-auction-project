if ($auctionId) {
    const currentBitAmount = document.querySelector('#current-bid-amount')
    const bidUser = document.querySelector('#bid-users')
    if ($topfiveBid) {  
        setTimeout(() => {
            const h = $topfiveBid?.map(bid => {
                bid.bid_time = moment(bid.bid_time).tz('Asia/Yangon').fromNow()
                return `
                <tr>
                    <th class="bid-tr latest-bidder">${bid.user.full_name}</th>
                        <th class="bid-tr latest-bidder">${bid.bid_time}</th>
                        <th class="bid-tr bid-price latest-bidder">
                            ${new Intl.NumberFormat('de-DE', {
                    style: 'currency',
                    currency: 'EUR',
                    currencyDisplay: 'symbol',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2,
                }).format(bid.bid_amount).toString().replace(/\./g, ',')}
                        </th>
                </tr>
                `
            }).join('');

            if (h) {
                bidUser.innerHTML = h;
            }
        }, 1000 * 60)
    }

    Echo.private(`bids.${$auctionId}`)
        .listen('BidItem', (data) => {
            $topfiveBid = data.topFiveBids
            currentBitAmount.innerText = `${new Intl.NumberFormat('de-DE', {
                style: 'currency',
                currency: 'EUR',
                currencyDisplay: 'symbol',
                minimumFractionDigits: 0,
                maximumFractionDigits: 2,
            }).format(Number(data.max)).toString().replace(/\./g, ',')
                }`
            const h = data.topFiveBids?.map(bid => {
                bid.bid_time = moment(bid.bid_time).tz('Asia/Yangon').fromNow()
                return `
                <tr>
                    <th class="bid-tr latest-bidder">${bid.user.full_name}</th>
                        <th class="bid-tr latest-bidder">${bid.bid_time}</th>
                        <th class="bid-tr bid-price latest-bidder">
                            ${new Intl.NumberFormat('de-DE', {
                    style: 'currency',
                    currency: 'EUR',
                    currencyDisplay: 'symbol',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2,
                }).format(bid.bid_amount).toString().replace(/\./g, ',')}
                        </th>
                </tr>
                `
            }).join('');

            if (h) {
                bidUser.innerHTML = h;
            }
        });

    const bidAmount = document.querySelector('#bid-amount')

    document.querySelector('#place-bid')?.addEventListener('click', function () {
        if (!bidAmount.value) {
            return alert('Empty')
        }
        axios.post('/bid', { bid_amount: bidAmount.value, auction_id: $auctionId }).then(res => {
            bidAmount.value = '';
        }).catch(error => {
            console.log(error)
        })
    })
}


