function showNames(){
    var name = $('#name').val();
    $.ajax({
        type: "POST",
        url: "../json.php",
        data: {
            userName:name
        },
        success: function(data) {
            $("#body").append(data);
        }
    });
}