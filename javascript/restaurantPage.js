console.log('hi')

async function get_restaurants(restaurants) {
    const section = document.querySelector('#restaurants')
    section.innerHTML = ''
    for (const restaurant of restaurants) {
        const article = document.createElement('article')
        const h3 = document.createElement('h3')
        const link = document.createElement('a')
        link.href = '../restaurant.php?id=' + restaurant.id
        link.textContent = restaurant.name
        const text = document.createElement('div')
        text.classList.add('text')
        const ratingFixed = document.createElement('div')
        ratingFixed.classList.add('rating')
        const h4 = document.createElement('h4')
        if(restaurant.ranking===null){
            h4.textContent = "Nenhuma avaliação"
        }
        else
            h4.textContent = restaurant.ranking
        const span = document.createElement('span')
        span.innerHTML = '<i class = "fa fa-star checked"> </i>';
        h4.appendChild(span);
        ratingFixed.appendChild(h4);
        text.append(h3)
        const img = document.createElement('img')
        const div = document.createElement('div')
        if(restaurant.loggedIn) {
            div.classList.add('heart')
            div.id = restaurant.id;
            if (restaurant.heart) {
                div.classList.add('liked')
            }
        }
        const filter = document.createElement('h4')
        filter.textContent=restaurant.filt
        img.src = 'https://picsum.photos/600/300?' + restaurant.id
        article.append(ratingFixed)
        article.append(div)
        article.appendChild(img)
        h3.appendChild(link)
        article.append(text)
        article.append(filter)
        section.appendChild(article)
    }
    heartsClick();

}
console.log('hi')
console.log(document.querySelector('#restaurants'))

async function get_r() {
    const response = await fetch('../api/api_getRestaurants.php')
    const restaurants = await response.json()
    get_restaurants(restaurants)
}
if (document.querySelector('#restaurants')){
    get_r()
}