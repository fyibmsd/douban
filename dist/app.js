function getBookInfo(isbn) {
	var script = document.createElement('script');
	script.type = "text/javascript";
	script.src = "https://api.douban.com/v2/book/isbn/"+ isbn +"?callback=jsonpCallback";
	document.getElementsByTagName('head')[0].appendChild(script);
}

function jsonpCallback(result) {
	var data = result;
	var tpl = document.getElementById('tpl').innerHTML;
	laytpl(tpl).render(data, function(html) {
		document.getElementById('view').innerHTML = html;
	});
}

(function() {
	document.getElementById('search').onclick = function() {
		var isbn = document.getElementById('isbn').value;
		getBookInfo(isbn);
	};
})();