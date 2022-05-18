const filterFavorites = document.querySelectorAll('#typeFilter input[type=\'radio\']')
console.log(filterFavorites);

for (let i=0; i < filterFavorites.length; i++){
    if(filterFavorites){
        filterFavorites[i].addEventListener('change', async function (){
            const response = await fetch('../api/api_filterFavorites.php?filter='+ this.value)
            console.log('../api/api_filterFavorites.php?filter='+ this.value);
            const array = await response.json();

            if (array['type'] === 'restaurants'){
                const restaurants = array['array'];

                const section = document.querySelector('#restaurants')
                section.innerHTML = ''
                for (const restaurant of restaurants) {
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


            }else{
                const meals = array['array'];

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

            }

        })
    }
}