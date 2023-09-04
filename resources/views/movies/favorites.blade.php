<x-base-layout>

    <div class="row mt-5">


    </div>


    <div id="favs" class="row">

    </div>
</x-base-layout>


<script>
    // A $( document ).ready() block.
    $( document ).ready(function() {
        console.log( "ready!" );
        let url = `{{ route('j.user.favorites') }}`;
        GetData(url).then(function(data){
            data.forEach(element => {

                con2 = `<img src="${element.POSTER_URL}" />`;
                movieURL = "{{ URL::to('/') }}/movie/id/" + element.ID_MOVIE;
                con1 = `<div class="col-lg-4 col-md-6 col-sm-6 col-12 mt-2 p-2"><a href="${movieURL}"> ${con2} ${element.MOVIE_TITLE}<a/></div>`;
                $("#favs").append(`${con1}`);
            });
        });;
    });

    function GetData(url, data = null){
        method = "POST";
        console.log("j");
        if (data == null) {
            method = "GET";
        }
        return $.ajax({
            url: url,
            type: method,
            dataType: "json",
            data: data,
            beforeSend: function() {},
            success: function(data) {},
            error: function(error) {}
        });
    }
</script>
