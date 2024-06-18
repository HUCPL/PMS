console.log("custom js")
//main Images code 
mainImage = document.getElementById('mainImages');
primaryImage = document.getElementById('primaryImage');
if(mainImage)
{
    mainImage.addEventListener('change',function(e){
        src= URL.createObjectURL(e.target.files[0]);
        primaryImage.setAttribute('src',src)
    })
}
//Product slider images
productImages = document.getElementById('productImages');
productImagesinput = document.getElementById('productImagesinput');
if(productImagesinput)
{
    productImagesinput.addEventListener('change',function(e){
        files = e.target.files
        for (let i = 0; i < files.length; i++) {
            productImages.innerHTML += `<img src="${URL.createObjectURL(files[i])}" style="width:20%; height:20%; border-radius:8px;">`
        }
    })
}
// Shipping page Javascript
//editShipping
editShipping = document.getElementsByClassName('editShipping');
sname = document.getElementById('Sname');
charge = document.getElementById('charge')
country = document.getElementById('country')
state = document.getElementById('state')
city = document.getElementById('city')
zipcode = document.getElementById('zipcode')
quantity = document.getElementById('quantity')
height = document.getElementById('height')
width = document.getElementById('width')
weight = document.getElementById('weight')
id = document.getElementById('id')
if(editShipping)
{
    for (let j = 0; j < editShipping.length; j++){
        editShipping[j].addEventListener('click',function(e){
            sname.value = editShipping[j].getAttribute('data-sName')
            charge.value = editShipping[j].getAttribute('data-charges')
            country.value = editShipping[j].getAttribute('data-country')
            state.value = editShipping[j].getAttribute('data-state')
            city.value = editShipping[j].getAttribute('data-city')
            zipcode.value = editShipping[j].getAttribute('data-zipcode')
            quantity.value = editShipping[j].getAttribute('data-quantity')
            height.value = editShipping[j].getAttribute('data-height')
            width.value = editShipping[j].getAttribute('data-width')
            weight.value = editShipping[j].getAttribute('data-weight')
            id.value = editShipping[j].getAttribute('data-id')
        })
    } 
}