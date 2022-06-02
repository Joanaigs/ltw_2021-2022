const filterFavorites = document.querySelectorAll('#favoriteFilter input[type=\'radio\']')
console.log(filterFavorites);

for (let i = 0; i < filterFavorites.length; i++) {
    if (filterFavorites) {
        filterFavorites[i].addEventListener('change', async function () {

            if (this.value === 'restaurants') {
                get_favoriteRestaurants(this.value);
            } else {
                get_favoriteDishes(this.value);
            }
        })
    }
}


async function get_favoriteRestaurants(value) {
    const response = await fetch('../api/api_filterFavorites.php?filter=' + value)
    console.log('../api/api_filterFavorites.php?filter=' + value);
    const array = await response.json();
    const section = document.querySelector('#favoritesPage')
    section.innerHTML = ''
    for (const restaurant of array) {
        const article = document.createElement('article')
        const text = document.createElement('div')
        text.classList.add('text');
        const link = document.createElement('a')
        link.classList.add('text')
        link.href = '../restaurant.php?id=' + restaurant.id
        link.textContent = restaurant.name
        text.append(link)

        const ratingFixed = document.createElement('div')
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

        text.append(ratingFixed)

        const img = document.createElement('img')
        img.src = 'https://picsum.photos/600/300?' + restaurant.id
        article.appendChild(img)
        article.appendChild(text)

        const buttons = document.createElement('div')
        buttons.classList.add('buttons');

        const rest = document.createElement("div")
        rest.id=("restaurants")
        const hearts = document.createElement("div")
        hearts.classList.add("hearts")
        const div2 = document.createElement("div")
        div2.classList.add("heart")
        div2.id = restaurant.id
        if (restaurant.heart) {
            div2.classList.add("liked")
        }


        hearts.appendChild(div2)
        rest.append(hearts)
        buttons.append(rest)
        article.append(buttons)
        section.append(article)
    }
    heartsClick();
}




async function get_favoriteDishes(value) {
    const response = await fetch('../api/api_filterFavorites.php?filter=' + value)
    console.log('../api/api_filterFavorites.php?filter=' + value);
    const array = await response.json();
    const section = document.querySelector('#favoritesPage')
    section.innerHTML = ''
    for (const dish of array) {
        const article = document.createElement('article')
        const text = document.createElement('div')
        text.classList.add('text');
        const img = document.createElement('img')
        const h3 = document.createElement('h3')
        h3.textContent = dish.name
        img.src = 'https://picsum.photos/600/300?' + dish.id
        const p = document.createElement("p")
        p.textContent = 'Preço: ' + dish.price + '€'
        text.append(h3)
        text.append(p)
        article.appendChild(img)
        article.append(text)


        const buttons = document.createElement("div")
        buttons.classList.add("buttons")
        const cartButton = document.createElement("div")
        cartButton.classList.add("cartButton")

        if (!dish.cart) {
            const a = document.createElement("a")
            a.href = "addToCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant + "&favorites=1"
            a.className = "fa-solid fa-plus"
            cartButton.appendChild(a)
        } else {
            const a1 = document.createElement("a")
            a1.href = "removeFromCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant + "&favorites=1"
            a1.className = "fa-solid fa-minus"
            cartButton.appendChild(a1)
        }

        const hearts = document.createElement("div")
        hearts.classList.add("hearts")
        const div2 = document.createElement("div")
        div2.classList.add("heart")
        div2.id = dish.id
        if (dish.heart) {
            div2.classList.add("liked")
        }
        hearts.appendChild(div2)
        buttons.appendChild(cartButton)
        buttons.append(hearts)
        article.append(buttons)

        section.appendChild(article)
    }
    heartsDishClick();
}

if (document.querySelector('#favoritesPage')) {
    get_favoriteDishes('dishes')
}

