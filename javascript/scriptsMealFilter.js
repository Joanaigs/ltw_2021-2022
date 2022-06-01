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
        if (dish.meal !== m) {
            m = dish.meal
            const h2s = document.createElement('h2')
            h2s.id = m
            h2s.textContent = m
            section.appendChild(h2s)
        }
        if(dish.loggedIn){
            const a = document.createElement("a")
            a.href="addToCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant
            const div = document.createElement("div")
            div.classList.add("button_plus")
            a.appendChild(div)
            section.appendChild(a)
            if(dish.cart){
                const a1 = document.createElement("a")
                a1.href="removeFromCart.php?idDish=" + +dish.id + "&idRestaurant=" + dish.idRestaurant
                const div1 = document.createElement("div")
                div1.classList.add("button_minus")
                a1.appendChild(div1)
                section.appendChild(a1)
            }
            const div2 = document.createElement("div")
            div2.classList.add("heart")
            div2.id=dish.id
            section.appendChild(div2)
            if(dish.heart){
                div2.classList.add("liked")
            }
            section.appendChild(div2)
        }
        const img = document.createElement('img')
        img.src = 'https://picsum.photos/600/300?' + dish.id
        section.appendChild(img)
        const h3 = document.createElement("h3")
        h3.textContent=dish.name
        section.appendChild(h3)
        const p = document.createElement("p")
        p.classList.add("info")
        p.textContent = dish.price
        section.appendChild(p)

    }
    heartsDishClick();

}
temp=document.querySelector('.dishes')
if (temp) get_meals(undefined, temp.id)
