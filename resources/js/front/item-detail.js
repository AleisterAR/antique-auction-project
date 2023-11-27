if ($auctionId) {
    const currentBitAmount = document.querySelector('#current-bid-amount')
    const bidUser = document.querySelector('#bid-users')
    if ($topfiveBid) {
        setInterval(() => {
            const h = $topfiveBid?.map(bid => {
                return `
                <tr>
                    <th class="bid-tr latest-bidder">${bid.user.full_name}</th>
                        <th class="bid-tr latest-bidder">${dayjs(bid.bid_time).toNow(true)} ago</th>
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
            console.log(data)
            $topfiveBid = data.topFiveBids
            currentBitAmount.innerText = `${new Intl.NumberFormat('de-DE', {
                style: 'currency',
                currency: 'EUR',
                currencyDisplay: 'symbol',
                minimumFractionDigits: 0,
                maximumFractionDigits: 2,
            }).format(Number(data.topFiveBids[0]['bid_amount'])).toString().replace(/\./g, ',')
                }`
            const h = data.topFiveBids?.map(bid => {
                return `
                <tr>
                    <th class="bid-tr latest-bidder">${bid.user.full_name}</th>
                        <th class="bid-tr latest-bidder">${dayjs(bid.bid_time).toNow(true)} ago</th>
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
    const bidContainer = document.querySelector('#bid-container')
    const bidButton = bidContainer.querySelector('button')
    const bidInput = bidContainer.querySelector('input')
    const bidSpinner = bidContainer.querySelector('.spinner-border')

    document.querySelector('#place-bid')?.addEventListener('click', function () {
        if (!bidAmount.value) {
            return Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Start the bidding by entering your offer!",
            });
        }

        const bid = Number(bidAmount.value) - Number($currentBid)

        if (!(bid >= 50)) {
            return Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Your bid must exceed the initial price and current bid by at least $50",
            });
        }

        bidInput.classList.add('disabled')
        bidButton.classList.add('disabled')
        bidSpinner.classList.remove('d-none')
        axios.post('/bid', { bid_amount: bidAmount.value, auction_id: $auctionId }).then(res => {
            bidAmount.value = '';
        }).catch(error => {
            if (error.response.status === 422) {
                const errors = error.response.data.errors
                if ('bid_amount' in errors) {
                    return Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "Your bid must exceed the initial price and current bid by at least $50",
                    });
                }
            }
        }).finally(() => {
            bidInput.classList.remove('disabled')
            bidButton.classList.remove('disabled')
            bidSpinner.classList.add('d-none')
        })

    })
}


