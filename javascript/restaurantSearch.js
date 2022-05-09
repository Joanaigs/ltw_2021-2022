const searchRestaurants = document.querySelector('#searchrest')
if (searchRestaurants) {
    searchRestaurants.addEventListener('input', async function() {
        const response = await fetch('api_restaurantsSearch.php?search=' + this.value)
        const restaurants = await response.json()
        const section = document.querySelector('#restaurants')
        section.innerHTML = ''
        for (const restaurant of restaurants) {
            console.log(restaurant)
            const article = document.createElement('article')
            const header = document.createElement('header')
            const link = document.createElement('a')
            link.href = 'artist.php?id=' + restaurant.id
            link.textContent = restaurant.name
            const img = document.createElement('img')
            const div = document.createElement('div')
            div.className='heart'
            img.src = 'https://picsum.photos/600/300?' + restaurant.id
            article.appendChild(header)
            header.appendChild(link)
            article.append(div)
            article.appendChild(img)
            section.appendChild(article)
        }
    })
}
