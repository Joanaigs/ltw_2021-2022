const editRestaurant= document.querySelector('.button-edit-rest ')
console.log(editRestaurant)
if (editRestaurant) {
    editRestaurant.addEventListener('click', async function () {
        const section = document.querySelector('#editRestaurantInfo')
        console.log(section.dataset.id)
        section.classList.remove("hidden")
        section.innerHTML = ''
        const response = await fetch('../api/api_getFilterRestaurant.php')
        const category = await response.json()
        const response2 = await fetch('../api/api_getRestaurant.php?id='+section.dataset.id)
        const restaurant = await response2.json()

        const popup_box_content = document.createElement('div')
        popup_box_content.classList.add("popup-box-content")

        const form=document.createElement("form")
        form.action="updateRestaurant.php?id="+section.dataset.id
        form.method="post"
        form.classList="popupBox"
        form.enctype="multipart/form-data"
        form.id="editRestaurant-popup"

        const imageRestaurant=document.createElement("label")
        imageRestaurant.for="photoRestaurant"
        const file=document.createElement("input")
        file.type="file"
        file.name="image"
        file.accept="image/png,image/jpeg,image/jpg,image/JPG"
        imageRestaurant.appendChild(file)
        form.appendChild(imageRestaurant)

        const nameDishLabel=document.createElement("label")
        nameDishLabel.textContent="Nome:"
        nameDishLabel.for="nameRestaurant"
        const nameDish=document.createElement("input")
        nameDish.id="nameRestaurant"
        nameDish.type="text"
        nameDish.name="nameRestaurant"
        nameDish.value=restaurant.name
        nameDishLabel.appendChild(nameDish)
        form.appendChild(nameDishLabel)

        const addressRestaurantLabel=document.createElement("label")
        addressRestaurantLabel.textContent="Endereço:"
        addressRestaurantLabel.for="addressRestaurant"
        const addressRestaurant=document.createElement("input")
        addressRestaurant.id="addressRestaurant"
        addressRestaurant.type="text"
        addressRestaurant.name="addressRestaurant"
        addressRestaurant.value=restaurant.address
        addressRestaurantLabel.appendChild(addressRestaurant)
        form.appendChild(addressRestaurantLabel)

        const categoryRadioButtons = document.createElement('div')

        const mealDishLabel=document.createElement("div")
        mealDishLabel.textContent="Categoria:"
        mealDishLabel.for="mealDish"
        for(const c of category){
            const span=document.createElement("label")
            const restaurantCategory=document.createElement("input")
            restaurantCategory.type="radio"
            restaurantCategory.classList.add("radio")
            restaurantCategory.name="restaurantCategory"
            restaurantCategory.value=c.id
            if (restaurant.filt === c.name) {
                restaurantCategory.checked = true
            }
            span.textContent=c.name
            span.appendChild(restaurantCategory)
            mealDishLabel.appendChild(span)
        }
        categoryRadioButtons.appendChild(mealDishLabel)
        form.appendChild(categoryRadioButtons)

        const button=document.createElement("button")
        button.type="submit"
        button.textContent="Salvar"
        form.appendChild(button)
        popup_box_content.appendChild(form)

        const a=document.createElement("a")
        a.id="popupClose"
        a.text="/&times;";
        popup_box_content.appendChild(a)
        section.appendChild(popup_box_content)

        removeEditRestaurant()
    })
}
async function removeEditRestaurant() {
    const removeeditRestaurant = document.querySelector('#popupClose')
    if (removeeditRestaurant) {
        removeeditRestaurant.addEventListener('click', async function () {
            console.log('hi')
            const section = document.querySelector('#editRestaurantInfo')
            section.classList.add("hidden")
        })
    }
}