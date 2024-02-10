'use strict';
if (document.querySelector('.wrapper').innerText == 'No products found.') {
  console.log('no products');
} else {
  (function () {


    var BODY_BACKGROUNDS = [

      '#041562'

    ];

    function Slider() {
      this.cards = document.querySelectorAll('.card');
      this.currentIndex = 0;

      this.isDragging = false;
      this.startX = 0;
      this.currentX = 0;

      this.initEvents();
      this.setActivePlaceholder();
    }

    // initialize drag events
    Slider.prototype.initEvents = function () {
      document.addEventListener('touchstart', this.onStart.bind(this));
      document.addEventListener('touchmove', this.onMove.bind(this));
      document.addEventListener('touchend', this.onEnd.bind(this));

      document.addEventListener('mousedown', this.onStart.bind(this));
      document.addEventListener('mousemove', this.onMove.bind(this));
      document.addEventListener('mouseup', this.onEnd.bind(this));

    };

    // set active placeholder
    Slider.prototype.setActivePlaceholder = function () {
      var placeholders = document.querySelectorAll('.cards-placeholder__item');
      var activePlaceholder = document.querySelector('.cards-placeholder__item--active')

      if (activePlaceholder) {
        activePlaceholder.classList.remove('cards-placeholder__item--active');
      }

      placeholders[this.currentIndex].classList.add('cards-placeholder__item--active');

      var bodyEl = document.querySelector('body');
      bodyEl.style.backgroundColor = BODY_BACKGROUNDS[this.currentIndex];
    };

    // mousedown event
    Slider.prototype.onStart = function (evt) {
      this.isDragging = true;

      this.currentX = evt.pageX || evt.touches[0].pageX;
      this.startX = this.currentX;

      var card = this.cards[this.currentIndex];

      // calculate ration to use in parallax effect
      this.windowWidth = window.innerWidth;
      this.cardWidth = card.offsetWidth;
      this.ratio = this.windowWidth / (this.cardWidth / 4);
    };

    // mouseup event
    Slider.prototype.onEnd = function (evt) {
      this.isDragging = false;

      var diff = this.startX - this.currentX;
      var direction = (diff > 0) ? 'left' : 'right';
      this.startX = 0;

      if (Math.abs(diff) > this.windowWidth / 4) {
        if (direction === 'left') {
          this.slideLeft();
        } else if (direction === 'right') {
          this.slideRight();
        } else {
          this.cancelMoveCard();
        }

      } else {
        this.cancelMoveCard();

      }

    };

    // mousemove event
    Slider.prototype.onMove = function (evt) {
      if (!this.isDragging) return;

      this.currentX = evt.pageX || evt.touches[0].pageX;
      var diff = this.startX - this.currentX;
      diff *= -1;

      // don't let drag way from the center more than quarter of window
      if (Math.abs(diff) > this.windowWidth / 4) {
        if (diff > 0) {
          diff = this.windowWidth / 4;
        } else {
          diff = - this.windowWidth / 4;
        }
      }

      this.moveCard(diff);
    };

    // slide to left direction
    Slider.prototype.slideLeft = function () {
      // if last don't do nothing
      if (this.currentIndex === this.cards.length - 1) {
        this.cancelMoveCard();
        return;
      }

      var self = this;
      var card = this.cards[this.currentIndex];
      var cardWidth = this.windowWidth / 2;

      card.style.left = '-50%';

      this.resetCardElsPosition();

      this.currentIndex += 1;
      this.setActivePlaceholder();
      card = this.cards[this.currentIndex];

      card.style.left = '50%';

      this.moveCardEls(cardWidth * 3);

      // add delay to resetting position
      setTimeout(function () {
        self.resetCardElsPosition();
      }, 50);
    };

    // slide to right direction
    Slider.prototype.slideRight = function () {
      // if last don't do nothing
      if (this.currentIndex === 0) {
        this.cancelMoveCard();
        return;
      }

      var self = this;
      var card = this.cards[this.currentIndex];
      var cardWidth = this.windowWidth / 2;

      card.style.left = '150%';

      this.resetCardElsPosition();

      this.currentIndex -= 1;
      this.setActivePlaceholder();
      card = this.cards[this.currentIndex];

      card.style.left = '50%';

      this.moveCardEls(-cardWidth * 3);

      // add delay to resetting position
      setTimeout(function () {
        self.resetCardElsPosition();
      }, 50);
    };

    // put active card in original position (center)
    Slider.prototype.cancelMoveCard = function () {
      var self = this;
      var card = this.cards[this.currentIndex];

      card.style.transition = 'transform 0.5s ease-out';
      card.style.transform = '';

      this.resetCardElsPosition();
    };

    // reset to original position elements of card
    Slider.prototype.resetCardElsPosition = function () {
      var self = this;
      var card = this.cards[this.currentIndex];

      var cardLogo = card.querySelector('.card__logo');
      var cardPrice = card.querySelector('.card__price');
      var cardTitle = card.querySelector('.card__title');
      var cardSubtitle = card.querySelector('.card__subtitle');
      var cardImage = card.querySelector('.card__image');
      var cardCategory = card.querySelector('.card__category');
      var cardWillAnimate = card.querySelectorAll('.card__will-animate');

      // move card elements to original position
      cardWillAnimate.forEach(function (el) {
        el.style.transition = 'transform 0.5s ease-out';
      });

      cardLogo.style.transform = '';
      cardPrice.style.transform = '';

      cardTitle.style.transform = '';
      cardSubtitle.style.transform = '';

      cardImage.style.transform = '';

      cardCategory.style.transform = '';

      // clear transitions
      setTimeout(function () {
        card.style.transform = '';
        card.style.transition = '';

        cardWillAnimate.forEach(function (el) {
          el.style.transition = '';
        });
      }, 500);

    };

    // slide card while dragging
    Slider.prototype.moveCard = function (diff) {

      var card = this.cards[this.currentIndex];

      card.style.transform = 'translateX(calc(' + diff + 'px - 50%))';
      diff *= -1;

      this.moveCardEls(diff);
    };

    // create parallax effect on card elements sliding them
    Slider.prototype.moveCardEls = function (diff) {
      var card = this.cards[this.currentIndex];

      var cardLogo = card.querySelector('.card__logo');
      var cardPrice = card.querySelector('.card__price');
      var cardTitle = card.querySelector('.card__title');
      var cardSubtitle = card.querySelector('.card__subtitle');
      var cardImage = card.querySelector('.card__image');
      var cardCategory = card.querySelector('.card__category');
      var cardWillAnimate = card.querySelectorAll('.card__will-animate');

      cardLogo.style.transform = 'translateX(' + (diff / this.ratio) + 'px)';
      cardPrice.style.transform = 'translateX(' + (diff / this.ratio) + 'px)';

      cardTitle.style.transform = 'translateX(' + (diff / (this.ratio * 0.90)) + 'px)';
      cardSubtitle.style.transform = 'translateX(' + (diff / (this.ratio * 0.85)) + 'px)';

      cardImage.style.transform = 'translateX(' + (diff / (this.ratio * 0.35)) + 'px)';

      cardCategory.style.transform = 'translateX(' + (diff / (this.ratio * 0.65)) + 'px)';

    };


    // create slider
    var slider = new Slider();

  })();
}

