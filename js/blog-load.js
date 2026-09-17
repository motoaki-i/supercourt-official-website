
function arrivalEntry( rss ){
              
	var wrap = ".js-blog";
	var more = ".js-blog__more";
	var list = ".js-blog__list";
	var entry_xml = "entry";
	var view_more_num = 3;
	
	$.ajax(rss).done(function(blogdata){
		
		if ($(blogdata).find(entry_xml).length){
			$(wrap).prop("hidden", false);
		}
	  
		if ($(blogdata).find(entry_xml).length <= view_more_num){
			$(more).prop("hidden", false);
		}
	  
		var list_html = [];
		$(blogdata).find(entry_xml).slice(0, view_more_num).each(function(index, entry){
			
			var entry_html = [];
			
			entry_html.push('<article class="blog">');
			entry_html.push('  <a href="'+ $(entry).find("link").attr("href") +'" class="blog__more" target="blank">');
			entry_html.push('   <figure><img src="'+ findImage( $(entry).find("content").text() ) +'" alt="" class="blog__thumb"></figure>');
			entry_html.push('   <time class="blog__date">'+ dateFormat(new Date($(entry).find("published").text()), "YYYY年MM月DD日（WW）") +'</time>');
			entry_html.push('   <p class="blog__title">'+ $(entry).find("title").text() +'</p>');
			entry_html.push('  </a>');
			entry_html.push('</article>');
			
			list_html.push( entry_html.join("\n") );
			
		});
		
		$(list).append(list_html.join("\n"));
		$(more).find("a").attr("href", $(blogdata).find("link[rel=alternate]").attr("href"));
		
	});
	
	function dateFormat(date, format_str){
				
		format_str = format_str.replace("YYYY", date.getFullYear() );
		format_str = format_str.replace("MM", date.getMonth()+1 );
		format_str = format_str.replace("DD", date.getDate() );
		format_str = format_str.replace("WW", ["日", "月", "火", "水", "木", "金", "土"][date.getDay()] );
		
		return format_str;
		
	}
		
	function findImage(html_str){
		
		var ret_img = "http://placehold.it/320";
		
		if ( (/<img[^>?]+ src=['"?]([^'"?]+)['"?][^>?]+>/).test(html_str) ){
			ret_img = RegExp.$1;
		}
		
		return ret_img;
		
	}
	
}
