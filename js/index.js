
$(document).ready(function(){
        $(".acategories,.bcategories,.ccategories,.dcategories,.ecategories").hide();
        $(".aaeye").hide();
        $(".bbeye").hide();
        $(".cceye").hide();
        $(".ddeye").hide();
        $(".eeeye").hide();
	



    $(".aeye").click(function(){
        $(".acategories").slideToggle();
        $(".aaeye").show();
        $(".aeye").hide();
    });

      $(".aaeye").click(function(){
        $(".acategories").slideToggle();
        $(".aeye").show();
        $(".aaeye").hide();
    });

     
    $(".beye").click(function(){
        $(".bcategories").slideToggle();
        $(".bbeye").show();
        $(".beye").hide();
    });

      $(".bbeye").click(function(){
        $(".bcategories").slideToggle();
        $(".beye").show();
        $(".bbeye").hide();
    });

    $(".ceye").click(function(){
        $(".ccategories").slideToggle();
        $(".cceye").show();
        $(".ceye").hide();
    });

      $(".cceye").click(function(){
        $(".ccategories").slideToggle();
        $(".ceye").show();
        $(".cceye").hide();
    });

     $(".deye").click(function(){
        $(".dcategories").slideToggle();
        $(".ddeye").show();
        $(".deye").hide();
    });

      $(".ddeye").click(function(){
        $(".dcategories").slideToggle();
        $(".deye").show();
        $(".ddeye").hide();
    });

     $(".eeye").click(function(){
        $(".ecategories").slideToggle();
        $(".eeeye").show();
        $(".eeye").hide();
    });

      $(".eeeye").click(function(){
        $(".ecategories").slideToggle();
        $(".eeye").show();
        $(".eeeye").hide();
    });
});