const addDish = document.querySelector('.button-add ')
console.log(addDish)
if (addDish) {
    addDish.addEventListener('click', async function () {
        const section = document.querySelector('#addDish')
        console.log(section)
        section.classList.remove("hidden")
        section.innerHTML = ''
        const response = await fetch('../api/api_getMeals.php')
        const meals = await response.json()
        const response2 = await fetch('../api/api_getCategories.php')
        const typeDishes = await response2.json()

        const popup_box_content = document.createElement('div')
        popup_box_content.classList.add("popup-box-content")

        const form=document.createElement("form")
        form.action="addDishDatabase.php?idRestaurant="+section.dataset.id
        form.method="post"
        form.classList="popupBox"
        form.enctype="multipart/form-data"

        const img=document.createElement("img")
        img.src="../images/pattern.jpeg"
        img.alt=""
        form.appendChild(img)

        const imageRestaurant=document.createElement("label")
        imageRestaurant.for="imageRestaurant"
        const file=document.createElement("input")
        file.type="file"
        file.name="image"
        file.accept="image/png,image/jpeg,image/jpg,image/JPG"
        imageRestaurant.appendChild(file)
        form.appendChild(imageRestaurant)

        const nameDishLabel=document.createElement("label")
        nameDishLabel.textContent="Nome do prato:"
        nameDishLabel.for="nameDish"
        const nameDish=document.createElement("input")
        nameDish.id="nameDish"
        nameDish.type="text"
        nameDish.name="nameDish"
        nameDishLabel.appendChild(nameDish)
        form.appendChild(nameDishLabel)

        const priceDishLabel=document.createElement("label")
        priceDishLabel.textContent="Preço:"
        priceDishLabel.for="priceDish"
        const priceDish=document.createElement("input")
        priceDish.id="priceDish"
        priceDish.type="number"
        priceDish.step="0.01"
        priceDish.name="priceDish"
        priceDishLabel.appendChild(priceDish)
        form.appendChild(priceDishLabel)

        const radio_class_buttons = document.createElement('div')

        const mealDishLabel=document.createElement("div")
        mealDishLabel.textContent="Categoria:"
        mealDishLabel.for="mealDish"
        for(const meal of meals){
            const span1=document.createElement("label")
            const mealDish=document.createElement("input")
            mealDish.type="radio"
            mealDish.classList.add("radio")
            mealDish.name="mealDish"
            mealDish.value=meal.id
            mealDish.textContent=meal.name
            span1.textContent= meal.name
            span1.appendChild(mealDish)
            mealDishLabel.appendChild(span1)
        }
        radio_class_buttons.appendChild(mealDishLabel)

        const mealDishLabel2=document.createElement("div")
        mealDishLabel2.textContent="Tipo de refeição:"
        mealDishLabel2.for="mealDish"
        for(const type of typeDishes){
            const span2=document.createElement("label")
            const mealDish2=document.createElement("input")
            mealDish2.type="radio"
            mealDish2.classList.add("radio")
            mealDish2.name="typeDish"
            mealDish2.value=type.id
            mealDish2.textContent=type.name
            span2.textContent= type.name
            span2.appendChild(mealDish2)
            mealDishLabel2.appendChild(span2)
        }
        radio_class_buttons.appendChild(mealDishLabel2)
        form.appendChild(radio_class_buttons)

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

        removeAddDish()
    })
}
async function removeAddDish() {
    const removeaddDish = document.querySelector('#popupClose')
    if (removeaddDish) {
        removeaddDish.addEventListener('click', async function () {
            console.log('hi')
            const section = document.querySelector('#addDish')
            section.classList.add("hidden")
        })
    }
}