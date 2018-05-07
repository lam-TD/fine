function openPage(pageId) {
    var t = document.getElementById(pageId);
    var aTab = document.getElementsByClassName('tablink');
    for (var i = 0; i < aTab.length; i++) {
        aTab[i].onclick = function(){

        }
    }
    for (var i = 0; i < aTab.length; i++) {
        aTab[i].classList.remove('active-content');
    }
    aTab.classList.add('active-content');
}

document.addEventListener("DOMContentLoaded",function () {
    var aTab = document.getElementsByClassName('tablink');
    var boDy = document.getElementsByClassName('body-panel1');
    // console.log(aTab);
    // console.log(boDy);
    for (var i = 0; i < aTab.length; i++) {
        aTab[i].onclick = function(){
            for (var i = 0; i < aTab.length; i++) {
                aTab[i].classList.remove('active-detail');
            }

            this.classList.add('active-detail');
            for (var i = 0; i < boDy.length; i++) {
                boDy[i].classList.remove('active-content');
            }
            var hienthi = this.getAttribute("data-hienthi2");
            // console.log(hienthi);
            document.getElementById(hienthi).classList.add('active-content');
        }
    }

    var likelike = document.getElementById('like01');
    var luotkick = 0;
    likelike.onclick = function() {
        if (luotkick % 2 == 0){
            likelike.style.color = "red";
            luotkick++;
        }
        else{
            likelike.style.color = "#007bff";
            luotkick++;
        }
    }
},false);