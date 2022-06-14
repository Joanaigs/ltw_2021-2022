const searchRestaurants1 = document.querySelector('#searchRest1')
const searchRestaurants2 = document.querySelector('#searchRest2')
if (searchRestaurants1) {
    searchRestaurants1.addEventListener('input', async function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const id = urlParams.get('id')
        if(id===null){
            const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
            const restaurants = await response.json()
            get_restaurants(restaurants)
        }
        else{
            const response = await fetch('../api/api_dishSearch.php?search=' + this.value + '&id=' + id)
            const meals = await response.json()
            get_meals(meals)
        }
    })
}
if (searchRestaurants2) {
    searchRestaurants2.addEventListener('input', async function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const id = urlParams.get('id')
        if(id===null){
            const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
            const restaurants = await response.json()
            get_restaurants(restaurants)
        }
        else{
            const response = await fetch('../api/api_dishSearch.php?search=' + this.value + '&id=' + id)
            const meals = await response.json()
            if(meals.length!==0)
                get_meals(meals)
        }
    })
}

const icon1 = document.querySelector('.search-icon1');
const icon2 = document.querySelector('.search-icon2');
const search1 = document.querySelector('.search1');
const search2 = document.querySelector('.search2');
if(icon1) {
    icon1.onclick = function () {
        search1.classList.toggle('active');
    }
}
if(icon2) {
    icon2.onclick = function () {
        search2.classList.toggle('active');
    }
}


