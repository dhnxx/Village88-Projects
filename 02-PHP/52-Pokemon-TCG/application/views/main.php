<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php $this->load->view("partials/header.php"); ?>

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<script>
    $(document).ready(function() {
        let imagesContainer = $(".pokemons");

        function handleImageClick() {

            let imageUrl = $(this).attr("src");

            $("#imageModal img").attr("src", imageUrl);
            $("#ModalLabel").text($(this).attr("pokemon_name"));
            $("#type").text("Types: " + $(this).attr("pokemon_type"));
            $("#hp").text("HP: " + $(this).attr("pokemon_hp"));
            $("#evolves").text("Evolves from: " + ($(this).attr("evolves_from") ? $(this).attr("evolves_from") : "None"));

            $("#imageModal").modal("show");
        }

        for (let i = 1; i < 100; i++) {
            $.get("https://api.pokemontcg.io/v2/cards/ex11-" + i)
                .done(function(res) {
                    let img = $('<img>', {
                        id: i,
                        src: res.data.images.large,
                        class: "pokemon-image card-img-top ",
                        pokemon_name: res.data.name,
                        pokemon_hp: res.data.hp,
                        pokemon_type: res.data.types.join(", "),
                        evolves_from: res.data.evolvesFrom,
                    });

                    let card = $('<div>', {
                        class: "card",
                        style: "width: 200px; margin-bottom: 20px;",
                    }).append(img);

                    imagesContainer.append(card);
                });
        }

        imagesContainer.on("click", ".pokemon-image", handleImageClick);
    });
</script>

<body>
    <h1 class="text-center mt-5">Pokemons</h1>
    <div class="container mt-3">
        <div class="row pokemons justify-content-center"></div>
    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" class="img-fluid" alt="Pokemon">
                    <h6 class="mt-2" id="type"></h6>
                    <h6 id="hp"></h6>
                    <h6 id="evolves"></h6>
                </div>
            </div>
        </div>
    </div>

</body>