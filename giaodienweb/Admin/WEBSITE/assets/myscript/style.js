window.onload = function() {
    var d = new Date();
    var n = d.getMonth();
    var x  = n+1;
    var thanghientai = document.getElementById('thang-hien-tai').innerHTML = "Tháng " + x;
    var thanghientai = document.getElementById('thang-hien-taind').innerHTML = "Tháng " + x;
    var thanghientai = document.getElementById('thang-hien-taind1').innerHTML = "Tháng " + x;
    var dem = new Array();
    for(var i = 0; i < 5; i++){
        if(x < 6)
        {
            x--;
            dem[i]=x;
            if(x == 0)
            {
                dem[i] = 12;
            }
            if(x  <  0)
            {
                dem[i]=12+x;
                
            }
        }
        else{
            x--;
            dem[i]=x;
        }

    }
    


    
    var thanghientai = document.getElementById('thang-hien-tai-1').innerHTML = "Tháng " + dem[0];
    var thanghientai = document.getElementById('thang-hien-tai-2').innerHTML = "Tháng " + dem[1];
    var thanghientai = document.getElementById('thang-hien-tai-3').innerHTML = "Tháng " + dem[2];
    var thanghientai = document.getElementById('thang-hien-tai-4').innerHTML = "Tháng " + dem[3];
    var thanghientai = document.getElementById('thang-hien-tai-5').innerHTML = "Tháng " + dem[4];

    var thanghientaind = document.getElementById('thang-hien-tai-1nd').innerHTML = "Tháng " + dem[0];
    var thanghientaind = document.getElementById('thang-hien-tai-2nd').innerHTML = "Tháng " + dem[1];
    var thanghientaind = document.getElementById('thang-hien-tai-3nd').innerHTML = "Tháng " + dem[2];
    var thanghientaind = document.getElementById('thang-hien-tai-4nd').innerHTML = "Tháng " + dem[3];
    var thanghientaind = document.getElementById('thang-hien-tai-5nd').innerHTML = "Tháng " + dem[4];

    var thanghientaind1 = document.getElementById('thang-hien-tai-1nd1').innerHTML = "Tháng " + dem[0];
    var thanghientaind1 = document.getElementById('thang-hien-tai-2nd1').innerHTML = "Tháng " + dem[1];
    var thanghientaind1 = document.getElementById('thang-hien-tai-3nd1').innerHTML = "Tháng " + dem[2];
    var thanghientaind1 = document.getElementById('thang-hien-tai-4nd1').innerHTML = "Tháng " + dem[3];
    var thanghientaind1 = document.getElementById('thang-hien-tai-5nd1').innerHTML = "Tháng " + dem[4];
}