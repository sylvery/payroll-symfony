// import 'jquery';
import 'jquery';

$(function() {
    var $booksCollectionHolder = $('ul.books');
    $booksCollectionHolder.data('index', $booksCollectionHolder.find('input').length);
    $('body').on('click', 'add_book_link', function(e){
        var $collectionHolderClass = $(e.currentTarget).data('collectionHolderClass');
        addFormToCollection($collectionHolderClass);
    })
})

function addFormToCollection($collectionHolderClass) {
    var $collectionHolder = $('.'+$collectionHolderClass);
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolderClass.data('index');
    var newForm = prototype;
    newform = newForm.replace(/__name__/g, index);
    $collectionHolder.data('index', index=1);
    var $newfomli = $('<li></li>').append(newForm);
    $collectionHolder.append($newfomli);
}