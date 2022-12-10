var bookNameList = [];
var data = [];

$(document).ready(function() {
    if(localStorage.getItem("bookNameList") !== null){
        bookNameList = JSON.parse(localStorage.getItem('bookNameList'));
    }
    // init();
    add();
    onClickEvent();
    checkExists();
});

function add(){
    $('#bookBody').append(`
            <tr id="R${$('#bookBody tr').length}" class="text-capitalize bookrow my-5">
                <td data-name="BN">
                    <input type="text" class="form-control text-capitalize" name="booknames[${$('#bookBody tr').length}][BN]">   
                    <div class="valid-input valid">Hợp lệ</div>
                    <div class="valid-input invalid">Không hợp lệ</div>
                </td>
                <td class="text-center" data-name="BN">
                    <select class="form-select form-select-sm mt-1 text-capitalize" name="booknames[${$('#bookBody tr').length}][bia]">
                        <option value="bìa mềm"> Bìa mềm </option>
                        <option value="bìa cứng"> Bìa cứng </option>
                    </select>
                </td>
                <td data-name="BN">
                    <select class="form-select form-select-sm mt-1 bookheadid text-capitalize" name="booknames[${$('#bookBody tr').length}][ngonngu]">
                                
                    </select>
                </td>
                <td>
                    <button class="btn btn-danger remove" type="button">Remove</button>
                </td>
            </tr>
        `);
    $.each(bookheads, function(idx, val) {
        if(val != null) {
            $('.bookheadid').each(function() {
                $(this).append(`
                    <option value="${bookheads[idx].id}" class=" text-capitalize" data-col-it="${bookheads[idx].id}"> 
                        ${lang[bookheads[idx].ngonngu - 1].tennn}
                    </option>
                `);
            });
        }
    });
// ${lang[0].tennn}
};

function checkExists(){
    $('.bookrow input').change(function(){
        console.log("Change");
        let input_val = $(this).val();
        $.ajax({
            url: "checkExists",
            method: "GET",
            data: {"tents": input_val},
            success: function(response){
              // process if/else to show div '.info_default' / '.info_does_not_exist'
              if (!response.trim()) {
                // show '.info_default' and hide '.info_does_not_exist'
                $('.bookrow input .valid').visible();
            } else {
                // show '.info_does_not_exist' and hide '.info_default'
                $('.bookrow input .invalid').invisible();
              }
            }
          });
    });
}

//add data to local storage
function store(){
    if(bookNameList.length >= 0){
        localStorage.setItem('bookNameList', JSON.stringify(bookNameList));
    }
    //show data
    add();
};  

//click to add data to local storage
function onClickEvent(){
    $('#addBook').click(function(){
        add();
    });

    $('#bookBody').on('click', '.remove', function () {
        // Getting all the rows next to the 
        // row containing the clicked button
        child = $(this).closest('tr').nextAll();
        
        // Iterating across all the rows 
        // obtained to change the index
        child.each(function () {
            // Getting <tr> id.
            id = $(this).attr('id');
            
            // Getting the <p> inside the .row-index class.
            idx = $(this).children('.book-name').children('p');
            
            // Gets the row number from <tr> id.
            var dig = parseInt(id.substring(1));
            // Modifying row index.
            idx.html(`Row ${dig - 1}`);
            // Modifying row id.
            $(this).attr('id', `R${dig - 1}`);
        });

        // itemToRemove = $('.book-name').html();
        // bookNameList.splice($.inArray(itemToRemove, bookNameList),1);
        
        // Removing the current row.
        console.log($(this).closest('tr'));
        $(this).closest('tr').remove();
    });
};

jQuery.fn.visible = function() {
    console.log($('.bookrow input .valid'));
    return this.css('visibility', 'visible');
};

jQuery.fn.invisible = function() {
    console.log('hidden');
    return this.css('visibility', 'hidden');
};

jQuery.fn.visibilityToggle = function() {
    return this.css('visibility', function(i, visibility) {
        return (visibility == 'visible') ? 'hidden' : 'visible';
    });
};