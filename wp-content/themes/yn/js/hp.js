function loadHbImages() {
    hbImagesLoaded = 0, hbImages = $(".hbGal .hbGalImg.unpopulated").length, $(".hbGal .hbGalImg.unpopulated").each(function(e, a) {
        var t = $(this).attr("data-bgimg"), n = this;
        $("<img>").attr("src", t).load(function(e) {
            $(n).css({
                "background-image": "url(" + t + ")"
            }), hbImagesLoaded++, hbImagesLoaded == hbImages && ($(".hbGal").slick({
                autoplay: !0,
                initialSlide: hbImages,
                fade: !0,
                speed: 1e3
            }), hbGalleryCreated = !0);
        });
    });
}

function loadYzImages() {
    yzImagesLoaded = 0, yzImages = $(".yzGal .yzGalImg.unpopulated").length, $(".yzGal .yzGalImg.unpopulated").each(function(e, a) {
        var t = $(this).attr("data-bgimg"), n = this;
        $("<img>").attr("src", t).load(function(e) {
            $(n).css({
                "background-image": "url(" + t + ")"
            }), yzImagesLoaded++, yzImagesLoaded == yzImages && ($(".yzGal").slick({
                autoplay: !0,
                initialSlide: yzImages,
                fade: !0,
                speed: 1e3
            }), yzGalleryCreated = !0);
        });
    });
	slide();
}

