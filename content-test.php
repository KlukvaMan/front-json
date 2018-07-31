
 <script type="text/javascript">
        $.getJSON("products.json", function(json) {

            // alert(json.length);

            var j = "<? echo $j ?>"; 

            document.getElementById('product_code'+j).innerHTML = "Код: "+json[j]['code']; ////////////_________________ КОД

            document.getElementById('product__link'+j).innerHTML = json[j]['title']; ////////////_________________  Наименование

            var len = (json[j][['primaryImageUrl']].length-4);                    ////////////_________________ КАРТИНКА
            var str = json[j]['primaryImageUrl'].substring(0,len)
            document.getElementById('img_link'+j).src = str+"_220x220_1"+".jpg"; 

            var arrassoc = json[j]['assocProducts'].split('\n');                //////////__________________   ТЕГИ
            for (var i = 0; i<=arrassoc.length-1; i++) {
                document.getElementById('tag_'+(i+1)+j).innerHTML = arrassoc[i]; 
            } 

            elem = document.getElementById('data-product-id'+j);                  ////////_________________  data-product-id
            elem.setAttribute("data-product-id", json[j]['productId'])


            document.getElementById('goldPrice'+j).innerHTML = json[j]['priceGoldAlt'];
            document.getElementById('retailPrice'+j).innerHTML = json[j]['priceRetailAlt']; 


            document.getElementById('1'+j).onclick = function() {             ////////////////____________ ЦЕНА КВ. М.
                document.getElementById('1'+j).setAttribute('class','unit--select unit--active');    
                document.getElementById('2'+j).setAttribute('class','unit--select');
                document.getElementById('goldPrice'+j).innerHTML = json[j]['priceGoldAlt'];
            document.getElementById('retailPrice'+j).innerHTML = json[j]['priceRetailAlt']; 
            }

             document.getElementById('2'+j).onclick = function() {             //////////////____________ ЦЕНА УПАКОВКА
                 document.getElementById('2'+j).setAttribute('class','unit--select unit--active');    
                document.getElementById('1'+j).setAttribute('class','unit--select');
                document.getElementById('goldPrice'+j).innerHTML = json[j]['priceGold'];
            document.getElementById('retailPrice'+j).innerHTML = json[j]['priceRetail'];
            }


            document.getElementById('arrowdown'+j).onclick = function() {
            if (document.getElementById('countprod'+j).value>0){
            document.getElementById('countprod'+j).value--;}
            }
            document.getElementById('arrowup'+j).onclick = function() {
            document.getElementById('countprod'+j).value++;
            }

        });


        
    </script>

<?php 

$str = "code";
	echo ' <div id="products_section">
                        <div class="products_page pg_0">
                            <div class="product product_horizontal">                                
                                <span class="product_code" id="product_code'.$j.'">Код: </span>
                                <div class="product_status_tooltip_container">
                                    <span class="product_status">Наличие</span>
                                </div>                                
                                <div class="product_photo">
                                    <a href="#" class="url--link product__link">
                                        <img id="img_link'.$j.'" src="">
                                    </a>                                    
                                </div>
                                <div class="product_description">
                                    <a href="#" class="product__link" id="product__link'.$j.'"></a>
                                </div>
                                <div class="product_tags hidden-sm">
                                    <p>Могут понадобиться:</p>
                                    <a href="#" class="url--link" id="tag_1'.$j.'"></a>
                                    <a href="#" class="url--link" id="tag_2'.$j.'"></a>
                                    <a href="#" class="url--link" id="tag_3'.$j.'"></a>
                                    <a href="#" class="url--link" id="tag_4'.$j.'"></a>
                                    <a href="#" class="url--link" id="tag_5'.$j.'"></a>
                                    <a href="#" class="url--link" id="tag_6'.$j.'"></a>
                                </div>
                               
                                <div class="product_units">
                                    <div class="unit--wrapper">
                                        <div class="unit--select unit--active" id="1'.$j.'">
                                            <p class="ng-binding">За м. кв.</p>
                                        </div>
                                        <div class="unit--select" id="2'.$j.'">
                                            <p class="ng-binding">За упаковку</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="product_price_club_card">
                                    <span class="product_price_club_card_text">По карте<br>клуба</span>
                                    <span class="goldPrice" id="goldPrice'.$j.'"></span>
                                    <span class="rouble__i black__i">
                                        <svg version="1.0" id="rouble__b" xmlns="http://www.w3.org/2000/svg" x="0" y="0" width="30px" height="22px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#rouble_black"></use>
                                        </svg>
                                     </span>
                                </p>
                                <p class="product_price_default">
                                    <span class="retailPrice" id="retailPrice'.$j.'"></span>
                                    <span class="rouble__i black__i">
                                        <svg version="1.0" id="rouble__g" xmlns="http://www.w3.org/2000/svg" x="0" y="0" width="30px" height="22px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
                                           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#rouble_gray"></use>
                                        </svg>
                                     </span>
                                </p>
                                <div class="product_price_points">
                                    <p class="ng-binding">Можно купить за 231,75 балла</p>
                                </div>


                                <div class="list--unit-padd"></div>
                                <div class="list--unit-desc">
                                    <div class="unit--info">
                                        <div class="unit--desc-i"></div>
                                        <div class="unit--desc-t">

                                            <p>
                                                <span class="ng-binding">Продается упаковками:</span>
                                                <span class="unit--infoInn">1 упак. = 2.47 м. кв. </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="product__wrapper">
                                    <div class="product_count_wrapper">
                                        <div class="stepper">
                                            <input class="product__count stepper-input" id="countprod'.$j.'" type="text" value="1">
                                            <span class="stepper-arrow up" id="arrowup'.$j.'"></span>
                                            <span class="stepper-arrow down" id="arrowdown'.$j.'"></span>                                            
                                        </div>
                                    </div>
                                    <sp an class="btn btn_cart" data-url="/cart/" id="data-product-id'.$j.'">
                                        <svg class="ic ic_cart">
                                           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cart"></use>
                                        </svg>
                                        <span class="ng-binding" style="margin-top:5px;">В корзину</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>';
?>

