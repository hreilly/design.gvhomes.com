var youtube = document.querySelectorAll( 'div[data-type="youtube"]' );

for (var i = 0; i < youtube.length; i++) {

    var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/maxresdefault.jpg";

    var image = new Image();

    image.src = source;

    image.addEventListener( "load", function() {
        youtube[ i ].appendChild( image );
    }( i ) );

    youtube[i].addEventListener( "click", function() {
 
        var iframe = document.createElement( "iframe" );
 
            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
 
            this.innerHTML = "";
            this.appendChild( iframe );
    } );
}

var vimeo = document.querySelectorAll( 'div[data-type="vimeo"]' );

for (var i = 0; i < vimeo.length; i++) {

    /* This image is set in the shortcode because it has to call and decode a json file */

    vimeo[i].addEventListener( "click", function() {

        var iframe = document.createElement( "iframe" );

            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://player.vimeo.com/video/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1&autopause=0" );

            this.innerHTML = "";
            this.appendChild( iframe );
    } );

}