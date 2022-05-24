const filterFavorites = document.querySelectorAll('#favoriteFilter input[type=\'radio\']')
console.log(filterFavorites);

for (let i=0; i < filterFavorites.length; i++){
    if(filterFavorites){
        filterFavorites[i].addEventListener('change', async function (){

            const response = await fetch('../api/api_filterFavorites.php?filter='+this.value)
            console.log('../api/api_filterFavorites.php?filter='+ this.value);
            const array = await response.json();
            const section = document.querySelector('#favoritesPage')
            section.innerHTML = ''
            if (this.value === 'restaurants'){
                for (const restaurant of array) {
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
                for (const dish of array) {
                    const article = document.createElement('article')
                    const img = document.createElement('img')
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