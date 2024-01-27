if ($startTime) {
    const currentDate = new Date();
    const futureDate = new Date($startTime);
    const timeDifference = futureDate.getTime() - currentDate.getTime();

    if (timeDifference > 0) {
        setTimeout(function () {
            alert('Auction is stared')
            window.location.reload()
        }, timeDifference);
    } else {
        console.log('The specified time has already passed.');
    }
}

if ($endTime) {
    const closeIn = document.querySelector('#close-in');
    // const currentDate = new Date();
    // const futureDate = new Date($endTime);
    // const timeDifference = futureDate.getTime() - currentDate.getTime();

    // console.log(timeDifference)

    // if (timeDifference > 0) {
    //     let endTimeOut = setTimeout(function () {
    //         alert('Auction is finished')
    //         window.location.reload()
    //     }, timeDifference);
    // } else {
    //     console.log('The specified time has already passed.');
    // }

    const timer = setInterval(updateCountdown, 1000)

    function updateCountdown() {
        const targetDate = new Date($endTime);
        const currentDate = new Date();

        const difference = targetDate.getTime() - currentDate.getTime();

        if (difference <= 0) {
            clearInterval(timer); // Stop the timer if the target time has passed
            console.log("Countdown has ended!");
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        // if (days === 0) {
        //     alert('Auction is finished')
        //     window.reload(true)
        // }

        closeIn.innerText = `${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`
        console.log(`Remaining time: ${days} days, ${hours} hours, ${minutes} minutes, ${seconds} seconds`);
    }
}

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
            const topBid =
                `${new Intl.NumberFormat('de-DE', {
                    style: 'currency',
                    currency: 'EUR',
                    currencyDisplay: 'symbol',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2,
                }).format(Number(data.topFiveBids[0]['bid_amount'])).toString().replace(/\./g, ',')
                }`
            document.querySelector('#bid-amount').setAttribute('placeholder', topBid + ' or higher')
            $topfiveBid = data.topFiveBids
            currentBitAmount.innerText = topBid
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
                        text: errors['bid_amount'][0]
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


