const filterMeal = document.querySelectorAll('#typeOfDish input[type=\'radio\']')
console.log(filterMeal);
for(let i=0; i<filterMeal.length; i++) {
    if (filterMeal) {
        filterMeal[i].addEventListener('change', function(){
            get_meals(this.value, this.id);
        })
    }
}

async function get_meals(value, id) {
    const response = await fetch('../api/api_restaurant.php?filter=' + value + '&' + 'id=' + id)
    console.log('../api/api_restaurant.php?filter=' + value + '&' + 'id=' + id)
    const meals = await response.json()
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
        img.src = 'https://picsum.photos/600/300?' + dish.id
        content.appendChild(img)
        const text = document.createElement("div")
        text.classList.add("text")
        const h3 = document.createElement("h3")
        h3.textContent=dish.name
        text.appendChild(h3)
        const p = document.createElement("p")
        p.classList.add("info")
        p.textContent = 'Preço:' + dish.price + '€'
        text.appendChild(p)
        content.appendChild(text)
        article.appendChild(content)
        const buttons = document.createElement("div")
        buttons.classList.add("buttons")
        const addButton= document.createElement("div")
        addButton.classList.add("add-button")
        if(dish.loggedIn){
            const a = document.createElement("a")
            a.href="addToCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant
            const div = document.createElement("div")
            div.classList.add("button_plus")
            a.appendChild(div)
            addButton.appendChild(a)
            if(dish.cart){
                const a1 = document.createElement("a")
                a1.href="removeFromCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant
                const div1 = document.createElement("div")
                div1.classList.add("button_minus")
                a1.appendChild(div1)
                addButton.appendChild(a1)
            }
            buttons.appendChild(addButton)
            const hearts = document.createElement("div")
            hearts.classList.add("hearts")
            const div2 = document.createElement("div")
            div2.classList.add("heart")
            div2.id=dish.id
            if(dish.heart){
                div2.classList.add("liked")
            }
            hearts.appendChild(div2)
            addButton.appendChild(hearts)
            buttons.append(hearts)
            article.append(buttons)
        }
        section.append(article)

    }
    heartsDishClick();

}
temp=document.querySelector('.page .dishes')
if (temp) get_meals(undefined, temp.id)
