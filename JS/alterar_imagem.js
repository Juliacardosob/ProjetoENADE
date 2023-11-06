let btn = document.querySelector('#btnfoto');
let div = document.querySelector('.file');
div.style.display = 'none';

btn.addEventListener("click", function(e){
    div.style.display = 'block';
    e.preventDefault();
});