const AddToCart = document.querySelectorAll('.add');
const logo = document.querySelectorAll('.card__logo');
const cardTitle = document.querySelectorAll('.card__title');
const cardImg = document.querySelectorAll('.card__image');
const cardPrice = document.querySelectorAll('.card__price');
const number = document.querySelector('.count');
const allResult = document.querySelector('.allResult');
const allResult2 = document.querySelector('.allResult2');
const resultText = document.createElement('p');
const checkForm = document.querySelector('.checkout');
const wrapper = document.querySelector('.wrapper');
const nav = document.querySelector('#myNav');
const header = document.querySelector('header');
const cardsPlaceholder = document.querySelector('.cards-placeholder');
const X = document.querySelector('.X');
const checkTitle = document.querySelector('.checkTitle');



resultText.classList.add('resultText');
const qty = document.querySelectorAll('.quantity');

let clicked = 0;
let totalPrice = 0;
const cartData = [];
const cartDataReceipt = [];
window.addEventListener('load', function () {
  // create buy now button

  const buy = document.createElement('button');
  buy.innerText = 'buy';
  buy.classList.add('buy');
  allResult.appendChild(buy);



  /*  const docx = require('docx'); */

  buy.addEventListener('click', function () {
    if (totalPrice > 0) {
      checkForm.style.display = 'block';
      wrapper.style.display = 'none';
      nav.style.display = 'none';
      cardsPlaceholder.style.display = 'none';
      header.style.display = 'none';
      document.querySelector('.current-user').style.display = 'none';
      checkTitle.innerText = `checkout: ${totalPrice}$`;


      X.addEventListener('click', function () {
        checkForm.style.display = 'none';
        wrapper.style.display = 'block';
        nav.style.display = 'block';
        cardsPlaceholder.style.display = 'block';
        header.style.display = 'block';
        document.querySelector('.current-user').style.display = '';
      });
    }



    let total = 0;
    const prices = document.querySelectorAll('.priceCart');
    prices.forEach(function (price) {
      total += parseFloat(price.innerText.replace('$', ''));
    });

    window.addEventListener('beforeunload', () => {
      // Retrieve the previously stored history from sessionStorage
      const storedHistory = sessionStorage.getItem('HISTORY');
      let history = storedHistory ? JSON.parse(storedHistory) : [];

      // Push the total to the history array
      history.push(total.toFixed(2));

      // Calculate the sum of history values
      let historySum = 0;
      for (let i = 0; i < history.length; i++) {
        historySum += parseFloat(history[i]);
      }

      // Store data in sessionStorage
      sessionStorage.setItem('last', total.toFixed(2));
      sessionStorage.setItem('allData', JSON.stringify(cartData));
      sessionStorage.setItem('HISTORY', JSON.stringify(history));
      sessionStorage.setItem('HISTORY_SUM', historySum.toFixed(2));
      // Get the content of the myNav div


    });

    window.addEventListener('load', () => {
      // Retrieve data from sessionStorage
      const totalPrice = sessionStorage.getItem('last');
      const allData = sessionStorage.getItem('allData');
      const storedHistory = sessionStorage.getItem('HISTORY');

      let historySum = 0; // Variable to store the sum of history values

      if (storedHistory) {
        // Parse the stored history into an array
        const history = JSON.parse(storedHistory);

        // Calculate the sum of history values
        for (let i = 0; i < history.length; i++) {
          historySum += parseFloat(history[i]);
        }

        // Do something with the history array and historySum
        console.log(history);
        console.log(historySum);
      }

      // Remove the stored values
      sessionStorage.removeItem('last');
      sessionStorage.removeItem('allData');
      // Retrieve the saved content from localStorage


    });



  });
});

