document.addEventListener("DOMContentLoaded",function () {
	//click search
	var clickSearch = 0;
	var tttt = document.getElementById('text-search-top');
	var bodySearch = document.getElementsByClassName('body-search');
	tttt.onclick = function(){
		bodySearch[0].classList.add('active-search');
		clickSearch = 1;
	}
	
	// var tttt2 = document.getElementById('text-search-top-2');
	// tttt2.onclick = function(){
	// 	bodySearch[1].classList.add('active-search2');	
	// }

	// hien thi user form
	var clickUser = document.getElementById('id-user-form');
	clickUser.onclick = function () {
		document.getElementsByClassName('user-form')[0].classList.toggle("hienthi-search-form");
	};


	//cuon chuot
	window.addEventListener("scroll",function(){
		var flag = false;
		if (window.pageYOffset > 56) 
		{
			// document.getElementById('id-menu-Top').classList.add('hidden-item');
			// document.getElementById('id-layer-top').classList.add('fixed-top-style-menu');
			// document.getElementById('hidden-formSearch').style.display = "block";
			document.getElementById('id-icon-scroll-top').classList.add('hienthi-icon');
			// flag = true;
			// // khi cuon chuot ma da click vao form search
			// if (clickSearch > 0 ) {
			// 	bodySearch[1].classList.add('active-search2');
			// }
		}
		else
		{
			// document.getElementById('id-menu-Top').classList.remove('hidden-item');
			// document.getElementById('id-layer-top').classList.remove('fixed-top-style-menu');
			// document.getElementById('hidden-formSearch').style.display = "none";
			document.getElementById('id-icon-scroll-top').classList.remove('hienthi-icon');
			flag = false;
			
		}
	});

	// scroll top
	$('#id-icon-scroll-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	// select button
	var btnSelect = document.getElementsByClassName('btn-select');
	var aSelect = document.getElementsByClassName('a-select');
	var andi =  document.getElementsByClassName('select-content');

	for (var i = 0; i < aSelect.length; i++) {
		var oldAtt = "";
		aSelect[i].onclick = function(){
			for (var j = 0; j < aSelect.length; j++) { aSelect[j].classList.remove('click-select'); }
			var hien_len = this.getAttribute("data-hienthi");
			
			if (oldAtt == hien_len) 
			{
				this.classList.remove('click-select');
				oldAtt = "";
				var phan_hien_len = document.getElementById(hien_len);
				for (var k = 0; k < andi.length; k++) {
					andi[k].classList.remove('hienthi');
				}
				phan_hien_len.classList.remove('hienthi');
			}
			else
			{
				this.classList.add('click-select');
				oldAtt = hien_len;
				var phan_hien_len = document.getElementById(hien_len);
				for (var k = 0; k < andi.length; k++) {
					andi[k].classList.remove('hienthi');
				}
				phan_hien_len.classList.add('hienthi');
			}
		}
	}

	// notification
	var nutCha = document.getElementsByClassName('cha-notification');
	var anhienThongBao = document.getElementsByClassName('notification');
	var aNotification = document.getElementsByClassName('a-notification');
	var oldbtnThongBao = "";
	for (var i = 0; i < aNotification.length; i++) {
		aNotification[i].onclick = function () {
			for (var j = 0; j < aNotification.length; j++) { aNotification[j].classList.remove('click-thongbao'); }
			var hien_len = this.getAttribute("data-id-hienthi");
			if (oldbtnThongBao == hien_len) 
			{
				this.classList.remove('click-thongbao');
				oldbtnThongBao = "";
				var phan_hien_len = document.getElementById(hien_len);
				for (var k = 0; k < anhienThongBao.length; k++) {
					anhienThongBao[k].classList.remove('hienthi-notification');
				}
				phan_hien_len.classList.remove('hienthi-notification');
			}
			else
			{
				this.classList.add('click-thongbao');
				oldbtnThongBao = hien_len;
				var phan_hien_len = document.getElementById(hien_len);
				for (var k = 0; k < anhienThongBao.length; k++) {
					anhienThongBao[k].classList.remove('hienthi-notification');
				}
				phan_hien_len.classList.add('hienthi-notification');
			}
		}
	}

	// select item TinhTp
	var select_Item = document.getElementsByClassName('selectItem');
	for (var i = 0; i < select_Item.length; i++) {
		select_Item[i].onclick = function () {
			document.getElementById('a-tinhTP').innerHTML = this.getAttribute('data-name') + ' <i class="fas fa-angle-down float-right" style="margin-top:5px;"></i>';
			document.getElementsByClassName('select-content')[0].classList.remove('hienthi');
			document.getElementById('a-tinhTP').classList.remove('click-select');
		}
	}

	// select item danh muc
	var select_Item2 = document.getElementsByClassName('selectItem2');
	var demselectDm = 0;
	for (var i = 0; i < select_Item2.length; i++) {
		select_Item2[i].onclick = function () {
			document.getElementById('a-danhmuc').innerHTML = this.getAttribute('data-name') + ' <i class="fas fa-angle-down float-right" style="margin-top:5px;"></i>';
			document.getElementsByClassName('select-content')[1].classList.remove('hienthi');
			document.getElementById('a-danhmuc').classList.remove('click-select');
		}
	}
	
	// form login
	var modal = document.getElementById('id01');
	document.getElementById('btn-dangnhap').onclick = function(){
		document.getElementById('id01').style.display = "block";
	}
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

	// form register
	var modal = document.getElementById('id02');
	document.getElementById('btn-dangky').onclick = function(){
		document.getElementById('id02').style.display = "block";
	}

	// call auto slide
	autoSlide();

	// auto slide
	function autoSlide() {
		var timeSlide = setInterval(function(){
			var vitriSlide = 0;
			var currentSlide = document.querySelector('.img-carolsel ul li.active-img');
			// tinh vi tri slide dang active
			for (vitriSlide = 0; currentSlide = currentSlide.previousElementSibling; vitriSlide++) {} 
			var slide = document.querySelectorAll('.img-carolsel ul li');
			if (vitriSlide < (slide.length-1)) 
			{
				for (var i = 0; i < slide.length; i++) {
					slide[i].classList.remove('active-img');
				}
				slide[vitriSlide].nextElementSibling.classList.add('active-img');
			}
			else
			{
				for (var i = 0; i < slide.length; i++) {
					slide[i].classList.remove('active-img');
				}
				slide[0].classList.add('active-img');
			}
			
		},3000);
	}

	




	var chonTinh = document.getElementById('a-tinhTP');

	window.onclick = function(event) {
	    if (event.target != tttt) { bodySearch[0].classList.remove('active-search'); clickSearch = 0;}
	    // if (event.target != tttt2) { bodySearch[1].classList.remove('active-search2'); }
	    if (event.target != clickUser) {document.getElementsByClassName('user-form')[0].classList.remove("hienthi-search-form");}

	    if (event.target != aSelect) {document.getElementById('a-tinhTP').classList.remove('click-select');}
	    if (event.target != select_Item) {document.getElementById('a-danhmuc').classList.remove('click-select');}
	    if (event.target != document.getElementById('a-tinhTP')) {
	    	var andi2 =  document.getElementsByClassName('select-content');
	    	andi2[0].classList.remove('hienthi');
	    }
	    if (event.target != document.getElementById('a-danhmuc')) {
	    	var andi2 =  document.getElementsByClassName('select-content');
	    	andi2[1].classList.remove('hienthi');
	    }

	}
},false);