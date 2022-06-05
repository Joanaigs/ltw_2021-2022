const stateOrders = document.querySelectorAll('#states ')
console.log(stateOrders)
for(let i=0; i<stateOrders.length; i++) {
    if (stateOrders) {
        stateOrders[i].addEventListener('change', async function () {
            const response = await fetch('../api/api_orderSates.php?state='+this.value +'&' + 'id='+stateOrders[i].name)
            console.log('../api/api_orderSates.php?state='+this.value +'&' + 'id='+stateOrders[i].name)
            const orders = await response.json()
            location.reload();
        })
    }
}