for (let index = 0; index < AddToCart.length; index++) {
  AddToCart[index].addEventListener('click', function () {
    const error = document.createElement('h3');
    error.classList.add('error');
    error.innerText = 'please insert a valid quantity';
    const cardBody = document.querySelectorAll('.card__body');
    if (qty[index].value > 0) {
      clicked++;
      number.innerText = clicked.toString();
      const container = document.querySelector('.overlay-content');
      const cardIndexSrc = cardImg[index].getAttribute('src');
      const cardPriceIndex = cardPrice[index].innerText;
      const floatCardPriceIndex = parseFloat(cardPriceIndex.replace('$', ''));



      // creating content
      const content = document.createElement('div');
      content.classList.add('contentCart');

      //creating title

      const titleValue = document.createElement('p');
      titleValue.innerText = cardTitle[index].textContent;
      titleValue.classList.add('title');


      let qtyV = parseInt(qty[index].value);
      let value = qtyV * floatCardPriceIndex;
      //one unit price
      const text = document.createElement('h3');
      text.innerText = 'price per unit: $' + floatCardPriceIndex;

      //create quantity
      const qtyText = document.createElement('h4');
      qtyText.classList.add('qtyText');
      qtyText.innerText = `QUANTITY: ${qtyV}`;


      // creating image
      const img = document.createElement('img');
      img.src = cardIndexSrc;
      img.classList.add('imgCart');

      // creating price
      const price = document.createElement('h5');
      price.innerText = '$' + value.toFixed(2);
      price.classList.add('priceCart');

      // creating delete
      const close = document.createElement('button');

      close.classList.add('close');
      close.innerText = 'remove';

      //creating add/sub buttons
      const add = document.createElement('i');
      add.classList.add('bi')
      add.classList.add('bi-plus-circle')
      const sub = document.createElement('i');
      sub.classList.add('bi');
      sub.classList.add('bi-patch-minus');

      AddToCart[index].classList.add('disable');
      AddToCart[index].innerText = 'added ✅';
      // appending all
      content.appendChild(titleValue);
      content.appendChild(img);
      content.appendChild(text);
      content.appendChild(sub);
      content.appendChild(qtyText);
      content.appendChild(add);

      content.appendChild(price);
      content.appendChild(close);

      container.appendChild(content);



      add.addEventListener('click', function () {
        qtyV = qtyV + 1;
        qtyText.innerText = `QUANTITY: ${qtyV}`;
        price.innerText = '$' + (qtyV * floatCardPriceIndex).toFixed(2);

        const item = cartData[index];
        if (item) {
          item.quantity = parseFloat(qtyV);
          item.price = (qtyV * floatCardPriceIndex).toFixed(2);
        }
        totalPrice += floatCardPriceIndex;
        resultText.innerText = `total price: ${totalPrice} $`;
        allResult2.appendChild(resultText);
      });


      sub.addEventListener('click', function () {
        if (qtyV > 0) {
          qtyV = qtyV - 1;
          qtyText.innerText = `QUANTITY: ${qtyV}`;
          price.innerText = '$' + (qtyV * floatCardPriceIndex).toFixed(2);
          const item = cartData[index];
          if (item) {
            item.quantity = parseFloat(qtyV);
            item.price = (qtyV * floatCardPriceIndex).toFixed(2);
          }
          totalPrice -= floatCardPriceIndex;
          resultText.innerText = `total price: ${totalPrice} $`;
          allResult2.appendChild(resultText);
        }


      });


      close.addEventListener('click', function () {
        qty[index].type = 'number';
        qty[index].disabled = false;

        AddToCart[index].classList.remove('disable');
        AddToCart[index].innerText = 'add';
        container.removeChild(content);
        clicked--;
        number.innerText = clicked.toString();
        const itemPrice = parseFloat(qtyV) * floatCardPriceIndex;
        totalPrice -= itemPrice;
        resultText.innerText = `total price: ${totalPrice} $`;
      });

      cartData.push({
        title: cardTitle[index].textContent,

        price: (qtyV * floatCardPriceIndex).toFixed(2),
        quantity: parseFloat(qtyV)
      });
      // Save the content of the myNav div before the page is unloaded
      window.addEventListener('beforeunload', function () {
        const myNavContent = document.querySelector('.overlay-content').innerHTML;
        localStorage.setItem('myNavContent', myNavContent);
      });


      cartDataReceipt.push({ cartData });

      totalPrice += parseFloat(value);
      resultText.innerText = `total price: ${totalPrice} $`;
      allResult2.appendChild(resultText);



      qty[index].disabled = true;
      qty[index].type = 'text';
      qty[index].value = 'go to cart';
      if (cardBody[index].querySelector('.error')) {
        cardBody[index].removeChild(cardBody[index].querySelector('.error'));
      }
    } else {

      if (!cardBody[index].querySelector('.error')) {
        cardBody[index].appendChild(error);
      }
    }
  });
}














