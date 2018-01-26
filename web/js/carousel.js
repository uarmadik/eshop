document.addEventListener("DOMContentLoaded", function(event) {

    /* этот код помечает картинки, для удобства разработки */
    // var lis = document.getElementsByTagName('li');
    // for (var i = 0; i < lis.length; i++) {
    //     lis[i].style.position = 'relative';
    //     // var span = document.createElement('span');
    //     // обычно лучше использовать CSS-классы,
    //     // но этот код - для удобства разработки, так что не будем трогать стили
    //     // span.style.cssText = 'position:absolute;left:0;top:0';
    //     // span.innerHTML = i + 1;
    //     // lis[i].appendChild(span);
    // };

    /* конфигурация */
    var width = 75; // ширина изображения
    var count = 3; // количество изображений

    var carousel = document.getElementById('carousel');
    var list = carousel.querySelector('ul.images');
    var listElems = carousel.querySelectorAll('.images li');

    var mainImage = document.querySelector('#slider .mainImage img');

    listElems.forEach(function (item, i, arr) {
        item.addEventListener('click', function (e) {
            mainImage.src = e.srcElement.currentSrc;
        })
    })

    var position = 0; // текущий сдвиг влево

    carousel.querySelector('#carousel .prev').onclick = function() {
        // сдвиг влево
        // последнее передвижение влево может быть не на 3, а на 2 или 1 элемент
        position = Math.min(position + width * count, 0)
        list.style.marginLeft = position + 'px';
    };

    carousel.querySelector('#carousel .next').onclick = function() {
        // сдвиг вправо
        // последнее передвижение вправо может быть не на 3, а на 2 или 1 элемент
        position = Math.max(position - width * count, -width * (listElems.length - count));
        list.style.marginLeft = position + 'px';
    };

});