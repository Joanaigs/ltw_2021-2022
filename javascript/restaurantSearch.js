const searchRestaurants1 = document.querySelector('#searchRest1')
const searchRestaurants2 = document.querySelector('#searchRest2')
console.log(searchRestaurants2)
if (searchRestaurants1) {
    searchRestaurants1.addEventListener('input', async function() {
        const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
        const restaurants = await response.json()
        get_restaurants(restaurants)
    })
}
if (searchRestaurants2) {
    searchRestaurants2.addEventListener('input', async function() {

        console.log("hi");
        const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
        const restaurants = await response.json()
        get_restaurants(restaurants)
    })
}

const icon1 = document.querySelector('.search-icon1');
const icon2 = document.querySelector('.search-icon2');
const search1 = document.querySelector('.search1');
const search2 = document.querySelector('.search2');

icon1.onclick = function (){
    search1.classList.toggle('active');
}
icon2.onclick = function (){
    search2.classList.toggle('active');
}