//admin

const addNewProduct = document.querySelector('.addNewProduct');
addNewProduct.addEventListener('click', function () {


  //header
  const logo = document.createElement('input');
  logo.placeholder = 'logo url';
  logo.type = 'text';

  const AdminPrice = document.createElement('input');
  AdminPrice.placeholder = 'price';
  AdminPrice.type = 'number';
  AdminPrice.min = '0';

  const productTitle = document.createElement('input');
  productTitle.type = 'text';
  productTitle.placeholder = 'title';

  const productDesc = document.createElement('input');
  productDesc.type = 'text';
  productDesc.placeholder = 'description';

  const cardHeader = document.createElement('div');
  cardHeader.classList.add('card__header');
  cardHeader.appendChild(logo);
  cardHeader.appendChild(AdminPrice);
  cardHeader.appendChild(productTitle);
  cardHeader.appendChild(productDesc);

  //body
  const productImg = document.createElement('input');
  productImg.type = 'text';
  productImg.placeholder = 'image url';

  const productType = document.createElement('input');
  productType.type = 'text';
  productType.placeholder = 'product type';


  const cardBody = document.createElement('div');
  cardBody.classList.add('card__body');
  cardBody.appendChild(productImg);
  cardBody.appendChild(productType);

  //submit
  const saveProduct = document.createElement('button');
  saveProduct.innerText = 'SAVE'

  //remove
  const remove = document.createElement('button');
  remove.innerText = 'DELETE';
  //card
  const newCard = document.createElement('div');
  newCard.classList.add('card1');
  newCard.appendChild(cardHeader);
  newCard.appendChild(cardBody);
  newCard.appendChild(saveProduct);
  newCard.appendChild(remove);

  wrapper.appendChild(newCard);
  let products = [];
  remove.addEventListener('click', function () {
    wrapper.removeChild(newCard);
  });
  saveProduct.addEventListener('click', function () {
    const emptyFields = document.createElement('h3');
    emptyFields.classList.add('emptyFields');
    emptyFields.innerText = 'please fill all fields';
    if (logo.value == '' || AdminPrice.value == '' || productTitle.value == '' || productDesc.value == '' || productImg.value == '' || productType.value == '') {

      newCard.appendChild(emptyFields);
    } else {
      products.push({
        logo: logo.value,
        price: AdminPrice.value,
        productTitle: productTitle.value,
        productDesc: productDesc.value,
        productImg: productImg.value,
        productType: productType.value
      });
      const added = document.createElement('h3');
      added.classList.add('added');
      added.innerText = 'added successfully!';
      newCard.appendChild(added);
      emptyFields.style.display = 'none';
      var xhr3 = new XMLHttpRequest();
      xhr3.open('POST', 'products.php');
      xhr3.setRequestHeader('Content-Type', 'application/json');

      xhr3.send(JSON.stringify(products));
      console.log(products);
    }
  });

});

