<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">

    <title>PretaStyler</title>
    <link rel="stylesheet" href="/css/board.css"/>
    <link rel="icon" type="image/png" href="/static/img/favicon.png" />
    <script src="/js/boards/require.js" ></script>
    <script>
        requirejs.config({
            baseUrl: '/js/boards/',
            paths: {
                vendor: '/js/boards/'
            }
        });
    </script>

</head>
<body>
       <header class="navbar navbar-inverse">
           <div class="layout">
               <!-- Brand and toggle get grouped for better mobile display -->
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
                   <a class="navbar-brand" href="/">
                       <img src="/img/newlogo.png" alt="PretaStyler"/>
                   </a>
               </div>

               <!-- Collect the nav links, forms, and other content for toggling -->
               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

               </div><!-- /.navbar-collapse -->
           </div><!-- /.container-fluid -->
       </header>

<main class="main">
    <div class="row">
        <div class="left">

            <div class="canvas-toolbar" role="group" aria-label="Canvas main toolbar">
                <a href="#" class="btn" role="button">
                    <i class="i-android-arrow-up"></i>    Publish
                </a>
                <a href="#" class="btn" role="button" id="undo_state">
                    <i class="i-android-arrow-back"></i>    Undo</a>
                <a href="#" class="btn" role="button">
                    <i class="i-android-arrow-forward"></i>    Redo</a>
                <a href="#" class="btn" role="button" id="templates-btn">
                    <i class="i-asterisk"></i>    Templates</a>
                <a href="#" class="btn" role="button"><i class="i-plus"></i>    New</a>
            </div>

            <div class="canvas-wrapper" id="canvas">
                <div class="item-toolbar hidden" id="item-toolbar">
                    <a class="name" href="#">Some cool item name goes here</a>
                    <div class="line item-controls" role="group" aria-label="Selected item controling buttons">
                        <a href="#" class="btn" role="button" data-action="remove">Remove</a>
                        <a href="#" class="btn" role="button" data-action="flop">Flop</a>
                        <a href="#" class="btn" role="button" data-action="flip">Flip</a>
                        <a href="#" class="btn" role="button" data-action="grayscale">Gray</a>
                        <a href="#" class="btn" role="button" data-action="invert_colors">Invert</a>
                        <a href="#" class="btn" role="button" data-action="mask_image">Mask</a>
                        <a href="#" class="btn" role="button" data-action="sepia">Sepia</a>
                        <a href="#" class="btn" role="button" data-action="sepia2">Sepia 2</a>
                        <a href="#" class="btn" role="button" data-action="clone_item">Clone</a>
                        <a href="#" class="btn" role="button" data-action="forwards">Forwards</a>
                        <a href="#" class="btn" role="button" data-action="backwards">Backwards</a>
                    </div>
                    <div class="line item-filters" role="group" aria-label="Item image filtering and bgs">
                        <button type="button" class="btn patterned" data-action="transparent_bg">
                            <img src="/img/boards/shirt.png" class="img" />
                        </button>
                        <button type="button" class="btn" data-action="white_bg">
                            <img src="/img/boards/shirt.png" class="img" />
                        </button>

                        <button type="button" class="btn patterned" data-action="clip_item">
                            <img src="/img/boards/box-arrow-left.png" class="img" />
                        </button>
                        <!--<button type="button" class="btn btn-default" data-action="grayscale">Gray</button>
                        <button type="button" class="btn btn-default" data-action="invert_colors">Invert</button>
                        <button type="button" class="btn btn-default" data-action="mask_image">Mask</button>
                        <button type="button" class="btn btn-default" data-action="sepia">Sepia</button>
                        <button type="button" class="btn btn-default" data-action="sepia2">Sepia2</button>-->

                    </div>
                </div>
            </div>

        </div>
        <div class="right">

            <div class="user-nav">
                <a href="#" class="btn" role="button">Fashion </a>
                <a href="#" class="btn" role="button" id="upload-modal">Upload </a>
                <a href="#" class="btn" role="button">Items</a>
                <a href="#" class="btn" role="button">Boards</a>
                <a href="#" class="btn" role="button">Wishlist</a>
                <a href="#" class="btn" role="button">Wardrobe</a>
            </div>


            <div class="scroll-wrapper">
                <div class="searching-tools">
                    <h4 class="headline"> Search: </h4>
                    <div class="input-group w200">
                        <input type="text" class="form-control input-sm "
                               placeholder="Type your keywords" aria-describedby="Searching by keywords" id="keyword-search">
                        <span class="input-group-addon" ><i class="i-search"></i></span>
                    </div>
                    <div class="input-group w140 dropdown">
                        <input type="text" class="form-control dropdown-toggle input-sm" placeholder="Price range" aria-describedby="Searching by price">
                        <span class="input-group-addon dropdown-toggle " ><i class="i-chevron-down"></i></span>
                            <ul class="dropdown-menu ">

                                <li><a href="#">100</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">300</a></li>
                                <li><a href="#">400</a></li>
                                <li><a href="#">500</a></li>
                            </ul>
                    </div>
                    <div class="input-group w140">
                        <input type="text" class="form-control input-sm" placeholder="Color" aria-describedby="Searching by keywords">
                        <span class="input-group-addon" ><i class="i-chevron-down"></i></span>
                    </div>
                    <div class="input-group w140">
                        <input type="text" class="form-control input-sm" placeholder="Occasion" aria-describedby="Searching by keywords">
                        <span class="input-group-addon" ><i class="i-chevron-down"></i></span>
                    </div>
                    <div class="input-group w140">
                        <input type="text" class="form-control input-sm" placeholder="Season" aria-describedby="Searching by keywords">
                        <span class="input-group-addon" ><i class="i-chevron-down"></i></span>
                    </div>
                </div>
                <div class="tags-row" id="tags-wrapper"> </div>
                <div class="pags-row" id="pags-wrapper"> </div>


                <div class="items-navigation" id="items-navigation">



                    <h4 class="headline"> Browse: </h4>
                    <ul class="items" id="categories">
                         <ul class="items" id="categories">
                        
                        <li class="item" data-tagname="Coats" data-search_value="31" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Coats</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c31_31.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Dresses" data-search_value="22" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Dresses</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c22_22.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Pants" data-search_value="25" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Pants</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c25_25.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Jackets" data-search_value="23" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Jackets</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c23_23.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Waistcoats" data-search_value="37" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Waistcoats</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c37_37.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Tops" data-search_value="21" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Tops</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c21_21.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Knitwear" data-search_value="29" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Knitwear</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c29_29.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Skirts" data-search_value="24" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Skirts</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c24_24.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Shorts" data-search_value="28" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Shorts</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c28_28.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Swimwear" data-search_value="32" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Swimwear</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c32_32.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Necklaces" data-search_value="34" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Necklaces</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c34_34.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Earrings" data-search_value="33" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Earrings</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c33_33.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Footwear" data-search_value="30" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Footwear</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c30_30.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Bracelets" data-search_value="38" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Bracelets</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c38_38.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Bags" data-search_value="35" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Bags</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c35_35.jpg" class="img">
                            </div>
                        </li>
                        
                        <li class="item" data-tagname="Hats" data-search_value="36" data-fetch_path="http://pretastyler.com/api/search" data-search_param="category[]">
                            <span class="name">Hats</span>
                            <div class="img-wrapper">
                                <img src="http://pretastyler.com/images/system/c36_36.jpg" class="img">
                            </div>
                        </li>
                        
                    </ul>
                    </ul>

                    <h4 class="headline"> Adornments: </h4>
                    <ul class="items category-item">
                        {% for item in adornments %}
                        <li class="item" data-tagname="{{item.name}}"   data-fetch_path="/adornments/" data-search_value="{{item.kind}}"  data-search_param="adornment_type" >
                            <span class="name">{{item.name}}</span>
                            <div class="img-wrapper">
                                <img src="{{item.img_path}}" class="img">
                            </div>
                        </li>
                        {% endfor %}
                    </ul>
                </div>
                <div id="fetched_items"> </div>
            </div>


        </div>
    </div>
</main>

<script>
    
    require(['pretastyler'], function(PretaStyler){
        var pretaStyler = new PretaStyler();
    })
</script>
</body>
</html>