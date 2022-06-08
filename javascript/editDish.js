const editDish = document.querySelectorAll('.button-edit ')
console.log(editDish)
for (let i = 0; i < editDish.length; i++) {
    if (editDish[i]) {
        editDish[i].addEventListener('click', async function () {
            const section = document.querySelectorAll('#editDishBox')
            console.log(section)
            const article = (section[i]).closest(".info-dish")
            console.log(article.dataset.iddish)
            if (editDish[i].id === article.dataset.iddish) {
                console.log(article)
                section[i].classList.remove("hidden")
                section[i].innerHTML = ''
                const response = await fetch('../api/api_getMeals.php')
                const meals = await response.json()
                const response2 = await fetch('../api/api_getCategories.php')
                const typeDishes = await response2.json()
                const response3 = await fetch('../api/api_getDish.php?id=' + article.dataset.iddish)
                const dish = await response3.json()

                const popup_box_content = document.createElement('div')
                popup_box_content.classList.add("popup-box-content")

                const form = document.createElement("form")
                form.action = "editDishDatabase.php?idRestaurant=" + article.dataset.idrestaurant + "&idDish=" + article.dataset.iddish
                form.method = "post"
                form.classList = "popupBox"
                form.enctype = "multipart/form-data"

                const img = document.createElement("img")
                img.src = "images/dishes/" + dish.image + ".jpg"
                img.alt = ""
                form.appendChild(img)

                const imageRestaurant = document.createElement("label")
                imageRestaurant.for = "imageRestaurant"
                const file = document.createElement("input")
                file.type = "file"
                file.name = "image"
                file.accept = "image/png,image/jpeg,image/jpg,image/JPG"
                imageRestaurant.appendChild(file)
                form.appendChild(imageRestaurant)

                const nameDishLabel = document.createElement("label")
                nameDishLabel.textContent = "Nome do prato:"
                nameDishLabel.for = "nameDish"
                const nameDish = document.createElement("input")
                nameDish.id = "nameDish"
                nameDish.type = "text"
                nameDish.name = "nameDish"
                nameDish.value = dish.name
                nameDishLabel.appendChild(nameDish)
                form.appendChild(nameDishLabel)

                const priceDishLabel = document.createElement("label")
                priceDishLabel.textContent = "Preço:"
                priceDishLabel.for = "priceDish"
                const priceDish = document.createElement("input")
                priceDish.id = "priceDish"
                priceDish.type = "number"
                priceDish.step = "0.01"
                priceDish.name = "priceDish"
                priceDish.value = dish.price
                priceDishLabel.appendChild(priceDish)
                form.appendChild(priceDishLabel)

                const radio_class_buttons = document.createElement('div')

                const mealDishLabel = document.createElement("div")
                mealDishLabel.textContent = "Categoria:"
                mealDishLabel.for = "mealDish"
                for (const meal of meals) {
                    const span1 = document.createElement("label")
                    const mealDish = document.createElement("input")
                    mealDish.type = "radio"
                    mealDish.classList.add("radio")
                    mealDish.name = "mealDish"
                    mealDish.value = meal.id
                    mealDish.textContent = meal.name
                    if (dish.idMeal === meal.id) {
                        mealDish.checked = true
                    }
                    span1.textContent= meal.name
                    span1.appendChild(mealDish)
                    mealDishLabel.appendChild(span1)
                }
                radio_class_buttons.appendChild(mealDishLabel)

                const mealDishLabel2 = document.createElement("div")
                mealDishLabel2.textContent = "Tipo de refeição:"
                mealDishLabel2.for = "mealDish"
                for (const type of typeDishes) {
                    const span2 = document.createElement("label")
                    const mealDish2 = document.createElement("input")
                    mealDish2.type = "radio"
                    mealDish2.classList.add("radio")
                    mealDish2.name = "typeDish"
                    mealDish2.value = type.id
                    mealDish2.textContent = type.name
                    if (dish.idTypeOfDish === type.id) {
                        mealDish2.checked = true
                    }
                    span2.textContent= type.name
                    span2.appendChild(mealDish2)
                    mealDishLabel2.appendChild(span2)
                }
                radio_class_buttons.appendChild(mealDishLabel2)
                form.appendChild(radio_class_buttons)

                const button = document.createElement("button")
                button.type = "submit"
                button.textContent = "Salvar"
                form.appendChild(button)
                popup_box_content.appendChild(form)

                const a = document.createElement("a")
                a.id = "popupClose"
                a.text = "/&times;";
                popup_box_content.appendChild(a)
                section[i].appendChild(popup_box_content)
            }
            removeEditDish()
        })
    }
}
async function removeEditDish() {
    const removeeditDish = document.querySelectorAll('#popupClose')
    console.log(removeeditDish)
    for (let i = 0; i < removeeditDish.length; i++) {
        if (removeeditDish[i]) {
            removeeditDish[i].addEventListener('click', async function () {
                const section = document.querySelector('#editDishBox')
                section.classList.add("hidden")
            })
        }
    }
}