jQuery(function(){
    jQuery(window).scroll(function(){
        if(jQuery(this).scrollTop() > 300) {
            jQuery('#logo-img img')
                
                .attr('src','http://luismi.sanchezarteaga.es/contenido/uploads/2014/02/luismi.sanchezarteaga1.png');
        }
        if(jQuery(this).scrollTop() < 300) {
            jQuery('#logo-img img')
                .css({
					'-webkit-transition':'all 0.5s ease',
					'-moz-transition':'all 0.5s ease',
					'-ms-transition':'all 0.5s ease',
					'-o-transition':'all 0.5s ease',
					'transition':'all 0.5s ease'
                	})    
                .attr('src','http://www.archivocontralapared.com/files/theme_uploads/85eff23e439885c9927047d4c155b870.png');
        }
    });
});