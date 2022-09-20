<footer class = "page-footer black" style = "margin-top: auto!important;">

    <div class = "container">

        <div class = "row" style = "height: 170px;">

            <div class = "col l6 s12">

                <h5 class = "white-text">Redes Sociais</h5>
                
                <p class = "grey-text text-lighten-4" style = "font-size: 27px;">

                    <a href = "https://www.facebook.com/TrabalhoFacilOFC" ><i style = "color: #FFFFFF;" class = "fab fa-facebook-square"></i></a>
                    <a href = "https://twitter.com/TrabalhoFacil01"><i style = "color: #FFFFFF;" class = "fab fa-twitter-square"></i></a>
                    <a href = "https://www.instagram.com/trabalhofacilofc/?hl=pt-br"><i style = "color: #FFFFFF;" class = "fab fa-instagram"></i></a>
                    <a href = "https://www.youtube.com/channel/UCGb1QvyvFvMHqgDgNCWM0Kw?view_as=subscriber"><i style = "color: #FFFFFF;" class = "fab fa-youtube-square"></i></a>

                </p>

            </div>

            <div class = "col l4 offset-l2 s12">

                <h5 class = "white-text">Links</h5>

                <p class = "grey-text text-lighten-4" style = "font-size: 27px;">

                    <ul>
                    
                        <li><a class = "grey-text text-lighten-3" href = "Servicos.php" style = "font-size: 15px;">Serviços</a></li>
                        <li><a class = "grey-text text-lighten-3" href = "GerarCurriculo.php" style = "font-size: 15px;">Crie seu curriculo</a></li>
                        <li><a class = "grey-text text-lighten-3" href = "Dicas.php" style = "font-size: 15px;">Dicas</a></li>
                        <li><a class = "grey-text text-lighten-3" href = "Sobre.php" style = "font-size: 15px;">Sobre</a></li>

                    </ul>

                </p>    

            </div>

        </div>

    </div>

    <div class = "footer-copyright">

        <div class = "container">

            <p style = "text-align: center; font-size: 12px;">© 2019 Copyright Trabalho Fácil</p>

        </div>

    </div>

</footer>

<script src = "js/Jquery.js"></script>

<script type = "text/javascript" src = "js/materialize.min.js"></script>

<script>

    $(document).ready(function()
    {
        
        $('.sidenav').sidenav();
        $('select').formSelect();
        $('.slider').slider();

    });


    $('#textarea1').val('');
    M.textareaAutoResize($('#textarea1'));

    $('[name = "check"]').change(function() 
    {
        $('[name = "fotoCurriculo"]').toggle(200);
        
    });

    $("select[required]").css({display: "block", height: 0, padding: 0, width: 0, position: 'absolute'});

</script>