const searchRestaurants = document.querySelector('#searchRest')
if (searchRestaurants) {
    searchRestaurants.addEventListener('input', async function() {
        const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
        const restaurants = await response.json()
        const section = document.querySelector('#restaurants')
        section.innerHTML = ''
        for (const restaurant of restaurants) {
            console.log(restaurant)
            const article = document.createElement('article')
            const header = document.createElement('header')
            const link = document.createElement('a')
            link.href = '../restaurant.php?id=' + restaurant.id
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
/*
const icon = document.querySelector('.search-icon');
const search = document.querySelector('.search');

icon.onclick = function (){
    search.classList.toggle('active');
}*/