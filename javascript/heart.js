const button = document.querySelector('.heart');
console.log(button)
button.addEventListener('click', async function () {
    if (button.classList.contains("liked")) {
        button.classList.remove("liked");
    } else {
        button.classList.add("liked");
        //const response = await fetch('api_orderSates.php?state='+this.value +'&' + 'id='+stateOrders[i].name)
        //console.log('api_orderSates.php?state='+this.value +'&' + 'id='+stateOrders[i].name)
        //const orders = await response.json()
    }
});