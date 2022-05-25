const searchRestaurants1 = document.querySelector('#searchRest1')
const searchRestaurants2 = document.querySelector('#searchRest2')
console.log(searchRestaurants2)
if (searchRestaurants1) {
    searchRestaurants1.addEventListener('input', async function() {
        const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
        const restaurants = await response.json()
        const section = document.querySelector('#restaurants')
        section.innerHTML = ''
        for (const restaurant of restaurants) {
            const article = document.createElement('article')
            const h3 = document.createElement('h3')
            const link = document.createElement('a')
            link.href = '../restaurant.php?id=' + restaurant.id
            link.textContent = restaurant.name
            const img = document.createElement('img')
            const div = document.createElement('div')
            div.classList.add('heart')
            div.id=restaurant.id;
            img.src = 'https://picsum.photos/600/300?' + restaurant.id
            h3.appendChild(link)
            article.appendChild(h3)
            article.append(div)
            article.appendChild(img)
            section.appendChild(article)
        }
        heartsClick();
    })
}
if (searchRestaurants2) {
    searchRestaurants2.addEventListener('input', async function() {
        console.log("hi");
        const response = await fetch('../api/api_restaurantsSearch.php?search=' + this.value)
        const restaurants = await response.json()
        const section = document.querySelector('#restaurants')
        section.innerHTML = ''
        for (const restaurant of restaurants) {
            const article = document.createElement('article')
            const h3 = document.createElement('h3')
            const link = document.createElement('a')
            link.href = '../restaurant.php?id=' + restaurant.id
            link.textContent = restaurant.name
            const img = document.createElement('img')
            const div = document.createElement('div')
            div.classList.add('heart')
            div.id=restaurant.id;
            img.src = 'https://picsum.photos/600/300?' + restaurant.id
            h3.appendChild(link)
            article.appendChild(h3)
            article.append(div)
            article.appendChild(img)
            section.appendChild(article)
        }
        heartsClick();
    })
}


const icon1 = document.querySelector('.search-icon1');
const icon2 = document.querySelector('.search-icon2');
const search1 = document.querySelector('.search1');
const search2 = document.querySelector('.search2');

icon1.onclick = function (){
    search1.classList.toggle('active');
}
icon2.onclick = function (){
    search2.classList.toggle('active');
}

