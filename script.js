$(document).ready(function () {
    $('#region').change(function() {
        $.ajax({
            url: 'comunas.php?region=' + $(this).val(),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let html = '<option value="">Seleccionar Comuna</option>';
                if (data.data.length > 0) {
                    for (let i = 0; i < data.data.length; i++) {
                        html += '<option value="' + data.data[i].comuna + '">' + data.data[i].comuna + '</option>';
                    }
                }
                $('#comuna').html(html);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });

    $('#rut').inputmask({
        mask: '9{1,2}.999.999-K',
        definitions: {
            'K': {
                validator: "[0-9kK]",
                casing: 'upper'
            }
        }
    });
});

function validarCheckboxes() {
    var checkboxes = $('input[type="checkbox"]:checked');
    if (checkboxes.length < 2) {
        alert("Debe al menos 2 casillas en Como se entero de nosotros.");
        return false;
    }
    return true;
}