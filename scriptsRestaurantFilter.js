var valueList = document.getElementById('valueList');
var text = '<span> Selected Categories: </span>'
var listArray = [];

var checkboxes = document.querySelectorAll("input[type = 'checkbox']");

for (var checkbox of checkboxes){
    checkbox.addEventListener('click', function (){
        if(this.checked == true){
            listArray.push(this.value);
        }else{

        }
    })
}
console.log(checkboxes);
console.log(listArray);
