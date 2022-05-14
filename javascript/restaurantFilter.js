const filterRestaurants = document.querySelectorAll('#filter input[type=\'radio\']')
for(let i=0; i<filterRestaurants.length; i++) {
    if (filterRestaurants) {
        filterRestaurants[i].addEventListener('change', async function () {
            const response = await fetch('api_restaurantsFilter.php?filter='+this.value +'&' + 'checked='+this.checked)
            console.log('api_restaurantsFilter.php?filter='+this.value +'&' + 'checked='+this.checked);
            const restaurants = await response.json()
            const section = document.querySelector('#restaurants')
            section.innerHTML = ''
            for (const restaurant of restaurants) {
                const article = document.createElement('article')
                const header = document.createElement('header')
                const link = document.createElement('a')
                link.href = 'artist.php?id=' + restaurant.id
                link.textContent = restaurant.name
                const img = document.createElement('img')
                const div = document.createElement('div')
                div.classList.add('heart')
                div.id=restaurant.id;
                img.src = 'https://picsum.photos/600/300?' + restaurant.id
                article.appendChild(header)
                header.appendChild(link)
                article.append(div)
                article.appendChild(img)
                section.appendChild(article)
            }
            heartsClick();
        })
    }
}