const deleteProduct = document.querySelectorAll('.deleteProduct');

deleteProduct.forEach(function (button) {
  button.addEventListener('click', function () {
    console.log('delete clicked');
    const deleteProductP = document.querySelector('.deleteProductP');
    deleteProductP.style.display = 'block';
    var parent = this.closest('.card');
    /*   parent.remove();  */
    var titleDeleted = parent.querySelector('.card__title').innerText;

    let data = {
      titleDeleted: titleDeleted
    };
    console.log(JSON.stringify(data));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'delete_products.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(data));
  });

});
//update price
const newPrice = document.querySelectorAll('.newPrice');
const submitNewPrice = document.querySelectorAll('.submitNewPrice');
for (let i = 0; i < submitNewPrice.length; i++) {
  submitNewPrice[i].addEventListener('click', function () {

    const cardTitle2 = cardTitle[i].innerText;
    console.log(cardTitle2);
    cardPrice[i].innerText = '$' + newPrice[i].value;
    let priceData = {
      title: cardTitle2,
      price: newPrice[i].value
    };
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_price.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(priceData));
  });
}

//update logo
const newLogo = document.querySelectorAll('.newLogo');
const submitNewLogo = document.querySelectorAll('.submitNewLogo');
for (let i1 = 0; i1 < submitNewLogo.length; i1++) {
  submitNewLogo[i1].addEventListener('click', function () {

    const cardTitle2 = cardTitle[i1].innerText;
    console.log(cardTitle2);
    const newLogo1 = newLogo[i1].value;
    let logoData = {
      title: cardTitle2,
      logo: newLogo1
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_logo.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(logoData));
  });
}

