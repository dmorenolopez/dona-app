/* Write here your custom javascript codes */


var item 				= $('.product');
var descriptionBlock 	= item.children('.product__description');
var formBlock 			= item.children('.product__shopping-cart');

var toggleBlocks = function() {
	descriptionBlock.toggleClass('hide');
	formBlock.toggleClass('hide');
}

item.on('click', '.shopping-cart__next-btn, .shopping-cart__back-btn', toggleBlocks);


