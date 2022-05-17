const filterMeal = document.querySelectorAll('#typeFilter input[type=\'radio\']')
console.log(filterMeal);
for(let i=0; i<filterMeal.length; i++) {
    if (filterMeal) {
        filterMeal[i].addEventListener('change', async function () {
            const response = await fetch('api_mealFilter.php?filter='+this.value +'&' + 'checked='+this.checked+'&' + 'id=' + this.id)
            console.log('api_mealFilter.php?filter='+this.value +'&' + 'checked='+this.checked +'&' + 'id=' + this.id);
            const meals = await response.json()
            const section = document.querySelector('#dishes')
            section.innerHTML = ''
            let meal = meals[0].meal;
            const h3=document.createElement('h3')
            h3.id=meal
            h3.textContent=meal
            section.appendChild(h3)
            for (const dish of meals) {
                const article = document.createElement('article')
                const img = document.createElement('img')
                if(dish.meal!==meal){
                    meal=dish.meal
                    const h3s=document.createElement('h3')
                    h3s.id=meal
                    h3s.textContent=meal
                    article.appendChild(h3s)
                }
                const h4 = document.createElement('h4')
                h4.textContent=dish.name
                img.src = 'https://picsum.photos/600/300?' + dish.id
                const p=document.createElement("p")
                p.textContent=dish.price
                const div = document.createElement('div')
                div.classList.add('heart')
                article.appendChild(div)
                article.appendChild(img)
                article.appendChild(h4)
                article.appendChild(p)
                section.appendChild(article)
            }
            heartsDishClick();
        })
    }
}
