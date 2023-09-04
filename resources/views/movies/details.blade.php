<x-base-layout>

    <div class="row mt-5">
        <div id="movie-title" class="col-12 h2 text-center">
            <i class="fa fa-spinner fa-spin" style="font-size:24px"></i>
        </div>

        <div class="col-lg-6 col-md-12 col-12 mt-4 text-center">
            <img class="m-auto" id="movie-poster" src="" alt="" srcset="">
        </div>

        @auth
        <div class="col-12 d-block d-lg-none text-center mt-4">
            <button class="btn btn-outline-info m-auto movie-fav" disabled><i class="fa fa-spinner fa-spin" style="font-size:24px" ></i></button>
        </div>
        @endauth

        <div id="movie-plot" class="col-lg-6 col-md-12 col-12 mt-4 ">
        </div>

        @auth
        <div class="col-12 d-none d-lg-block text-center mt-4">
            <button class="btn btn-outline-info m-auto movie-fav" disabled><i class="fa fa-spinner fa-spin" style="font-size:24px" ></i></button>
        </div>
        @endauth
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
        let url = 'http://www.omdbapi.com/?apikey=2e60095a&i={{ $movieID }}';
        let favCheckURL = `{{ route('j.fav.check') }}`;
        let favEditURL = `{{ route('j.fav.edit') }}`;

        GetData(url).then(function(data){

            if (data.Response == 'True') {
                movieDetails = data;
                $(document).prop('title', data.Title)
                $("#movie-title").text(data.Title);
                $("#movie-poster").prop('src', data.Poster);
                $("#movie-plot").text(data.Plot);
                $(".movie-fav").prop('disabled', false);
            }else{
                $("#movie-title").text("ERROR");
                $("#alert-container").append($("<div></div>").addClass("alert alert-danger").text(data.Error));
            }
        });

        GetData(favCheckURL, {"_token": "{{ csrf_token() }}", moveidID : '{{ $movieID }}'}).then(function(data){
            ChangeButton(data);
        });

        $(".movie-fav").click(function(e){
            e.preventDefault();
            $(".movie-fav").prop('disabled', true);
            // Agregar o quitar de favoritos
            movieData = {
                "_token": "{{ csrf_token() }}",
                moveidID : '{{ $movieID }}',
                favedFlag : favedFlag,
                movieTitle : movieDetails.Title,
                moviePosterURL : movieDetails.Poster,
            };
            GetData(favEditURL, movieData, $(".movie-fav")).then(function(data){
                ChangeButton(!favedFlag);
            });
        });
    });

    function ChangeButton(condition){
        $(".movie-fav").prop('disabled', true);
        $(".movie-fav").html(loading);
        setTimeout(() => {
            if (condition) {
                $(".movie-fav").html(faved);
                favedFlag = true;
            }else{
                $(".movie-fav").html(fav);
                favedFlag = false;
            }
            $(".movie-fav").prop('disabled', false);
        }, "500");

    }
    function GetData(url, data = null){
        method = 'POST';
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
            done: function() {},
            error: function(error) {}
        });
    }
</script>