function hpInit() {
    TweenMax.to($(".fk"), 0, {
        rotation: 45,
        top: "9px"
    }), TweenMax.to($(".lk"), 0, {
        rotation: -45,
        bottom: "9px"
    }), TweenMax.to($(".mk"), 0, {
        opacity: 0
    }), TweenMax.set($(".gath"), {
        perspective: 1e3
    }), TweenMax.set($(".hb_side"), {
        perspective: 1e3
    }), TweenMax.set($(".yz_side"), {
        perspective: 1e3
    }), $(".hb_side").click(function(e) {
        var a = $(this), t = this;
        a.css({
            "z-index": 3
        }), a.removeClass("unclikced"), TweenMax.to(a, .5, {
            width: "100%",
            height: "100vh",
            ease: Sine.easeOut
        }), isMobile ? TweenMax.to($(".yz_side"), .5, {
            width: 0,
            left: "-100%",
            ease: Sine.easeOut
        }) : TweenMax.to($(".yz_side"), .5, {
            width: "100%",
            left: "-100%",
            ease: Sine.easeOut
        }), TweenMax.to($(".mainInfo"), .5, {
            right: "60%",
            display: "none",
            ease: Sine.easeOut
        }), TweenMax.fromTo($(".contentB", t), .5, {
            left: 100,
            opacity: 0
        }, {
            left: 0,
            opacity: 1,
            display: "block"
        }), TweenMax.to($(".contentA", this), .2, {
            opacity: 0,
            right: 200,
            ease: Sine.easeOut,
            display: "none",
            onComplete: function() {
                TweenMax.delayedCall(2, loadHbImages), hbOpened = !0, TweenMax.to($(".hb_menu"), .3, {
                    right: "0",
                    ease: Sine.easeOut
                });
            }
        }), TweenMax.to($(".topMenuConLeft"), .4, {
            opacity: 1,
            display: "table"
        }), $(".hb_side").unbind("click");
    }), $(".yz_side").click(function(e) {
        var a = $(this), t = this;
        a.css({
            "z-index": 3
        }), a.removeClass("unclikced"), TweenMax.to(a, .5, {
            width: "100%",
            height: "100vh",
            ease: Sine.easeOut
        }), isMobile ? TweenMax.to($(".hb_side"), .5, {
            width: 0,
            left: "100%",
            ease: Sine.easeOut
        }) : TweenMax.to($(".hb_side"), .5, {
            width: "100%",
            left: "100%",
            ease: Sine.easeOut
        }), TweenMax.to($(".mainInfo"), .4, {
            left: "60%",
            display: "none",
            ease: Sine.easeOut
        }), TweenMax.to($(".contentB", t), .5, {
            right: 100,
            opacity: 0
        }, {
            right: 0,
            opacity: 0,
            display: "none"
        }), TweenMax.fromTo($(".contentC", t), .5, {
            right: 100,
            opacity: 0
        }, {
            right: 0,
            opacity: 1,
            display: "block"
        }), TweenMax.to($(".contentA", this), .5, {
            opacity: 0,
            left: 200,
            ease: Sine.easeOut,
            display: "none",
            onComplete: function() {
                TweenMax.delayedCall(2, loadYzImages), yzOpened = !0, TweenMax.to($(".yz_menu"), .3, {
                    left: "0",
                    ease: Sine.easeOut
                });
            }
        }), TweenMax.to($(".topMenuConRight"), .4, {
            opacity: 1,
            display: "table"
        }), $(".yz_side").unbind("click");
    }), $(".yzLink").click(function(e) {
        e.preventDefault();
        var a = $(".yz_side"), t = ".yz_side";
        a.css({
            "z-index": 4
        }), a.removeClass("unclikced"), hbGalleryCreated && $(".hbGal").slick("slickPause"), 
        TweenMax.to(a, .5, {
            left: 0,
            ease: Sine.easeOut
        }), TweenMax.to($(".hb_side"), .5, {
            left: "100%",
            ease: Sine.easeOut
        }), TweenMax.to($(".hb_menu"), .3, {
            right: "-29.3rem",
            ease: Sine.easeOut
        }), TweenMax.fromTo($(".contentB", t), .5, {
            right: 100,
            opacity: 0
        }, {
            right: 0,
            opacity: 1,
            display: "block"
        }), TweenMax.to($(".contentA", t), .5, {
            opacity: 0,
            display: "none",
            onComplete: function() {
                TweenMax.to($(".yz_menu"), .3, {
                    left: "0",
                    ease: Sine.easeOut
                }), yzGalleryCreated ? $(".yzGal").slick("slickPlay") : (TweenMax.killDelayedCallsTo(loadYzImages), 
                TweenMax.delayedCall(2, loadYzImages));
            }
        }), TweenMax.to($(".topMenuConLeft"), .4, {
            opacity: 0,
            display: "none"
        }), TweenMax.to($(".topMenuConRight"), .4, {
            opacity: 1,
            display: "table"
        });
    }), $(".hbLink").click(function(e) {
        e.preventDefault();
        var a = $(".hb_side"), t = ".hb_side";
        a.css({
            "z-index": 4
        }), a.removeClass("unclikced"), TweenMax.to(a, .5, {
            width: "100%",
            left: 0,
            ease: Sine.easeOut
        }), TweenMax.to($(".yz_side"), .5, {
            left: "-100%",
            ease: Sine.easeOut
        }), TweenMax.to($(".yz_menu"), .3, {
            left: "-29.3rem",
            ease: Sine.easeOut
        }), TweenMax.fromTo($(".contentB", t), .5, {
            left: 100,
            opacity: 0
        }, {
            left: 0,
            opacity: 1,
            display: "block"
        }), yzGalleryCreated && $(".yzGal").slick("slickPause"), TweenMax.to($(".contentA", t), .5, {
            opacity: 0,
            display: "none",
            onComplete: function() {
                TweenMax.to($(".hb_menu"), .3, {
                    right: "0",
                    ease: Sine.easeOut
                }), hbGalleryCreated ? $(".hbGal").slick("slickPlay") : (TweenMax.killDelayedCallsTo(loadHbImages), 
                TweenMax.delayedCall(2, loadHbImages));
            }
        }), TweenMax.to($(".topMenuConRight"), .4, {
            opacity: 0,
            display: "none"
        }), TweenMax.to($(".topMenuConLeft"), .4, {
            opacity: 1,
            display: "table"
        });
    }), $(".hb_menu .close").click(function() {
        hbMenuOpened ? (hbMenuOpened = !1, $(".hb_menu").addClass("closedHbMenu"), TweenMax.to($(".hb_menu"), .3, {
            right: "-29.3rem",
            ease: Sine.easeOut
        }), TweenMax.to($(".hb_menu .fk"), .3, {
            rotation: 0,
            top: 0
        }), TweenMax.to($(".hb_menu .lk"), .3, {
            rotation: 0,
            bottom: 0
        }), TweenMax.to($(".hb_menu .mk"), .3, {
            opacity: 1
        })) : (hbMenuOpened = !0, TweenMax.to($(".hb_menu"), .3, {
            right: "0",
            ease: Sine.easeOut,
            onComplete: function() {
                $(".hb_menu").removeClass("closedHbMenu");
            }
        }), TweenMax.to($(".hb_menu .fk"), .3, {
            rotation: 45,
            top: "9px"
        }), TweenMax.to($(".hb_menu .lk"), .3, {
            rotation: -45,
            bottom: "9px"
        }), TweenMax.to($(".hb_menu .mk"), .3, {
            opacity: 0
        }));
    }), $(".yz_menu .close").click(function() {
        yzMenuOpened ? (yzMenuOpened = !1, $(".yz_menu").addClass("closedYzMenu"), TweenMax.to($(".yz_menu"), .3, {
            left: "-29.3rem",
            ease: Sine.easeOut
        }), TweenMax.to($(".yz_menu .fk"), .3, {
            rotation: 0,
            top: 0
        }), TweenMax.to($(".yz_menu .lk"), .3, {
            rotation: 0,
            bottom: 0
        }), TweenMax.to($(".yz_menu .mk"), .3, {
            opacity: 1
        })) : (yzMenuOpened = !0, TweenMax.to($(".yz_menu"), .3, {
            left: "0",
            ease: Sine.easeOut,
            onComplete: function() {
                $(".yz_menu").removeClass("closedYzMenu");
            }
        }), TweenMax.to($(".yz_menu .fk"), .3, {
            rotation: 45,
            top: "9px"
        }), TweenMax.to($(".yz_menu .lk"), .3, {
            rotation: -45,
            bottom: "9px"
        }), TweenMax.to($(".yz_menu .mk"), .3, {
            opacity: 0
        }));
    });
}

var hbMenuOpened = !0, yzMenuOpened = !0, hbOpened = !1, hbImages, hbImagesLoaded = 0, yzOpened = !1, yzImages, yzImagesLoaded = 0, hbGalleryCreated = !1, yzGalleryCreated = !1;

$(document).ready(function(e) {
    hpInit();
});

function slide() {

	let length = $('.contentC > div').length;

$('.contentC .movable').removeClass("active");
$('.contentC div:nth-child(1)').addClass("active");
let counter = 2;
setInterval(anim, 3925);
function anim() {
$('.contentC .movable').removeClass("active");
$('.contentC div:nth-child('+counter+')').addClass("active");
if(counter == length) {
counter = 1;
} else{
    counter++;
}
}
	
}