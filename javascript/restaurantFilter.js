const filterRestaurants = document.querySelectorAll('#typeOfRestaurant input[type=\'radio\']')
for(let i=0; i<filterRestaurants.length; i++) {
    if (filterRestaurants) {
        filterRestaurants[i].addEventListener('change', async function () {
            const response = await fetch('../api/api_restaurantsFilter.php?filter='+this.value +'&' + 'checked='+this.checked)
            const restaurants = await response.json()
            get_restaurants(restaurants)
        })
    }
}