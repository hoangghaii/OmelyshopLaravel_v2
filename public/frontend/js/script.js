$(function () {
    /** --- Loading page ---  */
    $(window).on("load", function () {
        $("body").removeClass("preloading");
        $("#loading").delay(100).fadeOut("slow");
    });

    /** --- Scroll bar --- */
    $(window).on("scroll", function () {
        var winScroll =
            document.body.scrollTop || document.documentElement.scrollTop;
        var height =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        var scrolled = (winScroll / height) * 100;
        document.getElementById("myBar").style.height = scrolled + "%";
    });

    /** --- menu scroll effect --- */
    $(window).scroll(function () {
        var vitri = $("html").scrollTop();
        if (vitri >= 1) {
            $(".menu").addClass("menuscroll");
        } else if (vitri < 1) {
            $(".menu").removeClass("menuscroll");
        }
    });

    /** --- move background --- */
    var lFollowY = 0,
        y = 0,
        friction = 1 / 30;

    function moveBackground() {
        y += (lFollowY - y) * friction;
        translate = "translate(" + y + "px) scale(1.1)";

        $(".cate-banner .bg").css({
            "-webit-transform": translate,
            "-moz-transform": translate,
            transform: translate,
        });

        window.requestAnimationFrame(moveBackground);
    }

    $(window).on("mousemove click", function (e) {
        var lMouseX = Math.max(
            -100,
            Math.min(100, $(window).width() / 2 - e.clientX)
        );
        var lMouseY = Math.max(
            -100,
            Math.min(100, $(window).height() / 2 - e.clientY)
        );
        lFollowX = (20 * lMouseX) / 100; // 100 : 12 = lMouxeX : lFollow
        lFollowY = (10 * lMouseY) / 100;
    });

    moveBackground();

    /** --- Remove preventDefault ---  */
    $(".product-content-right__title a").click(function (e) {
        let target = $(this).attr("href");
        $(".product-content-right__content__product").hide("slow");
        $(target).show("slow");
        $(".product-content-right__title a").removeClass("active");
        $(this).addClass("active");
        e.preventDefault();
    });

    $(".prod-footer__title a").click(function (e) {
        let target = $(this).attr("href");
        $(".prod-footer__content--prod").hide("slow");
        $(target).show("slow");
        $(".prod-footer__title a").removeClass("active");
        $(this).addClass("active");
        e.preventDefault();
    });

    /** --- Owl carosel --- */
    $(".brand-carousel").slick({
        autoplay: true,
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        dots: false,
        prevArrow: false,
        nextArrow: false,
        autoplaySpeed: 2000,
    });

    /** --- Remove preventDefault của a herf (c1): ---  */
    /** --- dùng javascript --- */
    // const selectEle = (ele) => document.querySelectorAll(ele);

    // selectEle('.more')[0].addEventListener('click', function (e) {
    //     e.preventDefault();
    // });

    // for (let i = 0; i < selectEle('.blog-more').length; i++) {
    //     selectEle('.blog-more')[i].addEventListener('click', function (e) {
    //         e.preventDefault();
    //     });
    // }

    // for (let i = 0; i < selectEle('.info a').length; i++) {
    //     selectEle('.info a')[i].addEventListener('click', function (e) {
    //         e.preventDefault();
    //     });
    // }

    /** --- Scroll top ---  */
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 100) {
            $(".gotop").show();
        } else {
            $(".gotop").hide();
        }
    });
    $(".gotop").click(function () {
        $("html,body").animate(
            {
                scrollTop: 0,
            },
            1000
        );
    });

    $('input[type="number"]').number({
        containerClass: "number-style",
        minus: "number-minus",
        plus: "number-plus",
        containerTag: "div",
        btnTag: "span",
    });

    $("#province").select2({
        placeholder: "Tỉnh/Thành phố*",
    });
    $("#district").select2({
        placeholder: "Quận/Huyện*",
    });
    $("#ward").select2({
        placeholder: "Xã/Phường*",
    });

    document.querySelector(".img__btn").addEventListener("click", function () {
        document.querySelector(".cont").classList.toggle("s--signup");
    });
});

function messageSuccess($message) {
    toastr.success($message, "Thông báo", {
        timeOut: 2000,
    });
}

function messageError($message) {
    toastr.error($message, "Thông báo", {
        timeOut: 2000,
    });
}

/** --- Zoom image --- */
function magnify(imgID, zoom) {
    var img, glass, w, h, bw;
    img = document.getElementById(imgID);

    glass = document.createElement("DIV");
    glass.setAttribute("class", "img-magnifier-glass");

    img.parentElement.insertBefore(glass, img);

    glass.style.backgroundImage = "url('" + img.src + "')";
    glass.style.backgroundRepeat = "no-repeat";
    glass.style.backgroundSize =
        img.width * zoom + "px " + img.height * zoom + "px";
    bw = 3;
    w = glass.offsetWidth / 2;
    h = glass.offsetHeight / 2;

    glass.addEventListener("mousemove", moveMagnifier);
    img.addEventListener("mousemove", moveMagnifier);

    glass.addEventListener("touchmove", moveMagnifier);
    img.addEventListener("touchmove", moveMagnifier);

    function moveMagnifier(e) {
        var pos, x, y;

        e.preventDefault();

        pos = getCursorPos(e);
        x = pos.x;
        y = pos.y;

        if (x > img.width - w / zoom) {
            x = img.width - w / zoom;
        }
        if (x < w / zoom) {
            x = w / zoom;
        }
        if (y > img.height - h / zoom) {
            y = img.height - h / zoom;
        }
        if (y < h / zoom) {
            y = h / zoom;
        }

        glass.style.left = x - w + "px";
        glass.style.top = y - h + "px";

        glass.style.backgroundPosition =
            "-" + (x * zoom - w + bw) + "px -" + (y * zoom - h + bw) + "px";
    }

    function getCursorPos(e) {
        var a,
            x = 0,
            y = 0;
        e = e || window.event;

        a = img.getBoundingClientRect();

        x = e.pageX - a.left;
        y = e.pageY - a.top;
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return {
            x: x,
            y: y,
        };
    }
}

magnify("prod_image", 2);
