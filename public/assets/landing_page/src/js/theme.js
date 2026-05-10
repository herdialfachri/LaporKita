(function () {
    "use strict";

    /**
     * ------------------------------------------------------------------------
     * Functions
     * ------------------------------------------------------------------------
     */

    // Back to top button
    const myBacktotop = function () {
        // browser window scroll
        var offset = 300,
            offset_opacity = 1200,
            back_to_top = document.querySelector(".back-top"),
            scrollpos = window.scrollY;

        var add_class_back_scroll = function add_class_back_scroll() {
            back_to_top.classList.add("block");
            back_to_top.classList.remove("hidden");
        };

        var add_class_offset_scroll = function add_class_offset_scroll() {
            back_to_top.classList.add("opacity-90");
        };

        var remove_class_back_scroll = function remove_class_back_scroll() {
            back_to_top.classList.remove("block", "opacity-90");
            back_to_top.classList.add("hidden");
        };

        // back to top by es6-scroll-to
        var defaults = {
            duration: 400,
            easing: function easing(t, b, c, d) {
                return -c * (t /= d) * (t - 2) + b;
            },
            to: 0,
        };
        var animatedScrollTo = function animatedScrollTo(args) {
            if (isInteger(args)) {
                args = {
                    to: args,
                };
            }
            var options = extend(defaults, args);
            options.startingYOffset = window.pageYOffset;
            options.distanceYOffset =
                parseInt(options.to, 10) - options.startingYOffset;
            window.requestAnimationFrame(function (timestamp) {
                return animateScroll(options, timestamp);
            });
        };
        var animateScroll = function animateScroll(options, now) {
            if (!options.startTime) {
                options.startTime = now;
            }
            var currentTime = now - options.startTime;
            var newYOffset = Math.round(
                options.easing(
                    currentTime,
                    options.startingYOffset,
                    options.distanceYOffset,
                    options.duration,
                ),
            );
            if (currentTime < options.duration) {
                window.requestAnimationFrame(function (timestamp) {
                    return animateScroll(options, timestamp);
                });
            } else {
                newYOffset = options.to;
            }
            setScrollTopPosition(newYOffset);
        };
        var setScrollTopPosition = function setScrollTopPosition(newYOffset) {
            document.documentElement.scrollTop = newYOffset;
            document.body.scrollTop = newYOffset;
        };
        var isInteger = function isInteger(value) {
            if (Number.isInteger) {
                return Number.isInteger(value);
            } else {
                return (
                    typeof value === "number" &&
                    isFinite(value) &&
                    Math.floor(value) === value
                );
            }
        };
        var extend = function extend(defaults, options) {
            var extendedOptions = {};
            for (var key in defaults) {
                extendedOptions[key] = options[key] || defaults[key];
            }
            return extendedOptions;
        };
        var easeInQuint = function easeInQuint(t, b, c, d) {
            return c * (t /= d) * t * t * t * t + b;
        };

        const scroll_a = document.querySelectorAll(".back-top");
        if (scroll_a != null) {
            for (var i = 0; i < scroll_a.length; i++) {
                scroll_a[i].addEventListener("click", function () {
                    animatedScrollTo({
                        easing: easeInQuint,
                        duration: 800,
                    });
                });
            }
        }

        window.addEventListener("scroll", function () {
            scrollpos = window.scrollY;
            if (scrollpos > offset) {
                add_class_back_scroll();
            } else {
                remove_class_back_scroll();
            }
            if (scrollpos > offset_opacity) {
                add_class_offset_scroll();
            }
        });
    };

    // Preloader
    const myPreloader = function () {
        var xpre = document.querySelector(".preloader");
        if (xpre != null) {
            window.addEventListener("load", function () {
                document.querySelector("body").classList.add("loaded-success");
            });
        }
    };

    // Sticky element
    const mySticky = function () {
        // sticky
        var stickys = document.querySelectorAll(".sticky");
        if (stickys != null) {
            for (var i = 0; i < stickys.length; i++) {
                new hcSticky(stickys[i], {
                    stickTo: stickys[i].parentNode,
                    top: 28,
                    bottomEnd: 0,
                });
            }
        }
    };

    // Sub Dropdown
    const myDropdown = function () {
        // submenu
        const onekit_submenu = function onekit_submenu() {
            var onekit_toggle = document.querySelectorAll(".dropdown-toggle");
            var _loop = function _loop(i) {
                onekit_toggle[i].addEventListener("click", function (event) {
                    event.stopPropagation();
                    event.preventDefault();

                    onekit_toggle[i].nextElementSibling.classList.toggle(
                        "show",
                    );
                });
                window.addEventListener("mouseup", function (event) {
                    if (
                        event.target != onekit_toggle[i].nextElementSibling &&
                        event.target.parentNode !=
                            onekit_toggle[i].nextElementSibling &&
                        event.target.classList.contains("dropdown-toggle") !=
                            true
                    ) {
                        onekit_toggle[i].nextElementSibling.classList.remove(
                            "show",
                        );
                    }
                });
            };

            for (var i = 0; i < onekit_toggle.length; i++) {
                _loop(i);
            }
        };

        var ef = document.querySelector(".subdropdown");
        if (ef != null) {
            onekit_submenu();
        }

        // Search dropdown
        const search_dropdown = function search_dropdown() {
            var search_dropa = document.querySelectorAll(
                ".search-dropdown > button",
            );
            var search_menu_x = document.querySelectorAll(
                ".search-dropdown > .dropdown-menu",
            );

            var _loop = function _loop(i) {
                search_dropa[i].addEventListener("click", function (event) {
                    event.stopPropagation();
                    event.preventDefault();

                    search_dropa[i].nextElementSibling.classList.toggle("show");
                    search_dropa[i].parentNode.classList.toggle("show");
                });
            };

            for (var i = 0; i < search_dropa.length; i++) {
                _loop(i);
            }
        };
        search_dropdown();
    };

    // Mobile menu close
    const myMobile = function () {
        var x = document.querySelectorAll(".back-menu");
        if (x != null) {
            for (var v = 0; v < x.length; v++) {
                x[v].addEventListener("click", function () {
                    var y = document.getElementsByClassName("side-menu");
                    for (var i = 0; i < y.length; i++) {
                        y[i].classList.remove("show");
                    }

                    var b = document.querySelectorAll(".side-area");
                    for (var i = 0; i < b.length; i++) {
                        b[i].classList.remove("show");
                    }
                });
            }
        }
    };

    // Mobile menu open
    const myOpen = function () {
        var x = document.querySelectorAll(".menu-mobile");
        if (x != null) {
            for (var z = 0; z < x.length; z++) {
                x[z].addEventListener("click", function () {
                    var y = document.getElementsByClassName("side-menu");
                    for (var i = 0; i < y.length; i++) {
                        y[i].classList.add("show");
                    }

                    var b = document.querySelectorAll(".side-area");
                    for (var i = 0; i < b.length; i++) {
                        b[i].classList.add("show");
                    }
                });
            }
        }
    };

    // Lightbox
    const myLightbox = function () {
        // GLightbox
        const lightbox_class = document.querySelector(".glightbox3");
        if (lightbox_class != null) {
            const lightbox = GLightbox({
                selector: ".glightbox3",
                touchNavigation: true,
                loop: true,
                autoplayVideos: true,
            });
        }
    };

    // splidejs
    const mySplidejs = function () {
        // mySplidejs
        const postslider_class = document.querySelector("#post-carousel");
        if (postslider_class != null) {
            const postslider = new Splide(postslider_class, {
                rewind: true,
                pagination: true,
                arrows: true,
                type: "loop",
                drag: "free",
                perPage: 3,
                perMove: 1,
                gap: 24,
                breakpoints: {
                    768: {
                        perPage: 2,
                    },
                    500: {
                        perPage: 1,
                    },
                },
            });
            postslider.mount();
        }
    };

    // splide video
    const mySplidevideo = function () {
        // mySplidevideo
        const postvideo_class = document.querySelector("#main-carousel");
        if (postvideo_class != null) {
            const postvideo = new Splide("#main-carousel", {
                type: "fade",
                rewind: true,
                pagination: false,
                arrows: false,
            });

            const thumbnails = new Splide("#thumbnail-carousel", {
                fixedWidth: 150,
                fixedHeight: 120,
                gap: 24,
                rewind: true,
                pagination: false,
                isNavigation: true,
            });

            postvideo.sync(thumbnails);
            postvideo.mount(window.splide.Extensions);
            thumbnails.mount();
        }
    };

    // Hero Slider dengan progress bar
    const myHeroSlider = function () {
        const heroSlider_class = document.querySelector("#hero-slider");
        if (heroSlider_class != null) {
            const heroSlider = new Splide("#hero-slider", {
                type: "loop",
                autoplay: true,
                interval: 4000,
                pauseOnHover: true,
                arrows: true,
                pagination: true,
                speed: 600,
            });

            const progressFill = document.querySelector(
                ".slider-progress-fill",
            );

            heroSlider.on("autoplay:playing", function (rate) {
                if (progressFill) progressFill.style.width = rate * 100 + "%";
            });

            heroSlider.on("move", function () {
                if (progressFill) {
                    progressFill.style.transition = "none";
                    progressFill.style.width = "0%";
                    setTimeout(function () {
                        progressFill.style.transition = "width 4000ms linear";
                    }, 50);
                }
            });

            heroSlider.mount();
        }
    };

    // Custom JS
    const myCustom = function () {
        // Smooth scroll dengan offset navbar
        const navLinks = document.querySelectorAll(
            'a[href^="#"]:not(.back-top)',
        );
        if (navLinks.length > 0) {
            navLinks.forEach(function (link) {
                link.addEventListener("click", function (e) {
                    const href = this.getAttribute("href");
                    if (href === "#") return;
                    const target = document.querySelector(href);
                    if (!target) return;
                    e.preventDefault();
                    const navHeight =
                        document.querySelector("header").offsetHeight;
                    const targetPos =
                        target.getBoundingClientRect().top +
                        window.scrollY -
                        navHeight -
                        8;
                    window.scrollTo({ top: targetPos, behavior: "smooth" });
                });
            });
        }

        // Counter statistik
        const statNumbers = document.querySelectorAll(".stat-number");
        if (statNumbers.length > 0) {
            const animateCount = function (el) {
                const target = parseInt(el.getAttribute("data-target"));
                const duration = 1800;
                const steps = 60;
                const increment = target / steps;
                let current = 0;
                let count = 0;
                const timer = setInterval(function () {
                    count++;
                    current += increment;
                    if (count >= steps) {
                        current = target;
                        clearInterval(timer);
                    }
                    el.textContent =
                        Math.floor(current).toLocaleString("id-ID");
                }, duration / steps);
            };

            const observer = new IntersectionObserver(
                function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            animateCount(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                },
                { threshold: 0.5 },
            );

            statNumbers.forEach(function (el) {
                observer.observe(el);
            });
        }

        // FAQ toggle
        window.toggleFaq = function (btn) {
            const item = btn.closest(".faq-item");
            const isOpen = item.classList.contains("open");
            document.querySelectorAll(".faq-item.open").forEach(function (el) {
                el.classList.remove("open");
            });
            if (!isOpen) {
                item.classList.add("open");
            }
        };

        // Active navbar berdasarkan scroll
        const sections = document.querySelectorAll(
            "#beranda, #informasi, #galeri, #berita, #footer-content",
        );
        const navItems = document.querySelectorAll(".navbar a");

        if (sections.length > 0 && navItems.length > 0) {
            window.addEventListener("scroll", function () {
                let current = "";
                const navHeight = document.querySelector("header").offsetHeight;
                const scrollBottom = window.scrollY + window.innerHeight;
                const docHeight = document.documentElement.scrollHeight;

                // kalau udah di bottom page, aktifkan section terakhir
                if (scrollBottom >= docHeight - 10) {
                    current = sections[sections.length - 1].getAttribute("id");
                } else {
                    sections.forEach(function (section) {
                        const sectionTop = section.offsetTop - navHeight - 50;
                        if (window.scrollY >= sectionTop) {
                            current = section.getAttribute("id");
                        }
                    });
                }

                navItems.forEach(function (a) {
                    a.parentElement.classList.remove("active");
                    const href = a.getAttribute("href");
                    if (href === "#" + current) {
                        a.parentElement.classList.add("active");
                    }
                });
            });
        }
    };

    /**
     * ------------------------------------------------------------------------
     * Launch Functions
     * ------------------------------------------------------------------------
     */

    myBacktotop();
    myPreloader();
    mySticky();
    myDropdown();
    myMobile();
    myOpen();
    myLightbox();
    mySplidejs();
    mySplidevideo();
    myHeroSlider();
    myCustom();
})();
