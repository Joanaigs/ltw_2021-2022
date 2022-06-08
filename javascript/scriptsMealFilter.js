const filterMeal = document.querySelectorAll('#typeOfDish input[type=\'radio\']')
console.log(filterMeal);
for (let i = 0; i < filterMeal.length; i++) {
    if (filterMeal) {
        filterMeal[i].addEventListener('change', async function () {
            const response = await fetch('../api/api_restaurant.php?filter=' + value + '&' + 'id=' + id)
            const meals = await response.json()
            get_meals(meals)
        })
    }
}

async function get_meals(meals) {
    const section = document.querySelector('.dishes')
    section.innerHTML = ''
    m = meals[0].meal;
    const h2 = document.createElement('h2')
    h2.id = m
    h2.textContent = m
    section.appendChild(h2)
    for (const dish of meals) {
        const article = document.createElement('article')
        article.classList.add("dish")
        if (dish.meal !== m) {
            m = dish.meal
            const h2s = document.createElement('h2')
            h2s.id = m
            h2s.textContent = m
            section.appendChild(h2s)
        }
        const content = document.createElement("div")
        content.classList.add("content")
        const img = document.createElement('img')
        img.src = '../images/dishes/' + dish.image + '.jpg'
        content.appendChild(img)
        const text = document.createElement("div")
        text.classList.add("text")
        const h3 = document.createElement("h3")
        h3.textContent = dish.name
        text.appendChild(h3)
        const p = document.createElement("p")
        p.classList.add("info")
        p.textContent = 'Preço: ' + dish.price + '€'
        text.appendChild(p)
        content.appendChild(text)
        article.appendChild(content)
        const buttons = document.createElement("div")
        buttons.classList.add("buttons")
        const cartButton = document.createElement("div")
        cartButton.classList.add("cartButton")
        if(dish.loggedIn){
            if (!dish.cart){
            const a = document.createElement("a")
            a.href="addToCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant + "&favorites=0"
            a.className = "fa-solid fa-plus"
            cartButton.appendChild(a)
            }else{
                const a1 = document.createElement("a")
                a1.href="removeFromCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant + "&favorites=0"
                a1.className = "fa-solid fa-minus"
                cartButton.appendChild(a1)
            }
            buttons.appendChild(cartButton)
            const hearts = document.createElement("div")
            hearts.classList.add("hearts")
            const div2 = document.createElement("div")
            div2.classList.add("heart")
            div2.id = dish.id
            if (dish.heart) {
                div2.classList.add("heart-liked")
            }
            hearts.appendChild(div2)
            cartButton.appendChild(hearts)
            buttons.append(hearts)
            article.append(buttons)
        }
        section.append(article)

    }
    heartsDishClick();

}

temp = document.querySelector('.page .dishes')

async function get_d(id) {
    const response = await fetch('../api/api_getDishes.php?id=' + id)
    const meals = await response.json()
    get_meals(meals)
}

if (temp) {
    get_d(temp.id)
}