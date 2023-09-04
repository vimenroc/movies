<x-base-layout>

    <div class="row mt-5">
        <form id="form-search">
            <div class="mb-3">
                <label for="movie-search" class="form-label">Search by Title</label>
                <input type="text" class="form-control" id="movie-search">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div id="favs" class="row">

    </div>
</x-base-layout>


<script>
    // A $( document ).ready() block.
    var favedFlag = false;
    var faved = `<i class="fa-solid fa-heart text-danger"></i> Quitar de favoritos`;
    var fav = `<i class="fa-regular fa-heart text-danger"></i> Agregar a favoritos`;
    var loading = `<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>`;
    var movieDetails = null;

    $( document ).ready(function() {
        let url = 'http://www.omdbapi.com/?apikey=2e60095a';


        $("#form-search").submit(function(e){
            e.preventDefault();
            var data = {
                s: $("#movie-search").val()
            };
            console.log();
            GetData(url, data).then(function(data){
                if (data.Response == 'True') {
                    data.Search.forEach(element => {

                        con2 = `<img src="${element.Poster}" />`;
                        movieURL = "{{ URL::to('/') }}/movie/id/" + element.imdbID;
                        con1 = `<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-2 p-2"><a href="${movieURL}"> ${con2} ${element.Title}<a/></div>`;
                        $("#favs").append(`${con1}`);
                    });
                }else{
                    $("#alert-container").append($("<div></div>").addClass("alert alert-danger alert-dismissible").prop('role', 'alert').text(data.Error).append('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></butto'));
                }
            });
        })


    });

    function GetData(url, data = null){
            method = "GET";
        return $.ajax({
            url: url,
            type: method,
            dataType: "json",
            data: data,
            beforeSend: function() {},
            success: function(data) {},
            done: function() {},
            error: function(error) {}
        });
    }
</script>
