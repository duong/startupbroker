$(document).ready(appInitialize);

function appInitialize() {
    var e = document.getElementById("menuSelector");
    e.onclick = "";
    var menuCallback = function (e) { toggleMode(e, "showMenu"); };
    e.addEventListener("click", menuCallback, false);
    e.addEventListener("touchstart", menuCallback, false);

    var i;
    var children = document.querySelectorAll("nav.main li.parentNode>a");
    for (i = 0; i < children.length; i++) {
        children.item(i).addEventListener("click", toggleChildren, false);
        //children.item(i).addEventListener("touchstart", toggleChildren, false);
    }

    e = document.querySelector("#languageSelector>ul>li>a");
    e.onclick = "";
    var langCallback = function (e) { toggleMode(e, "showLanguageSelector"); };
    e.addEventListener("click", langCallback, false);
    e.addEventListener("touchstart", langCallback, false);

    e = document.querySelector("#countrySelector>ul>li>a");
    e.onclick = "";
    var countryCallback = function (e) { toggleMode(e, "showCountrySelector"); };
    e.addEventListener("click", countryCallback, false);
    e.addEventListener("touchstart", countryCallback, false);

    RitEmailIdReplacement();

    var tapStart = function (e) { e.target.className = "actionTap"; };
    var tapEnd = function (e) { e.target.className = ""; };
    children = document.querySelectorAll("nav.main a, #languageSelector ul ul a, #countrySelector ul ul a, form>section>footer a, form>section>article a, form>section>article input[type=button], form>section>article input[type=submit]");
    for (i = 0; i < children.length; i++) {
        children.item(i).addEventListener("touchstart", tapStart, false);
        children.item(i).addEventListener("touchend", tapEnd, false);
    }

    if (typeof(RitRearrange) === "function") {
        RitRearrange();
    }
}

function isMobileMenu() {
    var mobileMenu = document.querySelector("header>a:first-child");
    return window.getComputedStyle(mobileMenu).display !== "none";
}

function toggleMode(e, id) {
    if (!isMobileMenu()) {
        return;
    }
    e.preventDefault();
    //e.stopPropagation();
    //e.stopImmediatePropagation();

    document.documentElement.className =
        (document.documentElement.className === id) ? "" : id;
}

function toggleChildren(e) {
    if (!isMobileMenu()) {
        return;
    }

    e.preventDefault();
    var node = e.currentTarget.parentElement;

    var className = node.className;
    var classes = className.split(/\s+/);
    var i = classes.indexOf("showChildren");
    if (i > -1) {
        classes.splice(i, 1);
    } else {
        classes.push("showChildren");        
    }
    node.className = classes.join(" ");
}