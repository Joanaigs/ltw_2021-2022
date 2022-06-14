async function get_restaurants(restaurants) {
    const section = document.querySelector('#restaurants')
    section.innerHTML = ''
    if (restaurants.length === 0){
        const h3 = document.createElement('h3')
        h3.textContent = "Não há restaurantes com esta categoria."
        section.appendChild(h3);
    }
    for (const restaurant of restaurants) {
        const article = document.createElement('article')
        const h3 = document.createElement('h3')
        const link = document.createElement('a')
        link.href = '../pages/restaurant.php?id=' + restaurant.id
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
        const section_filter = document.createElement('section')
        section_filter.classList.add('section-filter')
        section_filter.append(filter)
        text.append(section_filter)
        const a=document.createElement("a")
        a.href="../pages/restaurant.php?id="+ restaurant.id
        img.src = '../images/restaurants/' + restaurant.image +'.jpg'

        article.append(ratingFixed)
        article.append(div)
        a.appendChild(img)
        article.appendChild(a)
        h3.appendChild(link)
        article.append(text)
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