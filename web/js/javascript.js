/**
 * Created by Corentin on 10/02/2017.
 */
$('#select_categorie').change(function () {
    if ($('#select_categorie').val() != '') {
        var url = window.location.href;
        url = url.replace(/\/new.+/g, '/new')
        window.location.replace(url + '/' + $('#select_categorie').val())
    }
})