//update image
const newImage = document.querySelectorAll('.newImage');
const submitNewImage = document.querySelectorAll('.submitNewImage');
for (let i2 = 0; i2 < submitNewImage.length; i2++) {
  submitNewImage[i2].addEventListener('click', function () {

    const cardTitle2 = cardTitle[i2].innerText;
    console.log(cardTitle2);
    const newImage1 = newImage[i2].value;
    let imageData = {
      title: cardTitle2,
      image: newImage1
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_image.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(imageData));
  });
}


//uppdate description
const newDescription = document.querySelectorAll('.newDescription');
const submitNewDescription = document.querySelectorAll('.submitNewDescription');
for (let i3 = 0; i3 < submitNewDescription.length; i3++) {
  submitNewDescription[i3].addEventListener('click', function () {
    const cardTitle2 = cardTitle[i3].innerText;
    console.log(cardTitle2);
    const newDescription2 = newDescription[i3].value;
    let descriptionData = {
      title: cardTitle2,
      description: newDescription2
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_description.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(descriptionData));
  });
}

//update type
const newType = document.querySelectorAll('.newType');
const submitNewType = document.querySelectorAll('.submitNewType');
for (let i4 = 0; i4 < submitNewType.length; i4++) {
  submitNewType[i4].addEventListener('click', function () {
    const cardTitle2 = cardTitle[i4].innerText;
    console.log(cardTitle2);
    const newType1 = newType[i4].value;
    let typeData = {
      title: cardTitle2,
      type: newType1
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_type.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(typeData));
  });
}

//update title
const cardDescription = document.querySelectorAll('.card__subtitle');
const newTitle = document.querySelectorAll('.newTitle');
const submitNewTitle = document.querySelectorAll('.submitNewTitle');
for (let i5 = 0; i5 < submitNewTitle.length; i5++) {
  submitNewTitle[i5].addEventListener('click', function () {
    const cardDescription1 = cardDescription[i5].innerText;
    const newTitle1 = newTitle[i5].value;
    let titleData = {
      title: newTitle1,
      description: cardDescription1
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_title.php');
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.send(JSON.stringify(titleData));
  });
}


//search history
document.getElementById("searchButton").addEventListener("click", function (event) {
  event.preventDefault(); // Prevent form submission

  var email = document.getElementById("emailInput").value;
  fetch('/search?email=' + email) // Make a GET request to the server-side endpoint with the email as a query parameter
    .then(response => response.json())
    .then(data => {
      // Display the retrieved data in the searchField div
      var searchField = document.querySelector('.searchField');
      searchField.innerHTML = ''; // Clear previous results

      if (data.length > 0) {
        data.forEach(function (record) {
          searchField.innerHTML += '<p>' + record + '</p>'; // Replace 'record' with the appropriate property of your receipt object
        });
      } else {
        searchField.innerHTML = 'No records found.';
      }
    })
    .catch(error => console.error(error));
});


