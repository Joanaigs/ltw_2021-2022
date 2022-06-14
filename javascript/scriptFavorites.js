const filterFavorites = document.querySelectorAll('#favoriteFilter input[type=\'radio\']')


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

    const array = await response.json();
    const section = document.querySelector('#favoritesPage')
    section.innerHTML = ''

    if (array.length === 0) {
        const h3 = document.createElement('h3')
        h3.textContent = "Ainda não tem restaurantes favoritos..."
        section.appendChild(h3);
    }
    for (const restaurant of array) {

        const article = document.createElement('article')
        const text = document.createElement('a')
        text.classList.add('text');
        text.href="../pages/restaurant.php?id="+ restaurant.id
        const link = document.createElement('h3')
        link.textContent = restaurant.name
        text.append(link)

        const h4 = document.createElement('p')
        if(restaurant.ranking===null){
            h4.textContent = "Nenhuma avaliação"
        }
        else
            h4.textContent = restaurant.ranking
        const span = document.createElement('span')
        span.innerHTML = '<i class = "fa fa-star checked"> </i>';
        h4.appendChild(span);


        text.append(h4)

        const img = document.createElement('img')
        img.src = '../images/restaurants/' + restaurant.image +'.jpg'
        article.appendChild(img)
        article.appendChild(text)

        const buttons = document.createElement('div')
        buttons.classList.add('buttons');


        const hearts = document.createElement("div")
        hearts.classList.add("hearts")
        hearts.id = "restaurants"
        const div2 = document.createElement("div")
        div2.classList.add("heart")
        div2.id = restaurant.id
        if (restaurant.heart) {
            div2.classList.add("liked")
        }


        hearts.appendChild(div2)

        buttons.append(hearts)
        article.append(buttons)
        section.append(article)
    }
    heartsClick();
}




async function get_favoriteDishes(value) {
    const response = await fetch('../api/api_filterFavorites.php?filter=' + value)
    const array = await response.json();
    const section = document.querySelector('#favoritesPage')
    section.innerHTML = ''

    if (array.length === 0) {
        const h3 = document.createElement('h3')
        h3.textContent = "Ainda não tem pratos favoritos..."
        section.appendChild(h3);
    }
    for (const dish of array) {

        const article = document.createElement('article')
        const text = document.createElement('a')
        text.classList.add('text');
        text.href="../pages/restaurant.php?id="+ dish.idRestaurant
        const img = document.createElement('img')
        const h3 = document.createElement('h3')
        h3.textContent = dish.name
        img.src = img.src = '../images/dishes/' + dish.image +'.jpg'
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
            const i = document.createElement("i");
            a.href = "../actions/addToCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant + "&favorites=1"
            i.className = "fa-solid fa-plus"
            a.text = "Adicionar ao carrinho"
            a.appendChild(i)
            cartButton.appendChild(a)
        } else {
            const a1 = document.createElement("a")
            const i = document.createElement("i");
            a1.href = "../actions/removeFromCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant + "&favorites=1"
            i.className = "fa-solid fa-minus"
            a1.text = "Remover do carrinho"
            a1.appendChild(i)
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

