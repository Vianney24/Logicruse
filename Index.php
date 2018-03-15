<?php
    include('fonction.php'); 
    $idConn=Open_DB();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Logicruse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php link_Bootstrap(); ?>
    <?php link_css(); ?>
</head>
<body>
<!--header-->
    <?php link_menu(); ?>
<!--fin du header-->

<!--slider-->
	<div style="font-family:'Open Sans',sans-serif,arial,helvetica,verdana">

	<!--javascript slider-->
	    <script src="js/jssor.slider-22.1.9.min.js" type="text/javascript"></script>
	    <script type="text/javascript">
	        jssor_1_slider_init = function() {

	            var jssor_1_options = {
	              $AutoPlay: true,
	              $SlideDuration: 1000,
	              $SlideEasing: $Jease$.$OutQuint,
	              $ArrowNavigatorOptions: {
	                $Class: $JssorArrowNavigator$
	              },
	              $BulletNavigatorOptions: {
	                $Class: $JssorBulletNavigator$
	              }
	            };

	            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

	            /*responsive code begin*/
	            /*you can remove responsive code if you don't want the slider scales while window resizing*/
	            function ScaleSlider() {
	                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
	                if (refSize) {
	                    refSize = Math.min(refSize, 1920);
	                    jssor_1_slider.$ScaleWidth(refSize);
	                }
	                else {
	                    window.setTimeout(ScaleSlider, 30);
	                }
	            }
	            ScaleSlider();
	            $Jssor$.$AddEvent(window, "load", ScaleSlider);
	            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
	            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
	            /*responsive code end*/
	        };
	    </script>
	<!--fin javascript slider-->
	
	<!--style css slider-->    
	    <style>
	        /* jssor slider bullet navigator skin 05 css */
	        /*
	        .jssorb05 div           (normal)
	        .jssorb05 div:hover     (normal mouseover)
	        .jssorb05 .av           (active)
	        .jssorb05 .av:hover     (active mouseover)
	        .jssorb05 .dn           (mousedown)
	        */
	        .jssorb05 {
	            position: absolute;
	        }
	        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
	            position: absolute;
	            /* size of bullet elment */
	            width: 16px;
	            height: 16px;
	            background: url('img/b05.png') no-repeat;
	            overflow: hidden;
	            cursor: pointer;
	        }
	        .jssorb05 div { background-position: -7px -7px; }
	        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
	        .jssorb05 .av { background-position: -67px -7px; }
	        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

	        /* jssor slider arrow navigator skin 22 css */
	        /*
	        .jssora22l                  (normal)
	        .jssora22r                  (normal)
	        .jssora22l:hover            (normal mouseover)
	        .jssora22r:hover            (normal mouseover)
	        .jssora22l.jssora22ldn      (mousedown)
	        .jssora22r.jssora22rdn      (mousedown)
	        .jssora22l.jssora22lds      (disabled)
	        .jssora22r.jssora22rds      (disabled)
	        */
	        .jssora22l, .jssora22r {
	            display: block;
	            position: absolute;
	            /* size of arrow element */
	            width: 40px;
	            height: 58px;
	            cursor: pointer;
	            background: url('img/a22.png') center center no-repeat;
	            overflow: hidden;
	        }
	        .jssora22l { background-position: -10px -31px; }
	        .jssora22r { background-position: -70px -31px; }
	        .jssora22l:hover { background-position: -130px -31px; }
	        .jssora22r:hover { background-position: -190px -31px; }
	        .jssora22l.jssora22ldn { background-position: -250px -31px; }
	        .jssora22r.jssora22rdn { background-position: -310px -31px; }
	        .jssora22l.jssora22lds { background-position: -10px -31px; opacity: .3; pointer-events: none; }
	        .jssora22r.jssora22rds { background-position: -70px -31px; opacity: .3; pointer-events: none; }
	    </style>
	<!--fin style css slider-->

	<!--main slider-->
	    <div id="jssor_1" style="position:relative;margin:0 auto;top:60px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">

	    <!-- Loading Screen -->
	        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
	            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
	            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
	        </div>
	        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:350px;overflow:hidden;">
	            <a data-u="any" href="http://www.jssor.com" style="display:none"></a>
	            <div>
	                <img data-u="image" src="images/caroussel1.jpg" />
	                <div style="position:absolute;top:100px;text-align:center;width:100%;height:120px;z-index:0;font-size:50px;color:#ffffff;line-height:60px;">LOGICRUSE</div>
	                <div style="position:absolute;top:180px;text-align:center;width:100%;height:120px;z-index:0;font-size:30px;color:#ffffff;line-height:38px;">Société de croisières</div>
	            </div>
	            <div>
	                <img data-u="image" src="images/caroussel2.jpg" />
	                <div style="position:absolute;top:150px;right:50px;width:480px;height:120px;z-index:0;font-size:50px;color:#ffffff;line-height:60px;background-color:rgba(0,0,0,0.5);text-align:center;padding-top: 5px;border-radius:6px;">À partir de 400€</div>
	                <div style="position:absolute;top:220px;right: 50px;width:480px;height:120px;z-index:0;font-size:30px;color:#ffffff;line-height:38px; text-align:center;">-50% pour la deuxième personne</div>
	            </div>
	            <div>
	                <img data-u="image" src="images/caroussel5.jpg" />
	                <div style="position:absolute;top:10px;left:60px;width:480px;height:120px;z-index:0;font-size:50px;color:#ffffff;line-height:60px;"></div>
	                <div style="position:absolute;top:50px;left:60px;width:500px;height:120px;z-index:0;font-size:30px;color:#ffffff;line-height:38px;">Des croisières hors saison pour se ressourcer </div>
	            </div>
	        </div>
	        
	    <!-- Bullet Navigator -->
	        <div data-u="navigator" class="jssorb05" style="bottom:150px;right:16px;" data-autocenter="1">
	            <!-- bullet navigator item prototype -->
	            <div data-u="prototype" style="width:16px;height:16px;"></div>
	        </div>
	        
	    <!-- Arrow Navigator -->
	        <span data-u="arrowleft" class="jssora22l" style="margin-top:-70px;left:8px;width:40px;height:58px;" data-autocenter="2"></span>
	        <span data-u="arrowright" class="jssora22r" style="margin-top:-70px;right:8px;width:40px;height:58px;" data-autocenter="2"></span>
	    
	    </div>
	<!--fin main slider-->

	    <script type="text/javascript">jssor_1_slider_init();</script>
	    <!-- #endregion Jssor Slider End -->

	</div>
<!--fin slider-->

<!--nos services-->
	<div class="a_propos">
		<div class="titre">
			<h4><strong>À PROPOS DE LOGICRUSE</strong></h4>
			<img src="images/image_sous_titre.png">
		</div>
		<div class="col-sm-4">
			<img src="images/grande_croisiere.jpg" class="image_gde_croisiere">
		</div>
		<div class="col-sm-8 texte">
			<h4>Un équipage français, une expertise et un service attentionné, une haute gastronomie:</h4>
			 <p>au cœur d’un environnement 5 étoiles, LOGICRUSE vous emmène à la découverte de destinations d’exceptions et vous offre une expérience de voyage à la fois authentique et raffinée.</p>
		</div>
		<div>
			<a href="voyage.php" class="btn btn-default boutton_service">
				<span class="glyphicon glyphicon-hand-right"></span> Découvrir nos offres
			</a>
		</div>
	</div>

<!--footer-->
	<?php link_footer(); ?>
<!--fin du footer-->

</body>
<?php 
	Close_DB($idConn); 
?>
</html>
