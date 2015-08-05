
window.onload = function() {


        var dentro = function () {
            console.log('em cima');
            var h1Elements = document.getElementsByTagName("h1");

			for(var i = 0; i < h1Elements.length; i++) {
			   h1Elements[i].style.color = "red";
			}
            //dentro.className = "icomptitlecima";
        }
        document.getElementById('icomp_title').onmouseover = dentro;

        var fora = function () {
            console.log('fora');
            var h1Elements = document.getElementsByTagName("h1");

			for(var i = 0; i < h1Elements.length; i++) {
			   h1Elements[i].style.color = "black";
			}
            //dentro.className = "icomptitle";
        }
        document.getElementById('icomp_title').onmouseout = fora;
    };